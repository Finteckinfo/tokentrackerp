<template>
<div class="flex flex-col w-full relative bg-transparent overflow-x-hidden overflow-y-scroll">
    <div class="w-[10%]">
        <Sidebar class=" fixed top-0 shadow" />
    </div>

    <div class="w-[80%] ml-[18%] bg-transparent">
        <Navbar class="h-16" />

        <!-- Main content area -->
        <div class="md:mt-16 flex-1 my-8 mx-auto  bg-transparent card max-w-[95%] border-none">

            <!-- start content -->
            <div class="p-8">
                <div class="grid sm:grid-cols-1 grid-cols-2 gap-8">
                    <div class="flex items-center justify-between bg-white px-8  py-12 shadow rounded-lg card">
                        <div class="flex items-center space-x-4">
                            <img src="https://img.daisyui.com/images/profile/demo/2@94.webp" alt="User Profile" class="w-40 h-40 rounded-full">
                            <div class="space-y-4">
                                <h1 class="text-3xl font-bold text-gray-800">{{ getTimeofDay }} {{ firstName }},</h1>
                                <span class="flex flex-col ">
                                    <h2 class="text-sm text-gray-500">Payments Address</h2>
                                    <div class="flex items-center space-x-3 text-gray-600 bg-gray-200 px-5 py-1 rounded-md border-2 border-blue-200">
                                        <p class="text-xs">1Lbcfr7sAHTD9CgdQo3HTMTk</p>
                                        <button @click="copyToClipboard" class="text-blue-500 hover:text-blue-700">
                                            <i class="fad fa-clone"></i>
                                        </button>
                                    </div>
                                </span>

                                <button class="text-sm bg-blue-500 text-white px-8 py-2 rounded hover:bg-blue-700"> <i class="fad fa-edit"></i> Edit Profile</button>
                            </div>
                        </div>
                    </div>

                    <!-- Payments Balance Section -->
                    <div class="flex flex-row items-center justify-between bg-white px-8  py-12 shadow rounded-lg card">
                        <div>
                            <i class="fad fa-wallet text-7xl text-blue-500 mb-4"></i>
                        </div>
                        <div class="flex-1 ml-10">
                            <p class="text-lg font-semibold text-gray-700">Wallet Balance</p>
                            <h2 class="text-4xl font-bold">500 Tokens</h2>
                            <p class="text-gray-500 mt-1"> $500.00 USD ( 1token = $1USD ) </p>
                        </div>
                    </div>
                </div>

                <!-- Second Row - Quick Action Cards -->
                <div class="grid grid-cols-4 gap-6 sm:grid-cols-2 mt-5">
                    <div class="flex items-center p-8 bg-white shadow rounded-lg card">
                        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full">
                            <i class="fad fa-arrow-to-bottom text-xl"></i>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold text-center">Withdraw Tokens</span>
                            <span class="block text-gray-500">Withdraw to Bank/Mpesa</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white shadow rounded-lg card">
                        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-orange-600 bg-orange-100  rounded-full">
                            <i class="fad fa-exchange text-xl"></i>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold text-center">Refund</span>
                            <span class="block text-gray-500">Send Back Erroneous Pay</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white shadow rounded-lg card">
                        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full">
                            <i class="fad fa-hand-holding-usd text-xl"></i>
                        </div>
                        <div>
                            <span class="inline-block text-2xl font-bold text-center">Request Payment</span>
                            <span class="block text-gray-500">Completed Task? Get Paid</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white shadow rounded-lg card">
                        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full">
                            <i class="fad fa-list text-xl"></i>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold text-center">My Statements</span>
                            <span class="block text-gray-500">See your transactions</span>
                        </div>
                    </div>
                </div>

                <!-- Third Row - Recent Transactions -->
                <div class="mt-8 bg-white p-6 rounded-lg shadow-md card">
                    <h2 class="text-xl font-bold mb-4">Recent Transactions</h2>
                    <table class="min-w-full text-left text-sm text-gray-500">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-6 font-semibold text-gray-700">Date</th>
                                <th class="py-3 px-6 font-semibold text-gray-700">Description</th>
                                <th class="py-3 px-6 font-semibold text-gray-700">Amount</th>
                                <th class="py-3 px-6 font-semibold text-gray-700">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="py-3 px-6">2024-10-01</td>
                                <td class="py-3 px-6">Token Deposit</td>
                                <td class="py-3 px-6">+100 Tokens</td>
                                <td class="py-3 px-6 ">
                                    <p class="text-white bg-green-600 py-1 px-2 rounded-md w-1/3 text-center">Completed</p>
                                </td>
                            </tr>
                            <tr class="border-t">
                                <td class="py-3 px-6">2024-09-29</td>
                                <td class="py-3 px-6">Token Withdrawal</td>
                                <td class="py-3 px-6">-50 Tokens</td>
                                <td class="py-3 px-6 ">
                                    <p class="text-white bg-green-600 py-1 px-2 rounded-md w-1/3 text-center">Completed</p>
                                </td>
                            </tr>
                            <tr class="border-t">
                                <td class="py-3 px-6">2024-09-25</td>
                                <td class="py-3 px-6">Token Transfer</td>
                                <td class="py-3 px-6">-30 Tokens</td>
                                <td class="py-3 px-6 ">
                                    <p class="text-white bg-green-600 py-1 px-2 rounded-md w-1/3 text-center">Completed</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
import {
    ref
} from 'vue';
import store from '../../store';

export default {
    name: "Payments",
    components: {
        Navbar,
        Sidebar,
        Footer,
    },
    setup() {

        const firstName = ref(null);

        return {
            firstName,
            store,
        }
    },
    mounted() {
        this.store.dispatch('fetchWorkspaces');
        const user = this.$store.state.user;
    if (user && user.name) {
        this.firstName = user.name.split(' ')[0];
    }
    },

    methods: {
        copyToClipboard() {
            navigator.clipboard.writeText("0xABC123DEF456...");
            alert('Payments address copied to clipboard!');
        }
    }
};
</script>
