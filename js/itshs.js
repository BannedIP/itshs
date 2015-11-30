$(function(){
    $('div#soc-icon img')
        .mouseover(function(){
            //$(this).stop().animate(
            //    {top:"-32px"}, 
            //    {duration:150})
            $(this).parent().css({'background-image' : 'url(../../../wp-content/themes/itshs/images/soc/active.png)', 'background-position': '0 0'})
        })
        .mouseout(function(){
            //$(this).stop().animate(
            //    {top:"0"}, 
            //    {duration:150})
            $('div#soc-icon').css({'background-position' : '100px 0'})
        })
})