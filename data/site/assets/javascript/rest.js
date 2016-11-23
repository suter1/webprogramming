function destroy(path, callback) {
    rest(path, "DELETE", callback);

}

function rest(path, method, callback){
    $.ajax({
        method: method,
        url: path,
    }).done(function (msg) {
        callback(msg);
    });
}