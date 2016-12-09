/**
 * Created by tgdflto1 on 09/12/16.
 */
$(document).ready(function () {
    $("#tag-search").autocomplete({
        source: "/tags",
        minLength: 2,
        select: function (event, ui) {
            var url = ui.item.value;
            var name = ui.item.label;
            console.log("id", url, "name", name);
            if (url != '#') {
                location.href = '/tags/' + url;
            }
        },
        html: true,
        // optional (if other layers overlap autocomplete list)
        open: function (event, ui) {
            $(".ui-autocomplete-input").css("z-index", 1000);
        }
    });
});
