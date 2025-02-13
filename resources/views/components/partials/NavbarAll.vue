<template>

    <div class="bg-gray-100 border-b">
        <div class="md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap items-center bg-white p-6 border-b border-gray-300">
          <!-- logo -->
          <div class="flex-none w-56 flex flex-row items-center">
            <img :src="logo" class="w-10 flex-none" />
            <strong class="capitalize ml-1 flex-1">TokenTrackerERP</strong>

            <button id="sliderBtn" class="flex-none text-right text-gray-900 hidden md:block">
              <i class="fad fa-list-ul"></i>
            </button>
          </div>
          <!-- end logo -->

          <!-- navbar content toggle -->
          <button id="navbarToggle" class="hidden md:block md:fixed right-0 mr-6">
            <i class="fad fa-chevron-double-down"></i>
          </button>
          <!-- end navbar content toggle -->

          <!-- navbar content -->
          <div
            id="navbar"
            class="animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white flex-1 pl-3 flex flex-row flex-wrap justify-between items-center md:flex-col md:items-center"
          >
            <!-- left -->
            <div class="text-gray-600 md:w-full md:flex md:flex-row md:justify-evenly md:pb-10 md:mb-10 md:border-b md:border-gray-200">
              <!-- Add any left-side content here -->
            </div>
            <!-- end left -->

            <!-- right -->
            <div class="flex flex-row-reverse items-center">
              <!-- user -->
              <div class="dropdown relative md:static">
                <button id="modalbutton" class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center" type="button">


                  <div class="ml-2 capitalize flex ">

                    <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
                  </div>
                </button>


              </div>
              <!-- end user -->

              <!-- notification -->
              <div class="dropdown relative mr-5 md:static">
                <button class="text-gray-500 menu-btn p-0 m-0 hover:text-gray-900 focus:text-gray-900 focus:outline-none transition-all ease-in-out duration-300">
                  <i class="fad fa-bells"></i>
                </button>

                <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>


              </div>
              <!-- end notification -->


            </div>
            <!-- end right -->
          </div>
          <!-- end navbar content -->
        </div>
      </div>

</template>


<script>
import logo from '../../../public/images/logo.png';

export default {
  name: 'NavbarAll',
  data() {
    return {
      logo,

    };
  },
  computed: {


  },
  mounted() {


  },
  methods: {

  },
};
</script>

<style scoped>
/* Add any additional styles here */
</style>
