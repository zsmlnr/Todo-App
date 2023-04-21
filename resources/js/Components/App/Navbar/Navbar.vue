<template>
    <nav class=" bg-box w-full border-b border-border flex items-center px-14 pt-6">
        <div class="grid w-full gap-3">
            <div class="flex justify-between w-full items-center mb-3">
                <div class="flex gap-3 items-center">
                    <p v-if="$page.url === '/dashboard'" class="text-xl font-black flex items-center gap-3">
                        <i class="fa-solid fa-grip text-primary text-xl"></i> Dashboard
                    </p>
                    <p v-if="$page.url.startsWith('/dashboard/board')" class="text-xl font-black flex items-center gap-3">
                        <i class="fa-solid fa-list-check text-primary text-xl"></i> Tasks
                    </p>
                    <p v-if="$page.url === '/new-task'" class="text-xl font-black flex items-center gap-3">
                        <i class="fa-solid fa-circle-plus text-primary text-xl"></i> Add new Task
                    </p>
                    <p v-if="$page.url === '/profile'" class="text-xl font-black flex items-center gap-3">
                        <i class="fa-solid fa-id-card-clip text-primary text-xl"></i> Account
                    </p>
                </div>
                <div>
                    <ProfileLink />
                </div>
            </div>
            <div class="w-full flex gap-3"
                :class="{ 'hidden': $page.url.startsWith('/new-task') || $page.url.startsWith('/profile') }">
                <Link class="text-gray px-6 border-b-2 hover:border-gray"
                    :class="{ ' border-primary text-text hover:border-primary': $page.url === '/dashboard' }, { 'border-transparent': $page.url === '/dashboard/board' }"
                    :href="route('dashboard')">
                Overview
                </Link>
                <Link class=" text-gray px-6 border-b-2 hover:border-gray"
                    :class="{ 'border-primary text-text hover:border-primary': $page.url.startsWith('/dashboard/board') }, { 'border-transparent': $page.url === '/dashboard' }"
                    :href="route('board')">
                Board
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