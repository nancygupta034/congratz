//    let bodyScrollBar = Scrollbar.init(document.getElementById("scroller"), { damping: 0.1, delegateTo: document, }); ScrollTrigger.scrollerProxy(".scroller", { scrollTop(value) { if (arguments.length) { bodyScrollBar.scrollTop = value; } return bodyScrollBar.scrollTop; }, });
//    scroller: ".scroller",
//    bodyScrollBar.addListener(ScrollTrigger.update);

//    const myScrollbar = Scrollbar.init(document.querySelector('#scroller'));

// [].forEach.call(document.querySelectorAll('[data-aos]'), (el) => {
//   myScrollbar.addListener(() => {
//     if (myScrollbar.isVisible(el)) {
//       el.classList.add('aos-animate');
//     }
//   });
// });
AOS.init();

// smooth-scroll
gsap.registerPlugin(ScrollTrigger);



// Testing js
ScrollTrigger.defaults({
  markers:false,
  // scroller: ".smooth-scroll",
})

var points = gsap.utils.toArray('.point');
var indicators = gsap.utils.toArray('.indicator');

var height = 100 * points.length;


var tl = gsap.timeline({
  duration: points.length,
  scrollTrigger: {
    trigger: ".about-us-sec",
     // scroller: "#scroller",
    start: "top center",
    end: "+="+height+"%",
    scrub: true,
    id: "points",
  }
})

var pinner = gsap.timeline({
  scrollTrigger: {
    trigger: ".about-us-sec .wrapper",
    // scroller: ".smooth-scroll",
    // scroller: "#scrollser",
    start: "top top",
    end: "+="+height+"%",
    scrub: true,
    pin: ".about-us-sec .wrapper",
    pinSpacing: true,
    id: "pinning",
    markers: false
  }
})



points.forEach(function(elem, i) {
  gsap.set(elem, {position: "absolute", top: 0});

  tl.from(elem.querySelector('img'), {autoAlpha:0}, i)
  
  if (i != points.length-1) {
    tl.to(indicators[i], {backgroundColor: "#adadad", duration: 0.25}, i+0.75)
    tl.to(elem.querySelector('img'), {autoAlpha:0}, i + 0.75)
  }
  
});

// ==================================



// Animation js

const hero = document.querySelector('.hero');
const heroContent = document.querySelector('.banner-content-wrap');
const logo = document.querySelector('#logo');
const hamburger = document.querySelector('#hamburger');
const headline = document.querySelector('.headline');
const bottomNav = document.querySelector('.bottom-nav');
const CelebImg = document.querySelector('.celeb-img');
const CelebCard = document.querySelector('.celeb-feature-card');


const timeline = new TimelineMax();
timeline
.fromTo(hero,1.2,{height: "0%"}, {height: "100%", ease: Power2.easeInOut})
// .fromTo(hero,1.2,{width: "0%"}, {width: "100%", ease: Power2.easeInOut})
.fromTo(heroContent,1.2,{scale: "0"}, {scale: "1", ease: Power2.easeInOut}, "-=1")
.fromTo(logo,0.5,{opacity: "0", x: "50"}, {opacity: "1", x: "0", ease: Power2.easeInOut}, "-=0.5")
.fromTo(hamburger,0.5,{opacity: "0", x: "50"}, {opacity: "1", x: "0", ease: Power2.easeInOut}, "-=0.5")
.fromTo(bottomNav,0.5,{opacity: "0", y: "50"}, {opacity: "1", y: "0", ease: Power2.easeInOut})


 // gsap.registerPlugin(ScrollTrigger);
 //    let animate = gsap.timeline({
 //        // yes, we can add it to an entire timeline!
 //        scrollTrigger: {
 //            trigger: ".featured-celebs-sec",
 //            scroller: ".smooth-scroll",
 //            start: "top top+=200px",
 //            end: "top top+=500px",// when the top of the trigger hits the top of the viewport
 //             scrub: 1,
 //            markers: false,
 //            pin:true,

 //        }
 //    });
 //    animate.fromTo('.sec-heading ',0.5,{opacity: "0", x: "100%"}, {opacity: "1", x: "0", ease: Power2.easeInOut})
 //    animate.fromTo(CelebImg,1.2,{scale: "0"}, {scale: "1", ease: Power2.easeInOut}, "-=2")
 //    animate.fromTo(CelebCard,0.5,{opacity: "0", y: "100%"}, {opacity: "1", y: "0", ease: Power2.easeInOut})
 //    // .fromTo(logo,0.5,{opacity: "0", x: "50"}, {opacity: "1", x: "0", ease: Power2.easeInOut}, "-=0.5")

 //     let animate2 = gsap.timeline({
 //        // yes, we can add it to an entire timeline!
 //        scrollTrigger: {
 //            trigger: ".how-it-works-sec",
 //            scroller: ".smooth-scroll",
 //            start: "top top+=200px",
 //            end: "top top+=500px",// when the top of the trigger hits the top of the viewport
 //             scrub: 1,
 //            markers: false,
 //            pin:true,

 //        }
 //    });
 //    animate2.fromTo('.sec-heading ',0.5,{opacity: "0", x: "100%"}, {opacity: "1", x: "0", ease: Power2.easeInOut})


