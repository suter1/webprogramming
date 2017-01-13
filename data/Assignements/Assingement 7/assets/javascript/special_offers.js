/**
 * Created by tgdflto1 on 08/01/17.
 */
function updateSpecialOffer(id) {
    let data = {};
    $(':input').each(function (index, element) {
        data[element.name] = element.value;
    });
    let callback = function (type, msg) {
        if (type == "success") {
            window.location.replace(`/special_offer`);
        } else if (type == "error") {
            console.log("fuck");
            console.log(msg);
        }
    };
    update(`/special_offer/${id}`, data, callback);
}

function deleteSpecialOffer(id) {
    let callback = function (type, msg) {
        if (type == "success") {
            window.location.replace(`/special_offer`);
        } else if (type == "error") {
            console.log("fuck");
            console.log(msg);
        }
    };
    destroy(`/special_offer/${id}`, callback);
}

$(document).ready(function(){
    $('#special_offer').load("/current_offer");
});