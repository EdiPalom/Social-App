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
  var liked = false;

  function highlight_button(button) {
    button.style.backgroundColor = "#ffb0b8";
    button.style.borderRadius = "3px";
    button.style.opacity = "1";
  }

  function add_element(post) {
    var _this = this;

    var post_section = document.querySelector('#posts');
    var card_container = document.createElement('div');
    card_container.className = 'card-container';
    var card_article = document.createElement('article');
    card_article.className = 'card';
    var card_header = document.createElement('div');
    card_header.className = 'card__header';
    card_header.innerHTML = "\n                     <img class = \"user-profile card__user-profile\" alt=\"\" src=\"".concat(post.author.picture, "\"/>\n                     <p class=\"card__username\"> ").concat(post.author.username, "</p>");
    var card_body = document.createElement('div');
    card_body.className = 'card__body';
    var card_title = document.createElement('div');
    card_title.className = 'card__title';
    card_title.innerText = post.post_name;
    var card_content = document.createElement('p');
    card_content.className = 'card__content';
    card_content.innerText = post.content;
    var img_div = document.createElement('div');
    var images = '';
    post.images.forEach(function (img) {
      images += "\n                <img class=\"card__image\" alt=\"\" src=\"".concat(img.url, "\"/>");
    });
    img_div.innerHTML = images;
    var card_footer = document.createElement('div');
    card_footer.className = 'card__footer';
    var card_actions = document.createElement('div');
    card_actions.className = 'card__actions';
    var like_button = document.createElement('button');
    like_button.className = 'icon button--heart';
    var likes_count = document.createElement('span');
    likes_count.className = 'likes';
    likes_count.innerText = "".concat(post.likes);

    if (!post.user_like) {
      like_button.onclick = function () {
        if (!_this.liked) {
          _this.liked = true;
          highlight_button(like_button);
          var formData = new FormData();
          formData.append('post_id', post.id);
          fetch('http://localhost:5000/social-app/public/likes', {
            method: 'post',
            headers: {
              'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
            },
            body: formData
          });
          var num = parseInt(likes_count.innerText);
          num++;
          likes_count.innerText = num;
        }
      };
    } else {
      highlight_button(like_button);
    }

    var div = document.createElement('div');
    div.appendChild(like_button);
    div.appendChild(likes_count);
    card_actions.appendChild(div);
    card_footer.appendChild(card_actions);
    card_body.appendChild(card_title);
    card_body.appendChild(card_content);
    card_body.appendChild(img_div);
    card_body.appendChild(card_footer);
    card_article.appendChild(card_header);
    card_article.appendChild(card_body);
    card_container.appendChild(card_article);
    post_section.appendChild(card_container);
  }

  return {
    add_element: add_element
  };
}
/******/ })()
;