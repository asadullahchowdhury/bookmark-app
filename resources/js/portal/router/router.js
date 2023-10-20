import {createRouter, createWebHistory} from "vue-router";


//=====================
// Pages
//=====================
import Layout from "../pages/layout/layout.vue";
import Dashboard from "../pages/dashboard/dashboard.vue";
import Profile from "../pages/profile/profile.vue";



const ROOT_URL = "/portal/";


const routes = [


    {
        path: ROOT_URL, name: 'Layout', component: Layout,
        children: [
            {path: ROOT_URL , name:'Dashboard' ,component:Dashboard, meta:{title: 'Dashboard'}},
            {path: ROOT_URL + 'profile', name:'Profile' ,component:Profile, meta:{title: 'Profile'}}
        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
