
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap')
import Vue from 'vue'
//const Vue = require('vue')
import checkPref from './components/CheckPref.vue'

//windowオブジェクト内でセットしないとpublicのjsで使えない
window.Vue = Vue;
window.Sugar = require('Sugar')
Vue.component('pref-component', checkPref)

new Vue({
    el:'#app'
})
