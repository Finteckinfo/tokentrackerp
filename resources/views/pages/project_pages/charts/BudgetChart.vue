<template>
    <div>
      <canvas ref="budgetChart"></canvas>
    </div>
  </template>

  <script>
  import { onMounted, ref } from 'vue';
  import {
    Chart,
    BarController,
    BarElement,
    CategoryScale,
    LinearScale,
    Tooltip,
    Legend,
  } from 'chart.js';

  // Register all necessary components for bar charts
  Chart.register(BarController, BarElement, CategoryScale, LinearScale, Tooltip, Legend);

  export default {
    props: {
      allocated: {
        type: Number,
        required: true,
      },
      current: {
        type: Number,
        required: true,
      },
    },
    setup(props) {
      const budgetChart = ref(null);

      onMounted(() => {
        new Chart(budgetChart.value, {
          type: 'bar',
          data: {
            labels: ['Allocated Budget', 'Current Budget'],
            datasets: [
              {
                label: 'Budget in USD',
                data: [props.allocated, props.current],
                backgroundColor: ['#4CAF50', '#FF9800'],
              },
            ],
          },
          options: {
            indexAxis: 'y', // Horizontal bar chart
            plugins: {
              legend: { display: false }, // Hide legend for simplicity
            },
          },
        });
      });

      return { budgetChart };
    },
  };
  </script>

  <style scoped>
  canvas {
    max-width: 100%;
  }
  </style>
