<template>
    <Link :href="route('profile')" class="flex items-center gap-3 hover:bg-background px-3 py-2 rounded-xl">
    <p class="hidden lg:block">{{ user.firstname }} {{ user.lastname }}</p>
    <img :src="'/assets/placeholder/zsolt.jpg'" alt="zsolt-molnar" class="h-14 w-14 object-cover rounded-full">
    </Link>
</template>
<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
const user = computed(() => usePage().props.auth.user)
</script>
<style lang="">
    
</style>