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
                    <h2 class="text-3xl leading-tight text-gray-900 mb-1.5 font-bold">Complaint Submission Form</h2>
                    <p class="text-base text-gray-700">
                        Your voice matters. If you have any concerns, please let us know by filling out the complaint form. All complaints are taken seriously and will be handled confidentially with HR or Management.
                    </p>
                    <p class="text-base text-gray-700">
                        Please feel free to submit your complaint anonymously if you wish. We’re committed to maintaining a supportive and respectful workplace for everyone.
                    </p>
                </div>

                <!-- Right Column - Complaint Submission Form -->
                <div class="card p-8">
                    <h2 class="text-xl mb-4 font-bold ml-5">Fill the form</h2>
                    <form @submit.prevent="submitComplaint" class="bg-white p-6 rounded-lg space-y-4">

                        <!-- Nature of Complaint -->
                        <div>
                            <label class="block font-medium text-gray-700">Nature of Complaint</label>
                            <select v-model="form.complaintType" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                                <option value="harassment">Harassment</option>
                                <option value="discrimination">Discrimination</option>
                                <option value="work environment">Work Environment</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <!-- Incident Details -->
                        <div>
                            <label class="block font-medium text-gray-700">Incident Details</label>
                            <textarea v-model="form.incidentDetails" placeholder="Describe the incident" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500"></textarea>
                        </div>

                        <!-- Desired Resolution -->
                        <div>
                            <label class="block font-medium text-gray-700">Desired Resolution</label>
                            <textarea v-model="form.desiredResolution" placeholder="What outcome are you hoping for?" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500"></textarea>
                        </div>

                        <!-- Attachment (Optional) -->
                        <div>
                            <label class="block font-medium text-gray-700">Attach File (Optional)</label>
                            <input type="file" @change="handleFileUpload" class="w-full p-2 border rounded-md focus:outline-none">
                        </div>

                        <!-- Anonymous Submission Checkbox -->
                        <div class="flex items-center">
                            <input v-model="form.anonymous" type="checkbox" id="anonymous" class="mr-2 rounded-md focus:outline-none">
                            <label for="anonymous" class="font-medium text-gray-700">Submit as anonymous</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center w-full">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded-md hover:bg-blue-600 focus:outline-none w-full">
                                Submit Complaint
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
    name: "FileComplaint",
    components: {
        Navbar,
        Sidebar,
        Footer,

    },
    data() {
        return {
            form: {
                complaintType: "",
                incidentDetails: "",
                desiredResolution: "",
                anonymous: false,
                file: null,
            },
        };
    },
    methods: {
        handleFileUpload(event) {
            this.form.file = event.target.files[0];
        },
        submitComplaint() {
            // Handle complaint submission
            console.log("Complaint submitted", this.form);

            // Reset form
            this.form = {
                complaintType: "",
                incidentDetails: "",
                desiredResolution: "",
                anonymous: false,
                file: null,
            };
        },
    },
};
</script>

<style scoped>
/* Optional: Add any custom styles here */
</style>
