<template>
    <div class="homepage">
        <!--Banner section start-->
        <div class="home-banner" style="background-image: url('/images/auth/bookmark.jpg')">
            <div class="home-banner-content px-4">
                <h1 class="banner-title display-3">Discover Your Next Chapter -</h1>
                <br>
                <p class="fs-4">Where Every Bookmark Unveils a New Adventure</p>

                <router-link :to="{name:'Register'}" class="btn btn-theme mt-3 ">Join now
                    <span class="ms-2"><img :src="`/images/global/arrow-right.svg`" alt="arrow-right"></span>
                </router-link>
            </div>
        </div>
        <!--Banner section end  -->

        <!--Service section start-->
        <div class="section-wrap py-5">
            <div class="container">
                <div class="display-5 mb-3">We provide services</div>
                <p class="fs-5 mb-5">Our Online bookmark services store and organize web links for later access, <br>
                    enabling categorization, sharing, and easy retrieval of saved URLs.</p>

                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="service-box">
                            <div class="icon-box shadow">
                                <img :src="`/images/home/internet-connection.png`" alt="store in web">
                            </div>
                            <div class="content">
                                <a href="javascript:void(0)" class="service-title">Saving Web Links</a>
                                <small>
                                    <p class="mb-0 text-muted">Bookmark services enable users to save URLs of web pages
                                        they want to revisit later. This is particularly useful for keeping track of
                                        websites, articles, or online resources that you may need for research,
                                        reference, or personal interest.</p>
                                </small>
                                <small> <a href="javascript:void(0)" class="underline-anim text-theme">Learn More...</a></small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="service-box">
                            <div class="icon-box shadow">
                                <img :src="`/images/home/layers.png`" alt="organize">
                            </div>
                            <div class="content">
                                <a href="javascript:void(0)" class="service-title">Organization</a>
                                <small>
                                    <p class="mb-0 text-muted">Users can categorize and organize their bookmarks into
                                        folders or tags to make it easier to find saved links. This helps maintain a
                                        structured and accessible collection of bookmarks.</p>
                                </small>
                                <small> <a href="javascript:void(0)" class="underline-anim text-theme">Learn More...</a></small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="service-box">
                            <div class="icon-box shadow">
                                <img :src="`/images/home/access-control.png`" alt="Accessibility">
                            </div>
                            <div class="content">
                                <a href="javascript:void(0)" class="service-title">Accessibility</a>
                                <small>
                                    <p class="mb-0 text-muted">Allowing users to access their saved bookmarks from different devices and browsers. This ensures that you can access your bookmarks from your
                                        computer, smartphone, or tablet.</p>
                                </small>
                                <small> <a href="javascript:void(0)" class="underline-anim text-theme">Learn More...</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Service section end  -->

        <!--Our advantages section start-->
        <div class="section-wrap py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="our-advantage-title display-4 mb-3">Our Advantages</div>
                        <div class="display-6 fs-4 text-muted">Why Choose Us for Your Bookmarking Needs</div>
                        <ul class="advantage-list list-unstyled p-0 mt-4">
                            <li class="d-flex mb-3">
                                <span class="icon"><img :src="`/images/global/check-orange-theme.svg`"
                                                        alt="check orange"></span>

                                <div class="list-text ps-3">
                                    <strong>Organize Your Digital Life:</strong> <span class="text-muted"> Easily manage and
                                    organize your web
                                    links, articles, and online resources in one central location.</span>
                                </div>
                            </li>

                            <li class="d-flex mb-3">
                                <span class="icon"><img :src="`/images/global/check-orange-theme.svg`"
                                                        alt="check orange"></span>

                                <div class="list-text ps-3">
                                    <strong>Access Anywhere:</strong> <span class="text-muted"> Access your bookmarks from any device with an internet connection, ensuring you always have your favorite links at your fingertips.</span>
                                </div>
                            </li>


                            <li class="d-flex mb-3">
                                <span class="icon"><img :src="`/images/global/check-orange-theme.svg`"
                                                        alt="check orange"></span>

                                <div class="list-text ps-3">
                                    <strong>Sync Across Devices:</strong> <span class="text-muted"> Synchronize your bookmarks across multiple devices, keeping your collections up to date and consistent.</span>
                                </div>
                            </li>


                            <li class="d-flex mb-3">
                                <span class="icon"><img :src="`/images/global/check-orange-theme.svg`"
                                                        alt="check orange"></span>

                                <div class="list-text ps-3">
                                    <strong>Efficient Categorization:</strong> <span class="text-muted"> Create folders and tags to categorize your bookmarks, making it simple to find what you need quickly.</span>
                                </div>
                            </li>

                            <li class="d-flex mb-3">
                                <span class="icon"><img :src="`/images/global/check-orange-theme.svg`"
                                                        alt="check orange"></span>

                                <div class="list-text ps-3">
                                    <strong>Smart Search:</strong> <span class="text-muted"> Enjoy a powerful search function that helps you find specific bookmarks in seconds, even within extensive collections.</span>
                                </div>
                            </li>

                        </ul>

                        <button type="button" class="btn btn-theme mt-4">Read more
                            <span class="ms-2"><img :src="`/images/global/arrow-right.svg`" alt="arrow-right"></span>
                        </button>
                    </div>
                    <div class="col-md-5">
                        <div class="w-100 mt-3 mt-md-0 h-100 d-flex justify-content-center">
                            <img class="img-fluid w-75 " :src="`/images/global/advantage.svg`" alt="advantage-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Our advantages section end  -->


        <!--ready to enjoy section start-->
        <div class="section-wrap py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ready-content text-center w-100 h-100 p-5">
                            <div class="display-4 mb-4">Are You Ready to Enjoy?</div>
                            <p class="text-muted">Are you ready to enjoy a world of limitless possibilities? Dive into
                                the realm of bookmarks, where every click opens a new door to discovery. Whether it's
                                your favorite articles, essential resources, or treasured websites, our bookmark
                                template is your key to effortless organization and instant access. Embrace the
                                convenience of curated collections, smart categorization, and seamless synchronization
                                across all your devices. Your digital adventure awaits. Are you ready to embark?</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="w-100 mt-3 mt-md-0 h-100 d-flex justify-content-center">
                            <img class="img-fluid w-75 " :src="`/images/global/ready-to-enjoy.svg`" alt="ready-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--ready to enjoy section end  -->


        <!--newsletter section start-->
<!--        <div class="section-wrap">
            <div class="newsletter-section d-flex justify-content-center align-items-center flex-column"
                 style="background-image: url('/images/global/newsletter-cover.jpg')">
                <div class="container">
                    <div class="p-md-5 text-center ">
                        <div class="display-4 fs-1 text-white mb-5">Sign Up For Our Monthly Newsletter</div>

                        <form action="" class="newsletter-form d-flex justify-content-center align-items-center">
                            <div class="input-grp">
                                <input type="text" class="form-control form-control-lg rounded-pill shadow-none ps-5"
                                       placeholder="Your E-mail Address">
                                <button type="button" class="btn btn-lg btn-theme btn-theme-absolute">Subscribe</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>-->
        <!--newsletter section end  -->


<!--footer start-->
        <Footer/>
<!--footer end  -->

    </div>
</template>


<script>
import apiRoutes from "../../services/apiRoutes.js";
import apiService from "../../services/apiService.js";
import router from "../../router/router.js";
import Footer from "../../pages/layout/includes/footer.vue"


export default {
    data() {
        return {
            UserInfo: window.core.UserInfo,
        }
    },
    components:{
        Footer,
    },
    created() {
        if (this.UserInfo != null) {
            router.push({name: 'Dashboard'});
        }
    },
    mounted() {

        this.feedBackCarousel()
        this.partnersCarousel()
    },
    methods: {
        feedBackCarousel() {
            $('.feedback-content').owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        },

        partnersCarousel() {
            $('.partners-wrap').owlCarousel({
                loop: true,
                margin: 100,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        }

    }
}
</script>
