import jQuery from 'jquery';
import Popper from 'popper.js';

window.$ = window.jQuery = jQuery;
window.Popper = Popper;
require('bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';

Vue.use(VueRouter);
window.Vue = Vue;
window.axios = axios;

window.axios.defaults.headers.common = {
  'X-Requested-With': 'XMLHttpRequest'
}
