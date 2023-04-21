<template lang="">
    <aside class="border-r border-border flex flex-col justify-between items-center gap-3 p-3 bg-box">
        <div class="grid gap-6">
            <Logo/>
            <Links/>
        </div>
        <Logout/>
    </aside>
</template>
<script setup>
import Links from './Links.vue';
import Logo from './Logo.vue';
import Logout from '../Functions/Logout.vue';

</script>
<style lang="">
    
</style>