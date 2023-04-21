<template>
    <Head title="Sign Up" />
    <AuthLayout>

        <div class="mb-12">
            <h1 class="text-2xl font-orbitron font-bold">Sign up for free.</h1>
            <p class=" font-montserrat">Empowering productivity, one YouDoo at a time.</p>
        </div>
        <div class="font-montserrat">
            <form class="grid gap-6" @submit.prevent="submit" :method="post">
                <div class="grid lg:flex gap-6">
                    <div class="grid gap-3 w-full">
                        <label for="firstname">Firstname</label>
                        <input id="firtsname" type="text" v-model="form.firstname"
                            class=" bg-box border-none  focus:ring-primary h-16 lg:h-16 rounded-2xl p-6">
                        <span v-if="errors.firstname" class="text-red-500 text-xs">{{ errors.firstname }}</span>
                    </div>
                    <div class="grid gap-3 w-full">
                        <label for="lastname">Lastname</label>
                        <input id="lastname" type="text" v-model="form.lastname"
                            class=" bg-box border-none  focus:ring-primary h-16 lg:h-16 rounded-2xl p-6">
                        <span v-if="errors.lastname" class="text-red-500 text-xs">{{ errors.lastname }}</span>
                    </div>
                </div>
                <div class="grid gap-3">
                    <label for="email">E-Mail</label>
                    <input id="email" type="email" v-model="form.email"
                        class=" bg-box border-none  focus:ring-primary h-16 lg:h-16 rounded-2xl p-6">
                    <span v-if="errors.email" class="text-red-500 text-xs">{{ errors.email }}</span>
                </div>
                <div class="grid lg:flex gap-6">
                    <div class="grid gap-3 w-full">
                        <label for="password">Password</label>
                        <input id="passowrd" type="password" v-model="form.password"
                            class=" bg-box border-none  focus:ring-primary h-16 lg:h-16 rounded-2xl p-6">
                        <span v-if="errors.password" class="text-red-500 text-xs">{{ errors.password }}</span>
                    </div>
                    <div class="grid gap-3 w-full">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" type="password" v-model="form.password_confirmation"
                            class=" bg-box border-none  focus:ring-primary h-16 lg:h-16 rounded-2xl p-6">
                        <span v-if="errors.password_confirmation" class="text-red-500 text-xs">{{
                            errors.password_confirmation }}</span>
                    </div>
                </div>
                <div class="bg-box flex items-center gap-3 p-2 rounded-lg text-xs">
                    <i class="fa-solid fa-circle-info"></i>
                    <p>The password needs to be min: 8 chars, 1 number, 1 uppercase, 1 lowercase and 1 special.</p>
                </div>
                <div>
                    <button type="submit" :class="{ 'opacity-50 pointer-events-none': form.processing }"
                        class="btn bg-primary border-transparent w-full  h-16 font-orbitron font-bold text-white rounded-2xl hover:bg-opacity-80 transition-all">
                        <Spinner v-if="form.processing" />
                        <span v-else>Sign Up</span>
                    </button>
                </div>
                <div class="text-base-300 flex items-center gap-3 text-border">
                    <div class="w-full h-[1px] bg-base-200 rounded-lg"></div>
                    <div>or</div>
                    <div class="w-full h-[1px] bg-base-200 rounded-lg"></div>
                </div>
                <div class="flex">
                    <a :href="route('login')"
                        class="btn bg-transparent border-base-300 flex items-center justify-center w-full  h-16 font-orbitron font-bold border-4 border-solid border-border text-base-300 rounded-2xl hover:bg-base-300 hover:border-base-300 hover:text-white transition-all">
                        Login
                    </a>
                </div>
            </form>
        </div>
    </AuthLayout>
</template>
<script setup>
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import Spinner from '../../Components/Content/Spinner.vue';
import { reactive } from 'vue';
import AuthLayout from '../../Layouts/AuthLayout.vue';
defineProps({
    errors: Object,
})
const form = useForm({
    firstname: null,
    lastname: null,
    email: null,
    password: null,
    password_confirmation: null
})

function submit() {
    form.post('/sign-up/store')
}
</script>
<style lang="">
    
</style>