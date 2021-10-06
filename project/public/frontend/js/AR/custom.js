   // $(document).ready(function(){
//        $(window).bind('scroll', function() {
//        var navHeight = $( window ).height() - 90;
//              if ($(window).scrollTop() > navHeight) {
//                  $('nav').addClass('fixed');
//              }
//              else {
//                  $('nav').removeClass('fixed');
//              }
//         });


var btn = $('#scrollTop');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});



  var footerHeight = $('footer').height();
  $("main").css("margin-bottom", footerHeight);
     
   window.addEventListener("scroll", function(){
  var header = document.querySelector('header');
  header.classList.toggle("sticky", window.scrollY > 0)
})
$(window).load(function() {
    $('#loading').hide();
  });

// $('#scroller').bind('mousewheel', function(e) {
//     var st = parseInt($('.scroll-content').css('transform').split(',')[5]);

//     if (st < 0) {
//         $("header").addClass("sticky");
//     } else {
//       $("header").removeClass("sticky");
//     }
// });

  

// Smooth scroll js
$( '.bottom-nav a' ).on( 'click', function(e){
  var href = $(this).attr( 'href' );
  $( 'html, body' ).animate({
    scrollTop: $( href ).offset().top
  }, '300' );
  e.preventDefault();

});





$('#site-setting-toggle').click(function(){
  $('.site-setting').toggleClass('active');
})

         
          var scene = document.getElementById('scene');
        var parallax = new Parallax(scene); 
        // accordion js
$("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
  $(e.target)
    .prev()
    .find("i:last-child")
    .toggleClass("fa-minus fa-plus");
});

        // featured-celebs-slider
        $(document).ready(function(){
$('.featured-celebs-slider').slick({
        slidesToShow: 5,
        slidesToScroll: -1,
        dots: false,
        rtl: true,
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
                slidesToShow: 5,  
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
$('.rtl #featureSlider1').slick({
  rtl: true
});
});

// tab-btn-slider
$('.nav-tabs a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
     e.target
     e.relatedTarget
     $('.tab-slider').slick('setPosition');
 });
$('#recentJoined').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        centerMode: false,
        focusOnSelect: false,
        centerPadding: '0px',
        responsive: [
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
$('#faqSlider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        nextArrow: '<span class="slick-arrow right-arrow"><i class="fas fa-arrow-right"></i></span>',
        prevArrow: '<span class="slick-arrow left-arrow"><i class="fas fa-arrow-left"></i></span>',
        centerMode: false,
        focusOnSelect: false,
        centerPadding: '0px',
        responsive: [
            {
              breakpoint: 1500,
              settings: {
                dots: false,
                slidesToShow: 5,  
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

// Testimonial slider
$('.testimonial-slider').slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  nextArrow: '<span class="slick-arrow right-arrow"><i class="fas fa-arrow-right"></i></span>',
        prevArrow: '<span class="slick-arrow left-arrow"><i class="fas fa-arrow-left"></i></span>',
  responsive: [
    {
      breakpoint: 1300,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
     // theme toggle
let darkTheme = false;

const themeToggle = document.getElementById("toggleTheme");

themeToggle.addEventListener("click", function(){
    darkTheme = !darkTheme;
    darkTheme ? document.body.setAttribute('data-theme', 'dark') : document.body.removeAttribute('data-theme');
    themeToggle.checked = darkTheme;
});



// const openMobileMenuBtn = document.querySelector(".device-menu");
// const headerMenu = document.querySelector(".header-nav");

// openMobileMenuBtn.addEventListener("click", () => {
//   if(openMobileMenuBtn.classList.contains("open")) {
//     openMobileMenuBtn.classList.remove("open");
//     headerMenu.classList.remove("active");
//   } else {
//     headerMenu.classList.add("active");
//     openMobileMenuBtn.classList.add("open");
//   }
// });




// Form js
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector("#formContainer");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});







