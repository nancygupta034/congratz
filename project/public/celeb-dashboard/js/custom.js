$(document).ready(function(){
    $('.sidebar_toggle').click(function(){
        $(this).toggleClass('active');
        $('.dash_sidebar').toggleClass('mini-sidebar');
        $('.main_layout').toggleClass('expand-area');
    });
})



// celebrity listing vertical carousel
 $('#getCelebrityInfo').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.cele-listing-nav'
});
$('.cele-listing-nav').slick({
  vertical: true,
  verticalSwiping: true,
  slidesToShow: 5,
  slidesToScroll: 1,
  centerPadding: 0,
  asNavFor: '.cele-listing-content',
  dots: false,
   nextArrow: '<span class="slick-arrow right-arrow"><i class="fas fa-chevron-down"></i></span>',
        prevArrow: '<span class="slick-arrow left-arrow"><i class="fas fa-chevron-up"></i></span>',
  centerMode: true,
  focusOnSelect: false,
});
 // $('a[data-slide]').click(function(e) {
 //   e.preventDefault();
 //   var slideno = $(this).data('slide');
 //   $('.cele-listing-nav').slick('slickGoTo', slideno - 1);
 // });


$('#celeCateSlider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false, 
        arrows: true,
        centerMode: true,
        focusOnSelect: false,
        centerPadding: '0px',
        nextArrow: '<span class="slick-arrow right-arrow"><i class="fas fa-arrow-right"></i></span>',
        prevArrow: '<span class="slick-arrow left-arrow"><i class="fas fa-arrow-left"></i></span>',
        responsive: [
            {
              breakpoint: 1500,
              settings: {
                dots: false,
                slidesToShow: 3,  
                centerPadding: '0px',
                }
            },
            {
              breakpoint: 1300,
              settings: {
                dots: false,
                slidesToShow: 3,  
                centerPadding: '0px',
                }
            },
            {
              breakpoint: 420,
              settings: {
                autoplay: true,
                dots: false,
                slidesToShow: 1,
                centerMode: false,
                }
            }
        ]
    }); 


$('.cele-listing-nav').slick({
  vertical: true,
  verticalSwiping: true,
  slidesToShow: 5,
  slidesToScroll: 1,
  centerPadding: 0,
 // asNavFor: '.cele-listing-content2',
  dots: false,
  arrows: true,
  nextArrow: '<span class="slick-arrow right-arrow"><i class="fas fa-chevron-down"></i></span>',
        prevArrow: '<span class="slick-arrow left-arrow"><i class="fas fa-chevron-up"></i></span>',
  centerMode: true,
  focusOnSelect: false,
});

