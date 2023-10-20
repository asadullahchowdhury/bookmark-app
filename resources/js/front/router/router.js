import {createRouter, createWebHistory} from "vue-router"


import Login from '../pages/auth/login.vue'
import Register from '../pages/auth/register.vue'
import Layout from "../pages/layout/layout.vue";
import Home from "../pages/home/home.vue";
import Forgot from "../pages/auth/forgot.vue";
import Profile from "../../portal/pages/profile/profile.vue"

const ROOT_URL = '/'

const routes = [



    {
        path: ROOT_URL, name: 'Layout', component: Layout,
        children: [
            // Authentication
            {path: ROOT_URL + 'login', name: 'Login', component: Login, meta: {title: 'Login'}},
            {path: ROOT_URL + 'register', name: 'Register', component: Register, meta: {title: 'Register'}},
            {path: ROOT_URL + 'forgot', name: 'Forgot', component: Forgot, meta: {title: 'Forgot'}},

            {path: ROOT_URL , name:'Home' ,component:Home, meta:{title: 'Home'}},

        ]
    }
]


const router = createRouter({
    history: createWebHistory(),
    routes
})


export default router;

