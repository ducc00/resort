<template>
    <header-component />
    <router-view></router-view>
</template>
<script>
import HeaderComponent from './components/header/HeaderComponent.vue'
export default {
    components: {
        HeaderComponent
    }
}
</script>