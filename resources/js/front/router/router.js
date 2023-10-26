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

// Dashboard
import Dashboard from "../pages/dashboard/dashboard.vue"

// History
import History from "../pages/history/history.vue"

// Bookmark
import Bookmark from "../pages/bookmark/bookmark.vue";

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
            {path: PORTAL_URL , name:'Dashboard' ,component:Dashboard, meta:{title: 'Dashboard'}},
            {path: PORTAL_URL + 'profile', name:'Profile' ,component:Profile, meta:{title: 'Profile'}},
            {path: PORTAL_URL + 'bookmark', name:'Bookmark' ,component:Bookmark, meta:{title: 'Bookmark'}},
            {path: PORTAL_URL + 'history', name:'History' ,component:History, meta:{title: 'Login History'}}
        ]
    }
]


const router = createRouter({
    history: createWebHistory(),
    routes
})


export default router;

