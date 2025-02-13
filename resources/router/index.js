import { createRouter, createWebHistory } from "vue-router";
import Login from "../views/pages/Login.vue";
import Dashboard from "../views/pages/Dashboard.vue";
import Timesheets from "../views/pages/Timesheets.vue";
import Calendar from "../views/pages/Calendar.vue";
import Settings from "../views/pages/Settings.vue";
import Workspace from "../views/pages/Workspace.vue";
import Teams from "../views/pages/Teams.vue";
import Projects from "../views/pages/Projects.vue";
import Payments from "../views/pages/Payments.vue";
import ResetPassword from "../views/pages/ResetPassword.vue";
import CreateWorkspace from "../views/pages/CreateWorkspace.vue";
import ServerError404 from "../views/components/errorpages/404.vue";
import ServerError500 from "../views/components/errorpages/500.vue";
import store from "../store";
import Notes from "../views/pages/Notes.vue";
import LeaveApplication from "../views/pages/LeaveApplication.vue";
import FileComplaint from "../views/pages/FileComplaint.vue";
import RequestRefund from "../views/pages/RequestRefund.vue";
import AttendanceSheet from "../views/pages/AttendanceSheet.vue";
import Messages from "../views/pages/Messages.vue";
import ProjectDetails from "../views/pages/ProjectDetails.vue";
import Reports from '../views/pages/project_pages/Reports.vue';
import ClientEthics from '../views/pages/project_pages/ClientEthics.vue';
import CompanyHandbook from '../views/pages/project_pages/CompanyHandbook.vue';
import FinancialPlan from '../views/pages/project_pages/FinancialPlan.vue';

const isAuthenticated = () => {
    return store.getters.isAuthenticated;
};

const routes = [
    {
        path: "/",
        redirect: (to) => {
            return isAuthenticated() ? { name: "dashboard" } : { name: "login" };
        },
    },

    {
        path: "/login",
        component: Login,
        name: "login",
    },

    {
        path: "/reset",
        component: ResetPassword,
        name: "resetpassword",
    },

    {
        path: "/404",
        component: ServerError404,
        name: "not-found",
        meta: { requiresAuth: false },
    },

    {
        path: "/500",
        component: ServerError500,
        name: "server-error",
    },

    {
        path: "/",
        meta: { requiresAuth: true },
        children: [
            {
                path: "/dashboard",
                component: Dashboard,
                name: "dashboard",
            },
            {
                path: "/projects",
                component: Projects,
                name: "projects",
            },
            {
                path: "/createworkspace",
                component: CreateWorkspace,
                name: "createworkspace",
            },
            {
                path: "/workspaces/:id",
                component: Workspace,
                name: "workspace",
                props: (route) => ({
                    id: route.params.id,
                    workspace_name: route.params.workspace_name,
                }),
            },
            {
                path: "/projectdetails/:id",
                component: ProjectDetails,
                name: "projectdetails",
                props: (route) => ({
                    id: route.params.id,
                    project_name: route.params.project_name,
                }),
            },
            {
                path: '/reports',
                name: 'Reports',
                component: Reports
              },
              {
                path: '/client-ethics',
                name: 'ClientEthics',
                component: ClientEthics
              },
              {
                path: '/company-handbook',
                name: 'CompanyHandbook',
                component: CompanyHandbook
              },
              {
                path: '/financial-plan',
                name: 'FinancialPlan',
                component: FinancialPlan
              },
            {
                path: "/notes",
                component: Notes,
                name: "notes",
            },
            {
                path: "/leave-application",
                component: LeaveApplication,
                name: "leave-application",
            },
            {
                path: "/file-complaint",
                component: FileComplaint,
                name: "file-complaint",
            },
            {
                path: "/request-refund",
                component: RequestRefund,
                name: "request-refund",
            },

            {
                path: "/attendance-sheet",
                component: AttendanceSheet,
                name: "attendance-sheet",
            },

            {
                path: "/teams",
                component: Teams,
                name: "teams",
            },
            {
                path: "/timesheets",
                component: Timesheets,
                name: "timesheets",
            },
            {
                path: "/payments",
                component: Payments,
                name: "payments",
            },
            {
                path: "/calendar",
                component: Calendar,
                name: "calendar",
            },
            {
                path: "/settings",
                component: Settings,
                name: "settings",
            },
            {
                path: "/messages",
                component: Messages,
                name: "messages",
            },
            {
                path: "/404",
                component: ServerError404,
                meta: { requiresAuth: true },
                name: "auth-not-found",
            },
        ],
    },

    {
        path: "/:catchAll(.*)",
        redirect: (to) => (isAuthenticated() ? "/404" : "/404"),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Navigation guard for authentication
router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth) && !isAuthenticated()) {
        next({ name: "login" });
    } else {
        next();
    }
});

// Additional guard to handle specific navigation conditions
router.beforeEach((to, from, next) => {
    if (from.name === "Messages" && to.name === "Messages" && window.innerWidth <= 967) {
        next({ name: "No-Messages" });
    } else {
        next();
    }
});

export default router;
