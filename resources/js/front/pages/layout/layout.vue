<template>
    <Header/>
    <router-view/>
</template>

<script>
import Header from "../../pages/layout/includes/header.vue";

export default {
    data() {
        return {}
    },
    components: {
        Header,
    }
}
</script>
