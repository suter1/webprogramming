function destroy(path, callback) {
    rest(path, "DELETE", null, callback);
}

function update(path, data, callback) {
    rest(path, "PATCH", data, callback);
}

function create(path, data, callback) {
    rest(path, "POST", data, callback);
}

function rest(path, method, data, callback){
    console.log(JSON.stringify(data));
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