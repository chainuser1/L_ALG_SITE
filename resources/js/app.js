
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.$ = require('jquery')
window.Vue = require('vue');
import Vue from 'vue'
import VueRouter from 'vue-router';
import Notification from 'vue-notification';
import VueAxios from 'vue-axios';
import axios from 'axios';
import Toasted from 'vue-toasted'


Vue.use(VueAxios, axios);//use to make asynchronous request to server 
Vue.use(VueRouter);
Vue.use(Notification);
Vue.use(Toasted, {
  duration: 9000,
  action : {
    text : 'Cancel',
    onClick : (e, toastObject) => {
        toastObject.goAway(0);
    }
  }
})
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('dashboard-quickview', require('./components/AdminDashboardConfig1.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    
});

const db = new Vue({
	el: '#dashboard-admin'
})