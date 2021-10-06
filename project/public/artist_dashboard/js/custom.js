$(document).ready(function(){
    $('.sidebar_toggle').click(function(){
        $(this).toggleClass('active');
        $('.dash_sidebar').toggleClass('mini-sidebar');
        $('.main_layout').toggleClass('expand-area');
    });
})