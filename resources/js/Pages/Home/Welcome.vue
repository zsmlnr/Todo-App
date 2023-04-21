<template>
    <WebsiteLayout>
        <Hero />
    </WebsiteLayout>
</template>
<script>
import { onMounted } from 'vue'
import { themeChange } from 'theme-change'
import WebsiteLayout from '../../Layouts/WebsiteLayout.vue'
import Hero from '../../Components/Home/Content/Hero.vue';

export default {
    setup() {
        onMounted(() => {
            themeChange(false);
        });
    },
    components: { WebsiteLayout, Hero }
}
</script>
<style lang="">
    
</style>