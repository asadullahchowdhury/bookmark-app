<template>
    <Header/>
    <router-view v-if="!isLoading"/>
    <preloader :class="{'hide' : !isLoading }"/>
</template>

<script>
import Header from "../../pages/layout/includes/header.vue";
import router from "../../router/router.js";
import Preloader from "@/front/pages/layout/includes/preloader.vue";

export default {
    data() {
        return {
            UserInfo: window.core.UserInfo,
            isLoading: true,
        }
    },
    created() {

    },

    mounted() {
        this.hidePreloader();
    },
    components: {
        Preloader,
        Header,
    },
    methods: {
        // Simulate loading of data or waiting for something to complete
        hidePreloader() {
            // Simulate loading time (e.g., fetching data)
            setTimeout(() => {
                this.isLoading = false; // Hide preloader when loading is done
            }, 1000); // Preloader will be visible for 3 seconds
        }
    }
}
</script>
