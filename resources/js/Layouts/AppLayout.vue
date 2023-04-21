<template>
    <div class="flex flex-col lg:flex-row min-h-screen bg-background">
        <Sidebar class="hidden lg:flex fixed h-screen z-20" />
        <div class="w-full lg:ml-14">
            <Navbar class="hidden lg:block sticky top-0 z-10" />
            <MobileMenu class="lg:hidden" />
            <div class="px-3 pt-6 pb-32 lg:p-14 ">
                <slot></slot>
                <AlertBox />
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
import AlertBox from '../Components/App/Functions/AlertBox.vue';
import MobileMenu from '../Components/App/Navbar/MobileMenu.vue';


export default {
    components: { Sidebar, Navbar, MobileNavbar, AlertBox, MobileNavbar, MobileMenu },
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