<template>
    <Link :href="route('logout')" method="post"
        class="h-14 w-14 flex items-center justify-center rounded-full text-gray hover:bg-background focus:opacity-50 transition-all">
    <Spinner v-if="dd" />
    <i v-else class="fa-solid fa-right-from-bracket"></i>
    </Link>
</template>
<script>
import { Link, router } from '@inertiajs/vue3';
import Spinner from '../../Content/Spinner.vue';

export default {
    components: { Link, Spinner },

}

</script>
<style lang="">
    
</style>