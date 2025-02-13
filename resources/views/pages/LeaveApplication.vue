<template>
    <div class="h-[100vh] flex flex-col w-full relative overflow-hidden bg-transparent">
        <div class="w-[10%]">
            <Sidebar class=" fixed top-0 shadow" />
        </div>

    <div class="w-[80%] ml-[18%] bg-transparent">
        <Navbar class="h-16" />
        <div class="flex-1 my-8 mx-auto p-6  bg-white card max-w-[95%] shadow-md min-h-screen">
<div class="px-20">
            <h2 class="text-3xl leading-tight text-gray-900 mb-1.5 font-bold">Leave Application</h2>
            <div class="w-full grid grid-cols-2 gap-10 mx-auto">
                <!-- 2-Column Grid Layout -->

                <!-- Left Column - Leave Summary -->
                <div class="space-y-4 mt-8">
                    <h2 class="text-xl font-bold">Your Leave History</h2>

                    <!-- Leave Cards -->
                    <div v-for="leave in leavesTaken" :key="leave.id" class="p-6 rounded-xl bg-white card">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-purple-600"></span>
                                <p class="text-base font-medium text-gray-900">Last Leave Date: {{ leave.date }}</p>
                            </div>
                            <div class="dropdown relative inline-flex">
                                <button type="button" data-target="dropdown-default" class="dropdown-toggle inline-flex justify-center py-2.5 px-1 items-center gap-2 text-sm text-black rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:text-purple-600  ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="4" viewBox="0 0 12 4" fill="none">
                                        <path d="M1.85624 2.00085H1.81458M6.0343 2.00085H5.99263M10.2124 2.00085H10.1707" stroke="currentcolor" stroke-width="2.5" stroke-linecap="round"></path>
                                    </svg>

                                </button>
                                <div id="dropdown-default" class="dropdown-menu rounded-xl shadow-lg bg-white absolute top-full -left-10 w-max mt-2 hidden" aria-labelledby="dropdown-default">
                                    <ul class="py-2">
                                        <li>
                                            <a class="block px-6 py-2 text-xs hover:bg-gray-100 text-gray-600 font-medium" href="javascript:;">
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a class="block px-6 py-2 text-xs hover:bg-gray-100 text-gray-600 font-medium" href="javascript:;">
                                                Remove
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-xl leading-8 font-semibold text-black mb-1">Reason: {{ leave.type }}</h6>
                        <p class="text-base font-normal text-gray-600">Duration: {{ leave.days }} days</p>
                    </div>
                </div>

                <!-- Right Column - Leave Application Form -->
                <div class="card p-8">
                    <h2 class="text-xl mb-4 font-bold">Apply for Leave</h2>
                    <form @submit.prevent="submitLeaveApplication" class="bg-white p-6 rounded-lg space-y-4">
                        <!-- Leave Type -->
                        <div>
                            <label class="block font-medium text-gray-700">Leave Type</label>
                            <select v-model="form.leaveType" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                                <option value="sick">Sick Leave</option>
                                <option value="annual">Annual Leave</option>
                                <option value="maternity">Maternity Leave</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <!-- Leave Dates -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-medium text-gray-700">Start Date</label>
                                <input v-model="form.startDate" type="date" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block font-medium text-gray-700">End Date</label>
                                <input v-model="form.endDate" type="date" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>
                        </div>

                        <!-- Attachments -->
                        <div>
                            <label class="block font-medium text-gray-700">Upload Document (Optional)</label>
                            <input type="file" @change="handleFileUpload" class="w-full p-2 border rounded-md focus:outline-none">
                        </div>

                        <!-- Contact While on Leave -->
                        <div>
                            <label class="block font-medium text-gray-700">Contact While on Leave</label>
                            <input v-model="form.leaveContact" type="text" placeholder="Enter contact number" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>

                        <!-- Work Reassignment -->
                        <div>
                            <label class="block font-medium text-gray-700">Work Reassignment (Optional)</label>
                            <textarea v-model="form.workReassignment" placeholder="Mention colleague name if reassigning work" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center w-full">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded-md hover:bg-blue-600 focus:outline-none w-full">
                                Submit Leave Application
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Resume from Leave Pop-Up -->
                <div v-if="showResumePopup" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm">
                        <h2 class="text-lg font-semibold">Welcome Back!</h2>
                        <p class="text-gray-600 my-4">Do you want to resume from your last leave?</p>
                        <div class="flex justify-end space-x-4">
                            <button @click="resumeFromLeave" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">Yes</button>
                            <button @click="showResumePopup = false" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none">No</button>
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
import {
    ref,
} from "vue";

import Navbar from '../components/partials/Navbar.vue'
import Sidebar from '../components/partials/Sidebar.vue'
import Footer from '../components/partials/Footer.vue'

export default {
    name: "LeaveApplication",
    components: {
        Navbar,
        Sidebar,
        Footer,

    },
    data() {
        return {
            leavesTaken: [{
                    id: 1,
                    date: "2023-10-15",
                    type: "Sick Leave",
                    days: 3
                },
                {
                    id: 2,
                    date: "2023-08-20",
                    type: "Annual Leave",
                    days: 5
                },
                // Add more leave records as needed
            ],
            form: {
                leaveType: "sick",
                startDate: "",
                endDate: "",
                leaveContact: "",
                workReassignment: "",
            },
            showResumePopup: false,
        };
    },
    mounted() {
        // Show the popup if the user is resuming from leave
        this.checkForLeaveResume();
    },
    methods: {
        checkForLeaveResume() {
            // Logic to determine if the user is returning from leave
            // Example: Check if there was a recent leave in leavesTaken
            const lastLeave = this.leavesTaken[0];
            if (lastLeave && new Date() > new Date(lastLeave.date)) {
                this.showResumePopup = true;
            }
        },
        handleFileUpload(event) {
            this.form.file = event.target.files[0];
        },
        submitLeaveApplication() {
            // Form submission logic
            console.log("Leave application submitted", this.form);
            // Reset form
            this.form = {
                leaveType: "sick",
                startDate: "",
                endDate: "",
                leaveContact: "",
                workReassignment: "",
            };
        },
        resumeFromLeave() {
            // Logic for resuming from leave
            this.showResumePopup = false;
            console.log("User resumed from leave");
        },
    },
};
</script>

<style scoped>
/* Optional: Add any custom styles here */
</style>
