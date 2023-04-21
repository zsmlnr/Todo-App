<template>
    <WebsiteLayout>
        <Hero />
        <Product />
        <Advantages />
        <Contact />
    </WebsiteLayout>
</template>
<script>
import { onMounted } from 'vue'
import { themeChange } from 'theme-change'
import WebsiteLayout from '../../Layouts/WebsiteLayout.vue'
import Hero from '../../Components/Home/Content/Hero.vue';
import Product from '../../Components/Home/Content/Product.vue';
import Advantages from '../../Components/Home/Content/Advantages.vue';
import Contact from '../../Components/Home/Content/Contact.vue';

export default {
    setup() {
        onMounted(() => {
            themeChange(false);
        });
    },
    components: { WebsiteLayout, Hero, Product, Advantages, Contact }
}
</script>
<style lang="">
    
</style>