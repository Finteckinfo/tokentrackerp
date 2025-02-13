<template>
    <div v-if="isDeleteConfirmationModalOpen">
      <div class="fixed inset-0 bg-gray-800 bg-opacity-50 z-40"></div>
      <div class="fixed inset-0 flex justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-1/3 py-8 px-12 relative z-50">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Confirm Delete</h2>
            <button @click="closeModal" class="text-gray-500 hover:text-gray-800">
              <i class="fas fa-times text-gray-800"></i>
            </button>
          </div>
          <p>Are you sure you want to delete?</p>
          <form @submit.prevent="submitDelete">
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700">Password</label>
              <input v-model="password" type="password" placeholder="Enter your password" class="w-full p-2 border rounded focus:outline-none" />
            </div>
            <div class="flex justify-between mt-6">
              <button @click="closeModal" class="text-gray-900 bg-gray-200 px-4 py-2 rounded">Cancel</button>
              <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete User</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </template>

  <script>
  export default {
    props: ['isDeleteConfirmationModalOpen', 'Id'],
    emits: ['close', 'submit'],
    data() {
      return {
        password: '',
      };
    },
    methods: {
      closeModal() {
        this.$emit('close');
      },
      submitDelete() {
        this.$emit('submit', { Id: this.Id, password: this.password });
        this.closeModal();
      },
    },
  };
  </script>
