<template>
    <div class="dashboard">

        <div class="container pt-5">
            <div class="card mt-5 mb-4 rounded-4 py-3 px-0 shadow border-0">
                <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center ">
                    <h3 class="card-title">Your Bookmarks</h3>
                    <button class="btn btn-theme" data-bs-toggle="modal" data-bs-target="#bookmarkModal">New <span
                        class="d-sm-inline d-none">Bookmark</span></button>
                </div>

                <div class="card-body">
                    <div class="no-data">
                        <div class="icon">
                            <img :src="`/images/global/no-data.svg`" alt="no data">
                        </div>
                        <div class="no-data-text display-6 my-3">
                            You have No Bookmarks yet !
                        </div>
                        <span><small>Click "Create" to Create New Bookmark.</small></span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Bookmark Modal start-->
    <div class="modal fade" id="bookmarkModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="changePassLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-5">
                <div class="modal-header pt-4 border-0 justify-content-center">
                    <h1 class="modal-title fs-5" id="changePassLabel">Add a bookmark</h1>
                </div>
                <form>
                    <div class="modal-body px-4">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg rounded-pill"
                                   v-model="bookmarkParam.url"
                                   placeholder="Your Bookmark Link" name="url">
                            <div class="error-report"></div>
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg rounded-pill"
                                   v-model="bookmarkParam.name"
                                   placeholder="Name" name="name">
                            <div class="error-report"></div>
                        </div>

                        <div class="form-group mb-3">
                            <textarea name="description" class="form-control form-control-lg rounded-pill"
                                      v-model="bookmarkParam.description"
                                      placeholder="Your Note (Optional)" id="" cols="30" rows="2"></textarea>
                            <div class="error-report"></div>
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
    <!--Bookmark Modal end  -->
</template>

<script>
import apiService from "../../services/apiService";
import apiRoutes from "../../services/apiRoutes";

export default {
    data() {
        return {
            manageLoading: false,
            bookmarkParam: {
                name: '',
                url: '',
                description: '',
            }
        }
    },
    mounted() {

    },
    methods: {
        //=================
        // ======================
    }
}
</script>
