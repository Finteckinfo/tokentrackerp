<template>
    <div class="h-[100vh] flex flex-col w-full relative overflow-hidden bg-transparent">
        <div class="w-[10%]">
            <Sidebar class=" fixed top-0 shadow" />
        </div>

    <div class="w-[80%] ml-[18%] bg-transparent">
        <Navbar class="h-16" />
        <div class="flex-1 my-8 mx-auto p-6 bg-white card max-w-[95%] shadow-md min-h-[80vh]">
            <h2 class="text-3xl leading-tight text-gray-900 mb-1.5 font-bold mt-10 ml-20">Sticky Notes</h2>
            <div class="w-full grid grid-cols-2 gap-x-10 py-10 px-20 mx-auto">
                <!-- Left Column-->
                <div class="space-y-4">
                    <div class="bg-yellow-200 text-yellow-800 p-4 rounded-md mb-6">
                        <p>
                            <strong><i class="fad fa-exclamation-circle"></i> REMINDER:</strong> Clearing your browser's localStorage will erase your quick notes. This is a temporary space to help you write down your quick ideas.
                        </p>
                    </div>
                    <div class="mb-6">
                        <label for="notes" class="block text-lg font-medium text-gray-700 mb-2">
                            Scribble Your Ideas:
                        </label>
                        <textarea v-model="newNote" id="notes" class="w-full h-64 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Start typing your ideas here..."></textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="flex space-x-4">
                        <button @click="saveNote" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                            Save Note
                        </button>
                        <button @click="clearNotes" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                            Clear Notes
                        </button>
                    </div>
                </div>

                <!-- Right Column - Refund Request Form -->
                <div>
                    <h2 class="text-xl leading-tight text-gray-900 mb-5 font-bold">My Notes ({{ savedNotes.length }}) </h2>
                     <!-- Display saved notes if they exist -->
                     <div v-for="(savednote, index) in savedNotes" :key="index" class="bg-gray-100 p-4 mb-6 rounded-md flex flex-col">
                        <h3 class="font-bold text-blue-600 mb-2 "><i class="fad fa-sticky-note"></i> Note </h3>
                        <p class="text-gray-700 whitespace-pre-line">{{ savednote }}</p>
                    </div>

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
import {
    ref,
} from "vue";

import Navbar from '../components/partials/Navbar.vue'
import Sidebar from '../components/partials/Sidebar.vue'
import Footer from '../components/partials/Footer.vue'

export default {
    name: "MyNotes",
    components: {
        Navbar,
        Sidebar,
        Footer,

    },

    setup() {
        const newNote = ref("");
        const savedNotes = ref([]);

        return {

            savedNotes,
            newNote,
        };

    },

    mounted() {

        const myNotes = localStorage.getItem("userNotes");
        if (myNotes) {
            this.savedNotes = JSON.parse(myNotes);
        }

    },

    methods: {

        saveNote() {
            if (this.newNote.trim() !== "") {
                this.savedNotes.push(this.newNote.trim());
                localStorage.setItem("userNotes", JSON.stringify(this.savedNotes));
                this.newNote = ""; // Clear the input after saving the note
                alert("Note saved to localStorage!");
            } else {
                alert("Please enter a note before saving.");
            }
        },

        clearNotes() {
            if (confirm("Are you sure you want to clear all your notes? This cannot be undone!")) {
                this.savedNotes = [];
                localStorage.removeItem("userNotes");
                alert("All notes cleared.");
            }
        },

    }

};
</script>

<style scoped>
/* Optional styling for the page */
textarea {
    resize: none;
}

button {
    transition: background-color 0.3s;
}
</style>
