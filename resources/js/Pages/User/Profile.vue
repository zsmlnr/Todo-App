<template>
    <Head title="Your Account" />
    <AppLayout>
        <div class="grid gap-6 opacity lg:m-0">
            <div class="lg:flex grid gap-6">
                <PersonalInformation />
                <HelpCenter />
            </div>
            <div class="lg:flex grid gap-6">
                <ProfilePicture />
                <UpdateEmail :errors="errors" />
                <UpdatePasssword :errors="errors" />
            </div>
            <div class="border border-error p-3 rounded-xl">
                <DeleteAccount />
            </div>
        </div>
    </AppLayout>
</template>
<script setup>
import { Head } from '@inertiajs/vue3';
import AppLayout from '../../Layouts/AppLayout.vue';
import PersonalInformation from '../../Components/App/User/PersonalInformation.vue';
import UpdateEmail from '../../Components/App/User/UpdateEmail.vue';
import DeleteAccount from '../../Components/App/User/DeleteAccount.vue';
import HelpCenter from '../../Components/Content/HelpCenter.vue';
import UpdatePasssword from '../../Components/App/User/UpdatePasssword.vue';
import ProfilePicture from '../../Components/App/User/ProfilePicture.vue';
defineProps({
    errors: Object,
})

</script>
<style lang="">
    
</style>