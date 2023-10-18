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
                    <table class="table table-borderless">
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
                    </table>

                    <div class="d-flex align-items-center flex-sm-row flex-column justify-content-between mb-3">
                        <button type="button" class="btn btn-theme w-50 mx-2 mb-sm-0 mb-4" data-bs-toggle="modal"
                                data-bs-target="#profileUpdateModal">Edit Profile
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
    <div class="modal fade" id="profileUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="profileUpdateLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="profileUpdateLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
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
                         <input type="text" class="form-control form-control-lg rounded-pill" placeholder="Current Password" name="password">
                     </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg rounded-pill" placeholder="New Password" name="new_password">
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg rounded-pill" placeholder="Confirm New Password" name="password_confirmation">
                        </div>

                    </div>
                    <div class="modal-footer justify-content-center border-0">
                        <button type="button" class="btn btn-outline-dark rounded-pill w-120px py-10px" data-bs-dismiss="modal">Close</button>
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

const toaster = createToaster({
    position: 'top-right',
});

export default {
    data() {
        return {
            profileLoading: false,
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

    }
}
</script>
