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
                            <img class="img-fluid w-75 " src="/images/global/advantage.svg" alt="advantage-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Our advantages section end  -->


        <!--our Customer section start-->
        <div class="section-wrap py-5">
            <div class="container">
                <div class="display-4 text-center mb-5">Our <span class="text-theme">Customers Says</span> About Us
                </div>

                <div class="feedback-content owl-carousel">
                    <div class="each-feedback border rounded-4 p-4 text-center">
                        <div class="client-wrap">
                            <div class="client-img d-inline-block">
                                <img :src="`/images/global/testimonial-1.png`" class="img-fluid" alt="testimonial 1">
                            </div>
                            <div class="client-info">
                                <div class="name">Anna Taylor</div>
                                <p class="comp text-muted small">Company inc</p>
                            </div>
                            <div class="text-muted">"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita
                                laudantium provident quibusdam ratione repellendus. A aliquid assumenda blanditiis
                                corporis facilis nobis odio quis, quos reprehenderit, repudiandae rerum sapiente
                                voluptas voluptate!"
                            </div>
                        </div>
                    </div>

                    <div class="each-feedback border rounded-4 p-4 text-center">
                        <div class="client-wrap">
                            <div class="client-img d-inline-block">
                                <img :src="`/images/global/testimonial-2.png`" class="img-fluid" alt="testimonial 1">
                            </div>
                            <div class="client-info">
                                <div class="name">William json</div>
                                <p class="comp text-muted small">Company inc</p>
                            </div>
                            <div class="text-muted">"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita
                                laudantium provident quibusdam ratione repellendus. A aliquid assumenda blanditiis
                                corporis facilis nobis odio quis, quos reprehenderit, repudiandae rerum sapiente
                                voluptas voluptate!"
                            </div>
                        </div>
                    </div>

                    <div class="each-feedback border rounded-4 p-4 text-center">
                        <div class="client-wrap">
                            <div class="client-img d-inline-block">
                                <img :src="`/images/global/testimonial-3.png`" class="img-fluid" alt="testimonial 1">
                            </div>
                            <div class="client-info">
                                <div class="name">Abby white</div>
                                <p class="comp text-muted small">Company inc</p>
                            </div>
                            <div class="text-muted">"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita
                                laudantium provident quibusdam ratione repellendus. A aliquid assumenda blanditiis
                                corporis facilis nobis odio quis, quos reprehenderit, repudiandae rerum sapiente
                                voluptas voluptate!"
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--our Customer section end  -->
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
    mounted() {

        this.carousel()

    },
    methods: {
        carousel() {
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
        }
    }
}
</script>
