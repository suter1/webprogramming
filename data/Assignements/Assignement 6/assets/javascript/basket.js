function getBasket(){
    $("#basket").load( "/purchase" );
}

function addToBasket(){
    let picture_id = $("#picture_id").val();
    let size = $('input[name=img_size]:checked').val()
    console.log('id', picture_id);
    let data = {
        size: size,
        picture_id: picture_id,
    };
    let callback = function(type, msg){
        if(type == "success"){
            let message = $("#added_picture").val();
            console.log("added to basket");
            getBasket();
            flash(message);
        }else if(type == "error"){
            console.log("fuck");
            console.log(msg);
        }
    };

    create(`/purchase`, data, callback);
}

function deleteFromBasket(id) {
    let callback = function(type, msg){
        if(type == "success"){
            getBasket();
            console.log("deleted from basket");
        }else if(type == "error"){
            console.log("fuck");
            console.log(msg);
        }
    };

    destroy(`/purchase/${id}`, callback);
}

function flash(message){
    let flash_div = $('#flash');
    flash_div.html(`<h2 class='message'>${message}</h2><br />`);
    console.log(message);
}