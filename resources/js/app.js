
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap')
import Vue from 'vue'
import router from './router.js'

//vue-modal
import VModal from 'vue-js-modal'
Vue.use(VModal)
window.axios = axios
import store from './store/index.js';

window.Vue = Vue;
window.Sugar = require('Sugar')
window.$ = window.jQuery = $;


new Vue({
    el:'#app',
    store,
    router
})
