<template>
    <div class="homepage">
        <!--Banner section start-->
        <div class="home-banner" style="background-image: url('/images/auth/bookmark.jpg')">
            <div class="home-banner-content px-4">
                <h1 class="banner-title display-3">Discover Your Next Chapter -</h1>
                <br>
                <p class="fs-4">Where Every Bookmark Unveils a New Adventure</p>

                <button class="btn btn-theme mt-3">Learn More.</button>
            </div>
        </div>
        <!--Banner section end  -->

        <!--Service section start-->
        <div class="section-wrap py-5">
            <div class="container">
                <div class="display-5 mb-3">We provide services</div>
                <p class="fs-5 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet<br> dolore
                    enim explicabo ipsa molestiae natus sequi soluta?</p>

                <div class="row">
                    <div class="col-md-4">
                        <div class="service-box">
                            <div class="icon-box shadow">
                                <img :src="`/images/global/heart-white.png`" alt="heart white">
                            </div>
                            <div class="content">
                                <a href="javascript:void(0)" class="service-title">Carefully Crafted Design</a>
                                <small>
                                    <p class="mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Modi,
                                        molestias, velit.</p>
                                </small>
                                <small> <a href="javascript:void(0)" class="underline-anim text-theme">Learn More...</a></small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="service-box">
                            <div class="icon-box shadow">
                                <img :src="`/images/global/leaf-white.png`" alt="leaf white">
                            </div>
                            <div class="content">
                                <a href="javascript:void(0)" class="service-title">Clean and Modern Code</a>
                                <small>
                                    <p class="mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Modi,
                                        molestias, velit.</p>
                                </small>
                                <small> <a href="javascript:void(0)" class="underline-anim text-theme">Learn More...</a></small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="service-box">
                            <div class="icon-box shadow">
                                <img :src="`/images/global/money-bag-white.png`" alt="money bag">
                            </div>
                            <div class="content">
                                <a href="javascript:void(0)" class="service-title">Responsive designs</a>
                                <small>
                                    <p class="mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Modi,
                                        molestias, velit.</p>
                                </small>
                                <small> <a href="javascript:void(0)" class="underline-anim text-theme">Learn More...</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Service section end  -->


        <!--what we do section start-->
        <div class="section-wrap py-5 container">
            <div class="row">
                <div class="col-md-5">
                    <img :src="`/images/global/book-cover.jpg`" class="img-fluid h-100" alt="what-we do">
                </div>
                <div class="col-md-7">
                    <div class="what-we-do-content ps-md-5 pt-3">
                        <div class="what-we-do-title display-4 mb-3">Who We Are & <br> What We Do</div>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod <span
                            class="text-theme">tincidunt ut laoreet</span> dolore.</p>
                        <small>
                            <p class="text-muted">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore.
                                Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.
                                Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                        </small>

                        <button type="button" class="btn btn-theme mt-4">Read more
                            <span class="ms-2"><img :src="`/images/global/arrow-right.svg`" alt="arrow-right"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--what we do section end  -->
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
