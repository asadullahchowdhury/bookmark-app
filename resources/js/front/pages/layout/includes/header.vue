<template>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Bookmark</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>

                <div class="right-side-header">
                    <a href="javascript:void(0)" @click="logout">Logout</a>
                </div>
            </div>
        </div>
    </nav>
</template>


<script>
import apiService from "../../../services/apiService.js";
import apiRoutes from "../../../services/apiRoutes.js";

export default {
    data(){
        return{
            profileLoading:false,
            logoutLoading:false,
            profileData:{}
        }
    },

    mounted() {
        this.getProfile()
    },

    methods:{
        getProfile() {
            this.profileLoading = true;
            apiService.ClearErrorHandler();
            apiService.GET(apiRoutes.ProfileDetails, (res) => {
                this.profileLoading = false;
                if (res.status === 200) {
                    this.profileData = res.data
                }
            })

        },


        logout(){
            this.logoutLoading = true;
            apiService.GET(apiRoutes.Logout,(res)=>{
                this.logoutLoading = false;
                if (parseInt(res.status) === 200){
                    window.location.reload();
                }
            })
        }
    }
}
</script>
