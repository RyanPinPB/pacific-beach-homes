// accept hot module reloading
if (module.hot) {
  module.hot.accept();
}

import '../scss/app.scss';
import '../vendors/owl-carousel/owl.carousel.min.js';

//make event listeners pasive
jQuery.event.special.touchstart = {
  setup: function (_, ns, handle) {
    this.addEventListener('touchstart', handle, { passive: true });
  },
};

class App {
  constructor() {
    // set vars
    this.hamburgerMenu = document.querySelector('.mobileMenu');
    this.hamburgerIcon = document.querySelector('.menu-icon');
    this.hamburgerText = document.querySelector('.hamburgertext');
    this.mobileMenuLink = document.querySelectorAll('.mobileMenuLink');

    // execute functions
    this.setEventListeners();
    this.init();
  }
  init() {
    /** =======================================================================================
    Calculate correct vh
    ========================================================================================= */

    // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
    let vh = window.innerHeight * 0.01;
    // Then we set the value in the --vh custom property to the root of the document
    document.documentElement.style.setProperty('--vh', `${vh}px`);
    document.documentElement.style.setProperty('--vho', `${vh}px`);

    // We listen to the resize event
    window.addEventListener('resize', () => {
      // We execute the same script as before
      let vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty('--vh', `${vh}px`);
    });

    /** =======================================================================================
    Hamburger Menu
    ========================================================================================= */
    let hamburgerMenu = document.querySelector('.mobileMenu');
    let hamburgerIcon = document.querySelector('.menu-icon');
    let hamburgerText = document.querySelector('.hamburgertext');
    let mobileMenuLink = document.querySelectorAll('.mobileMenuLink');
    let mobileButtons = document.querySelectorAll('.mobile-button');

    let menuOpen = false;

    function openNav() {
      hamburgerMenu.style.width = '100%';
      hamburgerText.style.color = 'rgba(255,255,255,0)';
      document.body.style.overflow = 'hidden';
      mobileButtons.forEach((button) => {
        button.classList.toggle('hidden');
      });
    }

    function closeNav() {
      hamburgerMenu.style.width = '0%';
      hamburgerText.style.color = 'rgba(255,255,255,1)';
      document.body.style.overflow = 'auto';
      mobileButtons.forEach((button) => {
        button.classList.toggle('hidden');
      });
    }

    function navClick() {
      if (menuOpen === false) {
        openNav();
        menuOpen = true;
      } else {
        closeNav();
        menuOpen = false;
      }
    }

    hamburgerIcon.addEventListener('click', (e) => {
      hamburgerIcon.classList.toggle('active');
      navClick();
    });

    for (let i = 0; i < mobileMenuLink.length; i++) {
      mobileMenuLink[i].addEventListener('click', (e) => {
        hamburgerIcon.classList.toggle('active');
        navClick();
      });
    }

    /** =======================================================================================
        Fadein and slide up animation
    ========================================================================================= */
    document.addEventListener('DOMContentLoaded', function () {
      const faders = document.querySelectorAll('.fade-in');
      const sliders = document.querySelectorAll('.slide-up');
      const posts = document.querySelectorAll('.post-title');
      const testimonials = document.querySelectorAll('.testimonials-page-item');

      if ('IntersectionObserver' in window) {
        const appearOptions = {
          threshold: 0,
          rootMargin: '0px 0px 60px 0px',
        };

        const appearOnScroll = new IntersectionObserver(function (
          entries,
          appearOnScroll
        ) {
          entries.forEach((entry) => {
            if (!entry.isIntersecting) {
              return;
            } else {
              entry.target.classList.add('appear');
              appearOnScroll.unobserve(entry.target);
            }
          });
        },
        appearOptions);

        faders.forEach((fader) => {
          appearOnScroll.observe(fader);
        });

        sliders.forEach((slider) => {
          appearOnScroll.observe(slider);
        });

        const blogLineOptions = {
          threshold: 0.5,
          // rootMargin: "0px 0px 60px 0px"
        };

        const showBlogLine = new IntersectionObserver(function (
          entries,
          showBlogLine
        ) {
          entries.forEach((entry) => {
            if (!entry.isIntersecting) {
              return;
            } else {
              entry.target.classList.add('visible');
              showBlogLine.unobserve(entry.target);
            }
          });
        },
        blogLineOptions);

        posts.forEach((post) => {
          showBlogLine.observe(post);
        });

        const testimonialLineOptions = {
          threshold: 0.2,
          // rootMargin: "0px 0px 60px 0px"
        };

        const showTestimonialLine = new IntersectionObserver(function (
          entries,
          showTestimonialLine
        ) {
          entries.forEach((entry) => {
            if (!entry.isIntersecting) {
              return;
            } else {
              entry.target.classList.add('visible');
              showTestimonialLine.unobserve(entry.target);
            }
          });
        },
        testimonialLineOptions);

        testimonials.forEach((testimonial) => {
          showTestimonialLine.observe(testimonial);
        });
      } else {
        while (faders.length > 0) {
          faders[0].classList.add('appear');
        }
        while (sliders.length > 0) {
          sliders[0].classList.add('appear');
        }
      }
    });

    /** ================================================================================================
        Javascript style adjustments to fade in banner text and zip code on home page after js file load
    ================================================================================================= */

    // after fade-in banner text, remove transitions so parralax works cleanly
    if (document.querySelector('.banner-text')) {
      const bannerText = document.querySelector('.banner-text');
      // bannerText.style.opacity = '1';
      document.querySelector('.banner-text');
      setTimeout(function () {
        bannerText.style.transition = 'unset';
      }, 2000);
    }

    if (document.querySelector('.zip-code')) {
      const zipCode = document.querySelector('.zip-code');
      zipCode.style.opacity = '1';
      document.querySelector('.fade-to-black').style.height = '10%';
    }

    /** =======================================================================================
        Fade banner text and parallax affect
    ========================================================================================= */

    if (document.querySelector('.banner-text')) {
      document.addEventListener('scroll', function () {
        let currScrollPos2 =
          window.pageYOffset ||
          document.documentElement.scrollTop ||
          document.body.scrollTop ||
          0;
        if (currScrollPos2 > 1) {
          document.querySelector('.banner-text').style.opacity =
            -currScrollPos2 / 150 + 1.04;
        }
      });
    }

    function background_image_parallax($object, multiplier) {
      multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.15;
      multiplier = 1 - multiplier;

      $object.css({ 'background-attatchment': 'fixed' });
      $(window).scroll(function () {
        let from_top = $(document).scrollTop(),
          translateY = '0' + (multiplier * from_top).toFixed(2);
        let translateX = 0;
        $object.css({
          transform:
            'translate3d(' + translateX + 'px, ' + translateY + 'px, 0)',
        });
      });
    }

    background_image_parallax($('.banner-text'), 0.4);
    background_image_parallax($('.zip-code'), 0.2);

    /** ======================================================================================================
      Hide nav / show the master navigation menu only after scrolling up - will need jquery library as written
    ======================================================================================================= */

    const nav = document.querySelector('#masthead');
    const visible = 'is-visible';
    const hidden = 'is-hidden';
    let lastScroll = 0;

    window.addEventListener('scroll', () => {
      const currentScroll = window.pageYOffset;
      if (currentScroll == 0) {
        nav.classList.remove(hidden);
        nav.classList.remove('blueNav');
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
        nav.classList.add('blueNav');

        const contentStart = document.getElementById('content');
        const distanceToContent = contentStart.offsetTop;
        if (document.getElementById('scroll')) {
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
      items: 1,
      loop: true,
      margin: 0,
      dots: false,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      autoplaySpeed: 1000,
      responsive: {
        0: {
          items: 1,
        },
        1025: {
          items: 2,
        },
        1350: {
          items: 3,
          autoplay: false,
          touchDrag: false,
          mouseDrag: false,
          pullDrag: false,
          loop: false,
        },
      },
    });

    var owlIB = $('.image-buttons');
    owlIB.owlCarousel({
      items: 1,
      loop: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      autoplaySpeed: 1000,
      responsive: {
        0: {
          items: 1,
          margin: 10,
          stagePadding: 10,
        },
        769: {
          items: 1,
          margin: 10,
          stagePadding: 10,
        },
        1025: {
          items: 2,
          margin: 10,
          stagePadding: 10,
          autoplay: false,
          touchDrag: false,
          mouseDrag: false,
          pullDrag: false,
          loop: false,
        },
      },
    });

    var owlTest = $('.testimonials');
    owlTest.owlCarousel({
      items: 1,
      loop: true,
      dots: true,
      nav: false,
      items: 1,
      margin: 10,
      stagePadding: 10,
      responsive: {
        769: {
          nav: true,
          rewindNav: true,
        },
      },
    });

    $('.owl-carousel').each(function () {
      //Find each set of dots in this carousel
      $(this)
        .find('.owl-prev')
        .each(function () {
          //Add one to index so it starts from 1
          $(this).attr('aria-label', 'previous testimonial');
        });
    });

    $('.owl-carousel').each(function () {
      //Find each set of dots in this carousel
      $(this)
        .find('.owl-next')
        .each(function () {
          //Add one to index so it starts from 1
          $(this).attr('aria-label', 'next testimonial');
        });
    });

    $('.owl-carousel').each(function () {
      //Find each set of dots in this carousel
      $(this)
        .find('.owl-dot')
        .each(function (index) {
          //Add one to index so it starts from 1
          $(this).attr('aria-label', 'testimonial ' + (index + 1));
        });
    });

    /** ==================================================================================================
     Enable smooth scrolling for anchor link navigation
    ==================================================================================================== */

    $('a[href*="#"]')
      // Remove links that don't actually link to anything
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function (event) {
        // On-page links
        if (
          location.pathname.replace(/^\//, '') ==
            this.pathname.replace(/^\//, '') &&
          location.hostname == this.hostname
        ) {
          // Figure out element to scroll to
          var target = $(this.hash);
          target = target.length
            ? target
            : $('[name=' + this.hash.slice(1) + ']');
          // Does a scroll target exist?
          if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate(
              {
                scrollTop: target.offset().top,
              },
              1000,
              function () {
                // Callback after animation
                // Must change focus!
                var $target = $(target);
                $target.focus();
                if ($target.is(':focus')) {
                  // Checking if the target was focused
                  return false;
                } else {
                  $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                  $target.focus(); // Set focus again
                }
              }
            );
          }
        }
      });

    /** ================================================================
    Lazy load images 500px before in viewport
    ================================================================= */

    document.addEventListener('DOMContentLoaded', function () {
      let lazyloadImages;

      if ('IntersectionObserver' in window) {
        lazyloadImages = document.querySelectorAll('.lazy');
        let imageObserver = new IntersectionObserver(
          function (entries, observer) {
            entries.forEach(function (entry) {
              if (entry.isIntersecting) {
                let image = entry.target;
                image.src = image.dataset.src;
                image.classList.remove('lazy');
                imageObserver.unobserve(image);
              }
            });
          },
          {
            rootMargin: '0px 0px 500px 0px',
          }
        );

        lazyloadImages.forEach(function (image) {
          imageObserver.observe(image);
        });
      } else {
        let lazyloadThrottleTimeout;
        lazyloadImages = document.querySelectorAll('.lazy');

        function lazyload() {
          if (lazyloadThrottleTimeout) {
            clearTimeout(lazyloadThrottleTimeout);
          }

          lazyloadThrottleTimeout = setTimeout(function () {
            let scrollTop = window.pageYOffset;
            lazyloadImages.forEach(function (img) {
              if (img.offsetTop < window.innerHeight + scrollTop + 500) {
                img.src = img.dataset.src;
                img.classList.remove('lazy');
              }
            });
            if (lazyloadImages.length == 0) {
              document.removeEventListener('scroll', lazyload);
              window.removeEventListener('resize', lazyload);
              window.removeEventListener('orientationChange', lazyload);
            }
          }, 20);
        }

        document.addEventListener('scroll', lazyload);
        window.addEventListener('resize', lazyload);
        window.addEventListener('orientationChange', lazyload);
      }
    });
  }

  setEventListeners() {
    // window.addEventListener
  }
  removeEventListeners() {}
}

new App();
