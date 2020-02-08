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

    let menuOpen = false;

    function openNav() {
      hamburgerMenu.style.width = "100%";
      hamburgerText.style.color = 'rgba(255,255,255,0';
      document.body.style.overflow = 'hidden';
    }

    function closeNav() {
      hamburgerMenu.style.width = "0%";
      hamburgerText.style.color = 'rgba(255,255,255,1';
      document.body.style.overflow = 'auto';
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
        Fade banner text and scroll-down icon on scroll parallax affect
    ========================================================================================= */

    /* document.addEventListener('scroll', function() {
        let currScrollPos2 = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
        if (currScrollPos2 > 1) {
            document.querySelector('.banner-text').style.opacity = -currScrollPos2 / 175 + 1.75;
            document.getElementById('scroll').style.opacity = -currScrollPos2 / 100 + 1;
        }
      }
    ); */

    // parallax scroll speed on banner
    /* function background_image_parallax($object, multiplier){
        multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.45;
        multiplier = 1 - multiplier;
        let $doc = $(document);
        $object.css({"background-attatchment" : "fixed"});
          $(window).scroll(function(){
            let from_top = $doc.scrollTop(),
                bg_css = '0px ' +(multiplier * from_top) + 'px';
            $object.css({"background-position" : bg_css });
        });
    };
      
    background_image_parallax($("#banner")); */


    /** =======================================================================================
        Activate sticky nav bar
        When the user scrolls the page, execute activateStickyMenu after passing banner section
    ========================================================================================= */

/*     window.onscroll = function() {activateStickyMenu()};

    let header = document.getElementById("masthead");
    let endOfBanner = document.getElementById("content");

    let distanceToContent = endOfBanner.offsetTop;

    function activateStickyMenu() {
        if (window.pageYOffset > distanceToContent) {
            header.classList.add("blueNav");
        } else {
            header.classList.remove("blueNav");
        }
    } */




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

    /** ========================================================================
    Sizing banner on initial vertical height to prevent jumping on mobile scroll
    ========================================================================== */

    let vh = window.innerHeight * 0.01;

    let header = document.getElementById('banner');
    // let headerInt = document.getElementById('banner-internal');
    if(header.classList.contains('frontBanner')) {
      header.style.setProperty('--vh', `${vh}px`);
    }


    /** ================================================================
    Make homepage testimonial slider interactive
    ================================================================= */

    const track = document.querySelector('.carousel__viewport');
    const slides = Array.from(track.children);
    // const currentSlide = track.querySelector('.current-slide');
    // const nextButton = document.querySelector('.carousel__next');
    // const prevButton = document.querySelector('.carousel__prev');

    const slideWidth = slides[0].getBoundingClientRect().width;


    function moveToSlide(track, currentSlide , targetSlide) {
      track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
      currentSlide.style = 'right:1';
      currentSlide.classList.remove('current-slide');
      targetSlide.parentNode.classList.add('current-slide');
    }

    // **uncomment this if you activate next and previous buttons on side of carrousel **
    // ******* when user clicks left, move slides to the left *******
    
    // prevButton.addEventListener('click', e => {
    //   const currentSlide = track.querySelector('.current-slide');
    //   const prevSlide = currentSlide.previousElementSibling;

    //   moveToSlide(track, currentSlide, targetSlide);
    // });


    // ***** when user clicks right, move slides to the right ******

    // nextButton.addEventListener('click', e => {
    //   const currentSlide = track.querySelector('.current-slide');
    //   const nextSlide = currentSlide.nextElementSibling;

    //   moveToSlide(track, currentSlide, targetSlide);
    // });

    // ****** when user clicks nav button, move to that slide *******

    const dotsNav = document.querySelector('.carousel__navigation-list')
    const dots = Array.from(dotsNav.children);
    const currentSlide = track.querySelector('.current-slide');
    // const nextSlide = currentSlide.nextElementSibling;
    // const prevSlide = currentSlide.previousElementSibling;

    dotsNav.addEventListener('click', e => {
        const targetDot = e.target.closest('button');

        if(!targetDot) return;

        const currentSlide = track.querySelector('.current-slide');
        const currentDot = dotsNav.querySelector('.current-slide');
        const targetIndex = dots.findIndex(dot => dot.firstElementChild === targetDot);
        const currentIndex = dots.findIndex(dot => dot.firstElementChild.classList.contains('current-slide'));
        const targetSlide = slides[targetIndex];
        let distanceToMove = (-1)*slideWidth*(targetIndex);

        currentDot.classList.remove('current-slide');

        moveToSlide(track, currentSlide, targetSlide.firstElementChild);

        targetDot.classList.add('current-slide');

        slides.forEach(slide => {
          slide.style.transform = 'translateX(' + distanceToMove + 'px)';
        })

    });

    // change currentDot on swipe/slide/flick of carousel - turned off because of scroll left/right back-button issues.

    /* let carouselObserver = new IntersectionObserver(function(slides, observer) {

      slides.forEach( slide => {
        if(!slide.isIntersecting) {

          if(slide.target.classList.contains('current-slide')) {
            const prevIndex = dots.findIndex(dot => dot.firstElementChild.classList.contains('current-slide'));
            slide.target.classList.remove('current-slide');
            dots[prevIndex].firstElementChild.classList.remove('current-slide');
          } else {
            return;
          }

        } else {
          if (!slide.target.classList.contains('current-slide')) {
            slide.target.classList.add('current-slide');

            const target = slide.target;

            const allSlides = document.querySelectorAll('.carousel__slide');

            let newIndex;
            let i;
            for(i=0; i < allSlides.length; i++) {
              if (allSlides[i] === target) {
                newIndex = i;
              };
            }

            dots[newIndex].firstElementChild.classList.add('current-slide');

          } else {
            return;
          }

        }
      })
    }, {
        threshold: 1
        // rootMargin: "0px 0px 500px 0px"
    });

    slides.forEach(function(slide) {
      carouselObserver.observe(slide);
    }); */


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