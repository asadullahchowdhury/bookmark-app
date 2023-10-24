<template>
    <div class="header" :class="{'dark' : layoutName === true}">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <router-link :to="{name:'Home'}" class="navbar-brand ps-3" :class="{'me-auto': profileData === null}">
                    <span>B</span>ook<span>M</span>ark
                </router-link>

                <button class="navbar-toggler py-2 text-white" type="button" data-bs-toggle="collapse"
                        v-if="profileData != null"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span><img :src="`/images/global/menu.svg`" alt="menu"></span>
                </button>

                <div class="collapse navbar-collapse bg-lg-light" id="navbarSupportedContent"
                     v-if="profileData != null">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 p-lg-0 p-4">
                        <li class="nav-item underline-anim">
                            <router-link :to="{name:'Dashboard'}" class="nav-link" aria-current="page"
                                         href="#">Home
                            </router-link>
                        </li>

                        <li class="nav-item underline-anim">
                            <a class="nav-link " href="javascript:void(0)">Settings</a>
                        </li>

                        <li class="nav-item d-lg-none d-block underline-anim">
                            <router-link :to="{name:'Profile'}" class="nav-link " href="javascript:void(0)">Your
                                Profile
                            </router-link>
                        </li>

                        <li class="nav-item d-lg-none d-block underline-anim">
                            <a class="nav-link" href="javascript:void(0)" @click="logout">
                                <span class="text-danger" v-if="logoutLoading === false">Logout</span>
                                <span class="text-danger" v-if="logoutLoading === true">Logging out...</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="" v-if="profileData === null">
                    <router-link :to="{name:'Login'}" class="text-decoration-none text-white underline-anim white">
                        Login
                    </router-link>
                </div>

                <div class="right-side-header pe-3 d-lg-block d-none">
                    <div class="user-wrap d-flex" v-if="profileData != null">
                        <div class="user-avatar-wrap shadow">
                            <img id="profile-avatar" v-if="profileData.media === null"
                                 :src="`https://ui-avatars.com/api/?name=`+ profileData.full_name" alt="user">
                            <img id="profile-avatar" v-if="profileData.media != null" :src="profileData.media.full_file_path" alt="user">
                        </div>
                        <!--                        <img class="user-chevron ms-2" src="/images/global/chevron-down.svg" alt="chevron-down">-->

                        <div class="header-dropdown-wrap position-relative">
                            <ul class="header-dropdown shadow rounded-4">
                                <li>
                                    <router-link :to="{name:'Profile'}" href="javascript:void(0)">Your Profile
                                    </router-link>
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
import {useRoute} from 'vue-router'

const toaster = createToaster({
    position: 'top-right',
});

export default {
    data() {
        return {
            profileLoading: false,
            logoutLoading: false,
            profileData: null,
            route: '',
            layoutName: false,

        }
    },

    mounted() {
        //defines the route for adding class in header for dark and light version.
        this.route = useRoute();
        const routeName = this.route.matched.some(route => route.name === 'portalLayout');
        this.layoutName = routeName;

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
