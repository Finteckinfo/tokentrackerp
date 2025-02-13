<template>

<div class="grid grid-cols-4 gap-6 xl:grid-cols-2">

    <!-- card -->
    <div class="card mt-6 shadow">
        <div class="card-body flex items-center">

            <div class="px-3 py-2 rounded bg-indigo-600 text-white mr-3">
                <i class="fad fa-wallet"></i>
            </div>

            <div class="flex flex-col text-center ">
                <h1 class="font-semibold"><span class="num-2"></span> My Workspaces </h1>
                <p class="text-xs"><span class="num-2"></span>{{ workspaces.length }}</p>
            </div>

        </div>
    </div>
    <!-- end card -->

    <!-- card -->
    <div class="card mt-6 shadow">
        <div class="card-body flex items-center">

            <div class="px-3 py-2 rounded bg-green-600 text-white mr-3">
                <i class="fad fa-tasks"></i>
            </div>

            <div class="flex flex-col text-center">
                <h1 class="font-semibold"><span class="num-2"></span> Active Tasks</h1>
                <p class="text-xs"><span class="num-2"></span>{{ pendingTasks.length }}</p>
            </div>

        </div>
    </div>
    <!-- end card -->

    <!-- card -->
    <div class="card mt-6 shadow xl:mt-1">
        <div class="card-body flex items-center">

            <div class="px-3 py-2 rounded bg-red-600 text-white mr-3">
                <i class="fad fa-clock"></i>
            </div>

            <div class="flex flex-col text-center">
                <h1 class="font-semibold"><span class="num-2"></span> Total Hours This Month </h1>
                <p class="text-xs"><span class="num-2"></span> 45</p>
            </div>

        </div>
    </div>
    <!-- end card -->

    <!-- card -->
    <div class="card mt-6 shadow xl:mt-1 xl:col-span-2">
        <div class="card-body flex items-center">

            <div class="px-3 py-2 rounded bg-pink-600 text-white mr-3">
                <i class="fad fa-dollar-sign"></i>
            </div>

            <div class="flex flex-col text-center">
                <h1 class="font-semibold"><span class="num-2"></span> Approved Tokens</h1>
                <p class="text-xs"><span class="num-2"></span>16 (KES. 73,000) </p>
            </div>

        </div>
    </div>
    <!-- end card -->

</div>

</template>


<script>

import { mapGetters, mapState , useStore } from 'vuex';
import { ref } from 'vue';

export default {
    name: 'Numbers',
    components: {},
    setup(){

        const store = useStore();
        const workspaces = ref([]);
        const pendingTasks =ref('');
        const totalHrs = ref('');
        const approvedTokens = ref('')

        return {
            store,
            workspaces,
            pendingTasks,
            totalHrs,
            approvedTokens,
            workspaces

        }


    },
    mounted(){

        this.store.dispatch('fetchWorkspaces').then(() => {
            this.workspaces = this.store.state.workspaces;
            this.pendingTasks = this.store.state.workspace.tasks.backlog;

        });


    },
    computed : {

        ...mapState({
            get_workspaces : state=>state.workspaces,
            get_pendingTasks : state=>state.tasks.backlog,
        })


    },
    methods : {

    }



}



</script>
