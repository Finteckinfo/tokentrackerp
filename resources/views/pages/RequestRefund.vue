<template>
<div class="h-[100vh] flex flex-col w-full relative overflow-hidden bg-transparent">
    <div class="w-[10%]">
        <Sidebar class=" fixed top-0 shadow" />
    </div>

    <div class="w-[80%] ml-[18%] bg-transparent">
        <Navbar class="h-16" />
        <div class="flex-1 my-8 mx-auto p-6  bg-white card max-w-[95%] shadow-md min-h-[80vh]">
            <div class="w-full grid grid-cols-2 gap-10 p-20 mx-auto">

                <!-- Left Column - Encouraging Text -->
                <div class="space-y-4 mt-16">
                    <h2 class="text-3xl leading-tight text-gray-900 mb-1.5 font-bold"> Request Refund Form</h2>
                    <p class="text-base text-gray-700">

                        If you've incurred any out-of-pocket expenses while handling company-related tasks, please fill out this form to request a refund. Attach any supporting documents, such as receipts, for verification.
                        All requests will be reviewed within 7 business days. Please provide accurate and complete information to avoid delays.
                    </p>

                </div>

                <!-- Right Column - Complaint Submission Form -->
                <div class="card p-8">
                    <h2 class="text-xl mb-4 font-bold ml-5">Fill the form</h2>
                    <form @submit.prevent="submitRefundRequest" class="bg-white p-6 rounded-lg space-y-4">

                        <!-- Expense Date -->
                        <div>
                            <label class="block font-medium text-gray-700">Expense Date</label>
                            <input v-model="form.expenseDate" type="date" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>

                        <!-- Expense Amount -->
                        <div>
                            <label class="block font-medium text-gray-700">Amount Spent</label>
                            <input v-model="form.amount" type="number" step="0.01" placeholder="Enter amount" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>

                        <!-- Reason for Expense -->
                        <div>
                            <label class="block font-medium text-gray-700">Reason for Expense</label>
                            <textarea v-model="form.reason" placeholder="Describe the reason for this expense" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500"></textarea>
                        </div>

                        <!-- Attach Receipt (Optional) -->
                        <div>
                            <label class="block font-medium text-gray-700">Attach Receipt (Optional)</label>
                            <input type="file" @change="handleFileUpload" class="w-full p-2 border rounded-md focus:outline-none">
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center w-full">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded-md hover:bg-blue-600 focus:outline-none w-full">
                                Submit Refund Request
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <Footer />
</div>
</template>

<script>
import Navbar from '../components/partials/Navbar.vue'
import Sidebar from '../components/partials/Sidebar.vue'
import Footer from '../components/partials/Footer.vue'

export default {
    name: "RequestRefund",
    components: {
        Navbar,
        Sidebar,
        Footer,

    },
    data() {
        return {
            form: {
                expenseDate: "",
                amount: "",
                reason: "",
                file: null,
            },
        };
    },
    methods: {
        handleFileUpload(event) {
            this.form.file = event.target.files[0];
        },
        submitRefundRequest() {
            // Handle refund request submission
            console.log("Refund request submitted", this.form);

            // Reset form
            this.form = {
                expenseDate: "",
                amount: "",
                reason: "",
                file: null,
            };
        },
    },
};
</script>

<style scoped>
/* Optional: Add any custom styles here */
</style>
