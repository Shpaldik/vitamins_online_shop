import {createRouter, createWebHistory} from 'vue-router';
import Main from '../src/views/Main.vue';
import Policy from '../src/views/Policy.vue';
import Products from '../src/views/Products.vue';

const routes = [
    {
        path: '/',
        name: 'Главная',
        component: Main,
    },
    {
        path: '/policy',
        name: 'Политика конфиденциальности',
        component: Policy,
    },
    {
        path: '/products',
        name: 'Политика конфиденциальности',
        component: Products,
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition){
        return savedPosition || {top: 0}
    }
})

export default router;