<template>
    <Link :href="route('profile')" class="flex items-center gap-3 hover:bg-base-100 px-3 py-2 rounded-xl">
    <p class="hidden lg:block">{{ user.firstname }} {{ user.lastname }}</p>
    <img :src="imgSrc" alt="zsolt-molnar" class="h-14 w-14 object-cover rounded-full">
    </Link>
</template>
<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
const user = computed(() => usePage().props.auth.user)
const imgSrc = ref(usePage().props.auth.user.profile_pic
    ? '../storage/' + usePage().props.auth.user.profile_pic
    : '../assets/placeholder/USer_Placeholder.png');

</script>
<style lang="">
    
</style>