<template>
    <div v-if="isEditUserModalOpen">
      <div class="fixed inset-0 bg-gray-800 bg-opacity-50 z-40"></div>
      <div class="fixed inset-0 flex justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-1/3 py-8 px-12 relative z-50">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Edit User</h2>
            <button @click="closeModal" class="text-gray-500 hover:text-gray-800">
              <i class="fas fa-times text-gray-800"></i>
            </button>
          </div>
          <form @submit.prevent="submitUser">
            <!-- Name -->
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700">Name</label>
              <input v-model="userName" type="text" placeholder="Enter user name" class="w-full p-2 border rounded focus:outline-none" />
            </div>

            <!-- Email -->
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700">Email</label>
              <input v-model="userEmail" type="email" placeholder="Enter user email" class="w-full p-2 border rounded focus:outline-none" />
            </div>

            <!-- Role -->
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700">Role</label>
              <select v-model="userRole" class="w-full p-2 border rounded focus:outline-none">
                <option value="superadmin">Superadmin</option>
                <option value="admin">Admin</option>
                <option value="user">Regular User</option>
              </select>
            </div>

            <!-- Editor's Password -->
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700">Your Password</label>
              <input v-model="editorPassword" type="password" placeholder="Enter your password to confirm" class="w-full p-2 border rounded focus:outline-none" required />
            </div>

            <!-- Buttons -->
            <div class="flex justify-between mt-6">
              <button @click="closeModal" class="text-gray-900 bg-gray-200 px-4 py-2 rounded">Cancel</button>
              <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </template>
  <script>
  export default {
    props: ['isEditUserModalOpen', 'user', 'editor'],
    emits: ['close', 'submit'],
    data() {
      return {
        editorPassword: '', // New field for the editor's password
        userName: '',
        userEmail: '',
        userRole: '',
      };
    },
    watch: {
      user(newUser) {
        if (newUser) {
          this.userName = newUser.name || '';
          this.userEmail = newUser.email || '';
          this.userRole = newUser.role || 'Regular User';
        }
      },
    },
    methods: {
      closeModal() {
        this.$emit('close');
      },
      submitUser() {
        // Ensure the editor has entered their password
        if (!this.editorPassword) {
          alert("Please enter your password to confirm changes.");
          return; // Don't submit if the editor's password is missing
        }

        // Here we would validate the editor's password (this is just a simulation)
        if (this.editorPassword !== this.editor.password) {
          alert("Incorrect password. Please try again.");
          return; // Don't submit if the password is incorrect
        }

        // If the password is correct, submit the changes
        const updatedUser = {
          id: this.user.id,
          name: this.userName,
          email: this.userEmail,
          role: this.userRole,
        };

        // Emit the updated user information
        this.$emit('submit', updatedUser);
        this.closeModal();
      },
    },
  };
  </script>
