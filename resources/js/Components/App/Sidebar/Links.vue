<template>
    <div class="grid gap-3">
        <Link class=" rounded-full text-gray h-14 w-14 flex items-center justify-center hover:bg-background transition-all"
            :href="route('dashboard')"
            :class="{ 'bg-primary text-white hover:bg-primary hover:bg-opacity-50': $page.url.startsWith('/dashboard') }">
        <i class="fa-solid fa-grip"></i>
        </Link>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<style lang="">
    
</style>