!function(e){function t(t){for(var n,l,o=t[0],a=t[1],c=t[2],u=0,d=[];u<o.length;u++)l=o[u],Object.prototype.hasOwnProperty.call(i,l)&&i[l]&&d.push(i[l][0]),i[l]=0;for(n in a)Object.prototype.hasOwnProperty.call(a,n)&&(e[n]=a[n]);for(h&&h(t);d.length;)d.shift()();return r.push.apply(r,c||[]),s()}function s(){for(var e,t=0;t<r.length;t++){for(var s=r[t],n=!0,o=1;o<s.length;o++){var a=s[o];0!==i[a]&&(n=!1)}n&&(r.splice(t--,1),e=l(l.s=s[0]))}return e}var n={},i={0:0},r=[];function l(t){if(n[t])return n[t].exports;var s=n[t]={i:t,l:!1,exports:{}};return e[t].call(s.exports,s,s.exports,l),s.l=!0,s.exports}l.m=e,l.c=n,l.d=function(e,t,s){l.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:s})},l.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},l.t=function(e,t){if(1&t&&(e=l(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var s=Object.create(null);if(l.r(s),Object.defineProperty(s,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)l.d(s,n,function(t){return e[t]}.bind(null,n));return s},l.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return l.d(t,"a",t),t},l.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},l.p="/wp-content/themes/fictional-university-theme/bundled-assets/";var o=window.webpackJsonp=window.webpackJsonp||[],a=o.push.bind(o);o.push=t,o=o.slice();for(var c=0;c<o.length;c++)t(o[c]);var h=a;r.push([3,1]),s()}([,,function(e,t,s){},function(e,t,s){"use strict";s.r(t);s(2);var n=class{constructor(){this.menu=document.querySelector(".site-header__menu"),this.openButton=document.querySelector(".site-header__menu-trigger"),this.events()}events(){this.openButton.addEventListener("click",()=>this.openMenu())}openMenu(){this.openButton.classList.toggle("fa-bars"),this.openButton.classList.toggle("fa-window-close"),this.menu.classList.toggle("site-header__menu--active")}},i=s(1);var r=class{constructor(){if(document.querySelector(".hero-slider")){const e=document.querySelectorAll(".hero-slider__slide").length;let t="";for(let s=0;s<e;s++)t+=`<button class="slider__bullet glide__bullet" data-glide-dir="=${s}"></button>`;document.querySelector(".glide__bullets").insertAdjacentHTML("beforeend",t),new i.a(".hero-slider",{type:"carousel",perView:1,autoplay:3e3}).mount()}}},l=s(0),o=s.n(l);var a=class{constructor(){this.addSearchHTML(),this.resultsDiv=o()("#search-overlay__results"),this.openButton=o()(".js-search-trigger"),this.closeButton=o()(".search-overlay__close"),this.searchOverlay=o()(".search-overlay"),this.searchField=o()("#search-term"),this.events(),this.isOverlayOpen=!1,this.isSpinnerVisible=!1,this.previousValue,this.typingTimer}events(){this.openButton.on("click",this.openOverlay.bind(this)),this.closeButton.on("click",this.closeOverlay.bind(this)),o()(document).on("keydown",this.keyPressDispatcher.bind(this)),this.searchField.on("keyup",this.typingLogic.bind(this))}typingLogic(){this.searchField.val()!=this.previousValue&&(clearTimeout(this.typingTimer),this.searchField.val()?(this.isSpinnerVisible||(this.resultsDiv.html('<div class="spinner-loader"></div>'),this.isSpinnerVisible=!0),this.typingTimer=setTimeout(this.getResults.bind(this),750)):(this.resultsDiv.html(""),this.isSpinnerVisible=!1)),this.previousValue=this.searchField.val()}getResults(){console.log("URL",universityData.root_url+"/wp-json/university/v1/search?term="+this.searchField.val());const e=universityData.root_url+"/wp-json/university/v1/search?term="+this.searchField.val();o.a.getJSON(e,e=>{console.log("results",e),this.resultsDiv.html(`\n          <div class="row">\n            <div class="one-third">\n              <h2 class="search-overlay__section-title">General Information</h2>\n              ${e.generalInfo.length?'<ul class="link-list min-list">':"<p>No general information matches that search.</p>"}\n              ${e.generalInfo.map(e=>`<li><a href="${e.permalink}">${e.title}</a> \n                ${"post"==e.postType?"by "+e.authorName:""} \n                </li>`).join("")}\n              ${e.generalInfo.length?"</ul>":""} \x3c!-- Conditional Closing UL --\x3e\n            </div>\n            <div class="one-third">\n              <h2 class="search-overlay__section-title">Programs</h2>\n              ${e.programs.length?'<ul class="link-list min-list">':"<p>No general information matches that search.</p>"}\n              ${e.programs.map(e=>`<li><a href="${e.permalink}">${e.title}</a></li>`)}\n              ${e.programs.length?"</ul>":""} \x3c!-- Conditional Closing UL --\x3e\n\n              <h2 class="search-overlay__section-title">Professors</h2>\n\n            </div>\n            <div class="one-third">\n              <h2 class="search-overlay__section-title">Campuses</h2>\n              ${e.campuses.length?'<ul class="link-list min-list">':"<p>No general information matches that search.</p>"}\n              ${e.campuses.map(e=>`<li><a href="${e.permalink}">${e.title}</a></li>`)}\n              ${e.campuses.length?"</ul>":""} \x3c!-- Conditional Closing UL --\x3e\n              \n              <h2 class="search-overlay__section-title">Events</h2>\n            </div>\n          </div>\n        `),this.isSpinnerVisible=!1});const t="https://leapforward01.local/wp-json/wp/v2/pages?search="+this.searchField.val();o.a.when(o.a.getJSON(t),o.a.getJSON(e)).then((e,t)=>{let s=e[0].concat(t[0]);this.resultsDiv.html(`\n        <h2 class="search-overlay__section-title">General Information</h2>\n        \x3c!-- Conditional Opening UL --\x3e\n        ${s.length?'<ul class="link-list min-list">':"<p>No general information matches that search.</p>"}\n          ${s.map(e=>`<li><a href="${e.link}">${e.title.rendered}</a> \n            ${"post"==e.type?"by "+e.authorName:""} \n          </li>`).join("")}\n        ${s.length?"</ul>":""} \x3c!-- Conditional Closing UL --\x3e\n        combinedResults: ${s.length}\n        `),this.isSpinnerVisible=!1},()=>{this.resultsDiv.html("<p>Unexpected Error. Please Try Again.</p>")})}keyPressDispatcher(e){83==e.keyCode&&!this.isOverlayOpen&&o()("input, textarea").is(":focus")&&this.openOverlay(),27==e.keyCode&&this.isOverlayOpen&&o()("input, textarea").is(":focus")&&this.closeOverlay()}openOverlay(){this.searchOverlay.addClass("search-overlay--active"),o()("body").addClass("body-no-scroll"),this.searchField.val(""),setTimeout(()=>{this.searchField.focus()},301),console.log("Our open method just ran."),this.isOverlayOpen=!0}closeOverlay(){this.searchOverlay.removeClass("search-overlay--active"),o()("body").removeClass("body-no-scroll"),console.log("Our close method just ran."),this.isOverlayOpen=!1}addSearchHTML(){o()("body").append('\n    \x3c!-- <div class="search-overlay search-overlay--active"> --\x3e\n    <div class="search-overlay">\n      <div class="search-overlay__top">\n        <div class="container">\n          <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>\n          <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">\n          <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>\n        </div>\n      </div>\n      <div class="container">\n        <div id="search-overlay__results"></div>\n      </div>\n\n    </div>\n    ')}};var c=class{constructor(){this.events()}events(){o()(".delete-note").on("click",this.deleteNote)}deleteNote(){o.a.ajax({url:universityData.rootUrl+"wp-json/wp/v2/note/146",type:"DELETE",success:e=>{console.log("Congrats"),console.log(e)},error:e=>{console.log("Sorry"),console.log(e)}})}};new n,new r,new a,new c}]);