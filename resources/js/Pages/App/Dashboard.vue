<template>
    <Head title="Projectname | Dashboard" />
    <AppLayout>
        <div class="flex flex-col lg:flex-row gap-6 lg:gap-14 mb-20 lg:mb-0 opacity">
            <div class="grid gap-6 lg:gap-14 lg:w-1/2 h-fit">
                <div class="flex lg:gap-14 justify-between lg:justify-start">
                    <AddTask />
                </div>
                <div class="grid lg:flex gap-6">
                    <TasksToday />
                    <TasksWeek />
                </div>
            </div>
            <div class="w-full lg:w-1/2 flex-1">
            </div>
        </div>
    </AppLayout>
</template>
<script setup>
import { Head } from '@inertiajs/vue3';
import AddTask from '../../Components/App/Functions/AddTask.vue';
import AppLayout from '../../Layouts/AppLayout.vue';
import TasksToday from '../../Components/App/Tasks/TasksToday.vue';
import TasksWeek from '../../Components/App/Tasks/TasksWeek.vue';

</script>
<style lang="css"></style>