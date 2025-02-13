<template>
    <div class="container mx-auto p-6">
      <h1 class="text-xl font-semibold mb-6">Calendly Integration Settings</h1>

      <!-- Calendly API Key Section -->
      <div class="bg-white border-t border-gray-200 mb-4 py-6">
        <h2 class="text-xl font-semibold mb-4">Calendly API Key</h2>
        <div class="flex items-center space-x-4">
          <label for="api-key" class="text-gray-700">API Key:</label>
          <input
            type="text"
            id="api-key"
            v-model="apiKey"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
            placeholder="Enter Calendly API Key"
          />
        </div>
        <div class="mt-4">
          <button @click="saveApiKey" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
            Save API Key
          </button>
        </div>
      </div>

      <!-- Calendly Webhook Section -->
      <div class="bg-white border-t border-gray-200 mb-4 py-6">
        <h2 class="text-xl font-semibold mb-4">Webhook URL</h2>
        <div class="flex items-center space-x-4">
          <label for="webhook-url" class="text-gray-700">Webhook URL:</label>
          <input
            type="text"
            id="webhook-url"
            v-model="webhookUrl"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400"
            placeholder="Enter Webhook URL"
          />
        </div>
        <div class="mt-4">
          <button @click="saveWebhookUrl" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
            Save Webhook URL
          </button>
        </div>
      </div>

      <!-- Calendly Scheduling Page URL -->
      <div class="bg-white border-t border-gray-200 mb-4 py-6">
        <h2 class="text-xl font-semibold mb-4">Scheduling Page URL</h2>
        <div class="flex items-center space-x-4">
          <label for="scheduling-url" class="text-gray-700">Public Scheduling URL:</label>
          <input
            type="text"
            id="scheduling-url"
            v-model="schedulingUrl"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
            placeholder="Enter your public Calendly Scheduling URL"
          />
        </div>
        <div class="mt-4">
          <button @click="saveSchedulingUrl" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
            Save Scheduling URL
          </button>
        </div>
      </div>

      <!-- Reset Calendly Settings -->
      <div class="bg-white border-t border-gray-200 mb-4 py-6">
        <h2 class="text-xl font-semibold mb-4">Reset Calendly Settings</h2>
        <div class="flex justify-between items-center">
          <p class="text-gray-700">Reset all Calendly settings to default values.</p>
          <button @click="resetCalendlySettings" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
            Reset Settings
          </button>
        </div>
      </div>
    </div>
  </template>

  <script>
  export default {
    name: "Integrations",
    data() {
      return {
        apiKey: '', // Calendly API Key
        webhookUrl: '', // Webhook URL for event triggers
        schedulingUrl: '', // Public scheduling page URL
      };
    },
    methods: {
      saveApiKey() {
        // Logic to save the API key (e.g., store it via API or localStorage)
        console.log('Calendly API Key saved:', this.apiKey);
      },
      saveWebhookUrl() {
        // Logic to save the Webhook URL
        console.log('Calendly Webhook URL saved:', this.webhookUrl);
      },
      saveSchedulingUrl() {
        // Logic to save the public scheduling URL
        console.log('Calendly Scheduling URL saved:', this.schedulingUrl);
      },
      resetCalendlySettings() {
        // Reset the API key, Webhook URL, and Scheduling URL to default values
        this.apiKey = '';
        this.webhookUrl = '';
        this.schedulingUrl = '';
        console.log('Calendly settings have been reset.');
      },
    },
  };
  </script>

  <style scoped>
  /* Additional custom styles if needed */
  </style>
