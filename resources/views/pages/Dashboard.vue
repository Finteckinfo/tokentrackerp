<template>
    <div class="h-[100vh] flex flex-col w-full relative overflow-hidden bg-transparent">
        <div class="w-[10%]">
            <Sidebar class=" fixed top-0 shadow" />
        </div>

    <div class="w-[80%] ml-[18%] bg-transparent">
        <Navbar class="h-16" />
        <div class="bg-gray-100 flex-1 p-6">
            <div class="h-screen flex flex-row flex-wrap">
                <div class="bg-gray-100 flex-1 p-6 ">
                    <div class="text-left mt-14 mb-4">
                        <h1 class="text-3xl font-bold text-gray-800">{{ getTimeofDay }} {{ firstName }},</h1>
                        <p class="text-md text-gray-600 mt-2">Have a productive day!</p>
                    </div>

                    <!-- start numbers -->
                    <Numbers />
                    <!-- end numbers -->

                    <!-- Sales Overview -->
                    <ProjectOverview />
                    <!-- end Sales Overview -->
                </div>
                <!-- end content -->
            </div>
        </div>
        <Footer class="h-16" />
    </div>
</div>
</template>

<script>
import Navbar from '../components/partials/Navbar.vue'
import Sidebar from '../components/partials/Sidebar.vue'
import Footer from '../components/partials/Footer.vue'
import Numbers from './Number.vue'
import ProjectOverview from './ProjectOverview.vue'
import {
    mapGetters,
    mapState
} from 'vuex';
import {
    ref
} from 'vue';
import store from '../../store';

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
            store,
        }
    },
    computed: {
        ...mapState({
            workspaces: state => state.workspaces
        }),
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
        this.store.dispatch('fetchWorkspaces');
        const user = this.$store.state.user;
    if (user && user.name) {
        this.firstName = user.name.split(' ')[0];
    }
    },

    methods: {

    }

}
</script>

<style scoped>

</style>
