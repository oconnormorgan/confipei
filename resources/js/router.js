import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/Home.vue';
import Dashboard from './components/Dashboard.vue'
import Login from './login/Login.vue'
import { Role } from '../js/_helpers/role.js';
import { authenticationService } from './_services/authentication.service'


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
            meta: { authorize: [] }
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: { authorize: [Role.admin] }
        },
        // otherwise redirect to home
        { path: '*', redirect: '/' }
    ]
})

router.beforeEach((to, from, next) => {

    // redirect to login page if not logged in and trying to access a restricted page
    const { authorize } = to.meta;

    if (authorize && !_.isEmpty(authorize)) {

        const currentUser = authenticationService.currentUserValue;

        if (!currentUser) {
            // not logged in so redirect to login page with the return url
            return next({ path: "/login", query: { returnUrl: to.path } });
        }
        // check if route is restricted by role
        if (authorize.length && !authorize.includes(currentUser.role.name)) {
            // role not authorised so redirect to home page
            return next();
        }
    }
    next();
});

export default router;