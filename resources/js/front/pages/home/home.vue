<template>
    <div class="d-flex align-items-center ">
        home
        <router-link :to="{name:'Login'}">Login</router-link>
        <a href="javascript:void(0)" @click="logout">Logout</a>
    </div>
</template>


<script>
import apiRoutes from "../../services/apiRoutes.js";
import apiService from "../../services/apiService.js";
import router from "@/front/router/router.js";
export default {
    data(){
        return{
            loading:false
        }
    },
    methods:{
        logout(){
            this.loading = true;
            apiService.POST(apiRoutes.Logout,{},(res)=>{
                this.loading = false;
                if (parseInt(res.status) === 200){
                    router.push({name: 'Login'})
                    window.location.reload();
                }
            })
        }
    }
}
</script>
