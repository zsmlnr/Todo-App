<template>
    <nav class="p-3">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost bg-box">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                    <Link :href="route('profile')">Account</Link>
                </li>
                <li>
                    <Logout />
                </li>

            </ul>
        </div>
    </nav>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
import Logout from '../Functions/Logout.vue';
</script>
<style lang="">
    
</style>