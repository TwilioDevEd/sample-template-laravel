/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/send-sms.js":
/*!**********************************!*\
  !*** ./resources/js/send-sms.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var form = document.getElementById('smsForm');
/**
 * Displays a message to the user in a colored box. Changes the color based
 * on the type of the message
 * @param {string} message text to show in the dialog
 * @param {'success' | 'error'} type whether the message should be shown as error or success
 */

function showMessage(message, type) {
  var dialogContent = document.getElementById('dialogContent');
  var dialogTitle = document.getElementById('dialogTitle');
  var dialog = document.getElementById('dialog');

  if (!dialogContent || !dialogTitle || !dialog) {
    return;
  }

  dialogContent.innerText = message;
  dialogTitle.innerText = type === 'success' ? 'SMS Sent!' : 'Error';
  dialog.classList.remove('alert-success', 'alert-danger', 'd-none');
  dialog.classList.add(type === 'success' ? 'alert-success' : 'alert-danger');
}
/**
 * Clears the `to` and `body` fields on the form.
 * @param {HTMLFormElement} form a form element that should have the fields cleared
 */


function clearForm(form) {
  form.to.value = null;
  form.body.value = null;
}

if (form) {
  form.addEventListener('submit', function (evt) {
    evt.preventDefault();
    var headers = new Headers();
    headers.append('Content-Type', 'application/json');
    fetch('/send-sms', {
      method: 'POST',
      headers: headers,
      body: JSON.stringify({
        to: evt.target.to.value,
        body: evt.target.body.value,
        _token: evt.target._token.value
      })
    }).then(function (resp) {
      return resp.json();
    }).then(function (respJson) {
      showMessage(respJson.message, respJson.status);

      if (respJson.status === 'success') {
        clearForm(form);
      }
    })["catch"](function (err) {
      showMessage(err.message, 'error');
    });
  });
}

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!******************************************************************!*\
  !*** multi ./resources/js/send-sms.js ./resources/sass/app.scss ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/mpedroso/Projects/twilio/code-exchange/templates/sample-template-laravel/resources/js/send-sms.js */"./resources/js/send-sms.js");
module.exports = __webpack_require__(/*! /home/mpedroso/Projects/twilio/code-exchange/templates/sample-template-laravel/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });