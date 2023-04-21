<template>
    <nav class=" fixed bottom-0 mt-14 bg-box border-border w-full px-14 py-6">
        <ul class="flex gap-3 justify-between relative text-xl text-gray">
            <li>
                <Link :href="route('home')">
                <i class="fa-solid fa-grip" :class="{ 'text-text': $page.url === '/' }"></i>
                </Link>
            </li>
            <li class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-20">
                <button type="button"
                    class="font-montserrat font-bold flex items-center gap-1 border border-transparent bg-box p-3  rounded-full active:border-primary active:bg-primary active:bg-opacity-50 hover:bg-background hover:scale-105 transition-all">
                    <i class="fa-solid fa-circle-plus text-primary text-7xl"></i>
                </button>
            </li>
            <li>
                <Link>
                <i class="fa-solid fa-users" :class="{ 'text-text': $page.url === '/team' }"></i>
                </Link>
            </li>
        </ul>
    </nav>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<style lang="">
    
</style>