function logout(){
    var callback= function(msg){
        window.location.reload();
    }
    destroy("/logout", callback);
}
