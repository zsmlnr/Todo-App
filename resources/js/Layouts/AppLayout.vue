<template>
    <div class="flex flex-col lg:flex-row min-h-screen bg-background">
        <Sidebar class="hidden lg:flex fixed h-screen z-20" />
        <div class="w-full lg:ml-14">
            <Navbar class="hidden lg:block sticky top-0 z-10" />
            <div class=" p-6 lg:p-14 ">
                <slot></slot>
            </div>
        </div>
        <MobileNavbar class="lg:hidden" />
    </div>
</template>
<script>
import Sidebar from '../Components/App/Sidebar/Sidebar.vue';
import Navbar from '../Components/App/Navbar/Navbar.vue';
import MobileNavbar from '../Components/App/Navbar/MobileAppbar.vue';
import gsap from 'gsap';

export default {
    components: { Sidebar, Navbar, MobileNavbar },
    mounted() {
        gsap.to(".opacity", {
            opacity: 1,
            stagger: 0.5,
            y: 0,
            transition: .10
        });
    }
}
</script>
<style lang="css">
.opacity {
    opacity: 0;
    transform: translateY(350px);
}
</style>