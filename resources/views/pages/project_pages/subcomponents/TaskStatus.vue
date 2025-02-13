<template>
<div class="rounded-lg text-left px-10 py-6" :style="{ backgroundColor: getColorByIndex(index) }">
    <h3 class="text-white font-semibold">{{ label }}</h3>
    <p class="text-4xl font-bold text-white">
        {{ count }}
    </p>
</div>
</template>


<script>
export default {
    props: {
        label: String,
        count: Number,
        index: Number, // new prop to receive the index from the parent component
    },
    methods: {
        // Map index to colors
        getColorByIndex(index) {
            const colors = {
                0: '#8A8A8A', // First card
                1: '#2D7BD0', // Second card
                2: '#F3AE2E', // Third card
                3: '#40C984', // Fourth card
                4: '#0B0B0D', // Fifth card
                5: '#F52121', // Sixth card
                default: '#6355E6', // Default color
            };
            return colors[index] || colors.default; // Return the color based on index or default
        },
    },
};
</script>
