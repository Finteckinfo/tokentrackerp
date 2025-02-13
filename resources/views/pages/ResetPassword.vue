<template>
    <div class="flex items-center justify-center min-h-screen">
      <div class="w-full max-w-md p-6 bg-white rounded shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Reset Password</h2>
        <form @submit.prevent="resetPassword">
          <div class="mb-4">
            <label for="email" class="block text-sm font-semibold mb-2">Email</label>
            <input
              type="email"
              id="email"
              v-model="email"
              required
              class="w-full p-2 border border-gray-300 rounded"
              placeholder="Enter your email"
            />
          </div>
          <div class="mb-4">
            <label for="password" class="block text-sm font-semibold mb-2">New Password</label>
            <input
              type="password"
              id="password"
              v-model="password"
              required
              class="w-full p-2 border border-gray-300 rounded"
              placeholder="Enter new password"
            />
          </div>
          <div class="mb-4">
            <label for="confirmPassword" class="block text-sm font-semibold mb-2">Confirm Password</label>
            <input
              type="password"
              id="confirmPassword"
              v-model="confirmPassword"
              required
              class="w-full p-2 border border-gray-300 rounded"
              placeholder="Confirm new password"
            />
          </div>
          <div class="flex items-center justify-between">
            <button
              type="submit"
              class="w-full py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
            >
              Reset Password
            </button>
          </div>
        </form>
        <p class="mt-4 text-center">
          Remembered your password? <router-link to="/login" class="text-blue-500">Log in</router-link>
        </p>
      </div>
    </div>
  </template>

  <script>
  import { ref } from 'vue';
  import { useRouter } from 'vue-router';
  import axios from 'axios';

  export default {
    name: 'ResetPassword',
    setup() {
      const email = ref('');
      const password = ref('');
      const confirmPassword = ref('');
      const router = useRouter();

      const resetPassword = async () => {
        if (password.value !== confirmPassword.value) {
          alert('Passwords do not match!');
          return;
        }

        try {
          const response = await axios.post('/api/reset-password', {
            email: email.value,
            password: password.value,
          });
          alert('Password reset successful!');
          router.push('/login'); // Redirect to login page after successful reset
        } catch (error) {
          alert('An error occurred: ' + error.response.data.message);
        }
      };

      return {
        email,
        password,
        confirmPassword,
        resetPassword,
      };
    },
  };
  </script>

  <style scoped>
  /* Add any additional styles here */
  </style>
