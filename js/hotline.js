setInterval(
    function(){
        if($('.hotline ul li').hasClass('active')){
            $('.hotline ul li').removeClass('active');
            $('.hotline ul #hotline1').css('top','-60px');
            $('.hotline ul #hotline2').css('top','9px');
        }else{
            $('.hotline ul li').addClass('active');
            $('.hotline ul #hotline1').css('top','9px');
            $('.hotline ul #hotline2').css('top','-60px');
        }
    },3000
);
setInterval(
    function(){
        if($('.dropdown ul li').hasClass('active')){
            $('.dropdown ul li').removeClass('active');
            $('.dropdown ul .hot1').css('display','block');
            $('.dropdown ul .hot2').css('display','none');
        }else{
            $('.dropdown ul li').addClass('active');
            $('.dropdown ul .hot1').css('display','none');
            $('.dropdown ul .hot2').css('display','block');
        }
    },3000
);
