!function(e){function t(t){for(var o,l,c=t[0],i=t[1],a=t[2],h=0,d=[];h<c.length;h++)l=c[h],Object.prototype.hasOwnProperty.call(n,l)&&n[l]&&d.push(n[l][0]),n[l]=0;for(o in i)Object.prototype.hasOwnProperty.call(i,o)&&(e[o]=i[o]);for(u&&u(t);d.length;)d.shift()();return s.push.apply(s,a||[]),r()}function r(){for(var e,t=0;t<s.length;t++){for(var r=s[t],o=!0,c=1;c<r.length;c++){var i=r[c];0!==n[i]&&(o=!1)}o&&(s.splice(t--,1),e=l(l.s=r[0]))}return e}var o={},n={0:0},s=[];function l(t){if(o[t])return o[t].exports;var r=o[t]={i:t,l:!1,exports:{}};return e[t].call(r.exports,r,r.exports,l),r.l=!0,r.exports}l.m=e,l.c=o,l.d=function(e,t,r){l.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},l.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},l.t=function(e,t){if(1&t&&(e=l(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(l.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)l.d(r,o,function(t){return e[t]}.bind(null,o));return r},l.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return l.d(t,"a",t),t},l.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},l.p="/wp-content/themes/fictional-university-theme/bundled-assets/";var c=window.webpackJsonp=window.webpackJsonp||[],i=c.push.bind(c);c.push=t,c=c.slice();for(var a=0;a<c.length;a++)t(c[a]);var u=i;s.push([3,1]),r()}([,,function(e,t,r){},function(e,t,r){"use strict";r.r(t);r(2);var o=class{constructor(){this.menu=document.querySelector(".site-header__menu"),this.openButton=document.querySelector(".site-header__menu-trigger"),this.events()}events(){this.openButton.addEventListener("click",()=>this.openMenu())}openMenu(){this.openButton.classList.toggle("fa-bars"),this.openButton.classList.toggle("fa-window-close"),this.menu.classList.toggle("site-header__menu--active")}},n=r(1);var s=class{constructor(){if(document.querySelector(".hero-slider")){const e=document.querySelectorAll(".hero-slider__slide").length;let t="";for(let r=0;r<e;r++)t+=`<button class="slider__bullet glide__bullet" data-glide-dir="=${r}"></button>`;document.querySelector(".glide__bullets").insertAdjacentHTML("beforeend",t),new n.a(".hero-slider",{type:"carousel",perView:1,autoplay:3e3}).mount()}}},l=r(0),c=r.n(l);var i=class{constructor(){this.openButton=c()(".js-search-trigger"),this.closeButton=c()(".search-overlay__close"),this.searchOverlay=c()(".search-overlay"),this.events()}events(){this.openButton.on("click",this.openOverlay.bind(this)),this.closeButton.on("click",this.closeOverlay.bind(this))}openOverlay(){this.searchOverlay.addClass("search-overlay--active")}closeOverlay(){this.searchOverlay.removeClass("search-overlay--active")}};var a=class{constructor(){this.events()}events(){c()(".delete-note").on("click",this.deleteNote)}deleteNote(){c.a.ajax({url:universityData.rootUrl+"wp-json/wp/v2/note/146",type:"DELETE",success:e=>{console.log("Congrats"),console.log(e)},error:e=>{console.log("Sorry"),console.log(e)}})}};new o,new s,new i,new a}]);