
function MyError(message) {
    this.name = 'MyError';
    this.message = message || 'Default Message';
    this.stack = (new Error()).stack;
}
MyError.prototype = Object.create(Error.prototype);
MyError.prototype.constructor = MyError;
var parser;
var tabber;
var modal;
var tabulator;
var $xml;
var $active_boxes;
var $spinner = $("span#spinner, #please_wait");

var oLanguage = {
    oPaginate: {
        sPrevious: "Előző",
        sNext: "Következő"
    },
    sEmptyTable: "Nincs elérhető adat.",
    sZeroRecords: "Nincs találat.",
    sProcessing: "Folyamatban...",
    sInfo: "Rekordok _START_ - _END_-ig / Összesen: _TOTAL_",
    sInfoFiltered: "(szűrve _MAX_ rekordból)",
    sLengthMenu: "_MENU_ rekord megjelenítése"
};

/******************************************************************************
 * 
 * PLUGIN OPTIONS
 *
 ****************************************************************************/

var dialog_options = {
    autoOpen: false,
    draggable: true,
    resizable: true,
    modal: true,
    height: 'auto',
    width: 'auto',
    fluid: true,
    close: function () {
        $(this).dialog('destroy').hide();
    }
};
var datatable_options = {
    destroy: true,
    order: [[0, "asc"]],
    columnDefs: [
        {
            targets: "hidden",
            visible: false
        },
        {
            targets: "no-order",
            orderable: false
        }
    ],
    dom: '<"top"ilp<"clear">>rt<"bottom"p<"clear">>',
    displayLength: 50,
    drawCallback: function () {
        var $filters = $("#filter").find("input[type='checkbox']");
        $.each($filters, function (index, elem) {
            var $elem = $(elem);
            var item = $elem.val();
            var checked = $elem.prop('checked');
            parser.highlightSegment(item, checked);
        });
    }
};

/******************************************************************************
 * 
 * TABULATOR
 *
 ****************************************************************************/

var Tabulator = function () {

    this.$element;
    this.instance;
    this.init = function (options) {
        var self = this;
        self.$element = $("#datatable");
        if (language === "hu") {
            options.oLanguage = oLanguage;
        }
        self.instance = self.$element.DataTable(options);
        self.$element.find("thead .filters input").on('keyup change', function () {
            self.instance
                    .column($(this).parent('td').index() + ':visible')
                    .search(this.value)
                    .draw();
        });
        self.$element.find("thead .filters select").on('change', function () {

            if ($(this).hasClass("posfilter") && this.value) {
                self.instance
                        .column($(this).parent('td').index() + ':visible')
                        .search(".*\]" + this.value + "$", true, false)
                        .draw();
            } else {
                self.instance
                        .column($(this).parent('td').index() + ':visible')
                        .search(this.value)
                        .draw();
            }
        });

    };
    this.createSelectFilter = function () {
        var self = this;
        self.$element.find("thead .filters select").each(function (key, elem) {
            var $select = $(this);
            var column = self.instance.column($(this).parent('td').index() + ':visible');
            var options = "";
            options += "<option></option>";
            var optionlabels = [];
            if ($select.hasClass("posfilter")) {
                column.data().each(function (content) {
                    var pattern = /(OTHER|<b>.*?<\/b>)/g;
                    optionlabels.push(pattern.exec(content)[1]);
                });

                function getUniqueValues(a) {
                    var temp = {};
                    for (var i = 0; i < a.length; i++)
                        temp[a[i]] = true;
                    return Object.keys(temp);
                }
                optionlabels = getUniqueValues(optionlabels).sort();
            } else {
                optionlabels = column.data().unique().sort();
            }

            $.each(optionlabels, function (index, category) {
                var option = category !== null ? category : "";
                if (option !== "") {
                    options += '<option>' + option + '</option>';
                }
            });

            $select.html(options);
        });
    };
    this.destroy = function () {
        var self = this;
        self.instance.destroy();
    };
};

/******************************************************************************
 * 
 * DOCUMENT READY
 *
 ****************************************************************************/

$(document).ready(function () {

    //instantiate parser class    
    try {
        parser = new Parser(maxchar);
    } catch (err) {
        console.log("Parser class not found.");
    }

    //jqUI tabs
    if ($("#tabs").length > 0) {
        var $tabs = $("#tabs");
        tabber = $tabs.tabs({
            create: function () {
                $(this).tabs("disable", 1);
            }
//        activate: function (event, ui) {
//            var tabindex = ui.newTab.index();           
//        }
        });
        $tabs.show();
    }

    if ($("#decor").length > 0) {
        renderTriangles();
    }

//toggle dependent modules
    $("#input").on("change", "form input[type='checkbox']", function () {
        var $element = $(this);
        var $hidden = $element.closest('.checkbox').find("input[type='hidden']");
        var id = $(this).attr("id");
        var checked = $element.prop('checked');
        var $todisable = null;
        var $toenable = null;
        var $toenable_hidden = null;
        if (checked) {
            $hidden.prop('disabled', false);
        } else {
            $hidden.prop('disabled', true);
        }

        if (id === "pos") {
            $todisable = $("#input form input#morph");
            $toenable = $("#input form input#morph, #input form input#morph_hidden");
            $toenable_hidden = $("#input form input#morph_hidden");
        }
        if (id === "npchunk" || id === "syntax" || id === "ner") {
            $todisable = $("#input form input#morph, #input form input#pos, #input form input#morph_hidden, #input form input#pos_hidden");
            $toenable = $("#input form input#pos");
            $toenable_hidden = $("#input form input#morph_hidden, #input form input#pos_hidden");
        }

        if ($todisable && $toenable) {
            if (!checked) {
                if (!$("#input form input#npchunk").prop('checked') && !$("#input form input#syntax").prop('checked') && !$("#input form input#ner").prop('checked')) {
                    $toenable.prop('disabled', false);
                }
            } else {
                $todisable.prop('checked', true).prop('disabled', true);
                $toenable_hidden.prop('disabled', false);
            }
        }

    });
    
    //show preverbs on token hover
    $("#parsed").on("mouseenter", ".token", function () {
        var $token = $(this);
        var depType = $token.data("deptype");
        if (depType && depType === "PREVERB") {
            $token.closest(".sentence").find("#" + $token.data("target_id")).addClass("preverb_target");
        }
    });
    $("#parsed").on("mouseleave", ".token", function () {
        var $token = $(this);
        $token.closest(".sentence").find(".token").removeClass("preverb_target");
    });
    
    //show target on row hover - vetical view
    $("#parsed").on("mouseenter", "#datatable tr", function () {
        var $row = $(this);
        var target_id = $row.find('td.target').data('target_id');
        if (!target_id) {
            return false;
        }
        $row.addClass("target_highlight");
        $("#parsed #datatable tr#" + target_id).addClass("target_highlight");
    });
    $("#parsed").on("mouseleave", "#datatable tr", function () {
        $("#parsed #datatable tr").removeClass("target_highlight");
    });
    
    //show modal on token click
    $("#parsed").on("click", ".token", function () {
        var $token = $(this);        
        var html = parser.getAnnotList($token.data('anas'), "horizontal");
        if (html) {
            var $modal = $("#annot_modal");
            $modal.html(html);
            var dialog = $modal.dialog(dialog_options);
            dialog.dialog({title: $token.text()}).dialog('open').unbind('dialogopen');
        }
    });
    
    //show dependeny model
    $("#parsed").on("click", ".dep_toggle", function () {
        var $sentence = $(this).closest(".sentence");
        var $modal = $("#deptree_modal");
        var html = "";
        html += '<div class="wrapper">';
        $.each($sentence.find(".token"), function (index, token) {
            var $token = $(token);
            html += '<span class="deptoken" data-id="' + $token.attr("id") + '" data-deptype="' + $token.data("deptype") + '" data-target_id="' + $token.data("target_id") + '">' + $(token).text() + '</span>';
        });
        html += '</div>';

        $modal.html(html);

        var dialog = $modal.dialog({
            title: $modal.attr("title"),
            width: 'auto',
            height: 'auto',
            resizable: false,
            draggable: true,
            modal: true,
            open: function (event, ui) {
                var sentenceWidth = 0;
                $.each($modal.find(".deptoken"), function (index, deptoken) {
                    sentenceWidth += $(deptoken).outerWidth();
                });
                $modal.find(".wrapper").width(sentenceWidth + 20);
                addDepLabels($modal, sentenceWidth);
                $(this).scrollLeft(0).scrollTop($(this)[0].scrollHeight);
                $("body").css("overflow", "hidden");
            },
            close: function () {
                $("body").css("overflow", "auto");
                $(this).dialog('destroy').hide();
            }
        }).dialog('open').unbind('dialogopen');
    });

    //show constituent model
    $("#parsed").on("click", ".const_toggle", function () {
        var $sentence = $(this).closest(".sentence");
        var $modal = $("#consttree_modal");

        var constituentString = "";
        $.each($sentence.find(".token"), function (index, token) {
            var $token = $(token);
            var part = ($token.data('cons') || "");
            part = XRegExp.replace(part, '\*', "(" + XRegExp.replace($token.text(), '[\\(\\)]', '', 'all') + ")");
            constituentString += part;
        });
        
        constituentString = XRegExp.replace(constituentString, '"', '\\"', 'all');
        constituentString = XRegExp.replace(constituentString, "'", "\\'", 'all');

        var dialog = $modal.dialog({
            title: $modal.attr("title"),
            width: $(window).width() * 0.8,
            height: $(window).height() * 0.8,
            resizable: false,
            draggable: true,
            modal: true,
            open: function (event, ui) {

                $(this).scrollLeft(0).scrollTop($(this)[0].scrollHeight);
                $("body").css("overflow", "hidden");

                var treant_config = parser.getTree(constituentString);
                var tree = {};
                tree = new Treant(treant_config);

            },
            close: function () {
                $("body").css("overflow", "auto");
                $(this).dialog('destroy').hide();
                $modal.html("");
            }
        }).dialog('open').unbind('dialogopen');

    });

    //check and submit form
    $("#input form button[type='submit']").on("click", function (e) {
        e.preventDefault();
        var $form = $(this).closest("form");
        var text = $form.find("textarea").val();
        if (text === undefined || text === "") {
            addError($form, translations.no_input_error);
            return false;
        }
        if ($form.find("input[type='checkbox']:checked").length < 1) {
            addError($form, "Select at least one module.");
            return false;
        }
        if (text.length > parser.getMaxChar()) {
            addError($form, translations.too_long_error.replace(/\*/, parser.getMaxChar()));
            return false;
        }
        $form.find("#form-feedback").text("");
        parser.submitInput($form.attr("action"), $form.serialize());
        return false;
    });
    
    //navbar toggle animation
    $('#navigation-xs').on('show.bs.offcanvas', function (e) {
        var $button = $(".navbar-toggle");
        $button.addClass('active');
    });
    $('#navigation-xs').on('hide.bs.offcanvas', function (e) {
        var $button = $(".navbar-toggle");
        $button.removeClass('active');
    });
    
    //show segments
    $("#filter").on('change', "input", function () {
        var $checkbox = $(this);
        var item = $checkbox.val();
        var checked = $checkbox.prop("checked");
        if (item === undefined || item === "") {
            return false;
        }
        parser.highlightSegment(item, checked);
    });
    
    //helper tooltip
    $(".help").tooltip({
        track: true,
        tooltipClass: "my-tooltip"
    });
    $(".help").click(function () {
        $(this).tooltip('open');
    });
    
    //switch language
    $("#langswitch, #langswitch-xs").on("click", "a", function (e) {
        e.preventDefault();
        var $element = $(this);
        if ($element.hasClass('active')) {
            return false;
        }

        var refresh_url = window.location.href;
        var href = $element.attr('href');
        var re = /#(.*)?$/g;
        var match = re.exec(refresh_url);
        if (match) {
            refresh_url = refresh_url.replace(match[0], "");
        }

        var request = $.ajax({
            type: "POST",
            context: this,
            url: href,
            dataType: "json"
        });
        request.done(function (response) {
            if (response.status === true) {
                window.location.href = refresh_url;
            }
        });
        request.fail(function (jqXHR, exception) {
            displayError(jqXHR, exception);
        });
    });
    
    //switch view
    $("#controls #viewswitch").bootstrapSwitch({
        state: false,
        offColor: 'primary',
        onColor: 'info',
        labelWidth: '10px',
        handleWidth: '10px'
    });
    $("#controls #viewswitch").on('switchChange.bootstrapSwitch', function (event, state) {
        var orientation = state === true ? "vertical" : "horizontal";     
        $("#orientation_switch > span").toggleClass("active");
        parser.getParsed(orientation);
    });
    
    //render home page decoration
    var wwidth = $(window).width();
    $(window).resize(function () {
        var _wwidth = $(window).width();
        if (wwidth !== _wwidth) {
            wwidth = _wwidth;
            renderTriangles();
        }
    });

});

//error animation
function addError($form, msg) {
    $form.find("#form-feedback").text(msg);
    $form.find("textarea").addClass("error");
    setTimeout(function () {
        $form.find("textarea").removeClass("error");
    }, 1000);
}

//add dependency labels
function addDepLabels($modal, sentenceWidth) {

    var $deptokens = $modal.find(".deptoken");
    var elements = "";
    //add curves, labels and arrows
    $.each($deptokens, function (index, deptoken) {
        var $deptoken = $(deptoken);
        var id = $deptoken.data('id');
        var targetId = $deptoken.data('target_id');
        var deptype = $deptoken.data('deptype');
        if (id !== "" && targetId !== "") {
            var $targetCell = $modal.find(".deptoken[data-id=" + targetId + "]");
            var position = $deptoken.position();
            var width = $deptoken.outerWidth();
            var targetPosition = $targetCell.position();
            var targetWidth = $targetCell.outerWidth();
            var centerX = position.left + width / 2;
            var centerY = position.top;
            var targetCenterX = targetPosition.left + targetWidth / 2;
            var targetCenterY = targetPosition.top;
            var distance = Math.abs(targetCenterX - centerX) / 5;
            var middle = centerX + Math.abs(targetCenterX - centerX) / 2;
            var curveX = targetId >= id ? centerX + distance : centerX - distance;
            var curveY = centerY - distance;
            var targetCurveX = targetId > id ? targetCenterX - distance : targetCenterX + distance;
            var targetCurveY = targetCenterY - distance;
            elements += '<path d="M' + centerX + ' ' + centerY + ' C' + curveX + ' ' + curveY + ', ' + targetCurveX + ' ' + targetCurveY + ', ' + targetCenterX + ' ' + targetCenterY + '" style="stroke:rgb(0,82,131);stroke-width:1;fill:transparent;" />';
            elements += '<text x="0" y="0" fill="black" font-size="8">' + (deptype || "") + '</text>';
            elements += '<polygon points="" fill="rgb(0, 82, 131)" data-orient="' + (targetId >= id ? 'right' : 'left') + '" />';
        }
    });
    var svg = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" style="width: ' + sentenceWidth + 'px">' + elements + '</svg>';
    //append svg to modal
    $modal.append(svg);
    var webkit = false;

    if (navigator.userAgent.indexOf('AppleWebKit') !== -1) {
        webkit = true;
    }

    //find max curve height
    var maxHeight = 0;
    $.each($modal.find("path"), function (index, curve) {
        var box = $(curve)[0].getBBox();
        if (box.height >= maxHeight) {
            maxHeight = box.height;
        }
    });
    //adjust dialog height
    var ymodifier = 0;
    $modal.find(".wrapper").css('margin-top', (maxHeight + 10));
    $modal.find("svg").css('height', (maxHeight + 50) + "px");
    var ymodifier = maxHeight;
    //reposition elements
    $.each($modal.find("path"), function (index, curve) {
        var $curve = $(curve);
        var box = $curve[0].getBBox();
        var $label = $modal.find("text:eq(" + index + ")");
        var text = $label.text();
        var half = (text.length / 2) * 5;
        var tmodifier = webkit ? box.height / 4 : 0;
        $modal.find("text:eq(" + index + ")").attr({
            'y': box.y + 12 + tmodifier,
            'x': box.x + (box.width / 2) - half
        });
        var middle = box.x + box.width / 2;
        var $polygon = $modal.find("polygon:eq(" + index + ")");
        var orient = $polygon.data("orient");
        var pmodifier = orient === "left" ? -3 : 3;
        $polygon.attr({
            'points': (middle + pmodifier) + ", " + (box.y + tmodifier) + " " + (middle + (-1 * pmodifier)) + ", " + ((box.y - 3) + tmodifier) + " " + (middle + (-1 * pmodifier)) + ", " + ((box.y + 3) + tmodifier)
        });
    });
    $modal.find("path, text, polygon").css({
        'transform': 'translateY(' + ymodifier + 'px)',
        '-moz-transform': 'translateY(' + ymodifier + 'px)',
        '-o-transform': 'translateY(' + ymodifier + 'px)',
        '-ms-transform': 'translateY(' + ymodifier + 'px)',
        '-webkit-transform': 'translateY(' + ymodifier + 'px)'
    });

    //IE and Edge hack
    var $svgelements = $modal.find("path, text, polygon");
    $.each($svgelements, function (index, elem) {
        var transform = getComputedStyle(elem).getPropertyValue('transform');
        elem.setAttribute('transform', transform);
    });

    $modal.dialog("option", "position", {my: "center", at: "center", of: window});
}

//init output layout
function initOutputLayout() {

    $spinner.addClass("hidden");
    var $form = $("#form");
    $form.find("button[type='submit']").prop('disabled', false);
    $active_boxes.prop('disabled', false);
    $form.find("textarea").prop('disabled', false);
    tabber.tabs("enable", 1);
    $("#tabs").tabs("option", "active", 1);
    $("#parsed").tooltip({
        items: '.tooltipper',
        content: function (event, ui) {
            var $token = $(this);
            var html = parser.getAnnotList($token.data('anas'), "horizontal");
            return html;
        },
        open: function (event, ui) {
            ui.tooltip.css("max-width", "100%");
        },
        tooltipClass: "my-tooltip"
    });
    initDataTable();
    $(document).scrollTop(0);
}

function initDataTable() {
    if ($("#datatable").length > 0) {
        tabulator = new Tabulator();
        tabulator.init(datatable_options);
        tabulator.createSelectFilter();
    }
}

function renderTriangles() {
    var $decor = $("#decor");
    if ($decor.length > 0) {
        $decor.find("canvas").remove();
        var pattern = Trianglify({
            width: $decor.innerWidth(),
            height: $decor.innerHeight() * 1.2,
            cell_size: 200,
            x_colors: ['#194762', '#005283', '#308BC1', '#579AC1', '#005283', '#003555']
        });
        $decor.append(pattern.canvas());
    }
}

function displayError(jqXHR, textStatus, exception) {
    if (jqXHR.status === 0) {
        alert('No connection. Verify Network.');
    } else if (jqXHR.status == 404) {
        alert('Requested page not found. [404]');
    } else if (jqXHR.status == 500) {
        alert('Internal Server Error [500].');
    } else if (exception === 'parsererror') {
        alert('Requested JSON parse failed.');
    } else if (exception === 'timeout') {
        alert('Time out error.');
    } else if (exception === 'abort') {
        alert('Ajax request aborted.');
    } else {
        alert('Uncaught Error\n' + jqXHR.responseText);
    }
    $spinner.addClass("hidden");
}