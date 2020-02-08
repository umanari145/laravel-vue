
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap')

import Vue from 'vue'
import router from "@/router.js"
import sidenavi from "@/component/layout/sidenavi"
import BootstrapVue from 'bootstrap-vue'
import VModal from 'vue-js-modal'
import DrawerLayout from 'vue-drawer-layout'
import basic from "@/component/layout/basic"

Vue.component('basic', basic)
Vue.component('sidenavi', sidenavi)
Vue.use(DrawerLayout)
Vue.use(BootstrapVue)
Vue.use(VModal)
import store from "@/store/index.js"

window.Vue = Vue;
window.Sugar = require('Sugar')
window.$ = window.jQuery = $;


new Vue({
    el:'#app',
    store,
    router
})
