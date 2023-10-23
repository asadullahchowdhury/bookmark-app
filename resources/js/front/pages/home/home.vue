<template>
    <div class="homepage">
        <!--Banner section start-->
        <div class="home-banner" style="background-image: url('/images/auth/bookmark.jpg')">
            <div class="home-banner-content">
                <h1 class="banner-title display-3">Discover Your Next Chapter -</h1>
                <br>
                <p class="fs-4">Where Every Bookmark Unveils a New Adventure</p>

                <button class="btn btn-theme mt-3">Learn More.</button>
            </div>
        </div>
        <!--Banner section end  -->

<!--Service section start-->
        
<!--Service section end  -->
    </div>
</template>


<script>
import apiRoutes from "../../services/apiRoutes.js";
import apiService from "../../services/apiService.js";
import router from "../../router/router.js";

export default {
    data() {
        return {
            UserInfo: window.core.UserInfo,
        }
    },
    created() {
        if (this.UserInfo != null) {
            router.push({name: 'Dashboard'});
        }
    },
    methods: {}
}
</script>
