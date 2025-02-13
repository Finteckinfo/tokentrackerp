<template>
<div class="bg-white flex-1 p-6">
    <!-- Add User Modal -->
    <AddUserModal :isAddUserModalOpen="isAddUserModalOpen" @close="closeAddUserModal" />
    <!-- Edit User Modal -->
    <EditUserModal :isEditUserModalOpen="isEditUserModalOpen" :user="selectedUser" @close="closeEditUserModal" @submit="submitUpdatedUser" />
    <!-- Delete User Modal -->
    <DeleteConfirmationModal :isDeleteConfirmationModalOpen="isDeleteConfirmationModalOpen" @close="closeDeleteConfirmationModal" />

    <div class="items-center flex justify-between md:divide-x md:divide-gray-100 dark:divide-gray-700 mb-10">
        <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Users</h1>
        <!-- Button to open the modal -->
        <div class="flex items-center space-x-2">
            <button @click="openAddUserModal" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 border border-blue-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                + Add User
            </button>
            <button class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 010-1.414 1 1 0 001.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path>
                </svg>
                Export
            </button>
        </div>
    </div>

    <!-- Users Table -->
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Name</th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Email Address</th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Current Role</th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Update Role / Remove User</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            <tr v-for="user in users" :key="user.id" class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-{{ user.id }}" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-{{ user.id }}" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="p-4 text-sm font-normal text-gray-700 whitespace-nowrap dark:text-gray-400">{{ user.name }}</td>
                                <td class="p-4 text-sm font-normal text-gray-700 whitespace-nowrap dark:text-gray-400">{{ user.email }}</td>
                                <td class="p-4 text-sm font-normal text-gray-700 whitespace-nowrap dark:text-gray-400">{{ user.role }}</td>
                                <td class="p-4 space-x-2 whitespace-nowrap flex items-center">
                                    <button @click="openEditUserModal(user)" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-gray-700 border rounded-lg hover:bg-gray-200 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-500">
                                        EditUser
                                    </button>
                                    <button @click="openDeleteConfirmationModal(user.id)" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                        Remove User
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</template>


<script>
import axios from 'axios';
import AddUserModal from "../../components/modals/AddUserModal.vue";
import EditUserModal from "../../components/modals/EditUserModal.vue";
import DeleteConfirmationModal from "../../components/modals/DeleteConfirmationModal.vue";

export default {
    name: "Roles",
    components: {
        AddUserModal,
        EditUserModal,
        DeleteConfirmationModal
    },
    data() {
        return {
            users: [],
            isAddUserModalOpen: false,
            isEditUserModalOpen: false,
            isDeleteConfirmationModalOpen: false,
            selectedUser: null,
        };
    },
    methods: {
        // Fetch users from the API when the component is mounted
        async fetchUsers() {
            try {
                const response = await axios.get('/api/fetchusers');
                this.users = response.data;
            } catch (error) {
                console.error("Error fetching users:", error);
            }
        },
        openAddUserModal() {
            this.isAddUserModalOpen = true;
        },
        closeAddUserModal() {
            this.isAddUserModalOpen = false;
        },
        openEditUserModal(user) {
            this.selectedUser = {
                ...user
            };
            this.isEditUserModalOpen = true;
        },
        closeEditUserModal() {
            this.isEditUserModalOpen = false;
            this.selectedUser = null;
        },
        openDeleteConfirmationModal(userId) {
            this.selectedUser = userId;
            this.isDeleteConfirmationModalOpen = true;
        },
        closeDeleteConfirmationModal() {
            this.isDeleteConfirmationModalOpen = false;
            this.selectedUser = null;
        },

        async submitUpdatedUser(updatedUserData) {
            const {
                id,
                role,
                password
            } = updatedUserData;
            try {
                await axios.put(`/api/fetchusers/${id}`, {
                    role,
                    password
                });
                this.fetchUsers(); // Re-fetch the users after the update
                this.closeEditUserModal(); // Close the edit modal
            } catch (error) {
                console.error("Error updating user:", error); // Log any error in updating the user
            }
        },

        async confirmDeleteUser({
            userId,
            password
        }) {
            try {
                await axios.delete(`/api/fetchusers/${userId}`, {
                    data: {
                        password
                    }
                });
                this.fetchUsers(); // Re-fetch the users after the deletion
                this.closeDeleteConfirmationModal(); // Close the delete modal
            } catch (error) {
                console.error("Error deleting user:", error); // Log any error in deleting the user
            }
        },
    },
    mounted() {
        this.fetchUsers(); // Fetch users when the component is mounted
    },
};
</script>
