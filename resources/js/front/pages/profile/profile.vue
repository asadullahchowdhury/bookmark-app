<template>
    <div class="profile-page">
        <div class="container">
            <div class="profile-header d-flex justify-content-center position-relative">
                <div class="profile-pic shadow">
                    <img src="/images/global/book-cover.jpg" alt="profile" class="img-fluid">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <table class="table table-borderless" v-if="profileLoading === false">
                        <tr>
                            <td class="pb-4"><strong>Name :</strong></td>
                            <td class="pb-4">{{ profileData.full_name }}</td>
                        </tr>


                        <tr>
                            <td class="pb-4"><strong>Email :</strong></td>
                            <td class="pb-4">{{ profileData.email }}</td>
                        </tr>


                        <tr>
                            <td class="pb-4"><strong>Phone :</strong></td>
                            <td class="pb-4">{{ profileData.phone }}</td>
                        </tr>

                        <tr>
                            <td class="pb-4"><strong>Address :</strong></td>
                            <td class="pb-4 fst-italic text-muted">N/A</td>
                        </tr>
                    </table>

                    <!--Loading start-->
                    <div class="" v-if="profileLoading === true">
                        <h6 class=" placeholder-glow pt-3">
                            <span class="placeholder col-12 mb-3"></span>
                            <span class="placeholder col-11 mb-3"></span>
                            <span class="placeholder col-6 mb-3"></span>
                            <span class="placeholder col-8 mb-3"></span>
                            <span class="placeholder col-8 mb-3"></span>
                        </h6>
                    </div>
                    <!--Loading end-->
                    <div class="d-flex align-items-center flex-sm-row flex-column justify-content-between mb-3">
                        <button type="button" class="btn btn-theme w-50 mx-2 mb-sm-0 mb-4" @click="editModal(1)">Edit
                            Profile
                        </button>
                        <button type="button" class="btn btn-theme w-50 mx-2" data-bs-toggle="modal"
                                data-bs-target="#changePassModal">Change Password
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Profile Modal start-->
    <div class="modal modal-lg fade" id="profileUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1"
         aria-labelledby="profileUpdateLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center border-0 pt-4">
                    <h1 class="modal-title fs-5" id="profileUpdateLabel">Edit Profile</h1>
                </div>
                <form @submit.prevent="updateProfile">
                    <div class="modal-body px-4">
                        <div class="form-group mb-5 d-flex justify-content-center">
                            <div class="modal-avatar-wrap">
                                <img class="modal-avatar" v-if="editParam.avatar != null" :src="editParam.avatarFilePath" alt="avatar">
                                <img class="modal-avatar" v-if="editParam.avatar === null" :src="`/images/global/book-cover.jpg`" alt="avatar">
                                <label for="avatar-upload" class="upload-label btn btn-light">
                                    <input type="file" class="d-none" id="avatar-upload" @change="attachAvatar($event)">
                                    <img class="edit-icon" :src="`/images/global/edit.svg`" alt="edit">
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-lg rounded-pill"
                                           placeholder="First Name" name="first_name" v-model="editParam.first_name">
                                    <div class="error-report"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-lg rounded-pill"
                                           placeholder="Last Name" name="last_name" v-model="editParam.last_name">
                                    <div class="error-report"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control form-control-lg rounded-pill"
                                           placeholder="Email Address" name="email" v-model="editParam.email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-lg rounded-pill"
                                           placeholder="Phone Number" name="phone" v-model="editParam.phone">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <textarea class="form-control form-control-lg rounded-pill" name="address"
                                          placeholder="Address" id="" cols="30" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 justify-content-center">
                        <button type="button" class="btn btn-outline-dark w-120px rounded-pill py-9px"
                                data-bs-dismiss="modal">Cancel
                        </button>
                        <button type="submit" class="btn btn-theme w-120px">
                            <span v-if="updateProfileLoading === false">Confirm</span>
                            <span v-if="updateProfileLoading === true" class="btn-loading"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Profile Modal end -->

    <!--Password Modal start-->
    <div class="modal fade" id="changePassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="changePassLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-5">
                <div class="modal-header pt-4 border-0 justify-content-center">
                    <h1 class="modal-title fs-5" id="changePassLabel">Change Password</h1>
                </div>
                <form>


                    <div class="modal-body px-4">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg rounded-pill"
                                   placeholder="Current Password" name="password">
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg rounded-pill"
                                   placeholder="New Password" name="new_password">
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg rounded-pill"
                                   placeholder="Confirm New Password" name="password_confirmation">
                        </div>

                    </div>
                    <div class="modal-footer justify-content-center border-0">
                        <button type="button" class="btn btn-outline-dark rounded-pill w-120px py-9px"
                                data-bs-dismiss="modal">Cancel
                        </button>
                        <button type="button" class="btn btn-theme w-120px">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Password Modal end  -->

</template>


<script>
import apiService from "../../services/apiService.js";
import apiRoute from "../../services/apiRoutes.js";
import {createToaster} from "@meforma/vue-toaster";
import apiRoutes from "../../services/apiRoutes.js";

const toaster = createToaster({
    position: 'top-right',
});

export default {
    data() {
        return {
            profileLoading: false,
            profileData: {},
            editParam: {
                id: '',
                first_name: '',
                last_name: '',
                email: '',
                phone: '',
                avatar: '',
                avatarFilePath:null,
            },
            updateProfileLoading: false,
            updatePasswordLoading: false,
        }
    },

    mounted() {
        this.getProfile()
    },

    methods: {
        getProfile() {
            this.profileLoading = true;
            apiService.ClearErrorHandler();
            apiService.GET(apiRoute.ProfileDetails, (res) => {
                this.profileLoading = false;
                if (res.status === 200) {
                    this.profileData = res.data
                    this.profileData.full_name = this.profileData.first_name + ' ' + this.profileData.last_name;
                    const headerAvatar = document.querySelector('.profile-pic img');
                    headerAvatar.src = this.profileData.avatar !== null ? this.profileData.media.full_file_path : `https://ui-avatars.com/api/?name=${this.profileData.full_name}`;
                }
            })
        },


        editModal(type) {
            if (type === 1) {
                let modal = new bootstrap.Modal(document.getElementById('profileUpdateModal'))
                modal.show();
                this.profileData.full_name = this.profileData.first_name + ' ' + this.profileData.last_name;
                const avatar = document.querySelector('.modal-avatar');
                avatar.src = this.profileData.avatar !== null ? this.profileData.media.full_file_path : `https://ui-avatars.com/api/?name=${this.profileData.full_name}`;
                let userData = this.profileData;
                this.editParam = {
                    id: userData.id,
                    first_name: userData.first_name,
                    last_name: userData.last_name,
                    email: userData.email,
                    phone: userData.phone,
                    avatar: userData.avatar,
                }
            } else if (type === 2) {
                const Modal = document.querySelector('#profileUpdateModal');
                const Instance = bootstrap.Modal.getInstance(Modal);
                Instance.hide();
            }
        },


        updateProfile() {
            this.updateProfileLoading = true;
            apiService.POST(apiRoutes.ProfileUpdate, this.editParam, (res) => {
                this.updateProfileLoading = false;
                if (parseInt(res.status) === 200) {
                    toaster.info(res.msg)
                    this.editModal(2)
                    this.getProfile();
                } else apiService.ErrorHandler(res.errors)
            })
        },


        /* avatar attachment */
        attachAvatar(event) {
            let file = event.target.files[0];
            let formData = new FormData();
            formData.append("file", file)
            formData.append("media_type", 1);
            apiService.UPLOAD(apiRoutes.Media, formData, (res) => {
                event.target.value = '';
                if (res.status === 200) {
                    this.editParam.avatarFilePath = res.data.full_file_path
                    this.editParam.avatar = res.data.id
                }
            })

        },

    }
}
</script>
