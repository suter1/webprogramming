/**
 * Created by tgdflto1 on 28/11/16.
 */

function updateImage(){
    var id = $('#id').val();
    var data = {};
    $(':input:text').each(function(index, element){
        data[element.name] = element.value;
    });
    var callback= function(type, msg){
        if(type == "success"){
            window.location.replace(`/detail/${id}`);
        }else if(type == "error"){
            console.log("fuck");
            console.log(msg);
        }
    }
    update(`/upload/${id}`, data, callback);
}