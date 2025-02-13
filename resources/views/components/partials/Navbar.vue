<template>
<div class=" z-20 bg-transparent rounded-md  w-full mx-auto h-auto">
    <div class=" flex items-center justify-between p-4">

        <!-- Navbar Content -->
        <div class="flex-grow flex items-center justify-between ml-6 ">

            <!-- Search Box -->
            <div class="flex-grow mr-4">
                <input type="text" placeholder="Search..." class="rounded-full px-4 py-2 w-full border focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-100 border-gray-200" />
            </div>

            <!-- Date and Time Display -->
            <div class="text-gray-600 text-sm mr-4">
                {{ currentDateTime }}
            </div>

            <!-- Check-in Button with Timer -->
            <div class="flex items-center space-x-2">
                <button @click="toggleCheckin" class="inline-flex  items-center px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition focus:outline-none">
                    <span class="mb-1"><i class="fas fa-power-off mr-2"></i> {{ checkinText }}</span>
                </button>
                <div v-if="isCheckedIn" class="text-blue-500 font-bold">{{ elapsedTime }}</div>
            </div>

            <!-- User and Notification Icons -->
            <div class="flex items-center ml-6 space-x-4 relative">
                <!-- Notification -->
                <div class="dropdown">
                    <button @click.prevent="toggleNotificationDropdown" class="focus:outline-none">
                        <i class="far fa-bell text-xl"></i>
                    </button>
                    <div v-if="isNotificationDropdownOpen" class="absolute right-0 z-10 mt-2 w-[300px] bg-white shadow-lg rounded-md p-3">
                        <h1 class="text-md font-bold border-b pb-2">Notifications</h1>
                        <!-- Add notifications list here -->
                    </div>
                </div>

                <!-- User Profile -->
                <div class="dropdown relative">
                    <button @click.prevent="toggleDropdown" class="flex items-center focus:outline-none">
                        <div class="w-8 h-8 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold text-lg">
                            {{ initials }}
                        </div>
                      <p class="mx-1 font-semibold">{{ firstName }}</p> <i class="fad fa-chevron-down ml-2 text-xs"></i>
                    </button>
                    <div v-if="isDropdownOpen" class="absolute right-0 z-10 mt-2 w-56 bg-white shadow-lg rounded-md">
                        <!-- User Menu Dropdown -->
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"> <i class="fas fa-user-cog text-xs mr-3"></i> Account Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"> <i class="fas fa-question-circle mr-3"></i> Support</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 border-b" role="menuitem"> <i class="fas fa-key text-xs mr-3"></i> Purchase License</a>
                        <form method="POST" @submit.prevent="logout">
                            <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700" role="menuitem"> <i class="fas fa-sign-out text-xs mr-3"></i> Sign Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>


<script>
import dayjs from "dayjs";
import {
    ref,
    onMounted,
    onBeforeUnmount
} from "vue";
import {
    mapGetters,
    mapState
} from 'vuex';
import store from "../../../store";
import {
    useRouter
} from 'vue-router';

export default {
    name: "Navbar",
    setup() {
        const currentDateTime = ref(dayjs().format("ddd, DD MMM h:mmA"));
        const isDropdownOpen = ref(false);
        const isNotificationDropdownOpen = ref(false);
        const isCheckedIn = ref(false);
        const checkinText = ref("Check-in");
        const elapsedTime = ref("00:00:00");
        const initials = ref(null);
        const firstName = ref(null);
        let checkinTimer = null;
        let checkinStartTime = null;

        const toggleCheckin = () => {
            if (isCheckedIn.value) {
                // Check-out
                clearInterval(checkinTimer);
                checkinText.value = "Check-in";
                isCheckedIn.value = false;
                elapsedTime.value = "00:00:00";
            } else {
                // Check-in
                checkinStartTime = dayjs();
                checkinTimer = setInterval(updateElapsedTime, 1000);
                checkinText.value = "Checked-in";
                isCheckedIn.value = true;
            }
        };

        const updateElapsedTime = () => {
            const duration = dayjs().diff(checkinStartTime, "second");
            const hours = Math.floor(duration / 3600);
            const minutes = Math.floor((duration % 3600) / 60);
            const seconds = duration % 60;
            elapsedTime.value = `${String(hours).padStart(2, "0")}:${String(minutes).padStart(2, "0")}:${String(seconds).padStart(2, "0")}`;
        };

        const toggleDropdown = (event) => {
            isDropdownOpen.value = !isDropdownOpen.value;
            event.stopPropagation();
        };

        const toggleNotificationDropdown = (event) => {
            isNotificationDropdownOpen.value = !isNotificationDropdownOpen.value;
            event.stopPropagation();
        };

        const closeAllDropdowns = () => {
            isDropdownOpen.value = false;
            isNotificationDropdownOpen.value = false;
        };

        const updateDateTime = () => {
            currentDateTime.value = dayjs().format("MMMM D, YYYY h:mm A");
        };


        onBeforeUnmount(() => {
            document.removeEventListener("click", closeAllDropdowns);
            clearInterval(checkinTimer);
        });

        return {
            currentDateTime,
            toggleDropdown,
            toggleNotificationDropdown,
            toggleCheckin,
            checkinText,
            elapsedTime,
            initials,
            firstName,
            isCheckedIn,
            isDropdownOpen,
            isNotificationDropdownOpen,
        };
    },
    mounted() {
            document.addEventListener("click", this.closeAllDropdowns);
            setInterval(this.updateDateTime, 60000);
            this.setInitials();
        },
    computed: {

        ...mapState({
            notifications: state => state.workspace.notifications,
        }),

        ...mapGetters(['getUser']),
        user() {
            return this.getUser;
        },

    },
    methods: {
        setInitials() {
            const user = this.user;
            if (!user) {
                return;
            }
            const nameParts = user.name.split(' ');
            const initials = nameParts.map(part => part.charAt(0)).join('').toUpperCase();
            this.initials = initials;
            this.firstName = user.name.split(' ')[0];
        }
    }
}
</script>


<style scoped>
/* Additional styling */
</style>
