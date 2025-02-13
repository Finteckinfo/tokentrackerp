<template>
<div v-if="isOpen" class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-900 bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-11/12 max-w-3xl p-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Add New Member</h2>
            <button @click="closeAddEmployeeModal" class="text-gray-500 hover:text-gray-800">
                <i class="fas fa-times text-gray-800"></i>
            </button>
        </div>

        <form @submit.prevent="submitForm">
            <div class="grid grid-cols-2 gap-x-8 gap-y-3">

                <!-- Full Name -->
                <div>
                    <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input v-model="form.full_name" id="full_name" type="text" class="w-full p-2 border border-gray-300 rounded-lg" required />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input v-model="form.email" id="email" type="email" class="w-full p-2 border border-gray-300 rounded-lg" required />
                </div>

                <!-- Employee ID -->
                <div>
                    <label for="employee_id" class="block text-sm font-medium text-gray-700">Employee ID</label>
                    <input v-model="form.employee_id" id="employee_id" type="text" class="w-full p-2 border border-gray-300 rounded-lg" required />
                </div>

                <!-- Employment Type -->
                <div>
                    <label for="employment_type" class="block text-sm font-medium text-gray-700">Employment Type</label>
                    <select v-model="form.employment_type" id="employment_type" class="w-full p-2 border border-gray-300 rounded-lg" required>
                        <option value="" disabled>Select Employment Type</option>
                        <option value="Full-Time">Full-Time</option>
                        <option value="Part-Time">Part-Time</option>
                        <option value="Freelancer">Freelancer</option>
                        <option value="Intern">Intern</option>
                    </select>
                </div>

                <!-- Designation -->
                <div>
                    <label for="designation" class="block text-sm font-medium text-gray-700">Designation</label>
                    <input v-model="form.designation" id="designation" type="text" class="w-full p-2 border border-gray-300 rounded-lg" required />
                </div>

                <!-- Department -->
                <div>
                    <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                    <input v-model="form.department" id="department" type="text" class="w-full p-2 border border-gray-300 rounded-lg" required />
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select v-model="form.gender" id="gender" class="w-full p-2 border border-gray-300 rounded-lg" required>
                        <option value="" disabled>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Work Anniversary -->
                <div>
                    <label for="work_anniversary" class="block text-sm font-medium text-gray-700">Work Anniversary</label>
                    <input v-model="form.work_anniversary" id="work_anniversary" type="date" class="w-full p-2 border border-gray-300 rounded-lg" required />
                </div>

                <!-- Date of Birth -->
                <div>
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input v-model="form.date_of_birth" id="date_of_birth" type="date" class="w-full p-2 border border-gray-300 rounded-lg" required />
                </div>

                <!-- Supervisor -->
                <div>
                    <label for="supervisor" class="block text-sm font-medium text-gray-700">Supervisor</label>
                    <input v-model="form.supervisor" id="supervisor" type="text" class="w-full p-2 border border-gray-300 rounded-lg" />
                </div>
                <!-- Country -->
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <input v-model="form.country" id="country" type="text" class="w-full p-2 border border-gray-300 rounded-lg" required />
                </div>

                <!-- Passport ID -->
                <div>
                    <label for="passport_id" class="block text-sm font-medium text-gray-700">Passport/National ID</label>
                    <input v-model="form.passport_id" id="passport_id" type="text" class="w-full p-2 border border-gray-300 rounded-lg" />
                </div>
            </div>
            <!-- About -->
            <div class="col-span-2">
                <label for="about" class="block text-sm font-medium text-gray-700">About</label>
                <textarea v-model="form.about" id="about" class="w-full p-2 border border-gray-300 rounded-lg" rows="4"></textarea>
            </div>

            <!-- Profile Picture -->
            <div class="col-span-2">
                <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                <input type="file" @change="handleFileChange" id="profile_picture" class="w-full p-2 border border-gray-300 rounded-lg" />
            </div>

            <div class="flex flex-col w-full my-5">
                <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2 w-full">Add Member</button>
            </div>
        </form>

        <div class="flex flex-col w-full">
            <button @click="closeAddEmployeeModal" class="text-gray-900 rounded-lg px-4 w-1/3 mx-auto">Cancel</button>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios';

export default {
    name: "AddEmployeeModal",
    props: {
        isOpen: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            form: {
                employee_id: "",
                profile_picture: null,
                full_name: "",
                email: "",
                country: "",
                designation: "",
                department: "",
                gender: "",
                work_anniversary: "",
                date_of_birth: "",
                supervisor: "",
                about: "",
                employment_type: "",
                passport_id: "",
            }
        };
    },
    methods: {
        closeAddEmployeeModal() {
            this.$emit("close");
            this.resetForm();
        },
        handleFileChange(event) {
            this.form.profile_picture = event.target.files[0];
        },
        async submitForm() {
            const formData = new FormData();
            for (const key in this.form) {
                formData.append(key, this.form[key]);
            }

            try {
                const response = await axios.post('/api/employees', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    }
                });

                this.$emit("employee-added", response.data);
                this.closeAddEmployeeModal();
            } catch (error) {
                console.error("There was an error adding the employee:", error);
                alert("Failed to add employee. Please try again.");
            }
        },
        resetForm() {
            this.form = {
                employee_id: "",
                profile_picture: null,
                full_name: "",
                email: "",
                country: "",
                designation: "",
                department: "",
                gender: "",
                work_anniversary: "",
                date_of_birth: "",
                supervisor: "",
                about: "",
                employment_type: "",
                passport_id: "",
            };
        }
    }
};
</script>

<style scoped>
/* Optional: add any additional styling if needed */
</style>
