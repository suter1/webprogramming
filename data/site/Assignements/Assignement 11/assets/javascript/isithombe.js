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