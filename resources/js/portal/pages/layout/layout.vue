<template>
    <Header/>
    <router-view></router-view>
</template>

<script>
import Header from '../layout/includes/header.vue'
export default {
    components:{
        Header,
    },
    data(){
        return{

        }
    }
}
</script>
