<template>
    <div class="dashboard">

        <div class="container pt-5">
            <div class="card mt-5 mb-4 rounded-4 py-3 px-0 shadow border-0">
                <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center ">
                    <h3 class="card-title">Your Bookmarks</h3>
                    <button class="btn btn-theme" @click="bookmarkModal(1,null)">New <span
                        class="d-sm-inline d-none">Bookmark</span></button>
                </div>

                <div class="card-body list-card-height">
                    <div class="list-wrap d-grid " v-if="tableData.length > 0 && listLoading === false">
                        <div class="each-book card card-body rounded-4 shadow border-0"
                             v-for="(each,index) in tableData">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="content d-flex flex-column">
                                    <div class="name fs-5">
                                        <div class="fs-5 me-3 fw-bold d-inline">{{ index + 1 }}.</div>

                                        <a :href="each.url" class="text-decoration-none text-dark underline-anim"
                                           target="_blank">{{ each.name }}</a>
                                    </div>
                                    <div class="collapse ms-3" id="collapseExample">
                                        {{ each.description }}
                                    </div>
                                </div>
                                <div class="action">
                                    <a href="javascript:void(0)" class="btn btn-icon me-2" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                       role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <img :src="`/images/global/message-circle.svg`" alt="desc">
                                    </a>

                                    <a href="javascript:void(0)" class="btn btn-icon me-2"
                                       @click="bookmarkModal(2,each)">
                                        <img :src="`/images/global/edit.svg`" alt="edit">
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-icon"
                                       @click="manageDeleteModal(1,each.id)">
                                        <img :src="`/images/global/trash-2.svg`" alt="trash">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="no-data" v-if="tableData.length === 0 && listLoading === false">
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
                <form @submit.prevent="manageBookmark()">
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
                                @click="bookmarkModal(3,null)">Cancel
                        </button>
                        <button type="submit" class="btn btn-theme w-120px">
                            <span v-if="manageLoading === false">Confirm</span>
                            <span v-if="manageLoading === true" class="btn-loading"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Bookmark Modal end  -->


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
                            @click="bookmarkDelete()">
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
import apiService from "../../services/apiService";
import apiRoutes from "../../services/apiRoutes";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({
    position: 'top-right',
});

export default {
    data() {
        return {
            manageLoading: false,
            listLoading: false,
            bookmarkParam: {
                id: '',
                name: '',
                url: '',
                description: '',
            },
            listParam: {
                keyword: '',
                date: 'today',
                limit: 10,
            },
            tableData: [],
            deleteParam: {
                id: '',
            },
            deleteLoading: false,
        }
    },
    mounted() {
        this.getBookmarkList();

    },
    methods: {
        /*==========================================
        * Bookmark modal open/close
        ============================================*/
        bookmarkModal(type, data = null) {
            apiService.ClearErrorHandler();
            if (type === 1) {
                this.bookmarkParam = {
                    id: '',
                    name: '',
                    url: '',
                    description: '',
                }
                let modal = new bootstrap.Modal(document.getElementById('bookmarkModal'))
                modal.show();
            } else if (type === 2) {
                this.bookmarkParam = {
                    id: data.id,
                    name: data.name,
                    url: data.url,
                    description: data.description,
                }
                console.log(data.name)
                let modal = new bootstrap.Modal(document.getElementById('bookmarkModal'))
                modal.show();
            } else if (type === 3) {
                const Modal = document.querySelector('#bookmarkModal');
                const Instance = bootstrap.Modal.getInstance(Modal);
                Instance.hide();
            }
        },

        /*==========================================
        * Bookmark Create/Update API
        ============================================*/
        manageBookmark() {
            this.manageLoading = true;
            let url = null;
            if (this.bookmarkParam.id === '') {
                url = apiRoutes.BookmarkCreate;
            } else {
                url = apiRoutes.BookmarkUpdate;
            }
            apiService.POST(url, this.bookmarkParam, (res) => {
                this.manageLoading = false;
                if (parseInt(res.status) === 200) {
                    toaster.info(res.msg)
                    this.bookmarkModal(3, null);
                    this.getBookmarkList();
                } else {
                    apiService.ErrorHandler(res.errors)
                }
            })
        },

        /*==========================================
        * Bookmark list API
        ============================================*/
        getBookmarkList() {
            this.listLoading = true;
            apiService.POST(apiRoutes.BookmarkList, this.listParam, (res) => {
                this.listLoading = false;
                if (parseInt(res.status) === 200) {
                    this.tableData = res.data.data;
                    console.log(this.tableData)
                }
            })
        },

        /*==========================================
        * Bookmark delete API
        ============================================*/
        bookmarkDelete() {
            this.deleteLoading = true;
            apiService.POST(apiRoutes.BookmarkDelete, this.deleteParam, (res) => {
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
                this.deleteParam.id = id
                myModal.show()
            } else {
                var myModalEl = document.getElementById('deleteModal');
                var modal = bootstrap.Modal.getInstance(myModalEl)
                modal.hide();
            }
        },

    }
}
</script>
