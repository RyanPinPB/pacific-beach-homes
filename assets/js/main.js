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

    // Fade banner text and scroll-down icon on scroll parallax affect

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


    /** ======================================================
        Activate sticky nav bar
        When the user scrolls the page, execute activateStickyMenu
    ======================================================= */

    window.onscroll = function() {activateStickyMenu()};

    // Get the header
    let header = document.getElementById("masthead");
    let section1 = document.querySelector(".stickyMenuStart");

    // Get the offset position of the navbar
    let sticky = section1.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position

    function activateStickyMenu() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }




    /** ==================================================================================================
      Hide / show the master navigation menu only after scrolling up - will need jquery library as written
    ==================================================================================================== */
        
    /* $(document).ready(function(){
      console.log('Window Height is: ' + $(window).height());
      console.log('Document Height is: ' + $(document).height());
        let previousScroll = 0;
        $(window).scroll(function(){
            let currentScroll = $(this).scrollTop();
            if (currentScroll > 0 && currentScroll < $(document).height() - $(window).height()){
                if (currentScroll > previousScroll){
                    window.setTimeout(hideNav, 300);
                } else {
                    window.setTimeout(showNav, 300);
                }
                previousScroll = currentScroll;
            }
        });
        function hideNav() {
            $("[data-nav-status='toggle']").removeClass("is-visible").addClass("is-hidden");
        }
        function showNav() {
            $("[data-nav-status='toggle']").removeClass("is-hidden").addClass("is-visible");
        }
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