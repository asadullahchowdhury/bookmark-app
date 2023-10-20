import 'bootstrap/dist/css/bootstrap.css'
import bootstrap from 'bootstrap/dist/js/bootstrap.bundle.min'

window.bootstrap = bootstrap

import axios from "axios";
import Toaster from "@meforma/vue-toaster";

/*
* *******************************************************************
*  Jquery
* *******************************************************************
*/
import jQuery from "jquery";

const $ = jQuery;
window.$ = $;


import app from "./app.vue";
import {createApp} from "vue";
import router from "./router/router";


createApp(app)
    .use(router, axios, Toaster)
    .mount('#app')

