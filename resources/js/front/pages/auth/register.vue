<template>
    <div class="auth">
        <div class="auth-page-wrap">
            <div class="auth-box">
                <form @submit.prevent="register()" class="auth-form p-4" autocomplete="off">
                    <div class="box-title display-6 mb-4 text-center"><span>B</span>ookmark <span>A</span>pp</div>
                    <div class="text-center fs-3 text-white mb-4">Register here</div>

                    <div class="form-group mb-3">
                        <input type="text" class="form-control shadow-none" placeholder="First Name" name="first_name"
                               v-model="registerParam.first_name"
                               autocomplete="off">
                        <img class="placeholder-icon" :src="`/images/global/user.svg`" alt="f-name">
                        <div class="error-report ms-2"></div>
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" class="form-control shadow-none" placeholder="Last Name" name="last_name"
                               v-model="registerParam.last_name"
                               autocomplete="off">
                        <img class="placeholder-icon" :src="`/images/global/type.svg`" alt="t">
                        <div class="error-report ms-2"></div>
                    </div>

                    <div class="form-group mb-3">
                        <input type="email" class="form-control shadow-none" placeholder="Email Address" name="email"
                               v-model="registerParam.email"
                               autocomplete="off">
                        <img class="placeholder-icon" :src="`/images/global/mail.svg`" alt="mail">
                        <div class="error-report ms-2"></div>
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" class="form-control shadow-none" placeholder="Phone" name="phone" @keypress="checkNumber($event)"
                               v-model="registerParam.phone"
                               autocomplete="off">
                        <img class="placeholder-icon" :src="`/images/global/voicemail.svg`" alt="phone">
                        <div class="error-report ms-2"></div>
                    </div>

                    <div class="form-group mb-3">
                        <input :type="passwordFieldType" class="form-control shadow-none" placeholder="Password"
                               v-model="registerParam.password"
                               name="password" autocomplete="off">
                        <img class="placeholder-icon" :src="`/images/global/lock.svg`" alt="lock">
                        <div class="error-report ms-2"></div>
                    </div>

                    <div class="form-group mb-3">
                        <input :type="passwordFieldType" class="form-control shadow-none" placeholder="Confirm Password"
                               v-model="registerParam.password_confirmation"
                               name="password_confirmation" autocomplete="off">
                        <img class="placeholder-icon" :src="`/images/global/lock.svg`" alt="lock">
                        <div class="error-report ms-2"></div>
                    </div>

                    <div class="form-group ms-2">
                        <div class="checkbox-wrapper">
                            <input class="inp-cbx" id="remember" type="checkbox" @change="passwordVisibility"/>
                            <label class="cbx" for="remember">
                                <span>
                                    <svg width="12px" height="10px" viewbox="0 0 12 10">
                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg>
                                </span>
                                <span class="text-white" v-if="passwordFieldType === 'password'">Show Password</span>
                                <span class="text-white" v-if="passwordFieldType === 'text'">Hide Password</span>
                            </label>
                        </div>
                    </div>


                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-theme w-100">Sign Up
                            <span class="ms-2" v-if="registerLoading === false"><img :src="`/images/global/arrow-right.svg`" alt="arrow-right"></span>
                            <span class="ms-2 btn-loading" v-if="registerLoading === true"></span>
                        </button>
                    </div>

                    <div class="bottom-text text-center mt-4 text-white">
                        Already have an account?
                        <router-link :to="{name:'Login'}" href="javascript:void(0)"
                                     class="underline-anim text-white white fw-semibold ms-2">Login Here..
                        </router-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

import apiService from "../../services/apiService.js";
import apiRoutes from "../../services/apiRoutes.js";
import router from '../../router/router'
import {createToaster} from "@meforma/vue-toaster";
import toast from "bootstrap/js/src/toast.js";

const toaster = createToaster({
    position: 'top-right',
});

export default {
    data() {
        return {
            passwordFieldType: 'password',
            registerLoading: false,
            registerParam: {
                first_name: '',
                last_name: '',
                email: '',
                phone: '',
                avatar: null,
                password: '',
                password_confirmation: '',
            },
            userInfo:window.core.UserInfo
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
        passwordVisibility() {
            if (this.passwordFieldType === 'password') {
                this.passwordFieldType = 'text';
            } else {
                this.passwordFieldType = 'password';
            }
        },


        /*================================================
        * Register API
        ==================================================*/
        register() {
            this.registerLoading = true;
            apiService.POST(apiRoutes.Register, this.registerParam, (res) => {
                this.registerLoading = false;
                if (parseInt(res.status) === 200) {
                    console.log(res)
                    toaster.info(res.msg)
                    router.push({name: 'Login'})
                } else {
                    apiService.ErrorHandler(res.errors)
                }
            })

        },

        /*================================================
        * Check number
        =================================================*/
        checkNumber(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                // @ts-ignore
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /^\d*\.?\d*$/;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }

        },
    }
}
</script>
