<template>
    <div class="auth">
        <div class="auth-page-wrap" style="background-image: url('/images/auth/bookmark.jpg')">
            <div class="auth-box">
                <form action="" class="auth-form p-4" autocomplete="off">
                    <div class="box-title display-6 mb-5 text-center">  <span>B</span>ookmark <span>A</span>pp</div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Email Address" name="email" autocomplete="off">
                        <img class="placeholder-icon" :src="`/images/admin/global/mail.svg`" alt="mail">
                        <div class="error-report"></div>
                    </div>
                    <div class="form-group mb-3">
                        <input :type="passwordFieldType" class="form-control" placeholder="Password" name="password" autocomplete="off">
                        <img class="placeholder-icon" :src="`/images/admin/global/lock.svg`" alt="lock">
                        <div class="eye-wrap" @click="passwordVisibility()">
                            <img v-if="passwordFieldType === 'text' " :src="`/images/admin/global/eye.svg`" alt="eye">
                            <img v-if="passwordFieldType === 'password' " :src="`/images/admin/global/eye-off.svg`" alt="eye-off">
                        </div>
                        <div class="error-report"></div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-theme">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    data(){
        return{
            passwordFieldType: 'password'
        }
    },
    mounted() {
    },
    methods:{
        passwordVisibility(){
            if (this.passwordFieldType === 'password'){
                this.passwordFieldType = 'text';
            }else {
                this.passwordFieldType = 'password';
            }
        }
    }
}
</script>
