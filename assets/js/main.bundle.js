!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=0)}([function(e,t,n){"use strict";n.r(t);n(1);function r(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}new(function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.hamburgerMenu=document.querySelector(".mobileMenu"),this.hamburgerIcon=document.querySelector(".menu-icon"),this.hamburgerText=document.querySelector(".hamburgertext"),this.mobileMenuLink=document.querySelectorAll(".mobileMenuLink"),this.setEventListeners(),this.init()}var t,n,o;return t=e,(n=[{key:"init",value:function(){var e=document.querySelector(".mobileMenu"),t=document.querySelector(".menu-icon"),n=document.querySelector(".hamburgertext"),r=document.querySelectorAll(".mobileMenuLink"),o=!1;function i(){!1===o?(e.style.width="100%",n.style.color="rgba(255,255,255,0",document.body.style.overflow="hidden",o=!0):(e.style.width="0%",n.style.color="rgba(255,255,255,1",document.body.style.overflow="auto",o=!1)}t.addEventListener("click",(function(e){t.classList.toggle("active"),i()}));for(var c=0;c<r.length;c++)r[c].addEventListener("click",(function(e){t.classList.toggle("active"),i()}));window.onscroll=function(){window.pageYOffset>l?u.classList.add("sticky"):u.classList.remove("sticky")};var u=document.getElementById("masthead"),l=document.querySelector(".stickyMenuStart").offsetTop;document.addEventListener("DOMContentLoaded",(function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var t=new IntersectionObserver((function(e,n){e.forEach((function(e){if(e.isIntersecting){var n=e.target;n.src=n.dataset.src,n.classList.remove("lazy"),t.unobserve(n)}}))}),{rootMargin:"0px 0px 500px 0px"});e.forEach((function(e){t.observe(e)}))}else{var n,r=function t(){n&&clearTimeout(n),n=setTimeout((function(){var n=window.pageYOffset;e.forEach((function(e){e.offsetTop<window.innerHeight+n+500&&(e.src=e.dataset.src,e.classList.remove("lazy"))})),0==e.length&&(document.removeEventListener("scroll",t),window.removeEventListener("resize",t),window.removeEventListener("orientationChange",t))}),20)};e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}}))}},{key:"setEventListeners",value:function(){}},{key:"removeEventListeners",value:function(){}}])&&r(t.prototype,n),o&&r(t,o),e}())},function(e,t,n){}]);