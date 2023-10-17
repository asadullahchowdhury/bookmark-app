import {createRouter, createWebHistory} from "vue-router"


import Login from '../pages/auth/login.vue'
import Register from '../pages/auth/register.vue'
import Layout from "../pages/layout/layout.vue";
import Home from "../pages/home/home.vue";

const ROOT_URL = '/'

const routes = [
    // Authentication
    {path: ROOT_URL + 'login', name: 'Login', component: Login, meta: {title: 'Login'}},
    {path: ROOT_URL + 'register', name: 'Register', component: Register, meta: {title: 'Register'}},


    {
        path: ROOT_URL, name: 'Layout', component: Layout,
        children: [
            {path: ROOT_URL + '', name:'home' ,component:Home, meta:{title: 'Home'}}
        ]
    }
]


const router = createRouter({
    history: createWebHistory(),
    routes
})


export default router;

