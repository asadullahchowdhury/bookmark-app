<template>
    <div class="auth container">
       <div class="row">
           <div class="col-lg-6 d-lg-flex d-none">
               <div class="page-cover w-100 h-100 d-flex justify-content-center align-items-center">
                   <img :src="`/images/auth/desk-1.svg`" alt="auth cover" class="img-fluid">
               </div>
           </div>
           <div class="col-lg-6">
               <div class="auth-page-wrap">
                   <div class="auth-box card border-0 p-sm-4 shadow rounded-4">
                       <!--Forgot password section start-->
                       <form @submit.prevent="forgot" class="auth-form p-4" autocomplete="off" v-if="forgotType === 1">
                           <div class="box-title display-6 mb-4 text-center"><span>B</span>ookmark <span>A</span>pp</div>

                           <div class="text-center fs-3 text-dark mb-4">Forgot Password</div>
                           <div class="form-group mb-3">
                               <input type="email" class="form-control shadow-none" placeholder="Email Address" name="email"
                                      v-model="forgotParam.email"
                                      autocomplete="off">
                               <img class="placeholder-icon" :src="`/images/global/mail.svg`" alt="mail">
                               <div class="error-report ms-2"></div>
                           </div>

                           <div class="form-group mt-4">
                               <button type="submit" class="btn btn-theme w-100">
                                   Forgot Password
                                   <span class="ms-2" v-if="forgotLoading != true"><img :src="`/images/global/arrow-right.svg`"
                                                                                        alt="arrow-right"></span>
                                   <span class="ms-2 btn-loading" v-if="forgotLoading === true"></span>
                               </button>
                           </div>

                           <div class="bottom-text text-center mt-4 text-dark">
                               Remember your password?
                               <router-link :to="{name:'Login'}"
                                            class="underline-anim text-dark fw-semibold ms-2">Login here..
                               </router-link>
                           </div>
                       </form>
                       <!--Forgot password section end  -->

                       <!--Reset password section start-->
                       <form @submit.prevent="reset" class="auth-form p-4" autocomplete="off" v-if="forgotType === 2">
                           <div class="box-title display-6 mb-4 text-center"><span>B</span>ookmark <span>A</span>pp</div>

                           <div class="text-center fs-3 text-dark mb-4">Reset Password</div>

                           <div class="form-group mb-3">
                               <input type="text" class="form-control shadow-none" placeholder="Email Address" name="email"
                                      disabled v-model="resetParam.email"
                                      autocomplete="off">
                               <img class="placeholder-icon" :src="`/images/global/mail.svg`" alt="mail">
                               <div class="error-report"></div>
                           </div>

                           <div class="form-group mb-3">
                               <input type="text" class="form-control shadow-none" placeholder="Reset Code"
                                      @keypress="checkNumber($event)"
                                      v-model="resetParam.code"
                                      name="code"
                                      autocomplete="off">
                               <img class="placeholder-icon" :src="`/images/global/hash.svg`" alt="hash">
                               <div class="error-report"></div>
                           </div>

                           <div class="form-group mb-3">
                               <input :type="passwordFieldType" class="form-control shadow-none" placeholder="New Password"
                                      v-model="resetParam.password"
                                      name="password" autocomplete="off">
                               <img class="placeholder-icon" :src="`/images/global/lock.svg`" alt="lock">
                               <div class="error-report"></div>
                           </div>

                           <div class="form-group mb-3">
                               <input :type="passwordFieldType" class="form-control shadow-none"
                                      v-model="resetParam.password_confirmation"
                                      placeholder="Password Confirmation"
                                      name="password_confirmation" autocomplete="off">
                               <img class="placeholder-icon" :src="`/images/global/lock.svg`" alt="lock">
                               <div class="error-report"></div>
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
                                       <span>Show Password</span>
                                   </label>
                               </div>
                           </div>

                           <div class="form-group mt-4">
                               <button type="submit" class="btn btn-theme w-100">
                                   Reset Password
                                   <span class="ms-2" v-if="resetLoading === false"><img
                                       :src="`/images/global/arrow-right.svg`" alt="arrow-right"></span>
                                   <span class="ms-2 btn-loading" v-if="resetLoading === true"></span>
                               </button>
                           </div>

                           <div class="bottom-text text-center mt-4 text-dark">
                               Remember your password?
                               <router-link :to="{name:'Login'}"
                                            class="underline-anim text-dark fw-semibold ms-2">Login here..
                               </router-link>
                           </div>
                       </form>
                       <!--Reset password section end  -->
                   </div>
               </div>
           </div>
       </div>
    </div>
</template>

<script>

import apiRoutes from "../../services/apiRoutes.js";
import apiService from "../../services/apiService.js";
import {createToaster} from "@meforma/vue-toaster";
import router from "../../router/router.js";

const toaster = createToaster({
    position: 'top-right',
});

export default {
    data() {
        return {
            forgotType: 1,
            passwordFieldType: 'password',
            forgotLoading: false,
            resetLoading: false,
            forgotParam: {
                email: '',
            },
            resetParam: {
                email: '',
                code: '',
                password: '',
                password_confirmation: '',
            },
            UserInfo: window.core.UserInfo,
        }
    },
    mounted() {
    },
    created() {
        if (this.UserInfo != null) {
            router.push({name: 'Dashboard'});
        }
    },
    methods: {
        /*================================================
        * Password visibility
        =================================================*/
        passwordVisibility() {
            if (this.passwordFieldType === 'password') {
                this.passwordFieldType = 'text';
            } else {
                this.passwordFieldType = 'password';
            }
        },

        /*================================================
        * Forgot api
        =================================================*/
        forgot() {
            this.forgotLoading = true;
            apiService.POST(apiRoutes.Forgot, this.forgotParam, (res) => {
                this.forgotLoading = false;
                if (parseInt(res.status) === 200) {
                    toaster.info(res.msg)
                    this.forgotType = 2;
                    this.resetParam.email = this.forgotParam.email;
                } else {
                    apiService.ErrorHandler(res.error)
                }
            })
        },


        /*================================================
        * Check number
        =================================================*/
        reset() {
            this.resetLoading = true;
            apiService.POST(apiRoutes.Reset, this.resetParam, (res) => {
                this.resetLoading = false;
                if (parseInt(res.status) === 200) {
                    toaster.info(res.msg)
                    router.push({name: 'Login'})

                } else {
                    apiService.ErrorHandler(res.error)
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
