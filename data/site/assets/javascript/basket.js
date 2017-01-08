function getBasket(){
    $("#basket").load( "/purchase" );
}

function addToBasket(){
    let picture_id = $("#picture_id").val();
    console.log('id', picture_id);
    let data = {
        picture_id: picture_id,
    };
    let callback = function(type, msg){
        if(type == "success"){
            console.log("added to basket");
            flash("Added 1 item to basket");
        }else if(type == "error"){
            console.log("fuck");
            console.log(msg);
        }
    };

    create(`/purchase`, data, callback);
}

function flash(message){
    let flash_div = $('#flash');
    flash_div.html(`<h2 class='message'>${message}</h2><br />`);
    console.log(message);
}