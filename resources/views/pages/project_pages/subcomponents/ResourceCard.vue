<template>
<div @click="navigate" class="p-3 rounded-lg bg-white flex flex-row items-center text-gray-700 hover:bg-gray-50 cursor-pointer transition shadow">
<div class="flex items-center justify-center rounded-full h-12 w-12 mx-3 bg-gray-200">
    <i :class="icon" class="text-lg opacity-80 p-4"></i>
</div>
    <p class="text-md font-bold">{{ title }}</p>
</div>
</template>


<script>
export default {
    props: {
        title: String,
        icon: String,
        route: String // New prop for the route path
    },
    methods: {
        navigate() {
            this.$router.push(this.route); // Route to the path specified in the route prop
        }
    }
};
</script>


<style scoped>

.text-gradient {
    background: linear-gradient(to top right, #57a5f3, #38BDF8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

</style>
