<template lang="">
    <Drawer>
        <Navbar/>
        <slot></slot>
        <Footer/>
    </Drawer>
</template>
<script setup>
import Navbar from '../Components/Home/Nav/Navbar.vue';
import Footer from '../Components/Home/Content/Footer.vue';
import Drawer from '../Components/Home/Drawer/Drawer.vue';
</script>
<style lang="">
    
</style>