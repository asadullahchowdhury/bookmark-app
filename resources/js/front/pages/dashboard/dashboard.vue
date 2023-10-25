<template>
    <div class="dashboard">

        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-list mt-5 mb-4 rounded-4 py-3 px-0 shadow border-0">
                        <div class="card-header bg-transparent border-0 px-4">
                            <h3 class="card-title">Your Bookmarks <img :src="`/images/global/bookmark.png`" alt=""></h3>
                        </div>

                        <div class="card-body list-body">
                            <div class="list-wrap" v-if="tableData.length > 0 && listLoading === false">
                                <table class="table table-borderless table-hover table-bookmark">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(each,index) in tableData" class="border-bottom align-middle">
                                        <td>
                                            <a :href="each.url" class="text-decoration-none text-dark underline-anim"
                                               target="_blank">{{ each.name }}</a>
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
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-list mt-5 mb-4 rounded-4 py-3 px-0 shadow border-0">
                        <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center px-4">
                            <h3 class="card-title">Login History <img :src="`/images/global/history.png`" alt=""></h3>
                        </div>

                        <div class="card-body list-body">
                            <div class="history-list-wrap table-responsive">
                                <table class="table table-history table-borderless table-hover"
                                       v-if="historyData.length > 0 && historyListLoading === false">
                                    <thead>
                                    <tr>
                                        <th>IP Address</th>
                                        <th>Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(each,index) in historyData" class="align-middle border-bottom">
                                        <td class="text-muted">{{each.ip_address}}</td>
                                        <td class="text-muted time">{{each.created_at_formatted}}</td>
                                    </tr>
                                    </tbody>
                                </table>



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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
            listLoading: false,
            listParam: {
                keyword: '',
                date: 'today',
                limit: 15,
                page:1,
            },
            tableData: [],
            // login history variables
            historyListLoading:false,
            historyParam: {
                limit: 10,
            },
            historyData: [],
        }
    },
    mounted() {
        this.getBookmarkList();
        this.getHistory();

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
        * Login history list API
        ============================================*/
        getHistory() {
            this.historyListLoading = true;
            this.historyParam.page = this.current_page;
            apiService.POST(apiRoutes.HistoryList, this.historyParam, (res) => {
                this.historyListLoading = false;
                this.historyListLoading = false;
                if (parseInt(res.status) === 200) {
                    this.historyData = res.data.data
                }
            })
        },


    }
}
</script>
