<template>
    <Header/>
    <router-view/>
</template>

<script>
import Header from "../../pages/layout/includes/header.vue";
import router  from "../../router/router.js";

export default {
    data() {
        return {
            UserInfo: window.core.UserInfo
        }
    },
    created() {
        if(this.UserInfo == null){
            router.push({name: 'Login'})
        }
    },
    components: {
        Header,
    }
}
</script>
