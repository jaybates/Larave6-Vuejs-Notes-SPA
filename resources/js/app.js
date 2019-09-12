require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App'
import Home from './views/Home'
import New from './views/New'
import Show from './views/Show'
import Edit from './views/Edit'
import Delete from './views/Delete'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/new',
            name: 'new',
            component: New
        },
        {
            path: '/edit/:id',
            name: 'edit',
            component: Edit
        },
        {
            path: '/show/:id',
            name: 'show',
            component: Show
        },
        {
            path: '/delete/:id',
            name: 'delete',
            component: Delete
        }
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});