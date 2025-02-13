<template>
<div v-if="isInviteModalOpen">
    <!-- Background Overlay -->
    <div class="fixed inset-0 bg-gray-800 bg-opacity-50 z-40"></div>

    <!-- Invite Modal -->
    <div class="fixed inset-0 flex justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-1/3 py-8 px-12 relative z-50">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Invite User to Workspace</h2>
                <button @click="closeInviteModal" class="text-gray-500 hover:text-gray-800">
                    <i class="fas fa-times text-gray-800"></i>
                </button>
            </div>

            <!-- Invite Form -->
            <form @submit.prevent="sendInvite">
                <div class="mb-4">
                    <label for="userType" class="block text-sm font-medium text-gray-700">User Type</label>
                    <select v-model="userType" id="userType" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-blue-500">
                        <option value="" disabled>Select user type</option>
                        <option value="existing">Existing User</option>
                        <option value="new">New User</option>
                    </select>
                </div>

                <!-- Existing User Selection Dropdown -->
                <div v-if="userType === 'existing'" class="mb-4">
                    <label for="existingUser" class="block text-sm font-medium text-gray-700">Select User</label>
                    <select v-model="selectedUser" id="existingUser" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-blue-500">
                        <option value="" disabled>Select user</option>
                        <option v-for="user in existingUsers" :key="user.id" :value="user.id">{{ user.name }}</option>
                    </select>
                </div>

                <!-- New User Email Input -->
                <div v-if="userType === 'new'" class="mb-4">
                    <label for="newUserEmail" class="block text-sm font-medium text-gray-700">Email</label>
                    <input v-model="newUserEmail" type="email" id="newUserEmail" placeholder="Enter user's email" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-blue-500" />
                </div>

                <!-- Action Button -->
                <div class="flex flex-col w-full my-5">
                    <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2 w-full">Send Invite</button>
                </div>
            </form>

            <div class="flex flex-col w-full">
                <button @click="closeInviteModal" class="text-gray-900 rounded-lg px-4 w-1/3 mx-auto">Cancel</button>
            </div>
        </div>
    </div>
</div>
</template>


<script>
import {
    ref,
    watch
} from "vue";
import axios from 'axios';

export default {
    name: 'InviteuserModal',
    props: {
        isInviteModalOpen: {
            type: Boolean,
            required: true,
        }
    },
    setup(props, {
        emit
    }) {
        const userType = ref(""); // Either "existing" or "new"
        const selectedUser = ref("");
        const newUserEmail = ref("");
        const existingUsers = ref([]);

        // Watch for modal open status to reset form
        watch(() => props.isInviteModalOpen, (newVal) => {
            if (!newVal) {
                resetForm();
            }
        });

        const resetForm = () => {
            userType.value = "";
            selectedUser.value = "";
            newUserEmail.value = "";
        };

        return {
            userType,
            selectedUser,
            newUserEmail,
            existingUsers,
            resetForm,
            closeInviteModal: () => emit('close'),
        };

    },
    mounted() {
        this.fetchExistingUsers();
    },

    methods: {

        // Fetch existing users for dropdown
         async fetchExistingUsers(){
            try {
                const response = await axios.get('/api/fetchusers');
                this.existingUsers = response.data;
            } catch (error) {
                console.error("Error fetching users:", error);
            }
        },

        // Send invite function
        async sendInvite() {
            try {
                const invitePayload = {
                    email: userType.value === "new" ? newUserEmail.value : existingUsers.value.find(user => user.id === selectedUser).email,
                    workspace_id: this.workspace_id,
                    token: this.generateToken(),
                    expiration: new Date(Date.now() + 4 * 24 * 60 * 60 * 1000) // Set token expiration to 4 days from now
                };

                const response = await axios.post('/api/sendworkspaceinvite', invitePayload);

                if (response.status === 200) {
                    alert("Invitation sent successfully");
                    this.closeInviteModal();
                }
            } catch (error) {
                console.error("Error sending invite:", error);
                alert("Failed to send invite. Please try again.");
            }
        },

        // Generate token function
        generateToken(){
            return Math.random().toString(36).substring(2) + Date.now().toString(36);
        }

    }
};
</script>


<style scoped>
.bg-opacity-50 {
    background-color: rgba(0, 0, 0, 0.5);
}
</style>
