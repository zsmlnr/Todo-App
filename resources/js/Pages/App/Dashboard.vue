<template>
    <Head title="Dashboard" />
    <AppLayout>
        <div class="grid gap-6 opacity">
            <div class="w-fit">
                <AddTask />
            </div>
            <div class="grid lg:grid-cols-2 gap-6">
                <TasksToday :tasks="tasks" />
                <TaskCompare :tasks="tasks" />
            </div>

        </div>
    </AppLayout>
</template>
<script setup>
import { Head } from '@inertiajs/vue3';
import AddTask from '../../Components/App/Functions/AddTask.vue';
import AppLayout from '../../Layouts/AppLayout.vue';
import TasksToday from '../../Components/App/Tasks/TasksToday.vue';
import TaskCompare from '../../Components/App/Tasks/TaskCompare.vue';
defineProps({
    tasks: Object
})
</script>
<style lang="css"></style>