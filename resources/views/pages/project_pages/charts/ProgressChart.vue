<template>
    <div class="flex items-center justify-center">
      <!-- Simple arc gauge for project progress -->
      <canvas ref="progressChart"></canvas>
    </div>
  </template>

  <script>
  import { onMounted, ref } from 'vue';
  import { Chart, DoughnutController, ArcElement, Tooltip } from 'chart.js';

  // Register required components
  Chart.register(DoughnutController, ArcElement, Tooltip);

  export default {
    props: {
      progress: {
        type: Number,
        required: true,
      },
    },
    setup(props) {
      const progressChart = ref(null);

      onMounted(() => {
        new Chart(progressChart.value, {
          type: 'doughnut',
          data: {
            datasets: [
              {
                data: [props.progress, 100 - props.progress],
                backgroundColor: ['#4CAF50', '#e0e0e0'],
              },
            ],
          },
          options: {
            circumference: 180, // Arc-shaped chart
            rotation: -90, // Start from the top
            cutout: '70%', // Inner hole size
            plugins: {
              tooltip: { enabled: false }, // Disable tooltips
            },
          },
        });
      });

      return { progressChart };
    },
  };
  </script>

  <style scoped>
  canvas {
    max-width: 100%;
  }
  </style>
