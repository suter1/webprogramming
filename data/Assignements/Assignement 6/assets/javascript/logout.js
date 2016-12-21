function logout(){
    let callback = function(type, msg){
        if(type=="success") {
            window.location.reload();
        }else{
            alert(msg);
        }
    };
    destroy("/logout", callback);
}
