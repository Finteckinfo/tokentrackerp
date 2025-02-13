<template>
    <div class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px] h-full" :src="backgroundImage" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl ">
                    <main>
                        <div class="relative container px-4 mx-auto ">
                            <div class="relative max-w-3xl mx-auto ">
                                <div class="absolute inset-0 -ml-4 -mr-4"></div>
                                <div class="relative px-4 sm:px-8">
                                    <div class="max-w-lg mx-auto text-center">
                                        <a class="inline-block mb-14 text-3xl font-bold font-heading" href="#">
                                            <img class="h-20" :src="logo" alt="Logo" width="auto" />
                                        </a>
                                        <h3 class="text-2xl md:text-2xl font-bold font-heading mt-4">Welcome to TokenTrackERP</h3>
                                        <p class="my-5 text-3xl font-bold">Login </p>
                                        <form @submit.prevent="handleSubmit">
                                            <input
                                                v-model="email"
                                                class="w-full mb-4 px-12 py-3 border rounded-md transition-colors duration-200"
                                                :class="{
                                                    'border-gray-200 focus:ring-blue-300 focus:border-blue-300': !emailError,
                                                    'border-red-500 focus:ring-red-300 focus:border-red-500': emailError
                                                }"
                                                type="text"
                                                placeholder="Email Address"
                                                required
                                                autocomplete="on"
                                            />
                                            <input
                                                v-model="password"
                                                class="w-full mb-4 px-12 py-3 border rounded-md transition-colors duration-200"
                                                :class="{
                                                    'border-gray-200 focus:ring-blue-300 focus:border-blue-300': !errorMessage,
                                                    'border-red-500 focus:ring-red-300 focus:border-red-500': errorMessage
                                                }"
                                                type="password"
                                                placeholder="Password"
                                                required
                                                autocomplete="on"
                                            />
                                            <div v-if="errorMessage" class="text-red-600 font-bold text-sm">{{ errorMessage }}</div>
                                            <div v-if="emailError" class="text-red-600 font-bold text-sm">{{ emailError }}</div>
                                            <button
                                                id="loginButton"
                                                class="w-full mt-4 bg-blue-800 hover:bg-blue-900 text-white font-bold font-heading py-3 rounded-md uppercase relative disabled:opacity-70 disabled:cursor-not-allowed"
                                                type="submit"
                                                :disabled="isLoading"
                                            >
                                                <span :class="{ 'opacity-0': isLoading }">SUBMIT</span>
                                                <div v-if="isLoading" class="absolute inset-0 flex items-center justify-center">
                                                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                    </svg>
                                                </div>
                                            </button>
                                            <button
                                                class="w-full mt-4 flex items-center justify-center bg-black text-white py-3 rounded-md hover:bg-gray-900 transition duration-300"
                                                :disabled="isLoading"
                                            >
                                                <i class="fad brands-google"></i>
                                                Continue with Google
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>

                    <p class="py-10 text-center text-md text-black dark:text-white/70">
                        By continuing you agree to our Terms of Use & Privacy Policy
                    </p>
                    <p class="py-12 text-center text-xs text-gray-400 dark:text-white/70">
                        TokenTrackERP v{{ appVersion }} - Built Php v{{ phpVersion }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    </template>

    <script>
    import logo from '../../../public/images/logo.png';
    import backgroundImage from '../../../public/images/background.svg';
    import axios from 'axios';
    import { ref } from 'vue';
    import { mapMutations, mapActions } from 'vuex';
    import { useRouter } from 'vue-router';
    import store from "../../store";

    export default {
        setup() {
            const router = useRouter();
            const email = ref("");
            const password = ref("");
            const emailError = ref(null);
            const errorMessage = ref(null);
            const isLoading = ref(false);
            const appVersion = ref(import.meta.env.APP_VERSION || 'unknown');
            const phpVersion = ref('loading...');

            return {
                email,
                password,
                errorMessage,
                emailError,
                isLoading,
                appVersion,
                phpVersion,
                router,
                logo,
                backgroundImage,
            };
        },
        mounted() {
            axios.get('/api/php-version')
                .then(response => {
                    this.phpVersion = response.data.php_version;
                    this.appVersion = response.data.app_version;
                })
                .catch(error => {
                    console.error("Error fetching PHP version:", error);
                    this.phpVersion = 'Error fetching version';
                });
        },
        methods: {
            ...mapMutations(['setUser']),
            ...mapActions(['fetchNotifications']),

            user() {
                return this.getUser;
            },

            validateEmail(email) {
                const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return pattern.test(email);
            },

            async handleSubmit() {
                this.emailError = null;
                this.errorMessage = null;

                if (!this.validateEmail(this.email)) {
                    this.emailError = 'Please enter a valid email address.';
                    return;
                }

                this.isLoading = true;

                try {
                    const response = await axios.post('/api/login', {
                        email: this.email,
                        password: this.password,
                    });

                    if (response.status === 200) {
                        store.dispatch("logout");
                        localStorage.setItem('user', JSON.stringify(response.data.user));
                        store.dispatch("login", response.data.user);
                        this.router.push({ name: 'dashboard' });
                    }
                } catch (error) {
                    if (error.response && error.response.status === 401) {
                        this.errorMessage = error.response.data.message;
                    } else {
                        this.errorMessage = 'An error occurred. Please try again later.';
                    }
                    console.error(error.response ? error.response.data : error);
                } finally {
                    this.isLoading = false;
                }
            },
        }
    }
    </script>

    <style scoped>
    /* Add any additional component styles here */
    </style>
