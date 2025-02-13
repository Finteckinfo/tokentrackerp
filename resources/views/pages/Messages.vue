<template>
    <div class="h-[100vh] flex flex-col w-full relative overflow-hidden bg-transparent">
        <div class="w-[10%]">
            <Sidebar class=" fixed top-0 shadow" />
        </div>

    <div class="w-[80%] ml-[18%] bg-transparent">
        <Navbar class="h-16" />
        <div class="flex-1 my-8 mx-auto p-6  bg-white card max-w-[95%] shadow-md min-h-screen">
            <div class="px-20">
              <h1 class="border-b py-6 text-3xl font-semibold">Messages</h1>
              <div class="grid grid-cols-8 pt-3 sm:grid-cols-10">
                <div class="col-span-8 overflow-hidden rounded-xl  sm:px-8 sm:shadow">
                <!-- Render settings pages here -->
                <div class="w-full my-3">
                  <ul class="flex space-x-4 border-b pt-4">
                    <li @click="setActiveTab('accountsettings')" class="cursor-pointer px-4 py-2 font-semibold" :class="{ 'text-blue-500 border-b-blue-700 border-b bg-blue-50 border-blue-500 ': isActiveTab('accountsettings') }">AccountSettings</li>

                    <li @click="setActiveTab('roles')" class="cursor-pointer px-4 py-2 font-semibold" :class="{ 'text-blue-500 border-b-blue-700 border-b bg-blue-50 border-blue-500': isActiveTab('roles') }">Roles & Permissions</li>

                    <li @click="setActiveTab('billingtokens')" class="cursor-pointer px-4 py-2 font-semibold" :class="{ 'text-blue-500 border-b-blue-700 border-b bg-blue-50 border-blue-500': isActiveTab('billingtokens') }">Billings & Tokens</li>

                    <li @click="setActiveTab('notifications')" class="cursor-pointer px-4 py-2 font-semibold" :class="{ 'text-blue-500 border-b-blue-700 border-b bg-blue-50 border-blue-500': isActiveTab('notifications') }">Notifications</li>

                    <li @click="setActiveTab('integrations')" class="cursor-pointer px-4 py-2 font-semibold" :class="{ 'text-blue-500 border-b-blue-700 border-b bg-blue-50 border-blue-500': isActiveTab('integrations') }">API & Integration</li>

                  </ul>
                </div>
                <component :is="activeTabComponent"></component>
                </div>
              </div>
            </div>
        </div>
        </div>
        <Footer />
        <!-- end content -->
      </div>
      <!-- end wrapper -->
  </template>

  <script>

import Navbar from '../components/partials/Navbar.vue'
import Sidebar from '../components/partials/Sidebar.vue'
import Footer from '../components/partials/Footer.vue'
import EditUserModal from "../components/modals/EditUserModal.vue";
import AddUserModal from "../components/modals/AddUserModal.vue";
import DeletConfirmationModal from "../components/modals/DeleteConfirmationModal.vue";
import roles from "../pages/settings_pages/Roles.vue";
import notifications from "./settings_pages/Notifications.vue";
import billingtokens from "./settings_pages/BillingTokens.vue";
import integrations from "./settings_pages/Integrations.vue";
import accountsettings from "./settings_pages/AccountSettings.vue";


  export default {
    name: 'Settings',
    components: {
      Navbar,
      Sidebar,
      Footer,
      accountsettings,
      roles,
      billingtokens,
      notifications,
      integrations,
    },
    data() {
      return {
        activeTab: 'accountsettings', // Default active tab
      };
    },
    computed: {
      activeTabComponent() {
        return this.activeTab; // Capitalize the first letter for the component name
      },
    },
    methods: {
      setActiveTab(tab) {
        this.activeTab = tab; // Set the active tab
      },
      isActiveTab(tab) {
        return this.activeTab === tab; // Check if the tab is active
      },
    },
  };
  </script>
