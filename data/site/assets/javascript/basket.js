function getBasket(){
    $("#basket").load( "/purchase" );
}

function addToBasket(){
    let picture_id = $("#picture_id").val();
    let data = {
        picture_id: picture_id,
    };
    let callback = function(type, msg){
        if(type == "success"){
            console.log("added to basket");
        }else if(type == "error"){
            console.log("fuck");
            console.log(msg);
        }
    };

    create(`/purchase`, data, callback);
}