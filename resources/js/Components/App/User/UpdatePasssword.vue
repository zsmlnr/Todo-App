<template>
    <div class="bg-box w-full p-6 rounded-xl grid gap-6">
        <div class="flex gap-3 items-center">
            <i class="fa-solid fa-lock"></i>
            <h2 class="font-bold">Change Password</h2>
        </div>
        <form @submit.prevent="submitPassword" :method="put" class="grid gap-3">
            <div class="grid gap-3 w-full">
                <label for="currentPassword">Current Password</label>
                <input id="currentPassword" type="password" v-model="form.currentPassword"
                    class=" bg-base-100 border-none  focus:ring-primary h-16 lg:h-16 rounded-2xl p-6">
                <p v-if="errors.currentPassword" class="text-red-500 text-xs">{{ errors.currentPassword }}</p>
            </div>
            <div class="grid gap-3 w-full">
                <label for="password">New Password</label>
                <input id="password" type="password" v-model="form.password"
                    class=" bg-base-100 border-none  focus:ring-primary h-16 lg:h-16 rounded-2xl p-6">
                <p v-if="errors.password" class="text-red-500 text-xs">{{ errors.password }}</p>
            </div>
            <div class="grid gap-3 w-full">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" v-model="form.password_confirmation"
                    class=" bg-base-100 border-none  focus:ring-primary h-16 lg:h-16 rounded-2xl p-6">
                <p v-if="errors.password_confirmation" class="text-red-500 text-xs">{{ errors.password_confirmation }}</p>
            </div>
            <button type="submit" :disabled="form.processing" :class="{ 'opacity-50 pointer-events-none': form.processing }"
                class="btn bg-primary border-transparent w-full  h-16 font-orbitron font-bold text-white rounded-2xl hover:border-primary hover:bg-primary hover:bg-opacity-80 transition-all">
                <Spinner v-if="form.processing" />
                <span v-else>
                    Change Password
                </span>
            </button>
        </form>
    </div>
</template>
<script setup>
import Spinner from '../../Content/Spinner.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
defineProps({
    errors: Object,
})
const form = useForm({
    currentPassword: null,
    password: null,
    password_confirmation: null
});

function submitPassword() {
    form.put('/updatePassword')
}
</script>
<style lang="">
    
</style>