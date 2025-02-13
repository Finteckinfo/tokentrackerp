<template>
    <div class="h-[100vh] flex flex-col w-full relative overflow-hidden bg-transparent">
        <div class="w-[10%]">
            <Sidebar class=" fixed top-0 shadow" />
        </div>

    <div class="w-[80%] ml-[18%] bg-transparent">
        <Navbar class="h-16" />
        <div class="flex-1 my-8 mx-auto p-6  bg-white card max-w-[95%] shadow-md min-h-[80vh]">
<div class="px-20 pt-10">
          <h2 class="text-3xl leading-tight text-gray-900 mb-1.5 font-bold">Attendance</h2>

          <div class="w-full grid grid-cols-2 gap-10 mx-auto">

            <!-- Right Column - Attendance Summary -->
            <div class="space-y-4 mt-8">
              <h2 class="text-xl font-bold">Last Attendance</h2>
              <div class="p-6 rounded-xl bg-white card">
                <p class="text-lg font-medium">Last Check-in: {{ lastCheckinDate }}</p>
                <p class="text-lg font-medium">Last Check-out: {{ lastCheckoutDate }}</p>
              </div>

              <!-- Legend -->
              <div class="mt-8">
                <h3 class="text-lg font-bold">Legend</h3>
                <div class="flex gap-4 mt-2">
                  <span class="flex items-center">
                    <span class="w-3 h-3 bg-green-500 rounded-full inline-block mr-2"></span> Present
                  </span>
                  <span class="flex items-center">
                    <span class="w-3 h-3 bg-red-500 rounded-full inline-block mr-2"></span> Absent
                  </span>
                  <span class="flex items-center">
                    <span class="w-3 h-3 bg-gray-500 rounded-full inline-block mr-2"></span> Leave
                  </span>
                </div>
              </div>
            </div>

            <!-- Left Column - Calendar -->
            <div class="card p-8">
              <h2 class="text-xl mb-4 font-bold">Attendance Calendar</h2>

              <!-- Month Navigation -->
              <div class="flex justify-between mb-4">
                <button @click="goToPreviousMonth" class="bg-blue-500 text-white px-4 py-2 rounded-md">Previous</button>
                <h3 class="text-lg font-semibold">{{ currentMonthLabel }} {{ currentYear }}</h3>
                <button @click="goToNextMonth" class="bg-blue-500 text-white px-4 py-2 rounded-md">Next</button>
              </div>

              <!-- Calendar Grid -->
              <div class="grid grid-cols-7 gap-2">
                <div class="text-center font-bold">Sun</div>
                <div class="text-center font-bold">Mon</div>
                <div class="text-center font-bold">Tue</div>
                <div class="text-center font-bold">Wed</div>
                <div class="text-center font-bold">Thu</div>
                <div class="text-center font-bold">Fri</div>
                <div class="text-center font-bold">Sat</div>

                <div v-for="day in daysInMonth" :key="day.date" :class="dayClasses(day)" class="text-center p-2 rounded-lg">
                  {{ day.date.getDate() }}
                </div>
              </div>
            </div>
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
import dayjs from "dayjs";

export default {
    name: "MyNotes",
    components: {
        Navbar,
        Sidebar,
        Footer,

    },
    data() {
      return {
        currentDate: dayjs(),
        currentMonth: dayjs().month(),
        currentYear: dayjs().year(),
        lastCheckinDate: "2023-09-15 09:00 AM", // Replace with actual check-in data
        lastCheckoutDate: "2023-09-15 05:00 PM", // Replace with actual check-out data
        attendanceData: {
          "2023-09-10": "absent",
          "2023-09-12": "absent",
          "2023-09-14": "leave",
          // Add any additional absent or leave days here
        },
      };
    },
    computed: {
      currentMonthLabel() {
        return dayjs().month(this.currentMonth).format("MMMM");
      },
      daysInMonth() {
        const days = [];
        const startOfMonth = dayjs().year(this.currentYear).month(this.currentMonth).startOf("month");
        const daysInMonth = startOfMonth.daysInMonth();

        for (let i = 1; i <= daysInMonth; i++) {
          const date = startOfMonth.date(i);
          const formattedDate = date.format("YYYY-MM-DD");
          days.push({
            date: date.toDate(),
            status: this.attendanceData[formattedDate] || "present", // Default to "present" if not marked in attendanceData
          });
        }
        return days;
      },
    },
    methods: {
      goToPreviousMonth() {
        this.currentDate = this.currentDate.subtract(1, "month");
        this.currentMonth = this.currentDate.month();
        this.currentYear = this.currentDate.year();
      },
      goToNextMonth() {
        this.currentDate = this.currentDate.add(1, "month");
        this.currentMonth = this.currentDate.month();
        this.currentYear = this.currentDate.year();
      },
      dayClasses(day) {
        const statusClass = {
          present: "bg-green-500 text-white",
          absent: "bg-red-500 text-white",
          leave: "bg-gray-500 text-white",
        };
        return `text-center p-2 rounded-lg ${statusClass[day.status] || "bg-white"}`;
      },
    },
  };
  </script>

  <style scoped>
  /* Add any additional styling if needed */
  </style>
