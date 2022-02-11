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
/*!*********************************!*\
  !*** ./resources/js/comment.js ***!
  \*********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Comment)
/* harmony export */ });
function Comment() {
  var _ref = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {},
      username = _ref.username,
      picture = _ref.picture;

  var data = {
    _username: username,
    _picture: picture
  };

  function user_profile() {
    var profile = document.createElement('div');
    profile.innerHTML = "\n                     <img class = \"user-profile user-profile--sm card__user-profile card__comment-profile\" alt=\"\" src=\"".concat(data._picture, "\"/>\n                     <p class=\"card__username card__username--sm\"> ").concat(data._username, "</p>");
    return profile;
  }

  function create_element(content) {
    var div = document.createElement('div');
    var profile = user_profile();
    var p = document.createElement('p');
    p.className = 'card__content';
    p.style.marginTop = "8px";
    p.innerText = content;
    div.style.marginTop = "8px";
    div.style.paddingBottom = '4px';
    div.style.borderBottom = '1px solid #fff';
    div.appendChild(profile);
    div.appendChild(p);
    return div;
  }

  return {
    create_element: create_element
  };
}
/******/ })()
;