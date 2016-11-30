
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