<template lang="">
    <div>
         <Link :href="route('addTask')"
             class="flex gap-3 items-center border-2 border-transparent bg-box px-8 py-6 rounded-xl font-bold font-montserrat hover:bg-transparent hover:border-box transition-all">
             <i class="fa-solid fa-circle-plus text-primary text-xl"></i>  
             <span class="hidden lg:block">Add Task</span>
         </Link>
     </div>
 </template>
<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<style lang="">
     
 </style> 