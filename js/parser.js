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

    //extract tokens and display output
    this.getParsed = function (orientation) {

        try {

            var self = this;

            self.orientation = orientation;

            //find segments
            self.findSegments();

            self.tokens = self.getTokens();

            if (orientation === "horizontal") {
                self.displayHorizontal();
            } else {
                self.displayVertical();
            }

            //set url of download link
            $("#download_link").attr("href", self.zipurl);

            //in script.js
            initOutputLayout();

        } catch (err) {
            $spinner.addClass("hidden");
            var $form = $("#form");
            $form.find(".lid").remove();
            $form.find("input[type='checkbox']:not(.default), button[type='submit']").prop('disabled', false);
            alert(err.message);
        }

    };

    //find segments (sentences, NPs, NEs), form id - to id
    this.findSegments = function () {

        var self = this;

        self.sentences = [];
        self.nps = [];
        self.nes = [];

        var $root = self.$xml.find('AnnotationSet').first();

        $root.find("Annotation").each(function (index, node) {
            var $node = $(node);
            var id = $node.attr("Id");
            var type = $node.attr("Type");
            if (type === "Sentence") {
                //magyarlanc
                //var start = index === 0 ? parseInt($node.attr("StartNode")) - 1 : parseInt($node.attr("StartNode"));
                //quntoken
                var start = parseInt($node.attr("StartNode"));
                var end = parseInt($node.attr("EndNode"));
                var id = parseInt($node.attr("Id"));
                self.sentences.push({'start': start, 'end': end, 'id': id});
            }
            if (type === "NP") {
                //var start = index === 0 ? parseInt($node.attr("StartNode")) - 1 : parseInt($node.attr("StartNode"));
                var start = parseInt($node.attr("StartNode"));
                var end = parseInt($node.attr("EndNode"));
                var id = parseInt($node.attr("Id"));
                self.nps.push({'start': start, 'end': end, 'id': id});
            }
            if (type === "NE") {
                //var start = index === 0 ? parseInt($node.attr("StartNode")) - 1 : parseInt($node.attr("StartNode"));
                var start = parseInt($node.attr("StartNode"));
                var end = parseInt($node.attr("EndNode"));
                var id = parseInt($node.attr("Id"));
                self.nes.push({'start': start, 'end': end, 'id': id});
            }
        });
        //console.log(self.sentences);
        //console.log(self.nps);
        //console.log(self.nes);

    };

    //extract tokens
    this.getTokens = function () {
        var self = this;
        var $root = self.$xml.find('AnnotationSet').first();

        var tokens = [];

        //loop through xml and get token attributes
        $root.find("Annotation").each(function (index, node) {
            var featureSet = {};
            var $node = $(node);
            var id = $node.attr("Id");
            var type = $node.attr("Type");
            if (type === "Token") {
                var startNode = parseInt($node.attr("StartNode"));
                var endNode = parseInt($node.attr("EndNode"));
                $(node).find("Feature").each(function (index, feature) {
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
                    'start': startNode,
                    'end': endNode,
                    'lemma': (featureSet.lemma || ""),
                    'anas': (featureSet.anas || ""),
                    'hfstana': (featureSet.hfstana || ""),
                    //'msd': (featureSet.msd || ""),
                    'pos': (featureSet.pos || ""),
                    'deptype': (featureSet.depType || ""),
                    'target_id': (featureSet.depTarget || ""),
                    'cons': (featureSet.cons || "")
                };

                tokens.push(token);
            }
        });

        //return array of token objects
        return tokens;

    };

    //display output horizontally
    this.displayHorizontal = function () {

        var self = this;

        var $parsed = $("#parsed");
        $parsed.html("");

        $.each(self.tokens, function (index, token) {
            var tokenElement = '<span id="' + token.id + '" class="' + token.cls + ' tooltipper" data-start="' + token.start + '" data-end="' + token.end + '" data-lemma="' + token.lemma + '" data-anas="' + token.anas + '" data-hfstana="' + token.hfstana + '" data-pos="' + token.pos + '" data-deptype="' + token.deptype + '" data-target_id="' + token.target_id + '" data-cons="' + token.cons + '" title="">' + token.content + '</span>';
            $parsed.append(tokenElement);
        });

        $("#filter input[type='checkbox']").prop('checked', false).prop('disabled', false);

        $.each(self.sentences, function (index, sentence) {

            var $first = $parsed.find('.token[data-start=' + sentence.start + ']');
            var $last = $parsed.find('.token[data-end=' + sentence.end + ']');
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
            $("#filter #npchunks").parent().show();
            $.each(self.nps, function (index, np) {
                var $first = $parsed.find('.token[data-start=' + np.start + ']');
                var $last = $parsed.find('.token[data-end=' + np.end + ']');
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
            $("#filter #npchunks").parent().hide();
        }

        if ($.inArray('ner', self.modules) > 0) {
            $("#filter #nes").parent().show();
            $.each(self.nes, function (index, ne) {
                var $first = $parsed.find('.token[data-start=' + ne.start + ']');
                var $last = $parsed.find('.token[data-end=' + ne.end + ']');
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
            $("#filter #nes").parent().hide();
        }

        if ($.inArray('syntax', self.modules) > 0) {
            $("#parsed .sentence").append('<span class="dep_toggle" title="' + translations.dep_tree + '"> <i class="fa fa-exchange"></i></span><span class="const_toggle" title="' + translations.const_tree + '"> <i class="fa fa-sitemap"></i></span>');
        } else {
            $("#parsed").remove(".dep_toggle", true).remove(".const_toggle", true);
        }

    };

    //display output vertically
    this.displayVertical = function () {
        var self = this;

        var $parsed = $("#parsed");
        $parsed.html("");

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

        $parsed.html($table);

        var rows = "";

        $.each(self.tokens, function (index, token) {
            rows += '<tr id="' + token.id + '">';
            rows += '<td class="token" data-start="' + token.start + '" data-end="' + token.end + '">' + token.id + '</td>';
            rows += '<td>' + token.content + '</td>';

            if ($.inArray('morph', self.modules) > 0) {
//                var lemmas = "";
//                var annots = "";
//                var ana = token.anas.split(";");
//                annots += ana.length > 1 ? '<ol>' : '<ul>';
//                lemmas += ana.length > 1 ? '<ol>' : '<ul>';
//                var i = 0;
//                var prev_lemmas = [];
//                while (i < ana.length && token.anas.length > 0) {
//                    var line = ana[i].slice(1, -1);
//                    var label = line.split(",")[3].replace(/^ ?readable_ana=/, "");
//                    var lemma = line.split(",")[2].replace(/^ ?lemma=/, "");
//                    annots += '<li>' + label + '</li>';
//                    if (prev_lemmas.indexOf(lemma) < 0) {
//                        prev_lemmas.push(lemma);
//                        lemmas += '<li>' + lemma + '</li>';
//                    }
//                    i++;
//                }
//                annots += ana.length > 1 ? '</ol>' : '</ul>';
//                lemmas += ana.length > 1 ? '</ol>' : '</ul>';

                var data = self.getAnnotList(token.anas, "vertical");

                rows += '<td>' + data.annotlist + '</td>';
                rows += '<td>' + data.lemmalist + '</td>';

            }
            if ($.inArray('pos', self.modules) > 0) {
                rows += '<td>' + token.lemma + '</br>' + token.hfstana + '</br><b>' + token.pos + '</b></td>';
            }
            if ($.inArray('syntax', self.modules) > 0) {
                rows += '<td>' + token.deptype + '</td>';
                rows += '<td class="target" data-target_id="' + token.target_id + '">' + token.target_id + '</td>';
            }
            rows += '</tr>';

        });

        $parsed.find("table tbody").html(rows);
        $.each(self.sentences, function (index, sentence) {
            $('#parsed .token[data-start=' + sentence.start + ']').closest("tr").addClass("sentence sentence_start").attr('data-sentence', sentence.id);
            $('#parsed .token[data-end=' + sentence.end + ']').closest("tr").addClass("sentence sentence_end").attr('data-sentence', sentence.id);
        });

        $("#filter input[type='checkbox']").not("#tokens").prop('checked', false).prop('disabled', false);
        $("#filter #tokens").prop('checked', true).prop('disabled', true);

        if ($.inArray('npchunk', self.modules) > 0) {
            $("#filter #npchunks").parent().show();
            var $first;
            var $last;
            var $np;
            $.each(self.nps, function (index, np) {
                $first = $('#parsed .token[data-start=' + np.start + ']').closest("tr").attr('data-np', np.id);
                $last = $('#parsed .token[data-end=' + np.end + ']').closest("tr").attr('data-np', np.id);
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
            $("#filter #npchunks").parent().hide();
        }

        if ($.inArray('ner', self.modules) > 0) {
            $("#filter #nes").parent().show();
            var $first;
            var $last;
            var $ne;
            $.each(self.nes, function (index, ne) {
                $first = $('#parsed .token[data-start=' + ne.start + ']').closest("tr").attr('data-ne', ne.id);
                $last = $('#parsed .token[data-end=' + ne.end + ']').closest("tr").attr('data-ne', ne.id);
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
            $("#filter #nes").parent().hide();
        }

    };

    //highlight selected segments (sentences, NPs, NEs)
    this.highlightSegment = function (segment, checked) {
        var self = this;
        var obj = $.grep(self.css, function (e) {
            return e.item === segment;
        });

        if (checked === true) {
            $('#parsed .' + obj[0].item).addClass(obj[0].cls);
        } else {
            $('#parsed .' + obj[0].item).removeClass(obj[0].cls);
        }
    };

    function getAnnotList(anas, orientation) {
        if (anas.length > 0) {

            var ana = anas.split(";");

            var annots = [];

            for (var i = 0; i < ana.length; i++) {
                var line = ana[i].slice(1, -1);
                var annot = {};
                annot.readable_ana = line.split(",")[3].replace(/^ ?readable_ana=/, "");
                annot.lemma = line.split(",")[2].replace(/^ ?lemma=/, "");
                annots.push(annot);
            }
            
            console.log(annots);

            if (orientation === "vertical") {
                var annotlist = "";
                var lemmalist = "";
                annotlist += ana.length > 1 ? '<ol>' : '<ul>';
                lemmalist += ana.length > 1 ? '<ol>' : '<ul>';
                for (var j = 0; j < annots.length; j++) {
                    annotlist += '<li>' + annots[j].radable_ana + '</li>';
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
                list += ana.length > 1 ? '<ol>' : '<ul>';
                for (var j = 0; j < annots.length; j++) {
                    list += '<li>' + annots[j].lemma + '<br/>' + annots[j].readable_ana + '</li>';
                }
                list += ana.length > 1 ? '</ol>' : '</ul>';
                return {list: list};
            }
        }
    }

    //compile morph annot list of tokens    
    this.getAnnot = function ($token, _ellipsis) {
        var self = this;

        var ellipsis = (_ellipsis || false);
        var anas = $token.data("anas");
        //var msd = $token.data("msd");
        var pos = $token.data("pos");
        var str = $token.text();
        var annot = "";
        if (anas !== "" && $.inArray('morph', self.modules) > 0) {
            var ana = anas.split(";");
            annot += '<div id="anas"><ol>';
            var i = 0;
            while (i < ana.length) {
                if (ellipsis && i > 3) {
                    annot += "";
                } else {
                    var line = ana[i].slice(1, -1);
                    var label = line.split(",")[3].replace(/^ ?readable_ana=/, "");
                    var lemma = line.split(",")[2].replace(/^ ?lemma=/, "");
                    annot += '<li>' + lemma + '<br/>' + label + '</li>';
                }
                i++;
            }
            annot += '</ol></div>';
            if (ellipsis && i > 4) {
                annot += '<p>... (' + (ana.length - 4) + ' more)</p>';
            }

        }

        if (pos !== "" && $.inArray('pos', self.modules) > 0) {
            annot += '<div class="pos"><b>' + pos + '</b></div>';
        }

        return annot;
    };

    //build const tree from const property of tokens e.g. (NP(Det)(AdjP)(NP))
    this.getTree = function (constituentString) {

        function checkBrackets(str) {
            var depth = 0;
            for (var i in str) {
                if (str[i] === '(') {
                    depth++;
                } else if (str[i] === ')') {
                    depth--;
                }
                //if closing comes first - bad
                if (depth < 0) {
                    return false;
                }
            }
            //if the depth is not null then a closing parenthesis is missing
            if (depth > 0) {
                return false;
            }
            return true;
        }

        function makeTree(data) {

            //orig javascript
            //var items = data.match(/\(|\)|[A-Za-z0-9\xAA\xB5\xBA\xC0-\xD6\xD8-\xF6\xF8-\u02C1\u02C6-\u02D1\u02E0-\u02E4\u02EC\u02EE\u0370-\u0374\u0376\u0377\u037A-\u037D\u0386\u0388-\u038A\u038C\u038E-\u03A1\u03A3-\u03F5\u03F7-\u0481\u048A-\u0527\u0531-\u0556\u0559\u0561-\u0587\u05D0-\u05EA\u05F0-\u05F2\u0620-\u064A\u066E\u066F\u0671-\u06D3\u06D5\u06E5\u06E6\u06EE\u06EF\u06FA-\u06FC\u06FF\u0710\u0712-\u072F\u074D-\u07A5\u07B1\u07CA-\u07EA\u07F4\u07F5\u07FA\u0800-\u0815\u081A\u0824\u0828\u0840-\u0858\u08A0\u08A2-\u08AC\u0904-\u0939\u093D\u0950\u0958-\u0961\u0971-\u0977\u0979-\u097F\u0985-\u098C\u098F\u0990\u0993-\u09A8\u09AA-\u09B0\u09B2\u09B6-\u09B9\u09BD\u09CE\u09DC\u09DD\u09DF-\u09E1\u09F0\u09F1\u0A05-\u0A0A\u0A0F\u0A10\u0A13-\u0A28\u0A2A-\u0A30\u0A32\u0A33\u0A35\u0A36\u0A38\u0A39\u0A59-\u0A5C\u0A5E\u0A72-\u0A74\u0A85-\u0A8D\u0A8F-\u0A91\u0A93-\u0AA8\u0AAA-\u0AB0\u0AB2\u0AB3\u0AB5-\u0AB9\u0ABD\u0AD0\u0AE0\u0AE1\u0B05-\u0B0C\u0B0F\u0B10\u0B13-\u0B28\u0B2A-\u0B30\u0B32\u0B33\u0B35-\u0B39\u0B3D\u0B5C\u0B5D\u0B5F-\u0B61\u0B71\u0B83\u0B85-\u0B8A\u0B8E-\u0B90\u0B92-\u0B95\u0B99\u0B9A\u0B9C\u0B9E\u0B9F\u0BA3\u0BA4\u0BA8-\u0BAA\u0BAE-\u0BB9\u0BD0\u0C05-\u0C0C\u0C0E-\u0C10\u0C12-\u0C28\u0C2A-\u0C33\u0C35-\u0C39\u0C3D\u0C58\u0C59\u0C60\u0C61\u0C85-\u0C8C\u0C8E-\u0C90\u0C92-\u0CA8\u0CAA-\u0CB3\u0CB5-\u0CB9\u0CBD\u0CDE\u0CE0\u0CE1\u0CF1\u0CF2\u0D05-\u0D0C\u0D0E-\u0D10\u0D12-\u0D3A\u0D3D\u0D4E\u0D60\u0D61\u0D7A-\u0D7F\u0D85-\u0D96\u0D9A-\u0DB1\u0DB3-\u0DBB\u0DBD\u0DC0-\u0DC6\u0E01-\u0E30\u0E32\u0E33\u0E40-\u0E46\u0E81\u0E82\u0E84\u0E87\u0E88\u0E8A\u0E8D\u0E94-\u0E97\u0E99-\u0E9F\u0EA1-\u0EA3\u0EA5\u0EA7\u0EAA\u0EAB\u0EAD-\u0EB0\u0EB2\u0EB3\u0EBD\u0EC0-\u0EC4\u0EC6\u0EDC-\u0EDF\u0F00\u0F40-\u0F47\u0F49-\u0F6C\u0F88-\u0F8C\u1000-\u102A\u103F\u1050-\u1055\u105A-\u105D\u1061\u1065\u1066\u106E-\u1070\u1075-\u1081\u108E\u10A0-\u10C5\u10C7\u10CD\u10D0-\u10FA\u10FC-\u1248\u124A-\u124D\u1250-\u1256\u1258\u125A-\u125D\u1260-\u1288\u128A-\u128D\u1290-\u12B0\u12B2-\u12B5\u12B8-\u12BE\u12C0\u12C2-\u12C5\u12C8-\u12D6\u12D8-\u1310\u1312-\u1315\u1318-\u135A\u1380-\u138F\u13A0-\u13F4\u1401-\u166C\u166F-\u167F\u1681-\u169A\u16A0-\u16EA\u1700-\u170C\u170E-\u1711\u1720-\u1731\u1740-\u1751\u1760-\u176C\u176E-\u1770\u1780-\u17B3\u17D7\u17DC\u1820-\u1877\u1880-\u18A8\u18AA\u18B0-\u18F5\u1900-\u191C\u1950-\u196D\u1970-\u1974\u1980-\u19AB\u19C1-\u19C7\u1A00-\u1A16\u1A20-\u1A54\u1AA7\u1B05-\u1B33\u1B45-\u1B4B\u1B83-\u1BA0\u1BAE\u1BAF\u1BBA-\u1BE5\u1C00-\u1C23\u1C4D-\u1C4F\u1C5A-\u1C7D\u1CE9-\u1CEC\u1CEE-\u1CF1\u1CF5\u1CF6\u1D00-\u1DBF\u1E00-\u1F15\u1F18-\u1F1D\u1F20-\u1F45\u1F48-\u1F4D\u1F50-\u1F57\u1F59\u1F5B\u1F5D\u1F5F-\u1F7D\u1F80-\u1FB4\u1FB6-\u1FBC\u1FBE\u1FC2-\u1FC4\u1FC6-\u1FCC\u1FD0-\u1FD3\u1FD6-\u1FDB\u1FE0-\u1FEC\u1FF2-\u1FF4\u1FF6-\u1FFC\u2071\u207F\u2090-\u209C\u2102\u2107\u210A-\u2113\u2115\u2119-\u211D\u2124\u2126\u2128\u212A-\u212D\u212F-\u2139\u213C-\u213F\u2145-\u2149\u214E\u2183\u2184\u2C00-\u2C2E\u2C30-\u2C5E\u2C60-\u2CE4\u2CEB-\u2CEE\u2CF2\u2CF3\u2D00-\u2D25\u2D27\u2D2D\u2D30-\u2D67\u2D6F\u2D80-\u2D96\u2DA0-\u2DA6\u2DA8-\u2DAE\u2DB0-\u2DB6\u2DB8-\u2DBE\u2DC0-\u2DC6\u2DC8-\u2DCE\u2DD0-\u2DD6\u2DD8-\u2DDE\u2E2F\u3005\u3006\u3031-\u3035\u303B\u303C\u3041-\u3096\u309D-\u309F\u30A1-\u30FA\u30FC-\u30FF\u3105-\u312D\u3131-\u318E\u31A0-\u31BA\u31F0-\u31FF\u3400-\u4DB5\u4E00-\u9FCC\uA000-\uA48C\uA4D0-\uA4FD\uA500-\uA60C\uA610-\uA61F\uA62A\uA62B\uA640-\uA66E\uA67F-\uA697\uA6A0-\uA6E5\uA717-\uA71F\uA722-\uA788\uA78B-\uA78E\uA790-\uA793\uA7A0-\uA7AA\uA7F8-\uA801\uA803-\uA805\uA807-\uA80A\uA80C-\uA822\uA840-\uA873\uA882-\uA8B3\uA8F2-\uA8F7\uA8FB\uA90A-\uA925\uA930-\uA946\uA960-\uA97C\uA984-\uA9B2\uA9CF\uAA00-\uAA28\uAA40-\uAA42\uAA44-\uAA4B\uAA60-\uAA76\uAA7A\uAA80-\uAAAF\uAAB1\uAAB5\uAAB6\uAAB9-\uAABD\uAAC0\uAAC2\uAADB-\uAADD\uAAE0-\uAAEA\uAAF2-\uAAF4\uAB01-\uAB06\uAB09-\uAB0E\uAB11-\uAB16\uAB20-\uAB26\uAB28-\uAB2E\uABC0-\uABE2\uAC00-\uD7A3\uD7B0-\uD7C6\uD7CB-\uD7FB\uF900-\uFA6D\uFA70-\uFAD9\uFB00-\uFB06\uFB13-\uFB17\uFB1D\uFB1F-\uFB28\uFB2A-\uFB36\uFB38-\uFB3C\uFB3E\uFB40\uFB41\uFB43\uFB44\uFB46-\uFBB1\uFBD3-\uFD3D\uFD50-\uFD8F\uFD92-\uFDC7\uFDF0-\uFDFB\uFE70-\uFE74\uFE76-\uFEFC\uFF21-\uFF3A\uFF41-\uFF5A\uFF66-\uFFBE\uFFC2-\uFFC7\uFFCA-\uFFCF\uFFD2-\uFFD7\uFFDA-\uFFDC]+/g);

            var regex = new XRegExp("(([\\p{L}0-9]|[^\\p{L}\\(\\)])+)|(\\()|(\\))");

            var items = XRegExp.match(data, regex, 'all');

            /**********************************************************************         
             * Tree Builder
             * in collab with Balint Sass - RIL HAS
             *********************************************************************/

            var legelso = true;
            var nyitvavolt = true;
            var zarvavolt = false;

            var vangyerek = false;

            var level = 0;

            var jsonString = "";

            for (var i = 0; i < items.length; i++) {
                if (items[i] === "(") {
                    if (legelso) {
                        jsonString += '{\"chart\": {\"container\": \"#consttree_modal\", \"connectors\": {\"type\": \"curve\", \"style\": {\"stroke\": \"rgba(0, 82, 131)\"}}}, \"nodeStructure\": {';
                        legelso = false;
                    }
                    //ha előtte már van nyitva (, akkor kell children - mg
                    else if (nyitvavolt) {
                        if (i - 1 > -1 && items[i - 1] !== '(') {
                            jsonString += ', ';
                        }
                        jsonString += '\"children\": [';
                        level++;
                        jsonString += '{';

                    } else {
                        jsonString += '{';
                    }
                    level++;
                    nyitvavolt = true;
                    zarvavolt = false;
                } else if (items[i] === ")") {
                    level--;
                    if (zarvavolt) {
                        jsonString += ']';
                        level--;
                        jsonString += '}';
                    } else {
                        jsonString += '}';
                    }
                    zarvavolt = true;
                    nyitvavolt = false;
                    if (i + 1 < items.length && items[i + 1] === '(') {
                        jsonString += ', ';
                    }
                } else {
                    jsonString += '\"text\": {\"name\": \"' + items[i] + '\"}';
                }
            }

            jsonString += '}';

            return jsonString;

//        function req(index) {
//            var result = [];
//            var item = items[index];
//            while (item !== ")") {
//                var elem = {};
//                if (item === "(") {
//                    var subtree = req(index + 1).subtree;
//                    var index = req(index + 1).index;
//                    result.push(subtree);
//                    //elem.children = subtree;
//                } else {
//                    result.push(item);
//                    // elem.text = {'name' : item};
//                }
//                //console.log(elem);
//                //result.push(elem);
//                index++;
//                item = items[index];
//            }
//            return {
//                subtree: result,
//                index: index
//            };
//        }
//        return req(1).subtree;
        }

        if (!checkBrackets(constituentString)) {
            console.log(constituentString);
            console.log("Ill formatted expression.");
            return false;
        }

        try {
            var config = makeTree(constituentString);
            var config = JSON.parse(config);
        } catch (err) {
            console.log(err);
        }

        return config;

    };

    //check input length and submit form
    this.submitInput = function (url, serialized) {
        var self = this;
        //get url to GATE output, zipurl to archive and the selected modules
        var callback = function (response) {
            if (response.status === true) {
                var xml = response.xml;
                var zipurl = response.zipurl;
                var modules = response.modules;
                if (xml && zipurl && modules) {
                    self.$xml = $(xml);
                    self.zipurl = zipurl;
                    self.modules = modules;
                    console.log(self.modules);
                    self.getParsed(self.orientation);
                }
            }
        };
        var request = $.ajax({
            type: "POST",
            context: this,
            url: url,
            data: serialized,
            timeout: 120000,
            dataType: "json",
            beforeSend: function () {
                var $form = $("#form");
                $active_boxes = $form.find("input[type='checkbox']").not(":disabled");
                $form.find("input[type='checkbox'], button[type='submit']").prop('disabled', true);
                $form.find("textarea").prop('disabled', true);
                $spinner.removeClass('hidden');
            }
        });
        request.done(function (response) {
            if (callback && typeof (callback) === 'function') {
                callback(response);
            }
        });
        request.fail(function (jqXHR, textStatus, exception) {
            var $form = $("#form");
            $("#form").find("button[type='submit']").prop('disabled', false);
            $active_boxes.prop('disabled', false);
            $form.find("textarea").prop('disabled', false);
            displayError(jqXHR, textStatus, exception);
        });
    };
}
;


