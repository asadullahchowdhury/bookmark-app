<template>
    <Header/>
    <router-view/>
    <Footer/>
</template>

<script>
import Header from "../../pages/layout/includes/header.vue";
import Footer from "../../pages/layout/includes/footer.vue"
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
        Header,Footer,
    }
}
</script>
