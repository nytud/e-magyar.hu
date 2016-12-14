/* 
 * Parser class - parses GATE xml and displays output in various formats
 * @param {integer} _maxchar - the maximum length for textarea input
 * @returns {Parser}
 */

function Parser(_maxchar) {
    //max length for textarea input
    this.maxchar = _maxchar;
    //default view
    this.orientation = "horizontal";
    //GATE XML as DOM object
    this.$xml = "";
    //link to downloadable zip    
    this.zipurl = "";
    //list of selected modules
    this.modules = [];
    //array of token objects
    this.tokens = [];
    //array of segment    
    this.sentences = [];
    this.nps = [];
    this.nes = [];
    //input form
    this.$form = $("#form");
    //segment highlighters
    this.$highlighter = $("#filter");
    //parsed output wrapper
    this.$wrapper = $("#parsed");
    //css classes of segments
    this.css = [
        {
            'item': 'token',
            'cls': 'token_highlight'
        },
        {
            'item': 'sentence',
            'cls': 'sentence_highlight'
        },
        {
            'item': 'np',
            'cls': 'np_highlight'
        },
        {
            'item': 'ne',
            'cls': 'ne_highlight'
        }
    ];
    //sentences in output
    this.sentences;
    //NPs in output
    this.nps;
    //NEs in output
    this.nes;

    this.getMaxChar = function () {
        var self = this;
        return self.maxchar;
    };
    this.getOrientation = function () {
        var self = this;
        return self.orientation;
    };
    this.getCSS = function () {
        var self = this;
        return self.css;
    };
    this.getModules = function () {
        var self = this;
        return self.modules;
    };

    //get parsed output
    this.getParsed = function (orientation) {

        try {

            var self = this;

            //set orientation
            self.orientation = orientation;

            //extract tokens
            self.tokens = self.getTokens();

            //find segments
            self.sentences = self.findSegments("Sentence");
            self.nps = self.findSegments("NP");
            self.nes = self.findSegments("NE");

//            console.log(self.sentences);
//            console.log(self.nps);
//            console.log(self.nes);

            //display output
            if (orientation === "horizontal") {
                self.displayHorizontal();
            } else {
                self.displayVertical();
            }

            //set url of download link
            $("#download_link").attr("href", self.zipurl);

        } catch (err) {
            $spinner.addClass("hidden");
            var $form = $("#form");
            $form.find(".lid").remove();
            $form.find("input[type='checkbox']:not(.default), button[type='submit']").prop('disabled', false);
            alert(err.message);
        }

    };

    //find segments (sentences, NPs, NEs), form id - to id
    this.findSegments = function (segment_type) {

        var self = this;

        var $root = self.$xml.find('AnnotationSet').first();

        var $segments = $root.find("Annotation").filter(function () {
            return $(this).attr("Type") === segment_type;
        });

        var array = [];

        $segments.each(function (index, segment) {
            var $segment = $(segment);
            var id = parseInt($segment.attr("Id"));
            var start = parseInt($segment.attr("StartNode"));
            var end = parseInt($segment.attr("EndNode"));
            array.push({'start': start, 'end': end, 'id': id});
        });

        return array;
    };

    //extract tokens
    this.getTokens = function () {
        var self = this;
        var $root = self.$xml.find('AnnotationSet').first();

        var $tokens = $root.find("Annotation").filter(function () {
            return $(this).attr("Type") === "Token";
        });

        var array = [];

        //loop through tokens and get their attributes
        $tokens.each(function (index, token) {
            var featureSet = {};
            var $token = $(token);
            var type = $token.attr("Type");
            var id = parseInt($token.attr("Id"));
            var start = parseInt($token.attr("StartNode"));
            var end = parseInt($token.attr("EndNode"));

            $(token).find("Feature").each(function (index, feature) {
                var $feature = $(feature);
                var name = $feature.find("Name").text();
                var value = $feature.find("Value").text();
                featureSet[name] = value;
            });

            if (featureSet.string) {
                var content = featureSet.string;
            }

            //cretae token object
            var token = {
                'id': id,
                'content': content,
                'cls': type.toLowerCase(),
                'start': start,
                'end': end,
                'lemma': (featureSet.lemma || ""),
                'anas': (featureSet.anas || ""),
                'hfstana': (featureSet.hfstana || ""),
                'pos': (featureSet.pos || ""),
                'chunk': (featureSet["NP-BIO"] || ""),
                'deptype': (featureSet.depType || ""),
                'target_id': (featureSet.depTarget || ""),
                'cons': (featureSet.cons || ""),
                'ner': (featureSet["NER-BIO1"] || "")
            };

            array.push(token);

        });

        //return array of token objects
        return array;

    };

    //display output horizontally
    this.displayHorizontal = function () {

        var self = this;

        self.$wrapper.html("");

        $.each(self.tokens, function (index, token) {
            var tokenElement = '<span id="' + token.id + '" class="' + token.cls + ' tooltipper" data-start="' + token.start + '" data-end="' + token.end + '" data-lemma="' + token.lemma + '" data-anas="' + token.anas + '" data-hfstana="' + token.hfstana + '" data-pos="' + token.pos + '" data-chunk="' + token.chunk + '" data-deptype="' + token.deptype + '" data-target_id="' + token.target_id + '" data-cons="' + token.cons + '" data-ner="' + token.ner + '" title="">' + token.content + '</span>';
            self.$wrapper.append(tokenElement);
        });

        self.$highlighter.find("input[type='checkbox']").prop('checked', false).prop('disabled', false);

        $.each(self.sentences, function (index, sentence) {
            var $first = self.$wrapper.find('.token[data-start=' + sentence.start + ']');
            var $last = self.$wrapper.find('.token[data-end=' + sentence.end + ']');
            $first.addClass("sentence_start");
            $last.addClass("sentence_end");
            var $sentence;
            if ($first.attr('id') === $last.attr('id')) {
                $sentence = $first;
            } else {
                $sentence = $first.nextUntil($last).andSelf().add($last);
            }
            $sentence.wrapAll('<span id="' + sentence.id + '" class="sentence" />');
        });

        if ($.inArray('npchunk', self.modules) > 0) {
            self.$highlighter.find("input#npchunks").parent().show();
            $.each(self.nps, function (index, np) {
                var $first = self.$wrapper.find('.token[data-start=' + np.start + ']');
                var $last = self.$wrapper.find('.token[data-end=' + np.end + ']');
                $first.addClass("np_start");
                $last.addClass("np_end");
                var $np;
                if ($first.attr('id') === $last.attr('id')) {
                    $np = $first;
                    $first.addClass("np_end");
                } else {
                    $np = $first.nextUntil($last).andSelf().add($last);
                }
                $np.addClass("np");
            });
        } else {
            self.$highlighter.find("input#npchunks").parent().hide();
        }

        if ($.inArray('ner', self.modules) > 0) {
            self.$highlighter.find("input#nes").parent().show();
            $.each(self.nes, function (index, ne) {
                var $first = self.$wrapper.find('.token[data-start=' + ne.start + ']');
                var $last = self.$wrapper.find('.token[data-end=' + ne.end + ']');
                $first.addClass("ne_start");
                $last.addClass("ne_end");
                var $ne;
                if ($first[0] === $last[0]) {
                    $ne = $first;
                    $first.addClass("ne_end");
                } else {
                    $ne = $first.nextUntil($last).andSelf().add($last);
                }
                $ne.addClass("ne");
            });
        } else {
            self.$highlighter.find("input#nes").parent().hide();
        }

        if ($.inArray('syntax', self.modules) > 0) {
            self.$wrapper.find(".sentence").append('<span class="dep_toggle" title="' + translations.dep_tree + '"> <i class="fa fa-exchange"></i></span><span class="const_toggle" title="' + translations.const_tree + '"> <i class="fa fa-sitemap"></i></span>');
        } else {
            self.$wrapper.remove(".dep_toggle", true).remove(".const_toggle", true);
        }

    };

    //display output vertically
    this.displayVertical = function () {
        var self = this;

        var table = "";

        table += '<div class="table-responsive"><table id="datatable" class="table table-hover">';
        table += '<thead><tr class="filters"><td></td><td class="form-group form-group-sm"><input type="text" class="form-control" placeholder="string"/></td></tr><tr class="headers"><th>id</th><th class="no-order">string</th></thead>';
        table += '<tbody></tbody>';
        table += '</table></div>';

        var $table = $(table);

        if ($.inArray('morph', self.modules) > 0) {
            $table.find("thead tr.filters").append('<td class="form-group form-group-sm"><input type="text" class="form-control" placeholder="morph"/></td>');
            $table.find("thead tr.filters").append('<td class="form-group form-group-sm"><input type="text" class="form-control" placeholder="lemma"/></td>');
            $table.find("thead tr.headers").append('<th class="no-order">emMorph</th>');
            $table.find("thead tr.headers").append('<th class="no-order">emLem</th>');
        }
        if ($.inArray('pos', self.modules) > 0) {
            $table.find("thead tr.filters").append('<td class="form-group form-group-sm"><select class="form-control posfilter" placeholder="pos"></select></td>');
            $table.find("thead tr.headers").append('<th class="no-order">emTag</th>');
        }
        if ($.inArray('syntax', self.modules) > 0) {
            $table.find("thead tr.filters").append('<td class="form-group form-group-sm"><select class="form-control" placeholder="deptype"></select></td><td></td>');
            $table.find("thead tr.headers").append('<th class="no-order">emDep</th><th class="no-order">target</th>');
        }

        self.$wrapper.html($table);

        var rows = "";

        $.each(self.tokens, function (index, token) {
            rows += '<tr id="' + token.id + '">';
            rows += '<td class="token" data-start="' + token.start + '" data-end="' + token.end + '">' + token.id + '</td>';
            var ner = token.ner !== "O" ? token.ner : "";
            rows += '<td>' + token.content + ' <span class="ner_label">' + ner + '</span>' + '</td>';

            if ($.inArray('morph', self.modules) > 0) {
                var lists = self.getAnnotList(token.anas, "vertical");
                rows += '<td>' + (lists.annotlist || "") + '</td>';
                rows += '<td>' + (lists.lemmalist || "") + '</td>';
            }
            if ($.inArray('pos', self.modules) > 0) {
                var morphs = token.hfstana.split(/(?=\[)/g);                      
                rows += '<td>' + token.lemma + '</br>';
                for (var i in morphs) {
                   rows += '<span class="morph_label">' + morphs[i] + '</span>';
                }        
                rows += '</br><b>' + token.pos + '</b></td>';
            }
            if ($.inArray('syntax', self.modules) > 0) {
                rows += '<td>' + token.deptype + '</td>';
                rows += '<td class="target" data-target_id="' + token.target_id + '">' + token.target_id + '</td>';
            }
            rows += '</tr>';
        });

        self.$wrapper.find("table tbody").html(rows);
        $.each(self.sentences, function (index, sentence) {
            self.$wrapper.find('.token[data-start=' + sentence.start + ']').closest("tr").addClass("sentence sentence_start").attr('data-sentence', sentence.id);
            self.$wrapper.find('.token[data-end=' + sentence.end + ']').closest("tr").addClass("sentence sentence_end").attr('data-sentence', sentence.id);
        });

        self.$highlighter.find("input[type='checkbox']").not("#tokens").prop('checked', false).prop('disabled', false);
        self.$highlighter.find("#tokens").prop('checked', true).prop('disabled', true);

        if ($.inArray('npchunk', self.modules) > 0) {
            self.$highlighter.find("input#npchunks").parent().show();
            var $first;
            var $last;
            var $np;
            $.each(self.nps, function (index, np) {
                $first = self.$wrapper.find('.token[data-start=' + np.start + ']').closest("tr").attr('data-np', np.id);
                $last = self.$wrapper.find('.token[data-end=' + np.end + ']').closest("tr").attr('data-np', np.id);
                $first.addClass("np_start");
                $last.addClass("np_end");
                if ($first[0] === $last[0]) {
                    $np = $first;
                } else {
                    $np = $first.nextUntil($last).andSelf().add($last);
                }
                $np.addClass('np');
            });
        } else {
            self.$highlighter.find("input#npchunks").parent().hide();
        }

        if ($.inArray('ner', self.modules) > 0) {
            self.$highlighter.find("input#nes").parent().show();
            var $first;
            var $last;
            var $ne;
            $.each(self.nes, function (index, ne) {
                $first = self.$wrapper.find('.token[data-start=' + ne.start + ']').closest("tr").attr('data-ne', ne.id);
                $last = self.$wrapper.find('.token[data-end=' + ne.end + ']').closest("tr").attr('data-ne', ne.id);
                $first.addClass("ne_start");
                $last.addClass("ne_end");
                if ($first[0] === $last[0]) {
                    $ne = $first;
                } else {
                    $ne = $first.nextUntil($last).andSelf().add($last);
                }
                $ne.addClass('ne');
            });
        } else {
            self.$highlighter.find("input#nes").parent().hide();
        }

    };

    //highlight selected segments (sentences, NPs, NEs)
    this.highlightSegment = function (segment, checked) {
        var self = this;
        var obj = $.grep(self.css, function (e) {
            return e.item === segment;
        });

        if (checked === true) {
            self.$wrapper.find('.' + obj[0].item).addClass(obj[0].cls);
        } else {
            self.$wrapper.find('.' + obj[0].item).removeClass(obj[0].cls);
        }
    };

    this.getAnnotList = function (anas, orientation) {
        if (anas.length < 1) {
            return false;
        }

        var ana = anas.split(";");

        var annots = [];

        for (var i = 0; i < ana.length; i++) {
            var line = ana[i].slice(1, -1);
            var annot = {};
            annot.readable_ana = (line.split(",")[3] || "").replace(/^ ?readable_ana=/, "");
            annot.lemma = (line.split(",")[2] || "").replace(/^ ?lemma=/, "");
            annots.push(annot);
        }

        if (orientation === "vertical") {
            var annotlist = "";
            var lemmalist = "";
            annotlist += ana.length > 1 ? '<ol class="annotlist">' : '<ul class="annotlist">';
            lemmalist += ana.length > 1 ? '<ol class="lemmalist">' : '<ul class="lemmalist">';
            for (var j = 0; j < annots.length; j++) {
                var readable_ana = annots[j].readable_ana.replace(/(\[(.*?)\])/ig, '<span class="morph_label">$1</span>');
                annotlist += '<li>' + readable_ana + '</li>';
            }
            var prev_lemmas = [];
            for (var k = 0; k < annots.length; k++) {
                if (prev_lemmas.indexOf(annots[k].lemma) < 0) {
                    prev_lemmas.push(annots[k].lemma);
                    lemmalist += '<li>' + annots[k].lemma + '</li>';
                }
            }
            annotlist += ana.length > 1 ? '</ol>' : '</ul>';
            lemmalist += ana.length > 1 ? '</ol>' : '</ul>';
            return {
                annotlist: annotlist,
                lemmalist: lemmalist
            };
        } else {
            var list = "";
            list += ana.length > 1 ? '<ol class="annot_lemma_list">' : '<ul class="annot_lemma_list">';
            for (var j = 0; j < annots.length; j++) {
                var readable_ana = annots[j].readable_ana.replace(/(\[(.*?)\])/ig, '<span class="morph_label">$1</span>');
                list += '<li><b>' + annots[j].lemma + '</b><br/>' + readable_ana + '</li>';
            }
            list += ana.length > 1 ? '</ol>' : '</ul>';
            return list;
        }
    };



    //check input length and submit form
    this.submitInput = function (url, serialized, callback) {
        var self = this;
        //get url to GATE output, zipurl to archive and the selected modules

        var request = $.ajax({
            type: "POST",
            context: this,
            url: url,
            data: serialized,
            timeout: 120000,
            dataType: "json",
            beforeSend: function () {
                $active_boxes = self.$form.find("input[type='checkbox']").not(":disabled");
                self.$form.find("input[type='checkbox'], button[type='submit']").prop('disabled', true);
                self.$form.find("textarea").prop('disabled', true);
                $spinner.removeClass('hidden');
            }
        });
        request.done(function (response) {
            $spinner.addClass("hidden");
            if (callback && typeof (callback) === 'function') {
                callback(response);
            }
        });
        request.fail(function (jqXHR, textStatus, exception) {
            $spinner.addClass("hidden");
            $active_boxes.prop('disabled', false);
            self.$form.find("button[type='submit']").prop('disabled', false);
            self.$form.find("textarea").prop('disabled', false);
            displayError(jqXHR, textStatus, exception);
        });
    };

    //get data received from emlam service
    this.getProbs = function (text) {
        var request = $.ajax({
            type: "POST",
            context: this,
            url: base_url + language + "/emlam",
            data: {query_text: (text || "")},
            timeout: 120000,
            dataType: "json",
            beforeSend: function () {
                $("#suggestions").addClass("loading");
            }
        });
        request.done(function (response) {
            $("#suggestions").removeClass("loading");
            if (response.status === true) {
                if (response.results) {
                    var list = "";
                    $.each(response.results, function (index, item) {
                        var word = item.word.replace(/<\/s>/g, '&#9166;');
                        list += '<li><span class="word">' + word + '</span> <span class="prob">(' + Math.pow(10, item.prob).toFixed(3) + ')</span>' + '</li>';
                    });
                    $("#emlam #suggestions").html(list).removeClass("clicked").find("li").removeClass("selected");
                }
            }
        });
        request.fail(function (jqXHR, textStatus, exception) {
            displayError(jqXHR, textStatus, exception);
        });
    };
}
;


