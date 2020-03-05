// accept hot module reloading
if ( module.hot ) {
	module.hot.accept();
}

// import hambugerMenu from './hamburger-menu';
import '../scss/app.scss';

class App {
  constructor() {
    // set vars
    // this.$header = document.querySelector('.header');
    // this.el = {
    //   header: 
    // };

    // this.el.header = document.querySelector('.header');
    
    this.hamburgerMenu = document.querySelector('.mobileMenu');
    this.hamburgerIcon = document.querySelector('.menu-icon');
    this.hamburgerText = document.querySelector('.hamburgertext');
    this.mobileMenuLink = document.querySelectorAll('.mobileMenuLink');

    // execute functions
    this.setEventListeners();
    this.init();
  }
  init() {
        
    // Hamburger Menu mobileMenu onclick
    let hamburgerMenu = document.querySelector('.mobileMenu');
    let hamburgerIcon = document.querySelector('.menu-icon');
    let hamburgerText = document.querySelector('.hamburgertext');
    let mobileMenuLink = document.querySelectorAll('.mobileMenuLink');
    let mobileButtons = document.querySelectorAll('.mobile-button');

    let menuOpen = false;

    function openNav() {
      hamburgerMenu.style.width = "100%";
      hamburgerText.style.color = 'rgba(255,255,255,0)';
      document.body.style.overflow = 'hidden';
      mobileButtons.forEach(button => {
        button.classList.toggle('hidden');
      });
    }

    function closeNav() {
      hamburgerMenu.style.width = "0%";
      hamburgerText.style.color = 'rgba(255,255,255,1)';
      document.body.style.overflow = 'auto';
      mobileButtons.forEach(button => {
        button.classList.toggle('hidden');
      });
    }

    function navClick() {
      if(menuOpen===false){
        openNav();
        menuOpen = true;
      } else {
        closeNav();
        menuOpen = false;
      }
    }

    hamburgerIcon.addEventListener("click", (e) => {
      hamburgerIcon.classList.toggle("active");
      navClick();
    })

    for (let i = 0; i < mobileMenuLink.length; i++) {
      mobileMenuLink[i].addEventListener("click", (e) => {
        hamburgerIcon.classList.toggle("active");
        navClick();
      })
    }



    /** =======================================================================================
        Fadein and slide up animation
    ========================================================================================= */


    document.addEventListener("DOMContentLoaded", function() {

      const faders = document.querySelectorAll('.fade-in');
  
      if ("IntersectionObserver" in window) {
  
          const appearOptions = {
              threshold: 0,
              rootMargin: "0px 0px 60px 0px"
          };
  
          const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
              entries.forEach(entry => {
                  if(!entry.isIntersecting) {
                      return;
                  } else {
                      entry.target.classList.add('appear');
                      appearOnScroll.unobserve(entry.target);
                  }
              })
          }, appearOptions);
  
          faders.forEach(fader => {
              appearOnScroll.observe(fader);
          });
  
  
          const sliders = document.querySelectorAll(".slide-up");
  
          sliders.forEach(slider => {
              appearOnScroll.observe(slider);
          });
  
      } else {
          while(faders.length > 0) {
              faders[0].classList.add('appear');
          }
      }
  
  })

    /** =======================================================================================
        Fade banner text and parallax affect
    ========================================================================================= */

    // if($(window).width() > 768) {
      if(document.querySelector('.banner-text')) {
        document.addEventListener('scroll', function() {
            let currScrollPos2 = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
            if (currScrollPos2 > 1) {
                document.querySelector('.banner-text').style.opacity = -currScrollPos2 / 150 + 1.04;
            }
          }
        );
      }
  
      function background_image_parallax($object, multiplier){
          multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.15;
          multiplier = 1 - multiplier;
  
          $object.css({"background-attatchment" : "fixed"});
              $(window).scroll(function(){
              let from_top = $(document).scrollTop(),
              translateY = '0' +(multiplier * from_top).toFixed(2);
              let translateX = 0;
              $object.css({'transform': 'translate3d(' + translateX +'px, ' +   translateY + 'px, 0)' }); 
          });
      };
  
      // background_image_parallax($(".frontBanner"));
      // background_image_parallax($(".banner-top"));
  
      background_image_parallax($(".banner-text"), .4);
      background_image_parallax($(".zip-code"), .2);
  // }

    /** ==================================================================================================
      Hide / show the master navigation menu only after scrolling up - will need jquery library as written
    ==================================================================================================== */   

    const nav = document.querySelector("#masthead");
    const visible = "is-visible";
    const hidden = "is-hidden";
    let lastScroll = 0;
    
    window.addEventListener("scroll", () => {
      const currentScroll = window.pageYOffset;
      if (currentScroll == 0) {
        nav.classList.remove(hidden);
        nav.classList.remove("blueNav");
        return;
      }
      
      if (currentScroll > lastScroll && !nav.classList.contains(hidden)) {
        // down
        nav.classList.remove(visible);
        nav.classList.add(hidden);

      } else if (currentScroll < lastScroll && nav.classList.contains(hidden)) {
        // up
        nav.classList.remove(hidden);
        nav.classList.add(visible);
        nav.classList.add("blueNav");

        const contentStart = document.getElementById("content");
        const distanceToContent = contentStart.offsetTop;
        if(document.getElementById('scroll')) {
          document.getElementById('scroll').style.opacity = 0;
        }

      }
      lastScroll = currentScroll;
    });

    /** =======================================================================================
        Owl Carousels
    ========================================================================================= */
    var owlSP = $('.selling-points');
    owlSP.owlCarousel({
      items:1,
      loop:true,
      margin:0,
      dots: false,
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true,
      autoplaySpeed: 1000,
      responsive:{
        0:{
          items:1
        },
        1025:{
          items:2
        },
        1350:{
          items:3,
          autoplay:false,
          touchDrag: false,
          mouseDrag: false,
          pullDrag: false,
          loop: false

        }
      }
    });


    var owlIB = $('.image-buttons');
    owlIB.owlCarousel({
      items:1,
      loop:true,
      dots: false,
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true,
      autoplaySpeed: 1000,
      responsive:{
        0:{
          items:1,
          margin:10,
          stagePadding: 10
        },
        769:{
          items:1,
          margin:10,
          stagePadding: 10
        },
        1025:{
          items:2,
          margin:10,
          stagePadding: 10,
          autoplay:false,
          touchDrag: false,
          mouseDrag: false,
          pullDrag: false,
          loop: false
        },
      }
    });


    var owlTest = $('.testimonials');
    owlTest.owlCarousel({
      items:1,
      loop:true,
      dots: true,
      nav: false,
      items: 1,
      margin: 10,
      stagePadding: 10,
      responsive:{
        769:{
          nav: true,
          rewindNav : true,
        },
      }
    });

    /** ================================================================
    Lazy load images 500px before in viewport
    ================================================================= */

    document.addEventListener("DOMContentLoaded", function() {
        let lazyloadImages;    
      
        if ("IntersectionObserver" in window) {
          lazyloadImages = document.querySelectorAll(".lazy");
          let imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
              if (entry.isIntersecting) {
                let image = entry.target;
                image.src = image.dataset.src;
                image.classList.remove("lazy");
                imageObserver.unobserve(image);
              }
            });
          }, {
              rootMargin: "0px 0px 500px 0px"
          });
      
          lazyloadImages.forEach(function(image) {
            imageObserver.observe(image);
          });
        } else {  
          let lazyloadThrottleTimeout;
          lazyloadImages = document.querySelectorAll(".lazy");
          
          function lazyload () {
            if(lazyloadThrottleTimeout) {
              clearTimeout(lazyloadThrottleTimeout);
            }    
      
            lazyloadThrottleTimeout = setTimeout(function() {
              let scrollTop = window.pageYOffset;
              lazyloadImages.forEach(function(img) {
                  if(img.offsetTop < (window.innerHeight + scrollTop + 500)) {
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                  }
              });
              if(lazyloadImages.length == 0) { 
                document.removeEventListener("scroll", lazyload);
                window.removeEventListener("resize", lazyload);
                window.removeEventListener("orientationChange", lazyload);
              }
            }, 20);
          }
      
          document.addEventListener("scroll", lazyload);
          window.addEventListener("resize", lazyload);
          window.addEventListener("orientationChange", lazyload);
        }
      })
  }

  setEventListeners() {
    // window.addEventListener
  }
  removeEventListeners() {

  }
}

new App();