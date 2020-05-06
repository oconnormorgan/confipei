import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/Home.vue';

import Dashboard from './components/Dashboard.vue'


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
        },
        // otherwise redirect to home
        { path: '*', redirect: '/' }
    ]
})

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({}),
    router: Routes,
    components: { Home }
})
export default new Vuetify(app);