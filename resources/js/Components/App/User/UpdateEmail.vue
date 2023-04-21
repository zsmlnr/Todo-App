<template>
    <div class="bg-box w-full p-6 rounded-xl grid gap-6 h-fit">
        <div class="flex gap-3 items-center">
            <i class="fa-solid fa-envelope"></i>
            <h2 class="font-bold">Update E-Mail</h2>
        </div>
        <form @submit.prevent="submit" :method="put" class="grid gap-3">
            <div class="grid gap-3 w-full">
                <label for="current_email">Current E-Mail</label>
                <input id="current_email" type="email" v-model="emailForm.currentEmail"
                    class=" bg-base-100 border-none  focus:ring-primary h-16 lg:h-16 rounded-2xl p-6">
                <p v-if="errors.currentEmail" class="text-red-500 text-xs">{{ errors.currentEmail }}</p>
            </div>
            <div class="grid gap-3 w-full">
                <label for="email">New E-Mail</label>
                <input v-model="emailForm.email" id="email" type="email"
                    class=" bg-base-100 border-none  focus:ring-primary h-16 lg:h-16 rounded-2xl p-6">
                <p v-if="errors.email" class="text-red-500 text-xs">{{ errors.email }}</p>
            </div>
            <button type="submit" :disabled="emailForm.processing"
                :class="{ 'opacity-50 pointer-events-none': emailForm.processing }"
                class="btn bg-primary border-transparent w-full  h-16 font-orbitron font-bold text-white rounded-2xl hover:border-primary hover:bg-primary hover:bg-opacity-80 transition-all">
                <Spinner v-if="emailForm.processing" />
                <span v-else>Update E-Mail</span>
            </button>
        </form>
    </div>
</template>
<script setup>
import Spinner from '../../Content/Spinner.vue';
import { useForm, } from '@inertiajs/vue3';

defineProps({
    errors: Object,
})

const emailForm = useForm({
    currentEmail: null,
    email: null
})

function submit() {
    emailForm.put('/updateEmail')
}
</script>
<style></style>