<template>
    <div class="bg-box grid gap-3 rounded-xl p-6">
        <span class="flex items-center gap-3">
            <i class="fa-solid fa-calendar-day"></i>
            <h2 class=" font-black">Today</h2>
        </span>
        <div class="grid gap-3">
            <div v-for="(tasks, index) in taskToday" :key="index"
                class="bg-base-100 p-3 rounded-lg grid grid-flow-col gap-6 items-center">
                <div class="flex gap-3">
                    <span>
                        <p>{{ tasks.title }}</p>
                    </span>
                    <span>
                        <p>{{ tasks.category }}</p>
                    </span>
                </div>
                <div class="w-fit">
                    <Link class="flex gap-3 items-center bg-box p-3 rounded-lg">
                    <i class="fa-solid fa-eye"></i>
                    show
                    </Link>

                </div>
            </div>
            <div></div>
        </div>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';

const taskToday = [
    {
        id: 0,
        title: 'Grocery shopping',
        category: 'Home'
    },
    {
        id: 1,
        title: 'Cleaning',
        category: 'Home'
    },
    {
        id: 2,
        title: 'Cooking',
        category: 'Home'
    }
]
</script>
<style></style>