<template>
<div>
    <Navbar />

    <!-- start wrapper -->
    <div class="h-screen flex flex-row flex-wrap">
        <Sidebar />

        <!-- start content -->
        <div class="bg-white flex-1 p-6 md:mt-16">

            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="#" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <a href="#" class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">General</a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="items-center flex justify-between md:divide-x md:divide-gray-100 dark:divide-gray-700 mb-10">
                <div>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-3xl">General Workspace</h1>
                    <p class="text-xs mt-2">Create general tasks. For better organization, you can assign those tasks to particular workspace if needed (Optional) </p>

                </div>
                <div class="space-x-3">
                    <button @click="openTaskModal" id="createTaskButton" class="text-white bg-blue-500 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-md text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" type="button" data-drawer-target="drawer-create-product-default" data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default" data-drawer-placement="right">
                        + Create New Task
                    </button>
                    <button @click="openInviteModal" id="createTaskButton" class="text-gray-700 bg-gray-200 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-md text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" type="button" data-drawer-target="drawer-create-product-default" data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default" data-drawer-placement="right">
                        <i class="fad fa-user-plus mr-2"></i>Invite Member
                    </button>
                </div>

            </div>
            <TaskModal :isTaskModalOpen="isTaskModalOpen" @close="closeTaskModal" />
            <InviteuserModal :isInviteModalOpen="isInviteModalOpen" @close="closeInviteModal" />

            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="container mx-auto">
                        <!-- Kanban Board -->
                        <div class="grid grid-cols-3 gap-2">
                            <!-- Backlog Column -->
                            <div class="bg-kanban p-4 rounded-lg h-screen">
                                <span class="flex flex-row items-center mb-5 w-full bg-yellow-500 p-3 rounded">
                                    <i class="fas fa-history text-black mr-4"></i>
                                    <h3 class="text-md font-bold text-black">All Assignments</h3>
                                </span>
                                <div class="space-y-4 border-t border-gray-300 pt-8" id="backlogColumn ">
                                    <!-- Task cards will be populated here dynamically -->
                                    <div v-for="task in backlog" class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700" :key="task.id">
                                        <div class="flex flex-col space-y-3 mb-3 border-b pb-3">
                                            <h5 class="text-sm font-bold leading-none text-gray-900">{{task.task_title}} </h5>
                                            <p class="text-xs text-gray-900 truncate">
                                                Subtasks: {{ task.subtasks.length }}
                                            </p>
                                            <p class="text-xs text-gray-900 truncate">
                                                Budget: Ksh: {{task.budget_allocated}}
                                            </p>
                                        </div>
                                        <div class="flex items-center ">
                                            <div class="flex-shrink-0">
                                                <img class="w-7 h-7 rounded-full" src="https://w7.pngwing.com/pngs/490/157/png-transparent-male-avatar-boy-face-man-user-flat-classy-users-icon.png" alt="Lana image">
                                            </div>
                                            <div class="flex-1 min-w-0 ms-4">
                                                <p class="text-xs text-gray-900 truncate">
                                                    Assigned to: {{ task.assignedto_name }}
                                                </p>
                                                <p class="text-xs text-gray-900 truncate">
                                                    {{ getElapsedTime(task.created_at) }} ago
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Assigned Column -->
                            <div class="bg-kanban p-4 rounded-lg h-screen">
                                <span class="flex flex-row items-center mb-5 w-full bg-blue-600 p-3 rounded">
                                    <i class="fas fa-list text-white mr-4"></i>
                                    <h3 class="text-md font-bold text-white">Already Assigned</h3>
                                </span>
                                <div class="space-y-4 border-t border-blue-200  pt-8" id="inProgressColumn">
                                    <!-- Task cards will be populated here dynamically -->
                                    <div v-for="task in inprogress" class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700" :key="task.id">
                                        <div class="flex flex-col space-y-3 mb-3 border-b pb-3">
                                            <h5 class="text-sm font-bold leading-none text-gray-900">{{task.task_title}} </h5>
                                            <p class="text-xs text-gray-900 truncate">
                                                Subtasks: {{ task.subtasks.length }}
                                            </p>
                                            <p class="text-xs text-gray-900 truncate">
                                                Budget: Ksh: {{task.budget_allocated}}
                                            </p>
                                        </div>
                                        <div class="flex items-center ">
                                            <div class="flex-shrink-0">
                                                <img class="w-7 h-7 rounded-full" src="https://w7.pngwing.com/pngs/490/157/png-transparent-male-avatar-boy-face-man-user-flat-classy-users-icon.png" alt="Lana image">
                                            </div>
                                            <div class="flex-1 min-w-0 ms-4">
                                                <p class="text-xs text-gray-900 truncate">
                                                    Assigned to: {{ task.assignedto_name }}
                                                </p>
                                                <p class="text-xs text-gray-900 truncate">
                                                    {{ getElapsedTime(task.created_at) }} ago
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                               <!-- Approved Column -->
                               <div class="bg-kanban p-4 rounded-lg h-screen">
                                <span class="flex flex-row items-center mb-5 w-full bg-green-500 p-3 rounded">
                                    <i class="fas fa-check text-white mr-4"></i>
                                    <h3 class="text-md font-bold text-white">Approved & Paid</h3>
                                </span>
                                <div class="space-y-4 border-t border-blue-200  pt-8" id="inProgressColumn">
                                    <!-- Task cards will be populated here dynamically -->
                                    <div v-for="task in inprogress" class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700" :key="task.id">
                                        <div class="flex flex-col space-y-3 mb-3 border-b pb-3">
                                            <h5 class="text-sm font-bold leading-none text-gray-900">{{task.task_title}} </h5>
                                            <p class="text-xs text-gray-900 truncate">
                                                Subtasks: {{ task.subtasks.length }}
                                            </p>
                                            <p class="text-xs text-gray-900 truncate">
                                                Budget: Ksh: {{task.budget_allocated}}
                                            </p>
                                        </div>
                                        <div class="flex items-center ">
                                            <div class="flex-shrink-0">
                                                <img class="w-7 h-7 rounded-full" src="https://w7.pngwing.com/pngs/490/157/png-transparent-male-avatar-boy-face-man-user-flat-classy-users-icon.png" alt="Lana image">
                                            </div>
                                            <div class="flex-1 min-w-0 ms-4">
                                                <p class="text-xs text-gray-900 truncate">
                                                    Assigned to: {{ task.assignedto_name }}
                                                </p>
                                                <p class="text-xs text-gray-900 truncate">
                                                    {{ getElapsedTime(task.created_at) }} ago
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
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
import TaskModal from "../components/modals/TaskModal.vue";
import InviteuserModal from "../components/modals/InviteuserModal.vue";
import {
    mapState,
    mapMutations,
    mapActions
} from 'vuex';
import {
    ref
} from 'vue';

import {
    formatDistanceToNow
} from 'date-fns';

export default {
    props: ['id', 'workspacename'],
    name: 'AllTasks',
    components: {
        Navbar,
        Sidebar,
        Footer,
        TaskModal,
        InviteuserModal,
    },

    setup() {
        const isTaskModalOpen = ref(false);
        const openTaskModal = ref(false);
        const closeTaskModal = ref(false);

        const isInviteModalOpen = ref(false);
        const openInviteModal = ref(false);
        const closeInviteModal = ref(false);

        return {
            isTaskModalOpen,
            openTaskModal,
            closeTaskModal,

            isInviteModalOpen,
            openInviteModal,
            closeInviteModal,
        }
    },
    computed: {

        ...mapState({
            workspace_id: state => state.workspace.workspace_id,
            workspace_name: state => state.workspace.workspace_name,
            workspace_description: state => state.workspace.workspace_description,
            backlog: state => state.workspace.tasks.backlog,
            inprogress: state => state.workspace.tasks.inprogress,
            revision: state => state.workspace.tasks.revision,
            done: state => state.workspace.tasks.done,
        }),

    },
    mounted() {

        const workspaceId = this.$route.params.id;
        this.fetchWorkspace(workspaceId);
        this.fetchTasks(workspaceId);

    },
    watch: {
        '$route.params.id': function (newId) {
            this.fetchWorkspace(newId);
            this.fetchTasks(newId);
        }
    },
    methods: {
        ...mapMutations(['setWorkspaceID']),
        ...mapActions(['fetchWorkspace', 'fetchTasks']),

        getElapsedTime(date) {
            return formatDistanceToNow(new Date(date), {
                addSuffix: false
            });
        },

        openTaskModal() {
            this.isTaskModalOpen = true; // Set the modal to open
        },
        closeTaskModal() {
            this.isTaskModalOpen = false; // Set the modal to close
        },

        openInviteModal() {
            this.isInviteModalOpen = true; // Set the modal to open
        },
        closeInviteModal() {
            this.isInviteModalOpen = false; // Set the modal to close
        },

    }
}
</script>
