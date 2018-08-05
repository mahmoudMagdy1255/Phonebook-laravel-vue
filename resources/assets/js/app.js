
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'

Vue.use(VueRouter);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

let myHeader = require('./components/myHeader.vue');
let Home = require('./components/Home.vue');
let About = require('./components/About.vue');

const routes = [
	{
		path:'/new-phonebook/public/home',
		component:Home
	},
	{
		path:'/new-phonebook/public/about',
		component:About
	},
];

const router = new VueRouter({
	routes,
	mode:'history'
});

const app = new Vue({
    el: '#app',
    components:{myHeader},
    router
});
