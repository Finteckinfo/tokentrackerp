<template>
    <div class="container mx-auto p-6">
      <h1 class="text-xl font-semibold mb-4">Token Management Settings</h1>

      <!-- Update Token Value Section -->
      <div class="bg-white border-t border-gray-200 mb-4 py-6">
        <h2 class="text-lg font-semibold mb-4">Update Token Value</h2>
        <div class="flex items-center space-x-4">
          <label for="token-value" class="text-gray-500">Current Token Value (in $):</label>
          <input
            type="number"
            id="token-value"
            v-model="tokenValue"
            class="w-32 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
            placeholder="Enter new value"
          />
          <button
            @click="updateTokenValue"
            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600"
          >
            Update
          </button>
        </div>
      </div>

      <!-- Revoke Tokens Section -->
      <div class="bg-white border-t border-gray-200 mb-4 py-6">
        <h2 class="text-lg font-semibold mb-4">Revoke Tokens</h2>
        <div class="flex items-center space-x-4">
          <label for="revoke-reason" class="text-gray-500">Revoke all user tokens for the following reason:</label>
          <input
            type="text"
            id="revoke-reason"
            v-model="revokeReason"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"
            placeholder="Enter reason"
          />
        </div>
        <div class="mt-4">
          <button
            @click="revokeTokens"
            class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600"
          >
            Revoke All Tokens
          </button>
        </div>
      </div>

      <!-- Set Redemption Threshold Section -->
      <div class="bg-white border-t border-gray-200 mb-4 py-6">
        <h2 class="text-lg font-semibold mb-4">Set Redemption Threshold</h2>
        <div class="flex items-center space-x-4">
          <label for="threshold" class="text-gray-500">Redemption Threshold (in $):</label>
          <input
            type="number"
            id="threshold"
            v-model="redemptionThreshold"
            class="w-32 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400"
            placeholder="Enter threshold value"
          />
          <button
            @click="updateThreshold"
            class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600"
          >
            Set Threshold
          </button>
        </div>
      </div>

      <!-- Reset Token Settings -->
      <div class="bg-white border-t border-gray-200 mb-4 py-6">
        <h2 class="text-lg font-semibold mb-4">Reset Token Settings</h2>
        <div class="flex justify-between items-center">
          <p class="text-gray-500">Reset all token settings to default values.</p>
          <button
            @click="resetTokenSettings"
            class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600"
          >
            Reset Settings
          </button>
        </div>
      </div>
    </div>
  </template>

  <script>
  export default {
    name: "BillingTokens",
    data() {
      return {
        tokenValue: 1.0, // Default token value in $
        revokeReason: '', // Reason for revoking tokens
        redemptionThreshold: 50, // Default redemption threshold in $
      };
    },
    methods: {
      updateTokenValue() {
        // Logic to update token value
        console.log('Token value updated to:', this.tokenValue);
      },
      revokeTokens() {
        // Logic to revoke tokens
        if (this.revokeReason) {
          console.log('Tokens revoked for reason:', this.revokeReason);
        } else {
          console.log('Please provide a reason for revoking tokens.');
        }
      },
      updateThreshold() {
        // Logic to update redemption threshold
        console.log('Redemption threshold set to:', this.redemptionThreshold);
      },
      resetTokenSettings() {
        // Logic to reset token settings
        this.tokenValue = 1.0;
        this.revokeReason = '';
        this.redemptionThreshold = 50;
        console.log('Token settings reset to default.');
      },
    },
  };
  </script>

  <style scoped>
  /* Custom styles if needed */
  </style>
