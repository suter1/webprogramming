$(function(){
    var name = true, email = true;
    var s = $('input[type=submit]');
    s.prop('disabled', true);
    $('* mark').hide();
    $('#name input').focusout(function(){
        noname = !this.value;
        if (noname) $('#name mark').fadeIn(1000);
        else $('#name mark').fadeOut(1000);
        s.prop('disabled', (noname || noemail));
    });
    $('#email input').focusout(function(){
        noemail = !/\S+@\S+\.\S+/.test(this.value);
        if (noemail) $('#email mark').fadeIn(1000);
        else $('#email mark').fadeOut(1000);
        s.prop('disabled', (noname || noemail));
    });
});