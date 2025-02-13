// store/index.js
import { createStore } from "vuex";
import axios from "axios";

export default createStore({
    state: {
        user: null,
        isLoggedIn: false,
        admins: [],
        workspace: {
            workspace_id: null,
            workspace_name: null,
            workspace_description: null,
            access_token: null,

            tasks: {
                backlog: [],
                inprogress: [],
                revision: [],
                done: [],
            },

            taskForm: {
                task_title: "",
                task_items: [{ name: "", completed: false }],
                assigned_to: "",
                assignedto_name: "",
                budget_allocated: "",
                current_status: "backlog",
                comment: "",
            },
            notifications: [],
        },
    },
    mutations: {
        setUser(state, user) {
            state.user = user;
            state.user = user;
            state.isLoggedIn = !!user;
        },
        fetchWorkspace(state, workspace) {
            state.workspace.workspace_id = workspace.id;
            state.workspace.workspace_name = workspace.workspace_name;
            state.workspace.workspace_description = workspace.workspace_description;
            state.workspace.access_token = workspace.access_token;
        },
        fetchWorkspaces(state, workspaces) {
            state.workspaces = workspaces;
        },
        setTasks(state, tasks) {
            state.workspace.tasks.backlog = tasks.backlog;
            state.workspace.tasks.inprogress = tasks.inprogress;
            state.workspace.tasks.revision = tasks.revision;
            state.workspace.tasks.done = tasks.done;
        },

        setNotifications(state, notifications) {
            state.workspace.notifications = notifications;
        },

        clearTasks(state) {
            state.tasks = {
                backlog: [],
                inprogress: [],
                revision: [],
                done: [],
            };
        },
        setTaskTitle(state, task_title) {
            state.workspace.taskForm.task_title = task_title;
        },
        setTaskItems(state, task_items) {
            state.workspace.taskForm.task_items = task_items;
        },
        setAssignedTo(state, assigned_to) {
            state.workspace.taskForm.assigned_to = assigned_to;
        },
        setBudgetAllocated(state, budget_allocated) {
            state.workspace.taskForm.budget_allocated = budget_allocated;
        },
        setCurrentStatus(state, current_status) {
            state.workspace.taskForm.current_status = current_status;
        },
        setComment(state, comment) {
            state.workspace.taskForm.comment = comment;
        },
        resetTaskForm(state) {
            state.workspace.taskForm = {
                task_title: "",
                task_items: [{ name: "", completed: false }],
                assigned_to: "",
                assignedto_name: "",
                budget_allocated: "",
                current_status: "backlog",
                comment: "",
            };
        },
        setAdmins(state, admins) {
            state.admins = admins;
        },
        logout(state) {
            state.user = null;
            state.isLoggedIn = false;
        },
    },
    actions: {
        login({ commit }, user) {
            commit("setUser", user);
        },

        logout({ commit }) {
            commit("logout");
        },

        async fetchWorkspace({ commit }, id) {
            try {
                const response = await axios.get(`/api/workspaces/${id}'`);
                commit("fetchWorkspace", response.data);
            } catch (error) {
                console.log("Error getting the workspace:", error);
            }
        },

        async fetchWorkspaces({ commit }) {
            try {
                const response = await axios("/api/workspaces");
                commit("fetchWorkspaces", response.data);
            } catch (error) {
                console.log("Error getting workspaces:", error);
            }
        },
        async fetchTasks({ commit }, workspaceId) {
            try {
                const response = await axios.get(
                    `/api/workspaces/${workspaceId}/tasks`
                );
                commit("setTasks", response.data); // Commit the fetched tasks
            } catch (error) {
                console.error("Error fetching tasks:", error);
            }
        },

        startPolling({ dispatch, state }) {
            setInterval(() => {
              dispatch('fetchNotifications', state.user.id); // Pass userId from the Vuex state
            }, 6000); // Poll every 60 seconds
          },

        async fetchNotifications({ commit }, user_id) {
            try {
                const response = await axios.get(`/api/fetchnotifications/${user_id}`);
                commit("setNotifications", response.data);
            } catch (error) {
                console.error("Error fetching notifications:", error);
            }
        },

        async fetchAdmins({ commit }) {
            try {
                const response = await axios.get("/api/fetchadmins");
                commit("setAdmins", response.data);
            } catch (error) {
                console.error("Error fetching admins:", error);
            }
        },

    },
    getters: {
        isAuthenticated: (state) => !!state.user,
        isLoggedIn: (state) => !!state.user, // Check if user is logged in
        getUser: (state) => state.user,
        getAdmins: (state) => state.admins,
        getWorkspaceID: (state) => state.workspace.workspace_id,
       isSuperAdmin: (state) => state.isLoggedIn && state.user?.role === 'superadmin'
    },
});
