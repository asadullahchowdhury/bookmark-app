<template>
    <Header/>
    <router-view/>
</template>

<script>
import router from '../../router/router'
import Header from '../layout/includes/header.vue'
export default {
    data() {
        return {
            UserInfo: window.core.UserInfo
        }
    },
    components:{
        Header
    },
    mounted() {

    },
    created() {
        //if user info is null. it will redirect you to login page.
        if(this.UserInfo == null){
            router.push({name: 'Login'});
        }
    },
}
</script>
