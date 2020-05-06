/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// 0. If using a module system (e.g. via vue-cli), import Vue and VueRouter
// and then call `Vue.use(VueRouter)`.

window.Vue = require('vue');
import Route from './router.js';
import layout from './layout/layout';
import vuetify from './src/plugins/vuetify.js' // path to vuetify export

Vue.component('layout', require('./layout/layout'));

const app = new Vue({
  router : Route,
  vuetify,
  components: { layout }
}).$mount('#app')

// Now the app has started!

