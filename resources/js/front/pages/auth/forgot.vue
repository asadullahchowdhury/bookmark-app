<template>
    <div class="auth">
        <div class="auth-page-wrap" style="background-image: url('/images/auth/bookmark.jpg')">
            <div class="auth-box">
                <!--Forgot password section start-->
                <form action="" class="auth-form p-4" autocomplete="off" v-if="forgotType === 1">
                    <div class="box-title display-6 mb-4 text-center"><span>B</span>ookmark <span>A</span>pp</div>

                    <div class="text-center fs-3 text-white mb-4">Forgot Password</div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control shadow-none" placeholder="Email Address" name="email"
                               autocomplete="off">
                        <img class="placeholder-icon" :src="`/images/global/mail.svg`" alt="mail">
                        <div class="error-report"></div>
                    </div>

                    <div class="form-group mt-4">
                        <button type="button" class="btn btn-theme w-100">
                            Forgot Password
                            <span class="ms-2"><img :src="`/images/global/arrow-right.svg`" alt="arrow-right"></span>
                        </button>
                    </div>

                    <div class="bottom-text text-center mt-4 text-white">
                        Remember your password?
                        <router-link :to="{name:'Login'}"
                                     class="underline-anim text-white white fw-semibold ms-2">Login here..
                        </router-link>
                    </div>
                </form>
                <!--Forgot password section end  -->

                <!--Reset password section start-->
                <form action="" class="auth-form p-4" autocomplete="off" v-if="forgotType === 2">
                    <div class="box-title display-6 mb-4 text-center"><span>B</span>ookmark <span>A</span>pp</div>

                    <div class="text-center fs-3 text-white mb-4">Reset Password</div>

                    <div class="form-group mb-3">
                        <input type="text" class="form-control shadow-none" placeholder="Email Address" name="email"
                               autocomplete="off">
                        <img class="placeholder-icon" :src="`/images/global/mail.svg`" alt="mail">
                        <div class="error-report"></div>
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" class="form-control shadow-none" placeholder="Verification Code"
                               name="verification_code"
                               autocomplete="off">
                        <img class="placeholder-icon" :src="`/images/global/hash.svg`" alt="hash">
                        <div class="error-report"></div>
                    </div>

                    <div class="form-group mb-3">
                        <input :type="passwordFieldType" class="form-control shadow-none" placeholder="New Password"
                               name="password" autocomplete="off">
                        <img class="placeholder-icon" :src="`/images/global/lock.svg`" alt="lock">
                        <div class="error-report"></div>
                    </div>

                    <div class="form-group mb-3">
                        <input :type="passwordFieldType" class="form-control shadow-none"
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
                                <span class="text-white" v-if="passwordFieldType === 'password'">Show Password</span>
                                <span class="text-white" v-if="passwordFieldType === 'text'">Hide Password</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <button type="button" class="btn btn-theme w-100">
                            Forgot Password
                            <span class="ms-2"><img :src="`/images/global/arrow-right.svg`" alt="arrow-right"></span>
                        </button>
                    </div>

                    <div class="bottom-text text-center mt-4 text-white">
                        Remember your password?
                        <router-link :to="{name:'Login'}"
                                     class="underline-anim text-white white fw-semibold ms-2">Login here..
                        </router-link>
                    </div>
                </form>
                <!--Reset password section end  -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            forgotType: 1,
            passwordFieldType: 'password',
        }
    },
    mounted() {
    },
    methods: {
        passwordVisibility() {
            if (this.passwordFieldType === 'password') {
                this.passwordFieldType = 'text';
            } else {
                this.passwordFieldType = 'password';
            }
        }
    }
}
</script>
