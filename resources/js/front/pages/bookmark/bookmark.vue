<template>
    <div class="dashboard">

        <div class="container pt-5">
            <div class="card card-list mt-5 mb-4 rounded-4 py-3 px-0 shadow border-0">
                <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center ">
                    <h3 class="card-title">Your Bookmarks <img :src="`/images/global/bookmark.png`" alt=""></h3>
                    <button class="btn btn-theme" @click="bookmarkModal(1,null)">New <span
                        class="d-sm-inline d-none">Bookmark</span></button>
                </div>

                <div class="card-body list-body">
                    <div class="list-wrap" v-if="tableData.length > 0 && listLoading === false">
                        <table class="table table-borderless table-hover table-bookmark">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(each,index) in tableData" class="border-bottom align-middle">
                                <td>
                                    <a :href="each.url" class="text-decoration-none text-dark underline-anim"
                                       target="_blank">{{ each.name }}</a>
                                </td>

                                <td class="text-end">
                                    <div class="action">
                                        <a href="javascript:void(0)" class="btn btn-icon me-2"
                                           @click="bookmarkModal(2,each)">
                                            <img :src="`/images/global/edit.svg`" alt="edit">
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-icon"
                                           @click="manageDeleteModal(1,each.id)">
                                            <img :src="`/images/global/trash-2.svg`" alt="trash">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <!--No data-->
                    <div class="no-data" v-if="tableData.length === 0 && listLoading === false">
                        <div class="icon">
                            <img class="w-25" :src="`/images/global/no-data.svg`" alt="no data">
                        </div>
                        <div class="no-data-text display-7 my-3">
                            You have No Bookmarks!
                        </div>
                    </div>
                    <!--No data-->

                    <!--Loading start-->
                    <div class="" v-if="listLoading === true">
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

                <div class="card-footer border-0 bg-white">
                    <!-- Pagination Start -->
                    <div class="d-flex justify-content-center" v-if="listLoading === false  && tableData.length > 0">
                        <div class="pagination">
                            <div class="page-item" @click="PrevPage()">
                                <a class="page-link" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                         fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                         stroke-linejoin="round" class="acorn-icons acorn-icons-chevron-left undefined">
                                        <path
                                            d="M13 16L7.35355 10.3536C7.15829 10.1583 7.15829 9.84171 7.35355 9.64645L13 4"></path>
                                    </svg>
                                </a>
                            </div>
                            <div v-if="buttons.length <= 6">
                                <div v-for="(page, index) in buttons" class="page-item"
                                     :class="{'active': current_page == page}">
                                    <a class="page-link" @click="pageChange(page)" href="javascript:void(0)"
                                       v-text="page"></a>
                                </div>
                            </div>
                            <div v-if="buttons.length > 6">
                                <div class="page-item" :class="{'active': current_page == 1}">
                                    <a class="page-link" @click="pageChange(1)"
                                       href="javascript:void(0)">1</a>
                                </div>

                                <div v-if="current_page > 3" class="page-item">
                                    <a class="page-link" @click="pageChange(current_page - 2)"
                                       href="javascript:void(0)">...</a>
                                </div>

                                <div v-if="current_page == buttons.length" class="page-item"
                                     :class="{'active': current_page == (current_page - 2)}">
                                    <a class="page-link" @click="pageChange(current_page - 2)"
                                       href="javascript:void(0)" v-text="current_page - 2"></a>
                                </div>

                                <div v-if="current_page > 2" class="page-item"
                                     :class="{'active': current_page == (current_page - 1)}">
                                    <a class="page-link" @click="pageChange(current_page - 1)"
                                       href="javascript:void(0)" v-text="current_page - 1"></a>
                                </div>

                                <div v-if="current_page != 1 && current_page != buttons.length"
                                     class="page-item active">
                                    <a class="page-link" @click="pageChange(current_page)" href="javascript:void(0)"
                                       v-text="current_page"></a>
                                </div>

                                <div v-if="current_page < buttons.length - 1" class="page-item"
                                     :class="{'active': current_page == (current_page + 1)}">
                                    <a class="page-link" @click="pageChange(current_page + 1)"
                                       href="javascript:void(0)" v-text="current_page + 1"></a>
                                </div>

                                <div v-if="current_page == 1" class="page-item"
                                     :class="{'active': current_page == (current_page + 2)}">
                                    <a class="page-link" @click="pageChange(current_page + 2)"
                                       href="javascript:void(0)" v-text="current_page + 2"></a>
                                </div>

                                <div v-if="current_page < buttons.length - 2" class="page-item">
                                    <a class="page-link" @click="pageChange(current_page + 2)"
                                       href="javascript:void(0)">...</a>
                                </div>

                                <div class="page-item"
                                     :class="{'active': current_page == (current_page - buttons.length)}">
                                    <a class="page-link" @click="pageChange(buttons.length)"
                                       href="javascript:void(0)" v-text="buttons.length"></a>
                                </div>
                            </div>
                            <div class="page-item" @click="NextPage()">
                                <a class="page-link" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                         fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="acorn-icons acorn-icons-chevron-right undefined">
                                        <path
                                            d="M7 4L12.6464 9.64645C12.8417 9.84171 12.8417 10.1583 12.6464 10.3536L7 16"></path>
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>
                    <!-- Pagination End -->
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
                    <h1 class="modal-title fs-5" id="changePassLabel">
                        <span v-if="bookmarkParam.id === ''">Add a bookmark</span>
                        <span v-if="bookmarkParam.id != ''">Update bookmark</span>
                    </h1>
                </div>
                <form @submit.prevent="manageBookmark()">
                    <div class="modal-body px-4">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg rounded-pill"
                                   v-model="bookmarkParam.name"
                                   placeholder="Name" name="name">
                            <div class="error-report ms-2"></div>
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg rounded-pill"
                                   v-model="bookmarkParam.url"
                                   placeholder="Your Bookmark Link" name="url">
                            <div class="error-report ms-2"></div>
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
            },
            listParam: {
                keyword: '',
                date: 'today',
                limit: 15,
                page:1,
            },
            tableData: [],
            deleteParam: {
                id: '',
            },
            deleteLoading: false,
            /*Pagination Variables*/
            total_pages: 0,
            current_page: 0,
            buttons: [],
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
                }
                let modal = new bootstrap.Modal(document.getElementById('bookmarkModal'))
                modal.show();
            } else if (type === 2) {
                this.bookmarkParam = {
                    id: data.id,
                    name: data.name,
                    url: data.url,
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
            this.listParam.page = this.current_page;
            apiService.POST(apiRoutes.BookmarkList, this.listParam, (res) => {
                this.listLoading = false;
                if (parseInt(res.status) === 200) {
                    this.tableData = res.data.data;
                    // pagination
                    this.total_pages = res.data.total < res.data.per_page ? 1 : Math.ceil((res.data.total / res.data.per_page))
                    this.current_page = res.data.current_page;
                    this.buttons = [...Array(this.total_pages).keys()].map(i => i + 1);
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
                    this.manageDeleteModal(2, null);
                    this.getBookmarkList();
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


        // =========================
        // pagination previous
        // =========================
        PrevPage() {
            if (this.current_page > 1) {
                this.current_page = this.current_page - 1;
                this.getBookmarkList()
            }
        },

        // =========================
        // pagination next
        // =========================
        NextPage() {
            if (this.current_page < this.total_pages) {
                this.current_page = this.current_page + 1;
                this.getBookmarkList()
            }
        },

        // =========================
        // pagination per page
        // =========================
        pageChange(page) {
            this.current_page = page;
            this.getBookmarkList();
        },


    }
}
</script>
