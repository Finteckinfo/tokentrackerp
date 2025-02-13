
<template>
    <div>
      <!-- Your template content goes here -->
    </div>
  </template>

  <script>
  import { onMounted } from 'vue'

  export default {
    name: 'Footer',
    setup() {
      onMounted(async () => {
        // Load ApexCharts dynamically
        // await loadApexCharts()

        // Your initialization code that was previously in DOMContentLoaded
        // Put your ApexCharts initialization here
      })

      // const loadApexCharts = () => {
      //   return new Promise((resolve) => {
      //     const script = document.createElement('script')
      //     script.src = 'https://cdn.jsdelivr.net/npm/apexcharts'
      //     script.async = true
      //     script.onload = resolve
      //     document.head.appendChild(script)
      //   })
      // }

      // const filterTimesheets = () => {
      //       const sortBy = document.getElementById('sortBy').value;
      //       const approved = document.getElementById('approvedFilter').value;
      //       const status = document.getElementById('statusFilter').value;

      //       // Build query parameters
      //       const params = new URLSearchParams();
      //       if (sortBy) params.append('sort_by', sortBy);
      //       if (approved && approved !== 'all') params.append('approved', approved);
      //       if (status && status !== 'all') params.append('status', status);

      //       // Redirect to the same page with query parameters
      //       window.location.search = params.toString();
      //   }

      //   const ModalButton = document.getElementById('modalbutton');
      //   const modal = document.getElementById('modalpopup');

      //   ModalButton.addEventListener('click', () => {
      //       event.stopPropagation();
      //       modal.classList.remove('hidden'); // Show the modal
      //   });

      //   const isClickInside = modal.contains(event.target) || ModalButton.contains(event.target);

      //   if (!isClickInside) {
      //       modal.classList.add("hidden");
      //   }
    }
  }
  </script>

  <style scoped>
  /* Your scoped styles here */
  </style>








