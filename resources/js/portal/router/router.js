import {createRouter, createWebHistory} from "vue-router";


//=====================
// Pages
//=====================
import Layout from "../pages/layout/layout.vue";



const ROOT_URL = "/portal";


const routes = [


    {
        path: ROOT_URL, name: 'Layout', component: Layout,
        children: [

        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
