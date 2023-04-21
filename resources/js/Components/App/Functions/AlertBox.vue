<template>
    <div>
        <template v-if="message">
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p class="font-bold">Success</p>
                <p>{{ messages.success }}</p>
            </div>
        </template>
    </div>
</template>
  
<script setup>
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();

const messages = props.flash;
</script>
  