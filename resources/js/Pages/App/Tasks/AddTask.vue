<template>
    <Head title="Add new Task" />
    <AppLayout>
        <div class="bg-box p-6 rounded-xl opacity w-full lg:w-1/2">
            <form class="grid gap-6" @submit.prevent="submit" :method="post">
                <div class="grid gap-3">
                    <div class="flex gap-3 items-center">
                        <i class="fa-solid fa-heading"></i>
                        <label for="title">Title</label>
                    </div>
                    <input id="title" type="text" v-model="form.title" placeholder="Take out the Trash"
                        class=" bg-base-100 border-none  focus:ring-primary h-16  rounded-2xl p-6">
                    <p v-if="errors.title" class="text-red-500 text-xs">{{ errors.title }}</p>
                </div>
                <div class="grid gap-3">
                    <div class="flex gap-3 items-center">
                        <i class="fa-solid fa-layer-group"></i>
                        <label for="category">Category</label>
                    </div>
                    <select id="category" v-model="form.category"
                        class=" bg-base-100 border-none  focus:ring-primary h-16  rounded-2xl px-6">
                        <option selected disabled>Choose one...</option>
                        <option v-for="(category, index) in categories" :key="index" :value="category">
                            {{ category }}
                        </option>
                    </select>
                    <p v-if="errors.category" class="text-red-500 text-xs">{{ errors.category }}</p>
                </div>
                <div class="grid gap-3">
                    <div class="flex gap-3 items-center">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <label for="category">Priority</label>
                    </div>
                    <select id="priority" v-model="form.priority"
                        class=" bg-base-100 border-none  focus:ring-primary h-16  rounded-2xl px-6">
                        <option selected disabled>Choose one...</option>
                        <option v-for="(priority, index) in priorities" :key="index" :value="priority">
                            {{ priority }}
                        </option>
                    </select>
                    <p v-if="errors.priority" class="text-red-500 text-xs">{{ errors.priority }}</p>
                </div>
                <div class="grid gap-3">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-calendar-days"></i>
                        <label for="deadline">Deadline</label>
                    </div>
                    <input v-model="form.deadline" type="date" name="deadline" id="deadline"
                        class="bg-base-100 border-none  focus:ring-primary h-16  rounded-2xl px-6">
                    <p v-if="errors.deadline" class="text-red-500 text-xs">{{ errors.deadline }}</p>
                </div>
                <div class="grid gap-3">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-list"></i>
                        <label for="description">Description</label>
                    </div>
                    <textarea v-model="form.description"
                        class=" bg-base-100 border-none  focus:ring-primary  rounded-2xl p-6"></textarea>
                    <p v-if="errors.description" class="text-red-500 text-xs">{{ errors.description }}</p>
                </div>
                <div>
                    <button type="submit" :disabled="form.processing"
                        :class="{ 'opacity-50 pointer-events-none': form.processing }"
                        class="btn bg-primary border-transparent w-full  h-16 font-orbitron font-bold text-white rounded-2xl hover:border-primary hover:bg-primary hover:bg-opacity-80 transition-all">
                        <Spinner v-if="form.processing" />
                        <span v-else>Create Task</span>

                    </button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
<script setup>
import Spinner from '../../../Components/Content/Spinner.vue';
import AppLayout from '../../../Layouts/AppLayout.vue';
import { useForm, Head } from '@inertiajs/vue3';
defineProps({
    errors: Object,
    categories: Object,
    priorities: Object
})

const form = useForm({
    title: null,
    category: null,
    priority: null,
    deadline: null,
    description: null
})
function submit() {
    form.post('/new-task/create')
}
</script>
<style lang="">
    
</style>