<template>
<div class="flex items-center">
    <button @click="prevPage" :disabled="currentPage === 1" class="px-4 py-1  text-gray-900 rounded-md hover:text-blue-500 disabled:text-gray-300 border  bg-white">
        Previous
    </button>

    <div class="flex items-center">
        <span class="mx-2">Page {{ currentPage }} of {{ totalPages }}</span>
        <button @click="nextPage" :disabled="currentPage === totalPages" class="px-4 py-1  text-gray-900 rounded-md hover:text-blue-500 disabled:text-gray-300 border  bg-white">
            Next
        </button>
    </div>
</div>
</template>


<script>
export default {
    name: 'Pagination',
    props: {
        totalPages: {
            type: Number,
            required: true,
        },
        currentPage: {
            type: Number,
            default: 1,
        },
    },
    methods: {
        prevPage() {
            if (this.currentPage > 1) {
                this.$emit('update:currentPage', this.currentPage - 1);
            }
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.$emit('update:currentPage', this.currentPage + 1);
            }
        },
    },
};
</script>


<style scoped>
/* Add any additional styles here */
</style>
