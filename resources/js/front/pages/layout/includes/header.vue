<template>
    <div class="header" style="background-image: url('/images/global/cover-2.jpeg')">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#"><span>B</span>ook<span>M</span>ark</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link :to="{name:'Home'}" class="nav-link underline-anim white" aria-current="page"
                                         href="#">Home
                            </router-link>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                </div>

                <div class="right-side-header">

                    <div class="user-wrap d-flex">
                        <div class="user-avatar-wrap shadow">
                            <img :src="`/images/global/book-cover.jpg`" alt="user">
                        </div>
                        <img class="user-chevron ms-2" src="/images/global/chevron-down.svg" alt="chevron-down">

                        <div class="header-dropdown-wrap position-relative">
                            <ul class="header-dropdown rounded-4">
                                <li>
                                    <a href="javascript:void(0)">Your Profile</a>
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
