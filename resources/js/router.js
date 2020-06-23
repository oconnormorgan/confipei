import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/Home.vue';
import DashboardProducteur from './components/DashboardProducteur.vue';
import Dashboard from './components/Dashboard.vue';
import Login from './login/Login.vue';
import Panier from './components/panier/PanierListe.vue';
import PanierConfirm from './components/panier/ConfirmPanier.vue';
import Producteurs from './components/dashboard/Producteurs.vue';

import { Role } from './_helpers/role';
import { authenticationService } from './_services/authentication.service';


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            meta: { authorize: [] }
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: { authorize: [] }
        },
        {
            path: '/panier',
            name: 'panier',
            component: Panier,
            meta: { authorize: [] }
        },
        {
            path: '/panier/confirmation',
            name: 'panierConfirm',
            component: PanierConfirm,
            meta: { authorize: [] }
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: { authorize: [Role.Admin] }
        },
        {
            path: '/dashboard/producteurs',
            name: 'producteurs',
            component: Producteurs,
            meta: { authorize: [Role.Admin] }
        },
        {
            path: '/dashboardproducteur',
            name: 'dashboardproducteur',
            component: DashboardProducteur,
            meta: { authorize: [Role.Producteur] }
        },
    ]
})

router.beforeEach((to, from, next) => {

    // redirect to login page if not logged in and trying to access a restricted page
    const { authorize } = to.meta;

    if (authorize && !_.isEmpty(authorize)) {

        const currentUser = authenticationService.currentUserValue;
        // console.log(authenticationService.currentUserValue);
        if (!currentUser) {
            // not logged in so redirect to login page with the return url
            return next({ path: "/login", query: { returnUrl: to.path } });
        }

        // check if route is restricted by role
        if (authorize.length && !authorize.includes(currentUser.role.intitule)) {
            // role not authorised so redirect to home page
            return next({ path: "/" });
        }
    }

    return next();
});

export default router;