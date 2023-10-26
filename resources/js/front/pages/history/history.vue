<template>
    <div class="container">
        <div class="row">
            <div class="card card-list mt-5 mb-4 rounded-4 py-3 px-0 shadow border-0">
                <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center ">
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

                <div class="card-footer border-0 bg-white">
                    <!-- Pagination Start -->
                    <div class="d-flex justify-content-center" v-if="historyListLoading === false  && historyData.length > 0">
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
</template>


<script>
import apiService from "../../services/apiService.js";
import apiRoutes from "../../services/apiRoutes.js";

export default {
    data(){
        return{
            historyListLoading:false,
            historyParam: {
                page:1,
                limit: 1,
            },
            historyData: [],
            /*Pagination Variables*/
            total_pages: 0,
            current_page: 0,
            buttons: [],
        }
    },
    mounted() {
        this.getHistory()
    },
    methods:{
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

                    // pagination
                    this.total_pages = res.data.total < res.data.per_page ? 1 : Math.ceil((res.data.total / res.data.per_page))
                    this.current_page = res.data.current_page;
                    this.buttons = [...Array(this.total_pages).keys()].map(i => i + 1);
                }
            })
        },



        // =========================
        // pagination previous
        // =========================
        PrevPage() {
            if (this.current_page > 1) {
                this.current_page = this.current_page - 1;
                this.getHistory()
            }
        },

        // =========================
        // pagination next
        // =========================
        NextPage() {
            if (this.current_page < this.total_pages) {
                this.current_page = this.current_page + 1;
                this.getHistory()
            }
        },

        // =========================
        // pagination per page
        // =========================
        pageChange(page) {
            this.current_page = page;
            this.getHistory();
        },


    }
}
</script>
