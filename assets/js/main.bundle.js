!function(e){var t={};function n(o){if(t[o])return t[o].exports;var r=t[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(o,r,function(t){return e[t]}.bind(null,r));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=0)}([function(e,t,n){"use strict";n.r(t);n(1);function o(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}new(function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.hamburgerMenu=document.querySelector(".mobileMenu"),this.hamburgerIcon=document.querySelector(".menu-icon"),this.hamburgerText=document.querySelector(".hamburgertext"),this.mobileMenuLink=document.querySelectorAll(".mobileMenuLink"),this.setEventListeners(),this.init()}var t,n,r;return t=e,(n=[{key:"init",value:function(){var e=document.querySelector(".mobileMenu"),t=document.querySelector(".menu-icon"),n=document.querySelector(".hamburgertext"),o=document.querySelectorAll(".mobileMenuLink"),r=document.querySelectorAll(".mobile-button"),i=!1;function s(){!1===i?(e.style.width="100%",n.style.color="rgba(255,255,255,0)",document.body.style.overflow="hidden",r.forEach((function(e){e.classList.toggle("hidden")})),i=!0):(e.style.width="0%",n.style.color="rgba(255,255,255,1)",document.body.style.overflow="auto",r.forEach((function(e){e.classList.toggle("hidden")})),i=!1)}t.addEventListener("click",(function(e){t.classList.toggle("active"),s()}));for(var a=0;a<o.length;a++)o[a].addEventListener("click",(function(e){t.classList.toggle("active"),s()}));var l=document.querySelector("#masthead"),u="is-hidden",c=0;window.addEventListener("scroll",(function(){var e=window.pageYOffset;if(0==e)return l.classList.remove(u),void l.classList.remove("blueNav");e>c&&!l.classList.contains(u)?(l.classList.remove("is-visible"),l.classList.add(u)):e<c&&l.classList.contains(u)&&(l.classList.remove(u),l.classList.add("is-visible"),l.classList.add("blueNav"),document.getElementById("content").offsetTop,document.getElementById("scroll")&&(document.getElementById("scroll").style.opacity=0)),c=e})),$(".selling-points").owlCarousel({items:1,loop:!0,margin:0,dots:!1,autoplay:!0,autoplayTimeout:5e3,autoplayHoverPause:!0,autoplaySpeed:1e3,responsive:{0:{items:1},1025:{items:2},1350:{items:3,autoplay:!1,touchDrag:!1,mouseDrag:!1,pullDrag:!1,loop:!1}}}),$(".image-buttons").owlCarousel({items:1,loop:!0,dots:!1,autoplay:!0,autoplayTimeout:5e3,autoplayHoverPause:!0,autoplaySpeed:1e3,responsive:{0:{items:1,margin:10,stagePadding:10},769:{items:1,margin:10,stagePadding:10},1025:{items:2,margin:10,stagePadding:10},1350:{items:3,margin:10,stagePadding:10,autoplay:!1,touchDrag:!1,mouseDrag:!1,pullDrag:!1,loop:!1}}}),$(".testimonials").owlCarousel({items:1,loop:!0,dots:!1}),document.addEventListener("DOMContentLoaded",(function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var t=new IntersectionObserver((function(e,n){e.forEach((function(e){if(e.isIntersecting){var n=e.target;n.src=n.dataset.src,n.classList.remove("lazy"),t.unobserve(n)}}))}),{rootMargin:"0px 0px 500px 0px"});e.forEach((function(e){t.observe(e)}))}else{var n,o=function t(){n&&clearTimeout(n),n=setTimeout((function(){var n=window.pageYOffset;e.forEach((function(e){e.offsetTop<window.innerHeight+n+500&&(e.src=e.dataset.src,e.classList.remove("lazy"))})),0==e.length&&(document.removeEventListener("scroll",t),window.removeEventListener("resize",t),window.removeEventListener("orientationChange",t))}),20)};e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",o),window.addEventListener("resize",o),window.addEventListener("orientationChange",o)}}))}},{key:"setEventListeners",value:function(){}},{key:"removeEventListeners",value:function(){}}])&&o(t.prototype,n),r&&o(t,r),e}())},function(e,t,n){}]);