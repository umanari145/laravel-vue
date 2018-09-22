
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

import Vue from 'vue'

Vue.component('example', require('./components/Example.vue'));
Vue.component('sample', require('./components/Sample.vue'));


const app = new Vue({
    el:"#app"
})

const sample = new Vue({
    el:"#test"
})
