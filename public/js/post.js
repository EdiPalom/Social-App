/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/comment.js":
/*!*********************************!*\
  !*** ./resources/js/comment.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

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

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
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
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!******************************!*\
  !*** ./resources/js/post.js ***!
  \******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Post)
/* harmony export */ });
/* harmony import */ var _comment__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./comment */ "./resources/js/comment.js");

function Post() {
  var liked = false;

  function highlight_button(button) {
    button.style.backgroundColor = "#ffb0b8";
    button.style.borderRadius = "3px";
    button.style.opacity = "1";
  }

  function user_profile() {
    var _ref = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {},
        picture = _ref.picture,
        username = _ref.username;

    var profile = document.createElement('div');
    profile.innerHTML = "\n                     <img class = \"user-profile card__user-profile\" alt=\"\" src=\"".concat(picture, "\"/>\n                     <p class=\"card__username\"> ").concat(username, "</p>");
    return profile;
  }

  function add_element(post) {
    var _this = this;

    var post_section = document.querySelector('#posts');
    var card_container = document.createElement('div');
    card_container.className = 'card-container';
    var card_article = document.createElement('article');
    card_article.className = 'card';
    var card_header = user_profile({
      username: post.author.username,
      picture: post.author.picture
    });
    card_header.className = 'card__header';
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
    likes_count.innerText = post.likes;

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

    var comments_card = document.createElement('div');
    comments_card.className = 'card__comments card__body';
    var comments_button = document.createElement('button');
    comments_button.className = 'icon button--message';
    var comments_count = document.createElement('span');
    comments_count.className = 'likes';
    comments_count.innerText = post.comments;

    if (post.comments > 0) {
      comments_button.onclick = function () {
        fetch("http://localhost:5000/social-app/public/api/comments/post/".concat(post.id), {
          headers: {
            Accept: 'application/json',
            Authorization: 'Bearer ' + document.querySelector("meta[name='access_token']").getAttribute('content')
          }
        }).then(function (response) {
          return response.json();
        }).then(function (comments) {
          comments.data.forEach(function (comment) {
            var dom_comment = new _comment__WEBPACK_IMPORTED_MODULE_0__["default"]({
              username: comment.author.username,
              picture: comment.author.picture
            }).create_element(comment.content);
            comments_card.appendChild(dom_comment);
          });
        });
      };
    }

    var div_like = document.createElement('div');
    div_like.appendChild(like_button);
    div_like.appendChild(likes_count);
    var div_comment = document.createElement('div');
    div_comment.appendChild(comments_button);
    div_comment.appendChild(comments_count);
    card_actions.appendChild(div_comment);
    card_actions.appendChild(div_like);
    card_footer.appendChild(card_actions);
    card_body.appendChild(card_title);
    card_body.appendChild(card_content);
    card_body.appendChild(img_div);
    card_article.appendChild(card_header);
    card_article.appendChild(card_body);
    card_article.appendChild(card_footer);
    card_article.appendChild(comments_card);
    card_container.appendChild(card_article);
    post_section.appendChild(card_container);
  }

  return {
    add_element: add_element
  };
}
})();

/******/ })()
;