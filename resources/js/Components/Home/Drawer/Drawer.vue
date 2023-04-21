<template>
    <div class="drawer">
        <input id="sideNav" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <slot></slot>
        </div>
        <div class="drawer-side">
            <label for="sideNav" class="drawer-overlay"></label>
            <ul class="menu p-4 w-80 bg-base-100">
                <!-- Sidebar content here -->
                <li>
                    <Link :href="route('login')">Login</Link>
                </li>
                <li>
                    <Link :href="route('signup')">Sign Up</Link>
                </li>

            </ul>
        </div>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<style lang="">
    
</style>