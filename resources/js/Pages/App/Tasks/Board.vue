<template >
    <Head title="Tasks" />
    <AppLayout>
        <div class="opacity grid gap-6">
            <div class="flex justify-between items-center">
                <span class="flex gap-3 items-center">
                    <i class="fa-solid fa-list-check"></i>
                    <h2 class="text-xl font-black">Your Tasks</h2>
                </span>
                <select v-model="selectedStatus" class=" bg-box border-none  focus:ring-primary h-16  rounded-2xl px-6">
                    <option value="pending">Pending</option>
                    <option value="done">Done</option>
                </select>
            </div>
            <div class="w-fit">
                <AddTask />
            </div>
            <div class="grid md:grid-cols-3 gap-6 text-sm mb-6">
                <div class=" bg-box  rounded-xl border border-transparent grid gap-3 p-6"
                    v-for="(task, index) in filteredTasks" :key="index"
                    :class="{ 'border-red-600 bg-error bg-opacity-10': taskIsOverdue(task), 'bg-warning border-warning bg-opacity-10': isTodayAndPending(task), '': !isTodayAndPending(task), '': !taskIsOverdue(task) }">
                    <div class="flex justify-between items-center">
                        <p class="text-xl font-semibold">{{ task.title }}</p>
                        <div class=" tooltip tooltip-top" :data-tip="task.priority">
                            <i class="fa-solid fa-circle text-high-priority" v-if="task.priority == 'High'"></i>
                            <i class="fa-solid fa-circle text-medium-priority" v-if="task.priority == 'Medium'"></i>
                            <i class="fa-solid fa-circle text-normal-priority" v-if="task.priority == 'Normal'"></i>
                            <i class="fa-solid fa-circle text-low-priority" v-if="task.priority == 'Low'"></i>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-house" v-if="task.category == 'Home'"></i>
                        <i class="fa-solid fa-briefcase" v-if="task.category == 'Work'"></i>
                        <i class="fa-solid fa-coins" v-if="task.category == 'Finance'"></i>
                        <i class="fa-solid fa-heart-pulse" v-if="task.category == 'Health'"></i>
                        <i class="fa-solid fa-user-graduate" v-if="task.category == 'Education'"></i>
                        <i class="fa-solid fa-people-group" v-if="task.category == 'Family'"></i>
                        <i class="fa-solid fa-user-group" v-if="task.category == 'Friends'"></i>
                        <p>{{ task.category }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-calendar-days"></i>
                        <p>{{ task.deadline }}</p>
                    </div>
                    <div>
                        <p>{{ task.description }}</p>
                    </div>
                    <div class="flex gap-3 items-center">
                        <button v-if="task.status === 'pending'" @click.prevent="done(task.id)"
                            class="btn btn-sm text-xs gap-3 bg-primary bg-opacity-50 normal-case text-neutral border-none hover:bg-opacity-30 hover:bg-primary">
                            <i class="fa-solid fa-circle-check"></i>
                            Done
                        </button>
                        <button @click.prevent="destroy(task.id)"
                            class="btn btn-sm text-xs gap-3 bg-error bg-opacity-50 normal-case text-neutral border-none hover:bg-error hover:bg-opacity-30">
                            <i class="fa-solid fa-trash"></i>
                            Delete
                        </button>

                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script setup>
import { Head, router, Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import AddTask from '../../../Components/App/Functions/AddTask.vue';
import AppLayout from '../../../Layouts/AppLayout.vue';
const currentDate = new Date();
const props = defineProps({
    tasks: Object
})
const selectedStatus = ref('pending');

const filteredTasks = computed(() => {
    return Object.values(props.tasks).filter((task) => task.status === selectedStatus.value);
});

function isTodayAndPending(task) {
    const [day, month, year] = task.deadline.split('.');
    const deadlineDate = new Date(`${year}-${month}-${day}`);
    const isPending = task.status === 'pending';
    const isToday = deadlineDate.toDateString() === currentDate.toDateString();
    return isPending && isToday;
}
function taskIsOverdue(task) {
    const [day, month, year] = task.deadline.split('.');
    const deadlineDate = new Date(`${year}-${month}-${day}`);
    return deadlineDate < currentDate && task.status === 'pending';
}

function done(id) {
    router.put(route('task.done', id))
}

function destroy(id) {
    router.delete(route('task.destroy', id));
}

</script>
<style></style>