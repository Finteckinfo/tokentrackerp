<template>
    <div class="space-y-6">
      <!-- Speedometer Chart for Project Progress -->
      <div class="flex items-center justify-between space-x-5 mt-10 h-[400px]">
        <div class="w-2/3 p-6 rounded-lg bg-white card h-full">
          <h2 class="text-lg font-semibold text-gray-800 mb-4">Project Progress</h2>
          <ProgressChart :progress="projectProgress" />
        </div>

        <!-- Client Info & Message Button -->
        <div class="w-1/3 p-6 card rounded-lg bg-white flex flex-col justify-between h-full ">
          <h2 class="text-lg font-semibold text-gray-800 mb-2">Client Details</h2>
          <div class="h-[50%] bg-gray-50">
            <img src="https://i.ibb.co/G7jGw5d/pngwing-com.png">

          </div>
          <div class="ml-2">
            <p class="text-gray-600 text-xl font-bold">Name: {{ clientName }}</p>
            <p class="text-gray-400 text-sm mt-2">Date Onboarded: 2-Nov, 2024</p>
          </div>
          <button class="mt-4 px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Message Client
          </button>
        </div>
      </div>

      <!-- Total Tasks Overview Card -->
      <div class="w-full p-6 card rounded-lg bg-white">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Tasks Overview For This Project</h2>
        <div class="grid grid-cols-5 gap-4 text-center">
          <TaskStatusCard label="Backlog" :count="taskCounts.backlog" />
          <TaskStatusCard label="Next Up" :count="taskCounts.nextUp" />
          <TaskStatusCard label="QA" :count="taskCounts.qa" />
          <TaskStatusCard label="Completed" :count="taskCounts.completed" />
          <TaskStatusCard label="On Hold" :count="taskCounts.onHold" />
        </div>
      </div>

      <!-- My Hours Logged & Budget Comparison -->
      <div class="grid grid-cols-2 gap-6">
        <div class="p-6 card rounded-lg bg-white">
          <h2 class="text-lg font-bold text-gray-800 mb-4">My Hours Logged</h2>
          <p class="text-3xl font-bold">{{ hoursLogged }} hours</p>
        </div>

        <div class="p-6 card rounded-lg bg-white">
          <h2 class="text-lg font-semibold text-gray-800 mb-4">Budget Overview</h2>
          <BudgetChart :allocated="allocatedBudget" :current="currentBudget" />
        </div>
      </div>

      <!-- Project Details -->
      <div class="p-6 card rounded-lg bg-white">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Project Details</h2>
        <p class="mb-4">{{ projectDescription }}</p>
        <div>
          <h3 class="font-semibold text-gray-700">Links:</h3>
          <ul class="list-disc pl-6 space-y-2 text-blue-600">
            <li v-for="(link, index) in projectLinks" :key="index">
              <a :href="link.url" target="_blank">{{ link.label }}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </template>

  <script>
  import { ref } from 'vue';
  import ProgressChart from './charts/ProgressChart.vue';
  import BudgetChart from './charts/BudgetChart.vue';
  import TaskStatusCard from './subcomponents/TaskStatus.vue';

  export default {
    name: 'ProjectOverview',
    components: {
      ProgressChart,
      BudgetChart,
      TaskStatusCard,
    },
    setup() {
      const projectProgress = ref(75); // Project completion percentage
      const clientName = ref("Zigs Corp");
      const taskCounts = ref({
        backlog: 15,
        nextUp: 12,
        qa: 3,
        completed: 11,
        onHold: 14,
      });
      const hoursLogged = ref(120);
      const allocatedBudget = ref(100000); // Example allocated budget
      const currentBudget = ref(85000);    // Example current spent budget
      const projectDescription = ref("This project involves creating a comprehensive ERP system with custom integrations.");
      const projectLinks = ref([
        { label: "GitHub Repo", url: "https://github.com/project-repo" },
        { label: "Staging Environment", url: "https://staging.project.com" },
        { label: "Production Website", url: "https://www.project.com" },
      ]);

      return {
        projectProgress,
        clientName,
        taskCounts,
        hoursLogged,
        allocatedBudget,
        currentBudget,
        projectDescription,
        projectLinks,
      };
    },
  };
  </script>

  <style scoped>
  /* Additional styling if needed */
  </style>
