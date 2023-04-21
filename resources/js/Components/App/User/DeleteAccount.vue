<template>
    <div class="bg-error bg-opacity-30 p-6 rounded-xl flex gap-6">
        <div class="grid gap-6 w-full">

            <div class="flex items-center gap-3">
                <i class="fa-solid fa-trash"></i>
                <h2 class="font-bold">Delete Account</h2>
            </div>
            <div class="bg-error bg-opacity-50 rounded-xl p-6 flex items-start gap-3 h-fit">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <p class="text-xs"> To delete your account, all of your personal information and tasks will be permanently
                    deleted and cannot be
                    recovered. Please be sure that you want to proceed with this action before continuing.</p>
            </div>
            <form @submit.prevent="submit" :method="put" class="grid gap-3">
                <div class="grid gap-3 w-full">
                    <label for="firtsname">Firtsname</label>
                    <input id="firtsname" type="text" v-model="form.firstname"
                        class=" bg-base-100 border-none  focus:ring-primary h-16 lg:h-16 rounded-2xl p-6">
                </div>
                <div class="grid gap-3 w-full">
                    <label for="lastname">Lastname</label>
                    <input id="lastname" type="text" v-model="form.lastname"
                        class=" bg-base-100 border-none  focus:ring-primary h-16 lg:h-16 rounded-2xl p-6">
                </div>
                <button type="submit" :disabled="form.processing"
                    :class="{ 'opacity-50 pointer-events-none': form.processing }"
                    class="btn bg-error border-transparent w-full  h-16 font-orbitron font-bold text-white rounded-2xl hover:border-error hover:bg-error hover:bg-opacity-80 transition-all">
                    <Spinner v-if="form.processing" />
                    <span v-else>Delete Account</span>
                </button>
            </form>
        </div>

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
    firtsname: null,
    lastname: null
});
const user = computed(() => usePage().props.auth.user)
function submit() {
    form.post('/login/auth')
}
</script>
<style lang="">
    
</style>