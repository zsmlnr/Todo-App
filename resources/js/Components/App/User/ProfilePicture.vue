<template>
    <div class="bg-box w-full p-6 rounded-xl grid gap-6 h-fit">
        <div class="flex gap-3 items-center">
            <i class="fa-solid fa-image-portrait"></i>
            <h2 class="font-bold">Profile Picture</h2>
        </div>
        <div class="flex justify-center">
            <div>
                <img :src="imageSrc" v-if="imgSrc" alt="Profile Picture" class="w-60 h-60 object-cover rounded-full">
                <form @submit.prevent="submit">
                    <label for="image_file"
                        class="border bg-box border-box rounded-full text-sm px-6 py-2 hover:bg-transparent transition-all cursor-pointer flex items-center justify-center gap-3 w-full lg:w-fit">
                        <i class="fa-solid fa-upload"></i> Choose your Image
                    </label>
                    <input id="image_file" name="picture" type="file" @change="onFileChange" accept="image/*" size=""
                        @input="form.src = $event.target.files[0]" class="rounded-full hidden">
                    <div>
                        <button type="submit" :disabled="form.processing"
                            :class="{ 'opacity-50 pointer-events-none': form.processing }"
                            class="btn bg-primary border-transparent w-full h-16 font-orbitron font-bold text-white rounded-2xl hover:bg-opacity-80 transition-all">
                            <Spinner v-if="form.processing" />
                            <span v-else>Change</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
  
<script setup>
import Spinner from '../../Content/Spinner.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const form = useForm({
    src: null,
});

const imgSrc = ref(usePage().props.auth.user.profile_pic
    ? '../storage/' + usePage().props.auth.user.profile_pic
    : '../assets/placeholder/USer_Placeholder.png');

function onFileChange(e) {
    const file = e.target.files[0];
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
        imgSrc.value = reader.result;
    };
}

function submit() {
    form.post('/updatePicture');
}

const imageSrc = computed(() => {
    return imgSrc.value || (this.$page.props.auth.user.profile_pic ? '../storage/' + this.$page.props.auth.user.profile_pic : null);
});
</script>
  
<style lang="">
    /* Add your styles here */
  </style>
  