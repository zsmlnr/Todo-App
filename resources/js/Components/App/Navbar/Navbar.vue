<template lang="">
    <nav class=" bg-box w-full border-b border-border flex items-center px-14 pt-6">
        <div class="grid w-full gap-3">
        <div class="flex justify-between w-full items-center mb-3">
            <div class="flex gap-3 items-center">
            </div>
            <div>
                <ProfileLink/>
            </div>
        </div>
        <div class="w-full flex gap-3" :class="{ 'hidden': $page.url.startsWith('/team') || $page.url.startsWith('/username')}">
                <Link class="text-gray px-6 border-b-2 hover:border-gray" :class="{ ' border-primary text-text hover:border-primary': $page.url === '/dashboard'}, {'border-transparent' : $page.url === '/dashboard/settings' || $page.url === '/dashboard/board'}">
                    Overview
                </Link>
                <Link  class=" text-gray px-6 border-b-2 hover:border-gray" :class="{ 'border-primary text-text hover:border-primary':  $page.url.startsWith('/dashboard/board')},{'border-transparent' : $page.url === '/dashboard' ||  $page.url.startsWith('/dashboard/settings/')}">
                    Board
                </Link>
                <Link  class=" text-gray px-6 border-b-2 hover:border-gray" :class="{ 'border-primary text-text hover:border-primary': $page.url === '/dashboard/settings'},{'border-transparent' : $page.url === '/dashboard' || $page.url === '/dashboard/board'}">
                    Settings
                </Link>
            </div>
        </div>
    </nav>
</template>
<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import ProfileLink from '../User/ProfileLink.vue';



</script>
<style lang="">
    
</style>