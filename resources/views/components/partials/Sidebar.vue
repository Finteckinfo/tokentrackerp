<template>
<!-- start sidebar -->
<div id="sideBar" class="flex flex-col flex-wrap bg-white border border-gray-300 px-12 flex-none md:-ml-64 min-h-[95vh] md:z-30 md:shadow-xl animated faster rounded-2xl ml-4 mt-6 overflow-y-scroll overflow-x-hidden">
    <!-- sidebar content -->
    <div class="flex-none w-56 flex items-center my-10">
        <img :src="logo" class="w-10" />
        <strong class="capitalize ml-2">TokenTrackerERP</strong>
    </div>

    <div class="flex flex-col sidebarlist space-y-3">
        <!-- Dashboard -->
        <router-link :to="{ path: '/dashboard' }" :class="`flex items-center justify-between w-full capitalize transition ease-in-out duration-500 px-3 py-2 rounded-lg ${isCurrentRoute('/dashboard') ? 'bg-blue-500 text-white' : 'hover:text-teal-600'}`">
            <div class="flex items-center">
                <i class="fas fa-house text-md"></i>
                <span class="ml-2">Dashboard</span>
            </div>
        </router-link>

        <!-- Work Section -->
        <div class="border-t border-gray-200 pt-3">
            <a @click="toggleDropdown('work')" :class="`flex items-center justify-between w-full capitalize transition ease-in-out duration-500 cursor-pointer px-3 py-2 rounded-lg`">
                <div class="flex items-center">
                    <i class="fas fa-briefcase text-md"></i>
                    <span class="ml-2">Workspace</span>
                </div>
                <i :class="`fas transition-transform ${dropdowns.work ? 'text-xs fa-chevron-up' : 'text-xs fa-chevron-down'}`"></i>
            </a>
            <div v-if="dropdowns.work" class="mt-2 py-2 px-3 bg-gray-50 rounded-lg">
                <router-link :to="{ path: '/projects' }" :class="`block capitalize text-sm transition ease-in-out duration-500 py-2 px-3 rounded-md ${isCurrentRoute('/projects') ? 'bg-blue-500 text-white' : 'hover:text-teal-600'}`">Projects</router-link>
                <router-link :to="{ path: '/timesheets' }" :class="`block capitalize text-sm transition ease-in-out duration-500 py-2 px-3 rounded-md mt-1 ${isCurrentRoute('/timesheets') ? 'bg-blue-500 text-white' : 'hover:text-teal-600'}`">Timesheets</router-link>
                <router-link :to="{ path: '/clients' }" :class="`block capitalize text-sm transition ease-in-out duration-500 py-2 px-3 rounded-md mt-1 ${isCurrentRoute('/clients') ? 'bg-blue-500 text-white' : 'hover:text-teal-600'}`">Clients</router-link>
            </div>
        </div>

        <!-- Messages -->
        <router-link :to="{ path: '/messages' }" :class="`flex items-center justify-between w-full capitalize transition ease-in-out duration-500 px-3 py-2 rounded-lg ${isCurrentRoute('/messages') ? 'bg-blue-500 text-white' : 'hover:text-teal-600'}`">
            <div class="flex items-center">
                <i class="fas fa-envelope text-md"></i>
                <span class="ml-2">Messages</span>
            </div>
        </router-link>

        <!-- Payments -->
        <router-link :to="{ path: '/payments' }" :class="`flex items-center justify-between w-full capitalize transition ease-in-out duration-500 px-3 py-2 rounded-lg ${isCurrentRoute('/payments') ? 'bg-blue-500 text-white' : 'hover:text-teal-600'}`">
            <div class="flex items-center">
                <i class="fas fa-wallet text-md"></i>
                <span class="ml-2">Payments</span>
            </div>
        </router-link>

        <!-- Calendar -->
        <router-link :to="{ path: '/calendar' }" :class="`flex items-center justify-between w-full capitalize transition ease-in-out duration-500 px-3 py-2 rounded-lg ${isCurrentRoute('/calendar') ? 'bg-blue-500 text-white' : 'hover:text-teal-600'}`">
            <div class="flex items-center">
                <i class="fas fa-calendar-alt text-md"></i>
                <span class="ml-2">Events</span>
            </div>
        </router-link>

        <!-- Notes -->
        <router-link :to="{ path: '/notes' }" :class="`flex items-center justify-between w-full capitalize transition ease-in-out duration-500 px-3 py-2 rounded-lg ${isCurrentRoute('/notes') ? 'bg-blue-500 text-white' : 'hover:text-teal-600'}`">
            <div class="flex items-center">
                <i class="fas fa-sticky-note text-md"></i>
                <span class="ml-2">Sticky Notes</span>
            </div>
        </router-link>

        <!-- HR Section -->
        <div class="border-t border-gray-200 pt-3">
            <a @click="toggleDropdown('hr')" :class="`flex items-center justify-between w-full capitalize transition ease-in-out duration-500 cursor-pointer px-3 py-2 rounded-lg`">
                <div class="flex items-center">
                    <i class="fas fa-user-tie text-md"></i>
                    <span class="ml-2">Employee Center</span>
                </div>
                <i :class="`fas transition-transform ${dropdowns.hr ? 'text-xs fa-chevron-up' : 'text-xs fa-chevron-down'}`"></i>
            </a>
            <div v-if="dropdowns.hr" class="mt-2 py-2 px-3 bg-gray-50 rounded-lg">
                <router-link :to="{ path: '/leave-application' }" :class="`block text-sm transition ease-in-out duration-500 py-2 px-3 rounded-md ${isCurrentRoute('/leave-application') ? 'bg-blue-500 text-white' : 'hover:text-teal-600'}`">Leave Request</router-link>
                <router-link :to="{ path: '/attendance-sheet' }" :class="`block capitalize text-sm transition ease-in-out duration-500 py-2 px-3 rounded-md mt-1 ${isCurrentRoute('/attendance-sheet') ? 'bg-blue-500 text-white' : 'hover:text-teal-600'}`">Attendance</router-link>
                <router-link :to="{ path: '/file-complaint' }" :class="`block capitalize text-sm transition ease-in-out duration-500 py-2 px-3 rounded-md mt-1 ${isCurrentRoute('/file-complaint') ? 'bg-blue-500 text-white' : 'hover:text-teal-600'}`">File Complain</router-link>
                <router-link :to="{ path: '/request-refund' }" :class="`block capitalize text-sm transition ease-in-out duration-500 py-2 px-3 rounded-md mt-1 ${isCurrentRoute('/request-refund') ? 'bg-blue-500 text-white' : 'hover:text-teal-600'}`">Refunds</router-link>
            </div>
        </div>

        <!-- Settings -->
        <router-link :to="{ path: '/settings' }" :class="`flex items-center justify-between w-full capitalize transition ease-in-out duration-500 px-3 py-2 rounded-lg ${isCurrentRoute('/settings') ? 'bg-blue-500 text-white' : 'hover:text-teal-600'}`">
            <div class="flex items-center">
                <i class="fas fa-cog text-md"></i>
                <span class="ml-2">Settings</span>
            </div>
        </router-link>
    </div>
</div>
</template>

<script>
import axios from "axios";
import {
    ref,
    watch
} from 'vue';
import {
    mapState,
    mapGetters
} from "vuex";
import {
    useRoute
} from 'vue-router';
import logo from "../../../../public/images/logo.png";
export default {
    name: "SideBar",
    setup() {
        const route = useRoute();
        const dropdowns = ref({
            hr: false,
            work: false,
            recruit: false,
            workspaces: false
        });

        const workspaces = ref([]);

        const isCurrentRoute = (path) => {
            return route.path === path;
        };
        const toggleDropdown = (dropdown) => {
            dropdowns.value[dropdown] = !dropdowns.value[dropdown];
        };
        // Dynamically open dropdown if the route matches a path in that section
        const openDropdownsForRoute = () => {
            if (isCurrentRoute('/projects') || isCurrentRoute('/timesheets') || isCurrentRoute('/clients')) {
                dropdowns.value.work = true;
            }
            if (isCurrentRoute('/leave-application') || isCurrentRoute('/attendance-sheet')  || isCurrentRoute('/leave-application')  || isCurrentRoute('/file-complaint')  || isCurrentRoute('/request-refund')) {
                dropdowns.value.hr = true;
            }
        };
        // On initial load
        openDropdownsForRoute();

        // Watch for route changes to adjust dropdowns
        watch(() => route.path, openDropdownsForRoute);

        return {
            logo,
            dropdowns,
            toggleDropdown,
            workspaces,
            isCurrentRoute
        };
    },

    computed: {
        ...mapGetters(['isSuperAdmin'])
    },

    async mounted() {
        await this.fetchWorkspaces();
    },

    methods: {
        async fetchWorkspaces() {
            try {
                const response = await axios.get("/api/workspaces");
                this.workspaces = response.data;
            } catch (error) {
                console.error("Error fetching workspaces:", error);
            }
        },
    },
};
</script>
