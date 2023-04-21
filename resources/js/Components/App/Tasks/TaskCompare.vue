<template>
    <div class="bg-box p-6 rounded-xl grid gap-3 items-start lg:w-fit w-full">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-list-check"></i>
            <h2 class="font-bold">Tasks</h2>
        </div>
        <canvas id="pie" ref="pieChart"></canvas>
    </div>
</template>
  
<script setup>
import Chart from 'chart.js/auto';
import { onMounted, ref } from 'vue';
const props = defineProps({
    tasks: Object
});

const pendingTasks = Object.values(props.tasks).filter(task => task.status === 'pending');
const doneTasks = Object.values(props.tasks).filter(task => task.status === 'done');

const data = {
    labels: ['Done', 'Pending'],
    datasets: [{
        data: [doneTasks.length, pendingTasks.length],
        backgroundColor: ['#34d399 ', '#ff6384']
    }],
};

onMounted(() => {
    const ctx = document.getElementById('pie');
    const pieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
    });
});
</script>
  