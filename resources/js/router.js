import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/Home.vue';
import Dashboard from './components/Dashboard.vue'
import Login from './login/Login.vue'


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
            path: '/login',
            name: 'login',
            component: Login,
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

export default router;