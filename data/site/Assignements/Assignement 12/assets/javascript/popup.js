$(document).ready(function() {
    $( ".toggle" ).on('click', function(event){
        $(this).children(".toggle_div").fadeToggle('show');
    });

    $(".toggle .toggle_div").click(function(e) {
        e.stopPropagation();
    });
});