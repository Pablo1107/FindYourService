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

/***/ "./resources/js/admin.js":
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

var App = new Vue({
  el: '#app',
  data: {
    services: [],
    form: {
      visible: false,
      address: '',
      state: '',
      country: '',
      zipcode: '',
      latitude: 0.0,
      longitude: 0.0
    }
  },
  methods: {
    toggleForm: function toggleForm() {
      this.form.visible = !this.form.visible;
    }
  },
  created: function created() {
    var _this = this;

    axios.get('/services/list').then(function (response) {
      var services = response.data;

      for (var i = 0; i < services.length; i++) {
        _this.services.push({
          id: services[i].id,
          title: services[i].title,
          city: services[i].city
        });
      }

      if (services.length == 0) {
        _this.toggleForm();
      }
    }).catch(function (error) {
      console.log('There was an error.');
    });
  },
  mounted: function mounted() {
    var _this2 = this;

    this.autocomplete = new google.maps.places.Autocomplete(this.$refs.autocomplete, {
      types: ['geocode']
    });
    this.autocomplete.addListener('place_changed', function () {
      var componentForm = {
        'administrative_area_level_1': 'state',
        'country': 'country',
        'postal_code': 'zipcode'
      };

      var place = _this2.autocomplete.getPlace();

      var ac = place.address_components;
      _this2.form.latitude = place.geometry.location.lat();
      _this2.form.longitude = place.geometry.location.lng();
      _this2.form.address = place.name;

      for (var i = 0; i < ac.length; i++) {
        var addressType = ac[i].types[0];
        console.log(addressType);
        var val = ac[i]['long_name'];

        if (componentForm[addressType]) {
          _this2.form[componentForm[addressType]] = val;
        } else if (addressType == 'postal_code_suffix') {
          _this2.form['zipcode'] += val;
        }
      }
    });
  }
});

/***/ }),

/***/ "./resources/sass/bootstrap.scss":
/*!***************************************!*\
  !*** ./resources/sass/bootstrap.scss ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*********************************************************************!*\
  !*** multi ./resources/js/admin.js ./resources/sass/bootstrap.scss ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /mnt/sda4/Coding/Web/FindYourService/resources/js/admin.js */"./resources/js/admin.js");
module.exports = __webpack_require__(/*! /mnt/sda4/Coding/Web/FindYourService/resources/sass/bootstrap.scss */"./resources/sass/bootstrap.scss");


/***/ })

/******/ });