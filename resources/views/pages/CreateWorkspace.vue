<template>
<div>
    <Navbar />
    <!-- start wrapper -->
    <div class="h-screen flex flex-row flex-wrap">
        <Sidebar />
        <!-- start content -->
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            <div class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-900 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <i class="fad fa-folder text-xs mr-2"></i>
                            Create Workspace
                        </a>
                    </li>
                </ol>
            </div>

            <div class="max-w-4xl mx-auto space-y-8">
                <div>
                    <h2 class="mt-32 text-center text-3xl font-extrabold text-gray-900">
                        Create a New Workspace
                    </h2>
                    <p class="mt-2 text-center text-sm text-gray-600">
                        A workspace is where you manage all the tasks and assignments of a particular project
                    </p>
                </div>
                <form @submit.prevent="createWorkspace" class="mt-8 space-y-6">
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div class="my-5">
                            <label for="workspace-name" class="sr-only">Workspace Name</label>
                            <input v-model="workspaceName" id="workspace-name" name="workspaceName" type="text" class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Workspace Name" required>
                        </div>
                        <div v-if="workspaceNameError" class="text-red-600 font-bold text-sm">{{ workspaceNameError }}</div>
                        <div>
                            <label for="workspace-description" class="sr-only">Description</label>
                            <textarea v-model="workspaceDescription" id="workspace-description" name="description" rows="4" class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Workspace Description (100 words)" required></textarea>
                        </div>
                        <div v-if="workspacedescriptionError" class="text-red-600 font-bold text-sm">{{ workspacedescriptionError }}</div>
                    </div>
                    <div>
                        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Create Workspace
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end content -->
    </div>
    <!-- end wrapper -->
    <Footer />
</div>
</template>

<script>
import Navbar from '../components/partials/Navbar.vue'
import Sidebar from '../components/partials/Sidebar.vue'
import Footer from '../components/partials/Footer.vue'
import {
    ref
} from 'vue';
import {
    mapState,
    mapMutations,
    mapActions,
    useStore
} from 'vuex';
import axios from 'axios';

export default {
    name: 'Dashboard',
    components: {
        Navbar,
        Sidebar,
        Footer,
    },

    setup() {
        const store = useStore();
        const user = ref("");
        const workspaceName = ref("");
        const workspaceDescription = ref("")
        const workspaceNameError = ref(null);
        const workspacedescriptionError = ref(null);
        const workspaces = []

        return {
            workspaceName,
            workspaceDescription,
            workspaceNameError,
            workspacedescriptionError,
            user,
            store,
        }

    },

    mounted() {
        this.store.dispatch('fetchWorkspaces').then(() => {
            this.user = this.store.getters.getUser;
            this.workspaces = this.store.state.workspaces;
        });

    },
    computed: {

    },
    methods: {

        async createWorkspace() {
            if (this.user.role !== 'superadmin') {
                alert("Failed! Sorry, only superAdmins are allowed to create workspaces");
                return;
            }

            // Check if the user already has 5 or more workspaces
            if (this.workspaces.length >= 5) {
                alert("You have reached the limit of 5 workspaces. You cannot create more.");
                return;
            }
            //validate inputs
            this.workspaceNameError = null;
            this.workspacedescriptionError = null;
            const wordNCount = this.workspaceName.length;
            const wordDCount = this.workspaceDescription.trim().split(/\s+/).length;

            if (wordNCount > 20) {
                return;
            } else if (wordDCount > 100) {
                this.workspacedescriptionError = "Workspace description is longer than 100 words. Keep it brief"
                return;
            }
            try {

                const response = await axios.post('/api/createworkspace', {
                    workspaceName: this.workspaceName,
                    workspaceDescription: this.workspaceDescription,
                    userObj: this.user
                });

                if (response.status === 200) {
                    alert("Workspace was created successfully");
                    this.clearFields();
                    location.reload();
                }
            } catch (error) {
                if (error.response) {
                    console.error("Error Response:", error.response);
                    console.error("Status Code:", error.response.status);
                    console.error("Data:", error.response.data);
                    alert(`Server Error: ${error.response.data.message || 'Something went wrong!'}`);
                } else if (error.request) {
                    console.error("Error Request:", error.request);
                    alert("No response from server. Please try again.");
                } else {
                    console.error("Error Message:", error.message);
                    alert(`Error: ${error.message}`);
                }
            }
        },
        clearFields() {
            this.workspaceName = '';
            this.workspaceDescription = '';
            this.accessToken = '';
        }

    }

}
</script>

<style scoped>

  </style>
