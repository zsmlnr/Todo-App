<template>
    <div class="min-h-screen flex overflow-hidden">
        <div class="w-full min-h-screen lg:w-1/2 bg-background p-14">
            <div class=" lg:w-3/4 mx-auto opacity">
                <div>
                    <slot />
                </div>
            </div>
        </div>
        <div
            class="w-full hidden lg:flex flex-col justify-between lg:w-1/2 bg-black bg-auth-bg bg-auto bg-no-repeat bg-center min-h-screen p-14">
            <div>
                <h2 class="text-white text-xl font-orbitron uppercase opacity">
                    <Link :href="route('home')">Youdoo</Link>
                </h2>
            </div>
            <div class="text-white font-orbitron font-bold text-6xl w-full flex justify-center">
                <div class="grid gap-6">
                    <div class="grid gap-2" id="bannerText">
                        <h3>Be organized</h3>
                        <h3>& know</h3>
                        <h3>what is your</h3>
                        <h3>next <span class=" text-primary">Project.</span></h3>
                    </div>
                    <div class="text-sm font-montserrat font-normal opacity">
                        <p>Take your daily tasks to the next level.</p>
                        <p>Upgrade your productivity.</p>
                    </div>
                </div>
            </div>
            <div class="text-gray text-xs font-montserrat text-end opacity">
                @2023 YouDoo
            </div>
        </div>
    </div>
</template>
<script>
import SplitType from 'split-type';
import { Link } from '@inertiajs/vue3';
import gsap from 'gsap';
export default {
    components: {
        Link
    },
    mounted() {
        const brand = new SplitType('#bannerText');
        gsap.to(".word", {
            y: 0,
            stagger: 0.05,
            duration: .5
        })
        gsap.to(".opacity", {
            opacity: 1,
            y: 0,
        });

    }
}
</script>
<style lang="scss">
#bannerText,
#brand {
    clip-path: polygon(0 0, 100% 0, 100% 50%, 100% 100%, 0 100%, 0% 50%);
}

#bannerText .word {
    transform: translateY(250px);
    transition: transform .1s;
}

.opacity {
    opacity: 0;
    transition: opacity .25s;
}
</style>