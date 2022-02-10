/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/post.js ***!
  \******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Post)
/* harmony export */ });
function Post() {
  function add_element(post) {
    var post_section = document.querySelector('#posts');
    var element = document.createElement('div');
    element.className = 'card-container';
    element.innerHTML = "\n              <article class=\"card\">\n                 <div class=\"card__header\">\n                     <img class = \"user-profile card__user-profile\" alt=\"\" src=\"".concat(post.author.picture, "\"/>\n                     <p class=\"card__username\"> ").concat(post.author.username, "</p>\n                 </div>\n                 \n                 <div class=\"card__body\">\n                      <div class=\"card__title\"> ").concat(post.post_name, "</div>\n                      <p class=\"card__content\">\n                       ").concat(post.content, "\n                      </p>\n                 </div>\n\n");
    post_section.appendChild(element);
  }

  return {
    add_element: add_element
  };
} // post.images.forEeach(img =>{
//                         <img class="card__image" alt="" src="${img.url}"/>
//                       });
/******/ })()
;