<template>
    <div class="container mx-auto p-6">
      <h1 class="text-xl font-semibold mb-4">Notification Settings</h1>

      <!-- Email Notifications -->
      <div class="bg-white border-t border-gray-200 mb-4 py-6">
        <h2 class="text-lg font-semibold">Email Notifications</h2>
        <div class="flex justify-between items-center">
          <p class="text-gray-500  text-md">Receive email notifications for updates and communications.</p>
          <div>
            <input type="checkbox" id="email-notifications" class="sr-only" v-model="settings.emailNotifications">
            <label
              for="email-notifications"
              class="relative inline-block w-12 h-6 bg-gray-200 rounded-full cursor-pointer transition duration-200"
              :class="{'bg-green-400': settings.emailNotifications}"
            >
              <span
                class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform duration-200"
                :class="{'transform translate-x-6': settings.emailNotifications}"
              ></span>
            </label>
          </div>
        </div>
      </div>

      <!-- SMS Notifications -->
      <div class="bg-white border-t border-gray-200 mb-4 py-6">
        <h2 class="text-lg font-semibold">SMS Notifications</h2>
        <div class="flex justify-between items-center">
          <p class="text-gray-500  text-md">Receive SMS notifications for tasks and updates.</p>
          <div>
            <input type="checkbox" id="sms-notifications" class="sr-only" v-model="settings.smsNotifications">
            <label
              for="sms-notifications"
              class="relative inline-block w-12 h-6 bg-gray-200 rounded-full cursor-pointer transition duration-200"
              :class="{'bg-green-400': settings.smsNotifications}"
            >
              <span
                class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform duration-200"
                :class="{'transform translate-x-6': settings.smsNotifications}"
              ></span>
            </label>
          </div>
        </div>
      </div>

      <!-- Task Assigned Notifications -->
      <div class="bg-white border-t border-gray-200 mb-4 py-6">
        <h2 class="text-lg font-semibold">Task Assigned Notifications</h2>
        <div class="flex justify-between items-center">
          <p class="text-gray-500  text-md">Get notifications when tasks are assigned to you.</p>
          <div>
            <input type="checkbox" id="task-notifications" class="sr-only" v-model="settings.taskAssignedNotifications">
            <label
              for="task-notifications"
              class="relative inline-block w-12 h-6 bg-gray-200 rounded-full cursor-pointer transition duration-200"
              :class="{'bg-green-400': settings.taskAssignedNotifications}"
            >
              <span
                class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform duration-200"
                :class="{'transform translate-x-6': settings.taskAssignedNotifications}"
              ></span>
            </label>
          </div>
        </div>
      </div>

      <!-- Other Communications Notifications -->
      <div class="bg-white border-t border-gray-200 py-6">
        <h2 class="text-lg font-semibold">Other Communication Notifications</h2>
        <div class="flex justify-between items-center">
          <p class="text-gray-500  text-md">Receive updates for other communications and messages.</p>
          <div>
            <input type="checkbox" id="other-notifications" class="sr-only" v-model="settings.otherNotifications">
            <label
              for="other-notifications"
              class="relative inline-block w-12 h-6 bg-gray-200 rounded-full cursor-pointer transition duration-200"
              :class="{'bg-green-400': settings.otherNotifications}"
            >
              <span
                class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform duration-200"
                :class="{'transform translate-x-6': settings.otherNotifications}"
              ></span>
            </label>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script>
  export default {
    name: "Notifications",
    data() {
      return {
        settings: {
          emailNotifications: true,
          smsNotifications: false,
          taskAssignedNotifications: true,
          otherNotifications: false,
        },
      };
    },
    methods: {
      // Add saveSettings logic to send updated settings to the server via API
      saveSettings() {
        // Save the user's notification settings to the server
        console.log('Settings saved:', this.settings);
      },
    },
  };
  </script>

  <style scoped>
  /* Custom styles if needed */
  </style>
