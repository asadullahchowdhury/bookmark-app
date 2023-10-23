<template>
    <div class="auth">
        <div class="auth-page-wrap" style="background-image: url('/images/auth/bookmark.jpg')">
            <div class="auth-box">
                <!--Authentication form start-->
                <form  class="auth-form p-4" autocomplete="off" @submit.prevent="login">

                    <div class="box-title display-6 mb-4 text-center"><span>B</span>ookmark <span>A</span>pp</div>

                    <div class="text-center fs-3 text-white mb-4">Login here</div>

                    <div class="error-report-g text-center"></div>

                    <div class="form-group mb-3">
                        <input type="email" class="form-control shadow-none" placeholder="Email Address" name="email"
                               v-model="loginParam.email"
                               autocomplete="off">
                        <img class="placeholder-icon" :src="`/images/global/mail.svg`" alt="mail">
                        <div class="error-report ms-2"></div>
                    </div>

                    <div class="form-group mb-3">
                        <input :type="passwordFieldType" class="form-control shadow-none" placeholder="Password"
                               v-model="loginParam.password"
                               name="password" autocomplete="off">
                        <img class="placeholder-icon" :src="`/images/global/lock.svg`" alt="lock">
                        <div class="eye-wrap" @click="passwordVisibility()">
                            <img v-if="passwordFieldType === 'text' " :src="`/images/global/eye.svg`" alt="eye">
                            <img v-if="passwordFieldType === 'password' " :src="`/images/global/eye-off.svg`"
                                 alt="eye-off">
                        </div>
                        <div class="error-report ms-2"></div>
                    </div>

                    <div class="form-group small d-flex justify-content-between ms-2">
                        <div class="checkbox-wrapper">
                            <input class="inp-cbx" id="remember" type="checkbox"/>
                            <label class="cbx" for="remember">
                                <span>
                                    <svg width="12px" height="10px" viewbox="0 0 12 10">
                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg>
                                </span>
                                <span class="text-white">Remember Me?</span>
                            </label>
                        </div>

                        <router-link :to="{name:'Forgot'}" class="text-danger fw-semibold underline-anim red">Forgot
                            Password?
                        </router-link>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-theme w-100">
                            Login
                            <span class="ms-2" v-if="loginLoading === false"><img :src="`/images/global/arrow-right.svg`" alt="arrow-right"></span>
                            <span class="ms-2 btn-loading" v-if="loginLoading === true"></span>
                        </button>
                    </div>

                    <div class="bottom-text text-center mt-4 text-white">
                        Not a member?
                        <router-link :to="{name:'Register'}" href="javascript:void(0)"
                                     class="underline-anim text-white white fw-semibold ms-2">Create an Account
                        </router-link>
                    </div>
                </form>
                <!--Authentication form end  -->
            </div>
        </div>
    </div>
</template>

<script>
import apiRoutes from "../../services/apiRoutes.js";
import apiService from "../../services/apiService";
import router from '../../router/router'
import {createToaster} from "@meforma/vue-toaster";
const toaster = createToaster({
    position: 'top-right',
});
export default {
    data() {
        return {
            passwordFieldType: 'password',
            loginLoading: false,
            loginParam: {
                email: '',
                password: '',
            },
            UserInfo: window.core.UserInfo,
        }
    },
    mounted() {

    },
    created() {
        if(this.UserInfo != null){
            router.push({name: 'Dashboard'});
        }
    },
    methods: {

        /*==========================================
        * Password Visibility
        ============================================*/
        passwordVisibility() {
            if (this.passwordFieldType === 'password') {
                this.passwordFieldType = 'text';
            } else {
                this.passwordFieldType = 'password';
            }
        },


        /*==========================================
        * Login Api
        ============================================*/
        login() {
            this.loginLoading = true;
            apiService.POST(apiRoutes.Login, this.loginParam, (res) => {
                this.loginLoading = false;
                if (parseInt(res.status) === 200) {
                    console.log(res.status);
                    toaster.info(res.msg)
                    window.location.reload()
                } else {
                    apiService.ErrorHandler(res.errors)
                }
            })
        }
    }
}
</script>
