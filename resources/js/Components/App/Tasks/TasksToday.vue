<template>
    <div class="bg-box grid gap-3 rounded-xl p-6 h-fit">
        <div class="flex justify-between items-center">
            <span class="flex items-center gap-3">
                <i class="fa-solid fa-calendar-day"></i>
                <h2 class=" font-black">Today</h2>
            </span>
        </div>
        <div class="grid gap-3">
            <table class=" table-auto rounded-lg border">
                <thead>
                    <tr class=" bg-base-100">
                        <th class="font-normal border p-3">Task</th>
                        <th class="font-normal border p-3">Category</th>
                        <th class="font-normal border p-3">Priority</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(task, index) in Today" :key="index">
                        <td class="font-normal border p-3">
                            {{ task.title }}
                        </td>
                        <td class="font-normal border p-3 text-center">
                            <div class="tooltip tooltip-top" :data-tip="task.category">
                                <i class="fa-solid fa-house" v-if="task.category == 'Home'"></i>
                                <i class="fa-solid fa-briefcase" v-if="task.category == 'Work'"></i>
                                <i class="fa-solid fa-coins" v-if="task.category == 'Finance'"></i>
                                <i class="fa-solid fa-heart-pulse" v-if="task.category == 'Health'"></i>
                                <i class="fa-solid fa-user-graduate" v-if="task.category == 'Education'"></i>
                                <i class="fa-solid fa-people-group" v-if="task.category == 'Family'"></i>
                                <i class="fa-solid fa-user-group" v-if="task.category == 'Friends'"></i>
                            </div>
                        </td>
                        <td v-if="task.priority === 'High'"
                            class="font-normal border p-3 text-high-priority text-center text-xl">
                            <div class="tooltip tooltip-top" data-tip="High">
                                <i class="fa-solid fa-circle"></i>
                            </div>
                        </td>
                        <td v-if="task.priority === 'Medium'"
                            class="font-normal border p-3 text-medium-priority text-center text-xl">
                            <div class="tooltip tooltip-top" data-tip="Medium">
                                <i class="fa-solid fa-circle"></i>
                            </div>
                        </td>
                        <td v-if="task.priority === 'Normal'"
                            class="font-normal border p-3 text-normal-priority text-center text-xl">
                            <div class="tooltip tooltip-top" data-tip="Normal">
                                <i class="fa-solid fa-circle"></i>
                            </div>
                        </td>
                        <td v-if="task.priority === 'Low'"
                            class="font-normal border p-3 text-low-priority text-center text-xl">
                            <div class="tooltip tooltip-top" data-tip="Low">
                                <i class="fa-solid fa-circle"></i>
                            </div>
                        </td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    tasks: Object
})
const TasksToday = Object.values(props.tasks)
    .filter(task => task.deadline == new Date() && task.status === 'pending')
    .filter(task => taskIsOverdue(task));

const Today = Object.values(props.tasks).filter(task => {
    const [day, month, year] = task.deadline.split('.');
    const deadlineDate = new Date(`${year}-${month}-${day}`);
    const today = new Date();
    return deadlineDate.getFullYear() === today.getFullYear() &&
        deadlineDate.getMonth() === today.getMonth() &&
        deadlineDate.getDate() === today.getDate() &&
        task.status === 'pending';
});



const currentDate = new Date();
function taskIsOverdue(task) {
    const [day, month, year] = task.deadline.split('.');
    const deadlineDate = new Date(`${year}-${month}-${day}`);
    return deadlineDate < currentDate;
}

</script>
<style></style>