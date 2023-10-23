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

    },

    mounted() {

    },
    components: {
        Header,
    }
}
</script>
