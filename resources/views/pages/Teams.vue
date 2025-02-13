<template>
<div>
    <Navbar />

    <!-- start wrapper -->
    <div class="h-screen flex flex-row flex-wrap">
        <Sidebar />

        <!-- start content -->
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            <div class="min-h-[90vh] max-w-8xl sm:mx-8 mx-auto bg-white px-20 py-10 card">
                <div class="items-center border-b pb-5 flex justify-between md:divide-x md:divide-gray-100 dark:divide-gray-700 mb-5">
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Team Members</h1>
                    <!-- Button to open the modal -->
                    <div class="flex items-center space-x-2">
                        <button @click="openAddEmployeeModal" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 border border-blue-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                            + Add New Member
                        </button>
                        <button class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 010-1.414 1 1 0 001.414 1.414l3 3a1 1 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path>
                            </svg>
                            Export
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-8 pt-3 sm:grid-cols-10">
                    <div class="col-span-8 overflow-hidden rounded-xl  sm:px-8 sm:shadow">

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
                                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"> Department</th>
                                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Role</th>
                                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Gender</th>
                                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Country</th>
                                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Contract</th>
                                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                                <tr v-for="employee in employees" :key="employee.id" class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <td class="w-4 p-4">
                                                        <div class="flex items-center">
                                                            <input id="checkbox-{{ employee.id }}" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-{{ employee.id }}" class="sr-only">checkbox</label>
                                                        </div>
                                                    </td>
                                                    <td class="p-4 text-sm font-normal text-gray-700 whitespace-nowrap dark:text-gray-400"> <span class="inline-flex items-center ">
                                                            <img class="rounded-full h-8 w-8 mr-3" :src="employee.profile_picture" alt="Profile Picture">
                                                            <div class="flex flex-col">
                                                                <span class="font-bold text-md"> {{ employee.full_name }}</span>
                                                                {{ employee.email }}
                                                            </div>
                                                        </span> </td>
                                                    <td class="p-4 text-sm font-normal text-gray-700 whitespace-nowrap dark:text-gray-400">{{ employee.department }}</td>
                                                    <td class="p-4 text-sm font-normal text-gray-700 whitespace-nowrap dark:text-gray-400">{{ employee.designation }}</td>
                                                    <td class="p-4 text-sm font-normal text-gray-700 whitespace-nowrap dark:text-gray-400">{{ employee.gender }}</td>
                                                    <td class="p-4 text-sm font-normal text-gray-700 whitespace-nowrap dark:text-gray-400">{{ employee.country }}</td>
                                                    <td class="p-4 text-sm font-normal text-gray-700 whitespace-nowrap dark:text-gray-400">{{ employee.employment_type }}</td>

                                                    <td class="p-4 space-x-2 whitespace-nowrap flex items-center">
                                                        <button @click="openEditEmployeeModal(employee)" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-gray-700 border rounded-lg hover:bg-gray-200 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-500">
                                                            EditUser
                                                        </button>
                                                        <button @click="openDeleteConfirmationModal(employee.id)" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
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
                </div>
            </div>
        </div>
        <!-- end content -->
    </div>
    <!-- end wrapper -->

    <Footer />

    <!-- Modals -->
    <AddEmployeeModal :isOpen="addEmployeeModalOpen" @close="addEmployeeModalOpen = false" @employee-added="fetchEmployees" />
    <EditEmployeeModal :isOpen="editEmployeeModalOpen" :employeeToEdit="employeeToEdit" @close="editEmployeeModalOpen = false" @employee-updated="fetchEmployees" />
    <DeleteConfirmationModal :isOpen="deleteEmployeeModalOpen" :Id="employeeToDeleteId" @close="deleteEmployeeModalOpen = false" @employee-deleted="fetchEmployees" />
</div>
</template>

<script>
import Navbar from '../components/partials/Navbar.vue'
import Sidebar from '../components/partials/Sidebar.vue'
import Footer from '../components/partials/Footer.vue'
import axios from 'axios';
import EditEmployeeModal from "../components/modals/EditEmployeeModal.vue";
import AddEmployeeModal from "../components/modals/AddEmployeeModal.vue";
import DeleteConfirmationModal from "../components/modals/DeleteConfirmationModal.vue";

export default {
    name: 'Settings',
    components: {
        Navbar,
        Sidebar,
        Footer,
        EditEmployeeModal,
        AddEmployeeModal,
        DeleteConfirmationModal
    },
    data() {
        return {
            employees: [], // Array to hold employee data
            addEmployeeModalOpen: false,
            editEmployeeModalOpen: false,
            deleteEmployeeModalOpen: false,
            employeeToEdit: null,
            employeeToDeleteId: null,
            tableHeaders: ["Name", "Department", "Position", "Email", "Gender", "Country", "Contract", "Joined"]
        };
    },
    methods: {
        async fetchEmployees() {
            // Fetch employees from API
            try {
                const response = await axios.get("/api/fetchemployees");
                this.employees = response.data;
            } catch (error) {
                console.error('Error fetching employees:', error);
            }
        },
        openAddEmployeeModal() {
            this.addEmployeeModalOpen = true;
        },
        openEditEmployeeModal(employee) {
            this.employeeToEdit = employee;
            this.editEmployeeModalOpen = true;
        },
        openDeleteConfirmationModal(Id) {
            this.employeeToDeleteId = Id;
            this.deleteEmployeeModalOpen = true;
        }
    },
    mounted() {
        this.fetchEmployees(); // Fetch employees on component mount
    }
};
</script>
