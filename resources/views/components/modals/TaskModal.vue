<template>
<div v-if="isTaskModalOpen">
    <!-- Background Overlay -->
    <div class="fixed inset-0 bg-gray-800 bg-opacity-50 z-40"></div>

    <!-- Pop-up Modal -->
    <div class="fixed inset-0 flex justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-1/3 py-12 px-16 relative z-50">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Create Task</h2>
                <button @click="closeTaskModal" class="text-gray-500 hover:text-gray-800"><i class="fas fa-times text-gray-800"></i></button>
            </div>
            <!-- Task Name -->
            <div>
                <form @submit.prevent="addnewTask">
                    <div class="mb-4">
                        <label for="taskName" class="block text-sm font-medium text-gray-700">Task title</label>
                        <input v-model="task_title" type="text" id="taskName" placeholder="Title e.g. 'Tasks for Alex'" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-blue-500 focus:border-2" />
                    </div>

                    <!-- Task Instructions Box -->
                    <div class="mb-4">
                        <label for="taskinstructions" class="block text-sm font-medium text-gray-700">Task details & Instructions</label>
                        <textarea v-model="taskinstructions" id="taskinstructions" rows="8" placeholder="Task details & Instructions..." class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-blue-500 focus:border-2"></textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col w-full my-5">
                        <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2 w-full">Create Task</button>
                    </div>
                </form>
                <div class="flex flex-col w-full">
                    <button @click="closeTaskModal" class=" text-gray-900 rounded-lg px-4 w-1/3 mx-auto">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import {
    ref,
    watch,
    computed
} from "vue";
import {
    mapActions,
    mapGetters,
    mapState,
    useStore
} from "vuex";
import axios from 'axios';

export default {
    name: 'TaskModal',
    props: {
        isTaskModalOpen: {
            type: Boolean,
            required: true,
        }

    },
    setup(props, {
        emit
    }) {
        const store = useStore();
        const task_title = ref("");
        const task_items = ref([{
            name: "",
            completed: false
        }]);

        const assigned_to = ref("");
        const assignedto_name = ref("");
        const budget_allocated = ref("");
        const current_status = ref("backlog");
        const taskinstructions = ref("");
        const current_user = ref("");
        const current_username = ref("");
        const admins = ref([]);

        watch(() => props.isTaskModalOpen, (newVal) => {
            if (!newVal) {
                resetForm();
            }
        });

        const resetForm = () => {
            task_title.value = "";
            task_items.value = [{
                name: "",
                completed: false
            }];
            assigned_to.value = "";
            assignedto_name.value = "";
            budget_allocated.value = "";
            taskinstructions.value = "";
        };

        return {
            current_user,
            current_username,
            task_title,
            task_items,
            assigned_to,
            assignedto_name,
            budget_allocated,
            current_status,
            taskinstructions,
            admins,
            store,
            resetForm,
            closeTaskModal: () => emit('close'),
        };

    },
    mounted() {

        this.getAdmins();

        const storedUser = JSON.parse(localStorage.getItem('user'));
        if (storedUser) {
            this.current_user = storedUser.id;
            this.current_username = storedUser.name.split(' ')[0];
        }

    },

    computed: {

        ...mapState({
            workspace_id: state => state.workspace.workspace_id,
            admins: state => state.admins,

        }),

    },
    methods: {
        ...mapActions(['fetchAdmins', 'fetchTasks']),

        async getAdmins() {
            await this.store.dispatch('fetchAdmins');
            this.admins = this.store.state.admins;

        },

        async addnewTask() {

            try {

                const selectedAdmin = this.admins.find(admin => admin.id === this.assigned_to);

                const response = await axios.post('/api/createtask', {
                    task_title: this.task_title,
                    taskinstructions: this.taskinstructions,
                    created_by: this.current_user,
                    workspace_id: this.workspace_id
                });

                if (response.status === 200) {
                    alert("Task created successfully");
                    this.closeTaskModal();
                    this.sendNotification();
                    await this.store.dispatch('fetchNotifications')
                    await this.store.dispatch('fetchTasks', this.workspace_id);
                }

            } catch (error) {
                if (error.response) {
                    console.error("Error Response:", error.response);
                    alert(`Server Error: ${error.response.data.message || 'Something went wrong!'}`);
                } else if (error.request) {
                    console.error("Error Request:", error.request);
                    alert("No response from server. Please try again.");
                } else {
                    console.error("Error Message:", error.message);
                    alert(`Error: ${error.message}`);
                }

            }

        },

        async sendNotification() {

            try {
                const response = await axios.post('/api/sendnotification', {
                    from: this.current_username,
                    to_userid: this.assigned_to,
                    title: "assigned you a new task",
                    budget_allocated: this.budget_allocated,
                    message: "Budget amount- ",
                    task_id: this.task_id,
                    workspace_id: this.workspace_id,
                    links: `/api/${this.workspace_id}/tasks/${this.task_id}`
                });

                if (response.status == 200) {
                    console.log('Notification Sent')
                }

            } catch (error) {
                if (error.response) {
                    console.error("Error Response:", error.response);
                    alert(`Server Error: ${error.response.data.message || 'Something went wrong!'}`);
                } else if (error.request) {
                    console.error("Error Request:", error.request);
                    alert("No response from server. Please try again.");
                } else {
                    console.error("Error Message:", error.message);
                    alert(`Error: ${error.message}`);
                }

            }

        },

        addTaskItem() {
            this.task_items.push({
                title: "",
                done: false
            });
        },

        removeTaskItem(index) {
            this.task_items.splice(index, 1);
        },

    }
};
</script>

<style scoped>
.bg-opacity-50 {
    background-color: rgba(0, 0, 0, 0.5);
}
</style>
