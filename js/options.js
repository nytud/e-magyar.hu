var parser;
var tabber;
var modal;
var tabulator;
var $active_boxes;
var $spinner = $("span#spinner, #please_wait");

/******************************************************************************
 * 
 * PLUGIN OPTIONS
 *
 ****************************************************************************/

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
var morph_label_options = {
    items: '.morph_label',
    content: function (event, ui) {
        var $elem = $(this);
        var label = $elem.text();
        var item = JSON.search(morph_code_list, '//*[code="' + label + '"]')[0];
        if (!item) {
            return false;
        }
        var content = item.desc !== "" ? item.desc : "";
        return content;
    },
    open: function (event, ui) {
        ui.tooltip.css("max-width", "100%");
    },
    tooltipClass: "my-tooltip"
};