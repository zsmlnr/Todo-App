<template>
    <div class="bg-box p-6 lg:w-1/2 grid gap-3 rounded-xl">
        <div class="flex gap-3 items-center">
            <i class="fa-solid fa-id-card"></i>
            <h2 class="font-bold">Personal Information</h2>
        </div>
        <div>
            <table class="text-sm border w-full">
                <thead class="bg-base-100">
                    <tr>
                        <th class=" font-normal p-3 border">
                            Firstname
                        </th>
                        <th class="font-normal p-3 border">
                            Lastname
                        </th>
                        <th class="hidden lg:grid  font-normal p-3">
                            E-Mail
                        </th>
                        <th class="font-normal p-3 border">
                            Member since
                        </th>
                    </tr>
                </thead>
                <tbody class="border">
                    <tr>
                        <td class="border p-3">{{ user.firstname }}</td>
                        <td class="border p-3">{{ user.lastname }}</td>
                        <td class="p-3 hidden lg:flex">{{ user.email }}</td>
                        <td class="border p-3">{{ formatDate(user.created_at) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const user = computed(() => usePage().props.auth.user)

function formatDate(dateString) {
    const date = new Date(dateString)
    return date.toLocaleDateString('de-DE')
}
</script>
<style lang="">
    
</style>