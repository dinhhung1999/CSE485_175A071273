$(document).ready(function () {
    $('#menu-main').hide();
    $('#toggle-nav').click(function () { 
        $('#menu-main').slideToggle();
    });
});
setInterval(
    function(){
        if($('#slider .carousel-item').hasClass('active')){
            $('#slider .carousel-item').removeClass('active');
        }else{
            $('#slider .carousel-item').addClass('active');
        }
    },3000
);
$('.carousel-item').first().addClass('active');
