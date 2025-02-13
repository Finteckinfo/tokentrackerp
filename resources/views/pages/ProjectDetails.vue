<template>
<div class=" flex flex-col w-full relative  bg-transparent">
    <div class="w-[10%]">
        <Sidebar class=" fixed top-0 shadow" />
    </div>

    <div class="w-[80%] ml-[18%] bg-transparent">
        <Navbar class="h-16" />
        <div class="flex-1 my-8 mx-auto p-6 bg-white card max-w-[95%] shadow-md ">
            <div class=" px-20 ">
                <h1 class="border-b py-6 text-3xl font-semibold">[Project Name]</h1>

                <!-- Tab Navigation -->
                <div class="grid grid-cols-8 pt-3 sm:grid-cols-10">
                    <div class="col-span-8 overflow-hidden rounded-xl sm:px-8 sm:shadow">
                        <div class="w-full my-3">
                            <ul class="flex space-x-4 border-b pt-4">
                                <!-- Project Overview Tab -->
                                <li @click="setActiveTab('projectOverview')" class="cursor-pointer px-4 py-2 font-semibold" :class="{ 'text-blue-500 border-b-blue-700 border-b bg-blue-50 border-blue-500': isActiveTab('projectOverview') }">Project Overview</li>

                                <!-- Members Tab -->
                                <li @click="setActiveTab('members')" class="cursor-pointer px-4 py-2 font-semibold" :class="{ 'text-blue-500 border-b-blue-700 border-b bg-blue-50 border-blue-500': isActiveTab('members') }">Members Working</li>

                                <!-- Tasks Tab -->
                                <li @click="setActiveTab('tasks')" class="cursor-pointer px-4 py-2 font-semibold" :class="{ 'text-blue-500 border-b-blue-700 border-b bg-blue-50 border-blue-500': isActiveTab('tasks') }">Tasks</li>

                                <!-- Task Board Tab -->
                                <li @click="setActiveTab('taskBoard')" class="cursor-pointer px-4 py-2 font-semibold" :class="{ 'text-blue-500 border-b-blue-700 border-b bg-blue-50 border-blue-500': isActiveTab('taskBoard') }">Task Board</li>

                                <!-- Notes Tab -->
                                <li @click="setActiveTab('notes')" class="cursor-pointer px-4 py-2 font-semibold" :class="{ 'text-blue-500 border-b-blue-700 border-b bg-blue-50 border-blue-500': isActiveTab('notes') }">Notes</li>

                                <!-- Activity Tab -->
                                <li @click="setActiveTab('activity')" class="cursor-pointer px-4 py-2 font-semibold" :class="{ 'text-blue-500 border-b-blue-700 border-b bg-blue-50 border-blue-500': isActiveTab('activity') }">Activity</li>

                                <!-- Discussions Tab -->
                                <li @click="setActiveTab('discussions')" class="cursor-pointer px-4 py-2 font-semibold" :class="{ 'text-blue-500 border-b-blue-700 border-b bg-blue-50 border-blue-500': isActiveTab('discussions') }">Discussions</li>
                            </ul>
                        </div>

                        <!-- Dynamic Component Rendering for Active Tab -->
                        <component :is="activeTabComponent"></component>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <Footer />
</div>
</template>


<script>
import Navbar from '../components/partials/Navbar.vue';
import Sidebar from '../components/partials/Sidebar.vue';
import Footer from '../components/partials/Footer.vue';

// Import all the components for each tab
import ProjectOverview from "../pages/project_pages/ProjectOverview.vue";
import Members from "../pages/project_pages/Members.vue";
import Tasks from "../pages/project_pages/Tasks.vue";
import TaskBoard from "../pages/project_pages/TaskBoard.vue";
import Notes from "../pages/Notes.vue";
import Activity from "../pages/project_pages/Activity.vue";
import Discussions from "../pages/project_pages/Discussions.vue";

export default {
    name: 'ProjectOverviewPage',
    components: {
        Navbar,
        Sidebar,
        Footer,
        ProjectOverview,
        Members,
        Tasks,
        TaskBoard,
        Notes,
        Activity,
        Discussions,
    },
    data() {
        return {
            activeTab: 'projectOverview', // Default active tab
        };
    },
    computed: {
        activeTabComponent() {
            // Map the active tab to the corresponding component
            const tabComponents = {
                projectOverview: 'ProjectOverview',
                members: 'Members',
                tasks: 'Tasks',
                taskBoard: 'TaskBoard',
                notes: 'Notes',
                activity: 'Activity',
                discussions: 'Discussions',
            };
            return tabComponents[this.activeTab];
        },
    },
    methods: {
        setActiveTab(tab) {
            this.activeTab = tab;
        },
        isActiveTab(tab) {
            return this.activeTab === tab;
        },
    },
};
</script>


<style scoped>
/* Additional styling can go here */
</style>
