<template>
    <Head title="Login" />
    <AuthLayout>

        <div class="mb-14">
            <h1 class="text-2xl font-orbitron font-bold">Login to your account.</h1>
            <p class=" font-montserrat">Empowering productivity, one YouDoo at a time.</p>
        </div>
        <div class="font-montserrat ">
            <form class="grid gap-6" @submit.prevent="submit" :method="post">
                <div class="grid gap-3">
                    <label for="email">E-Mail</label>
                    <input id="email" type="email" v-model="form.email"
                        class=" bg-box border-none  focus:ring-primary h-16  rounded-2xl p-6">
                    <p v-if="errors.email" class="text-red-500 text-xs">{{ errors.email }}</p>
                </div>
                <div class="grid gap-3">

                    <label for="password">Password</label>
                    <input id="passowrd" type="password" v-model="form.password"
                        class=" bg-box border-none  focus:ring-primary h-16  rounded-2xl p-6">
                    <p v-if="errors.password" class="text-red-500 text-xs">{{ errors.password }}</p>
                </div>
                <div>
                    <button type="submit" :disabled="form.processing"
                        :class="{ 'opacity-50 pointer-events-none': form.processing }"
                        class="btn bg-primary border-transparent w-full  h-16 font-orbitron font-bold text-white rounded-2xl hover:bg-opacity-80 transition-all">
                        <Spinner v-if="form.processing" />
                        <span v-else>Login</span>

                    </button>
                </div>
                <div class="text-base-300 flex items-center gap-3 text-border">
                    <div class="w-full h-[1px] bg-base-200 rounded-lg"></div>
                    <div>or</div>
                    <div class="w-full h-[1px] bg-base-200 rounded-lg"></div>
                </div>
                <div class="flex">
                    <a :href="route('signup')"
                        class="btn bg-transparent border-base-300 flex items-center justify-center w-full  h-16 font-orbitron font-bold border-4 border-solid border-border text-base-300 rounded-2xl hover:bg-base-300 hover:border-base-300 hover:text-white transition-all">
                        Sign Up
                    </a>
                </div>
            </form>
        </div>
    </AuthLayout>
</template>
<script setup>
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import AuthLayout from '../../Layouts/AuthLayout.vue';
import Spinner from '../../Components/Content/Spinner.vue';
defineProps({
    errors: Object,
})
const form = useForm({
    email: null,
    password: null,
})

function submit() {
    form.post('/login/auth')
}
</script>
<style lang="">
    
</style>