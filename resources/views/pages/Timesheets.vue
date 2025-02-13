<template>
    <div class="flex flex-col w-full relative bg-transparent overflow-x-hidden overflow-y-scroll">
        <div class="w-[10%]">
            <Sidebar class=" fixed top-0 shadow" />
        </div>

    <div class="w-[80%] ml-[18%] bg-transparent">
        <Navbar class="h-16" />

        <!-- Main content area -->
        <div class="md:mt-16 flex-1 my-8 mx-auto p-20 bg-white card max-w-[95%] shadow-md min-h-[80vh]">

            <div class="items-center flex justify-between md:divide-x md:divide-gray-100 dark:divide-gray-700 mb-10">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-3xl dark:text-white">Timesheets</h1>
                <button id="createProductButton" class="text-white bg-blue-500 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" type="button" data-drawer-target="drawer-create-product-default" data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default" data-drawer-placement="right">
                    + Add new Timesheet
                </button>

            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-all" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Product Name
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Technology
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Description
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            ID
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Price
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Discount
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-{{ .id }}" aria-describedby="checkbox-1" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-{{ .id }}" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            <div class="text-base font-semibold text-gray-900 dark:text-white">{{ name }}</div>
                                            <div class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ category }}</div>
                                        </td>
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ technology }}</td>
                                        <td class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">{{ description }}</td>
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">#{{ id }}</td>
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ price }}</td>
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ discount }}</td>

                                        <td class="p-4 space-x-2 whitespace-nowrap flex items-center">
                                            <button type="button" id="updateProductButton" data-drawer-target="drawer-update-product-default" data-drawer-show="drawer-update-product-default" aria-controls="drawer-update-product-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                <i class="fad fa-edit text-xs mr-2"></i>
                                                Update
                                            </button>
                                            <button type="button" id="deleteProductButton" data-drawer-target="drawer-delete-product-default" data-drawer-show="drawer-delete-product-default" aria-controls="drawer-delete-product-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                Delete item
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
import Numbers from './Number.vue'
import ProjectOverview from './ProjectOverview.vue'
import {
    mapGetters
} from 'vuex';
import {
    ref
} from 'vue';

export default {
    name: 'Dashboard',
    components: {
        Navbar,
        Sidebar,
        Numbers,
        ProjectOverview,
        Footer
    },

    setup() {

        const firstName = ref(null);

        return {
            firstName,
        }
    },
    computed: {
        ...mapGetters(['getUser']),
        getfirstName() {
            return this.getUser
        },
        getTimeofDay() {
            const hour = new Date().getHours();
            if (hour < 12) {
                return "Good Morning";
            } else if (hour < 18) {
                return 'Good Afternoon'
            } else {
                return 'Good Evening'
            }
        }

    },
    mounted() {

        const user = this.getUser;
        if (user) {
            this.firstName = user.name.split(' ')[0];
            console.log(user.name);
        }

    },
    methods: {

    }

}
</script>

<style scoped>

</style>
