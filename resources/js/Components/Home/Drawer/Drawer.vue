<template>
    <div class="drawer">
        <input id="sideNav" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <slot></slot>
        </div>
        <div class="drawer-side">
            <label for="sideNav" class="drawer-overlay"></label>
            <ul class="menu p-4 w-80 bg-base-100">
                <!-- Sidebar content here -->
                <li>
                    <a href="#product">Product</a>
                </li>
                <li>
                    <a href="#advanteges">Advanteges</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>

            </ul>
        </div>
    </div>
</template>
<script>
export default {

}
</script>
<style lang="">
    
</style>