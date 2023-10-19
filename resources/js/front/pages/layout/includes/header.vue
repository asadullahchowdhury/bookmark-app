<template>
    <div class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#"><span>B</span>ook<span>M</span>ark</a>

                <button class="navbar-toggler py-2 text-white" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
<!--                    <span class="navbar-toggler-icon"></span>-->
                    <span><img src="/images/global/menu.svg" alt="menu"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item underline-anim white">
                            <router-link :to="{name:'Home'}" class="nav-link" aria-current="page"
                                         href="#">Home
                            </router-link>
                        </li>

                        <li class="nav-item underline-anim white">
                            <a class="nav-link" href="javascript:void(0)">
                                Bookmarks
                            </a>
                        </li>
                        <li class="nav-item underline-anim white">
                            <a class="nav-link " href="javascript:void(0)">Settings</a>
                        </li>

                        <li class="nav-item d-lg-none d-block underline-anim white">
                            <router-link :to="{name:'Profile'}" class="nav-link " href="javascript:void(0)">Your Profile</router-link>
                        </li>

                        <li class="nav-item d-lg-none d-block underline-anim white">
                            <a class="nav-link" href="javascript:void(0)">Logout</a>
                        </li>
                    </ul>
                </div>

                <div class="right-side-header d-lg-block d-none">

                    <div class="user-wrap d-flex">
                        <div class="user-avatar-wrap shadow">
                            <img :src="`/images/global/book-cover.jpg`" alt="user">
                        </div>
                        <img class="user-chevron ms-2" src="/images/global/chevron-down.svg" alt="chevron-down">

                        <div class="header-dropdown-wrap position-relative">
                            <ul class="header-dropdown rounded-4">
                                <li>
                                    <router-link :to="{name:'Profile'}" href="javascript:void(0)">Your Profile</router-link>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Settings</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" @click="logout">
                                        <span class="text-danger" v-if="logoutLoading === false">Logout</span>
                                        <span class="text-danger" v-if="logoutLoading === true">Logging out...</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </nav>
    </div>
</template>


<script>
import apiService from "../../../services/apiService.js";
import apiRoutes from "../../../services/apiRoutes.js";
import {createToaster} from "@meforma/vue-toaster";
const toaster = createToaster({
    position: 'top-right',
});

export default {
    data() {
        return {
            profileLoading: false,
            logoutLoading: false,
            profileData: {}
        }
    },

    mounted() {
        this.getProfile()
    },

    methods: {
        getProfile() {
            this.profileLoading = true;
            apiService.ClearErrorHandler();
            apiService.GET(apiRoutes.ProfileDetails, (res) => {
                this.profileLoading = false;
                if (res.status === 200) {
                    this.profileData = res.data
                    this.profileData.full_name = this.profileData.first_name + ' ' + this.profileData.last_name;
                    const headerAvatar = document.querySelector('.user-avatar-wrap img');
                    headerAvatar.src = this.profileData.avatar !== null ? this.profileData.media.full_file_path : `https://ui-avatars.com/api/?name=${this.profileData.full_name}`;
                }
            })

        },


        logout() {
            this.logoutLoading = true;
            apiService.GET(apiRoutes.Logout, (res) => {
                this.logoutLoading = false;
                if (parseInt(res.status) === 200) {
                    toaster.info(res.msg)
                    window.location.reload();
                }
            })
        }
    }
}
</script>
