<template>
    <div v-if="isAddUserModalOpen">
      <!-- Background Overlay -->
      <div class="fixed inset-0 bg-gray-800 bg-opacity-50 z-40"></div>

      <!-- Add User Modal -->
      <div class="fixed inset-0 flex justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-1/3 py-8 px-12 relative z-50">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Add New User</h2>
            <button @click="closeAddUserModal" class="text-gray-500 hover:text-gray-800">
              <i class="fas fa-times text-gray-800"></i>
            </button>
          </div>

          <!-- Add User Form -->
          <form @submit.prevent="submitUser">
            <!-- Name -->
            <div class="mb-4">
              <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
              <input v-model="formData.name" type="text" id="name" placeholder="Enter name" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-blue-500" required />
            </div>

            <!-- Email -->
            <div class="mb-4">
              <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
              <input v-model="formData.email" type="email" id="email" placeholder="Enter email" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-blue-500" required />
            </div>

            <!-- Password -->
            <div class="mb-4">
              <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
              <input v-model="formData.password" type="password" id="password" placeholder="Enter password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-blue-500" required />
            </div>

            <!-- Role -->
            <div class="mb-4">
              <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
              <select v-model="formData.role" id="role" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-blue-500" required>
                <option value="" disabled>Select role</option>
                <option value="Superadmin">Superadmin</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
              </select>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col w-full my-5">
              <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2 w-full">Add User</button>
            </div>
          </form>

          <div class="flex flex-col w-full">
            <button @click="closeAddUserModal" class="text-gray-900 rounded-lg px-4 w-1/3 mx-auto">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script>
  import { ref, watch } from 'vue';
  import axios from 'axios';

  export default {
    name: 'AddUserModal',
    props: {
      isAddUserModalOpen: {
        type: Boolean,
        required: true
      }
    },
    setup(props, { emit }) {
      const formData = ref({
        name: '',
        email: '',
        password: '',
        role: ''
      });

      // Watch for modal open status to reset form
      watch(() => props.isAddUserModalOpen, (newVal) => {
        if (!newVal) {
          resetForm();
        }
      });

      const resetForm = () => {
        formData.value = {
          name: '',
          email: '',
          password: '',
          role: ''
        };
      };

      const closeAddUserModal = () => emit('close');

      const submitUser = async () => {
        try {
          const response = await axios.post('/api/users', formData.value);
          if (response.status === 201) {
            alert('User added successfully');
            closeAddUserModal();
          } else {
            alert(`Failed to add user. Server returned status: ${response.status}`);
          }
        } catch (error) {
          console.error('Error adding user:', error);
          alert('Failed to add user. Please try again.');
        }
      };

      return {
        formData,
        closeAddUserModal,
        submitUser
      };
    }
  };
  </script>

  <style scoped>
  .bg-opacity-50 {
    background-color: rgba(0, 0, 0, 0.5);
  }
  </style>
