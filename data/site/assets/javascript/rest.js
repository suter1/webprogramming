function destroy(path, callback) {
    rest(path, "DELETE", null, callback);
}

function update(path, data, callback) {
    rest(path, "PATCH", data, callback);
}

function rest(path, method, data, callback){
    $.ajax({
        data: data,
        method: method,
        url: path,
    }).done(function (msg) {
        callback("success", msg);
    }).fail(function(msg){
        callback("error", msg);
    });
}