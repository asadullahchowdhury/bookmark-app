<template>
    <div class="profile-page">
        <div class="container">
         <div class="card border-0 rounded-4 shadow">
           <div class="card-body">
               <div class="profile-header d-flex justify-content-center position-relative">
                   <div class="profile-pic shadow">
                       <img v-if="profileData.media === null"
                            :src="`https://ui-avatars.com/api/?name=`+ profileData.full_name" alt="profile">
                       <img v-if="profileData.media != null" :src="profileData.media.full_file_path" alt="profile">
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

                       <div
                           class="d-flex profile-action align-items-center flex-sm-row flex-column justify-content-between mb-3">
                           <button type="button" class="btn btn-theme mx-2 mb-sm-0 mb-4" @click="editModal(1)">Edit
                               Profile
                           </button>
                           <button type="button" class="btn btn-theme mx-2" @click="passwordModal(1)">Change Password
                           </button>
                       </div>

                   </div>
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
                                <img class="modal-avatar" v-if="editParam.avatarFilePath != null"
                                     :src="editParam.avatarFilePath" alt="avatar">
                                <img class="modal-avatar" v-if="editParam.avatar === null"
                                     :src="`https://ui-avatars.com/api/?name=`+ profileData.full_name"
                                     alt="avatar dummy">
                                <label for="avatar-upload" class="upload-label btn btn-light">
                                    <input type="file" class="d-none" id="avatar-upload" @change="attachAvatar($event)">
                                    <img v-if="uploadLoading === false" class="edit-icon"
                                         :src="`/images/global/edit.svg`" alt="edit">
                                    <span v-if="uploadLoading === true" class="btn-loading black"></span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-lg rounded-pill"
                                           placeholder="First Name" name="first_name" v-model="editParam.first_name">
                                    <div class="error-report ms-2"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-lg rounded-pill"
                                           placeholder="Last Name" name="last_name" v-model="editParam.last_name">
                                    <div class="error-report ms-2"></div>
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
                <form @submit.prevent="updatePassword()">


                    <div class="modal-body px-4">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg rounded-pill"
                                   placeholder="Current Password" name="current_password"
                                   v-model="passwordParam.current_password">
                            <div class="error-report ms-2"></div>
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg rounded-pill"
                                   placeholder="New Password" name="password" v-model="passwordParam.password">
                            <div class="error-report ms-2"></div>
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg rounded-pill"
                                   placeholder="Confirm New Password" name="password_confirmation"
                                   v-model="passwordParam.password_confirmation">
                            <div class="error-report ms-2"></div>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-center border-0">
                        <button type="button" class="btn btn-outline-dark rounded-pill w-120px py-9px"
                                @click="passwordModal(2)">Cancel
                        </button>
                        <button type="submit" class="btn btn-theme w-120px">
                            <span v-if="updatePasswordLoading === false">Confirm</span>
                            <span class="btn-loading" v-if="updatePasswordLoading === true">  </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Password Modal end  -->


    <!--Login History Modal start-->
    <div class="modal fade" id="loginHistoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="changePassLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-5">
                <div class="modal-header pt-4 border-0 justify-content-center">
                    <h1 class="modal-title fs-5" id="changePassLabel">Your Login History</h1>
                </div>

                <div class="modal-body px-4">
                    <div class="w-100 text-end mb-2">
                        <a href="javascript:void(0)" class="text-decoration-none text-muted underline-anim"
                           @click="loginHistoryModal(2),manageDeleteModal(1,'all')"
                           v-if="historyData.length > 0 && historyListLoading === false">Clear all
                            History</a>
                    </div>
                    <div class="history-list-wrap table-responsive">
                        <table class="table table-history table-borderless table-hover"
                               v-if="historyData.length > 0 && historyListLoading === false">
                            <thead>
                            <tr>
                                <th class="small">IP</th>
                                <th class="small">Time</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(each,index) in historyData">
                                <td class="text-muted small">{{ each.ip_address }}</td>
                                <td class="text-muted small time">{{ each.created_at_formatted }}</td>
                                <td class="text-end">
                                    <a href="javascript:void(0)" class="btn btn-icon">
                                        <img class="img-fluid" src="/images/global/trash-2.svg" alt="trash"
                                             @click="loginHistoryModal(2),manageDeleteModal(1,each.id)">
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <!--No data-->
                        <div class="no-data py-4" v-if="historyData.length === 0 && historyListLoading === false">
                            <div class="icon">
                                <img class="w-25" :src="`/images/global/no-data.svg`" alt="no data">
                            </div>
                            <div class="no-data-text display-7 my-3">
                                You have No Login History !
                            </div>
                        </div>
                        <!--No data-->

                        <!--Loading start-->
                        <div class="" v-if="historyListLoading === true">
                            <h6 class=" placeholder-glow pt-3">
                                <span class="placeholder col-12 mb-3"></span>
                                <span class="placeholder col-11 mb-3"></span>
                                <span class="placeholder col-6 mb-3"></span>
                                <span class="placeholder col-8 mb-3"></span>
                                <span class="placeholder col-8 mb-3"></span>
                            </h6>
                        </div>
                        <!--Loading end-->

                    </div>

                </div>
                <div class="modal-footer justify-content-center border-0">
                    <button type="button" class="btn btn-outline-dark rounded-pill w-120px py-9px"
                            @click="loginHistoryModal(2)">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--Login History Modal end  -->

    <!--Delete Modal start-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-5">
                <div class="modal-body p-5 text-center">
                    <div class="delete-icon mb-5">
                        <img :src="`/images/global/trash.png`" alt="delete icon">
                    </div>
                    <h3 class="mb-5">Are you sure?</h3>

                    <button type="button" class="btn btn-theme w-100" aria-label="Confirm"
                            @click="historyDelete()">
                        <span v-if="deleteLoading === false">Confirm</span>
                        <span class="btn-loading" v-if="deleteLoading === true"></span>
                    </button>


                </div>
            </div>
        </div>
    </div>
    <!--Delete Modal end  -->

</template>


<script>
import apiService from "../../services/apiService.js";
import apiRoutes from "../../services/apiRoutes.js";
import {createToaster} from "@meforma/vue-toaster";


const toaster = createToaster({
    position: 'top-right',
});

export default {
    data() {
        return {
            profileLoading: false,
            uploadLoading: false,
            profileData: {},
            editParam: {
                id: '',
                first_name: '',
                last_name: '',
                email: '',
                phone: '',
                avatar: '',
                avatarFilePath: null,
            },
            passwordParam: {
                current_password: '',
                password: '',
                password_confirmation: '',

            },
            updateProfileLoading: false,
            updatePasswordLoading: false,
            historyListLoading: false,
            deleteLoading: false,
            historyParam: {
                limit: 10,
            },
            historyData: [],
            deleteParam: {
                id: '',
            }
        }
    },

    mounted() {
        this.getProfile()

        /*tooltip*/
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    },

    methods: {
        /*==========================================
        * Get profile data API
        ============================================*/
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


        /*==========================================
        * Profile edit modal open/close
        ============================================*/
        editModal(type) {
            if (type === 1) {
                let modal = new bootstrap.Modal(document.getElementById('profileUpdateModal'))
                modal.show();
                this.profileData.full_name = this.profileData.first_name + ' ' + this.profileData.last_name;
                let userData = this.profileData;
                console.log(userData)

                this.editParam = {
                    id: userData.id,
                    first_name: userData.first_name,
                    last_name: userData.last_name,
                    email: userData.email,
                    phone: userData.phone,
                    avatar: userData.avatar,
                    avatarFilePath: userData?.media?.full_file_path
                }


            } else if (type === 2) {
                const Modal = document.querySelector('#profileUpdateModal');
                const Instance = bootstrap.Modal.getInstance(Modal);
                Instance.hide();
            }
        },

        /*==========================================
        * Profile update API
        ============================================*/
        updateProfile() {
            this.updateProfileLoading = true;
            apiService.POST(apiRoutes.ProfileUpdate, this.editParam, (res) => {
                this.updateProfileLoading = false;
                if (parseInt(res.status) === 200) {
                    toaster.info(res.msg)
                    this.editModal(2)
                    this.getProfile();
                    $('#profile-avatar').attr('src', this.editParam.avatarFilePath);
                } else apiService.ErrorHandler(res.errors)
            })
        },


        /*==========================================
       * Avatar image upload API
       ============================================*/
        attachAvatar(event) {
            this.uploadLoading = true;
            let file = event.target.files[0];
            let formData = new FormData();
            formData.append("file", file)
            formData.append("media_type", 1);
            apiService.UPLOAD(apiRoutes.Media, formData, (res) => {
                this.uploadLoading = false;
                event.target.value = '';
                if (res.status === 200) {
                    this.editParam.avatarFilePath = res.data.full_file_path;
                    this.editParam.avatar = res.data.id
                    console.log(this.editParam.avatarFilePath)
                }
            })

        },


        /*==========================================
        * Password Changing API
        ============================================*/
        updatePassword() {
            this.updatePasswordLoading = true;
            apiService.POST(apiRoutes.PasswordUpdate, this.passwordParam, (res) => {
                this.updatePasswordLoading = false;
                if (res.status === 200) {
                    toaster.info(res.msg)
                    this.passwordModal(2);
                } else {
                    apiService.ErrorHandler(res.errors)
                }

            })
        },


        /*password modal open*/
        passwordModal(type) {
            if (type === 1) {
                this.passwordParam = {
                    password: '',
                    current_password: '',
                    password_confirmation: '',
                }
                let modal = new bootstrap.Modal(document.getElementById('changePassModal'))
                modal.show();
            } else {
                const Modal = document.querySelector('#changePassModal');
                const Instance = bootstrap.Modal.getInstance(Modal);
                Instance.hide();
            }

        },


        /*==========================================
        * Login history modal open/close
        ============================================*/
        loginHistoryModal(type) {
            if (type === 1) {
                this.getHistory();
                let modal = new bootstrap.Modal(document.getElementById('loginHistoryModal'))
                modal.show();
            } else {
                const Modal = document.querySelector('#loginHistoryModal');
                const Instance = bootstrap.Modal.getInstance(Modal);
                Instance.hide();
            }

        },

        /*==========================================
        * Login history list API
        ============================================*/
        getHistory() {
            this.historyListLoading = true;
            apiService.POST(apiRoutes.HistoryList, this.historyParam, (res) => {
                this.historyListLoading = false;
                this.historyListLoading = false;
                if (parseInt(res.status) === 200) {
                    this.historyData = res.data.data
                }
            })
        },

        /*==========================================
        * login history delete API
        ============================================*/
        historyDelete() {
            this.deleteLoading = true;
            apiService.POST(apiRoutes.HistoryDelete, this.deleteParam, (res) => {
                this.deleteLoading = false;
                if (parseInt(res.status) === 200) {
                    toaster.info(res.msg);
                    this.manageDeleteModal(2, null)
                }
            })
        },

        /*==========================================
        * Bookmark delete modal close/open
        ============================================*/
        manageDeleteModal(type, id) {
            if (type === 1) {
                let myModal = new bootstrap.Modal(document.getElementById('deleteModal'))
                this.deleteParam.id = id;
                myModal.show()
            } else {
                this.loginHistoryModal(1)
                var myModalEl = document.getElementById('deleteModal');
                var modal = bootstrap.Modal.getInstance(myModalEl)
                modal.hide();
            }
        },
    }
}
</script>
