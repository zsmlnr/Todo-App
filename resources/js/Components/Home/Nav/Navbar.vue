<template>
    <!-- Navbar -->
    <nav class="w-full flex gap-3 justify-between items-center sticky top-0 bg-neutral text-base-100 lg:px-16 px-6 py-6">
        <div class="flex-none lg:hidden">
            <label for="sideNav" class="btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block w-6 h-6 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </label>
        </div>
        <div class="flex-1 lg:flex-none font-orbitron font-black uppercase text-xl">YouDoo</div>
        <div class="flex-none hidden lg:block">
            <ul class="menu menu-horizontal">
                <!-- Navbar menu content here -->
                <li>
                    <a href="#product">Product</a>
                </li>
                <li>
                    <a href="#advanteges">Advanteges</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <div class="hidden lg:block">
            <ul class="menu menu-horizontal">
                <li>
                    <Link :href="route('login')">Login</Link>
                </li>
                <li>
                    <Link :href="route('signup')">Sign Up</Link>
                </li>
            </ul>
        </div>
    </nav>
</template>
<script setup>
import { Head, Link } from "@inertiajs/vue3"
import Drawer from "../Drawer/Drawer.vue";
</script>
<style lang="">
    
</style>