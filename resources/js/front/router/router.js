import {createRouter, createWebHistory} from "vue-router"

//Authentication
import Login from '../pages/auth/login.vue'
import Register from '../pages/auth/register.vue'
import Forgot from "../pages/auth/forgot.vue";

//Main Layout
import Layout from "../pages/layout/layout.vue";

//Portal layout
import PortalLayout from "../pages/layout/portal-layout.vue"

//Home
import Home from "../pages/home/home.vue";

//Profile
import Profile from  "../pages/profile/profile.vue"

//URL
const ROOT_URL = '/';
const PORTAL_URL = "/portal/";

const routes = [



    {
        path: ROOT_URL, name: 'Layout', component: Layout,
        children: [
            // Authentication
            {path: ROOT_URL + 'login', name: 'Login', component: Login, meta: {title: 'Login'}},
            {path: ROOT_URL + 'register', name: 'Register', component: Register, meta: {title: 'Register'}},
            {path: ROOT_URL + 'forgot', name: 'Forgot', component: Forgot, meta: {title: 'Forgot'}},

            //Home page
            {path: ROOT_URL , name:'Home' ,component:Home, meta:{title: 'Home'}},

        ]
    },

    {
      path: PORTAL_URL, name: 'portalLayout', component: PortalLayout,
        children: [
            {path: ROOT_URL + 'profile', name:'Profile' ,component:Profile, meta:{title: 'Profile'}}
        ]
    }
]


const router = createRouter({
    history: createWebHistory(),
    routes
})


export default router;

