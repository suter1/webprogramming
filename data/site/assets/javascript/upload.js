/**
 * Created by tgdflto1 on 28/11/16.
 */

function updateImage(){
    var id = $('#id').val();
    var data = {};
    $(':input:text').each(function(index, element){
        data[element.name] = element.value;
    });
    var callback= function(msg){
        window.location.replace(`/detail/${id}`);
    }
    update(`/detail/${id}`, data, callback);
}