/**
 * Created by tgdflto1 on 06/12/16.
 */

function editPicture(){
    let picture_id = $('#picture_id').val();
    window.location.href = `/upload/${picture_id}/edit`;
}

function search(e){
    let search = $('#search').val();
    if(e && e.keyCode == 13){
        window.location.href = `/pictures?search=${search}`
    }
}

function deletePicture() {
    let picture_id = $('#picture_id').val();
    let callback = function (type, msg) {
        if(type == "success"){
            window.location.href = `/home`;
            console.log("deleted");
        } else if (type == "error"){
            console.log("shit");
            console.log(msg);
        }
    };
    destroy(`/pictures/${picture_id}`, callback);
}

function licenseAgreement(){
    $("#license-confirm").dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            "OK": function () {
                window.location.href= "/checkout/new";
                $(this).dialog("close");
            },
            Cancel: function () {
                $(this).dialog("close");
            }
        }
    });
}