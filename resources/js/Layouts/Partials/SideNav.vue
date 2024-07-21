<template>
    <div>
      <!-- Hamburger Icon for Sidebar -->
      <span
        class="absolute text-white text-4xl top-5 left-4 cursor-pointer lg:hidden"
        @click="toggleSidebar"
      >
        <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
      </span>
  
      <!-- Sidebar -->
      <div
        :class="['fixed top-0 bottom-0 p-2 w-[250px] overflow-y-auto text-center bg-gray-900 transition-transform duration-300', { 'transform -translate-x-full lg:translate-x-0': !isSidebarOpen }]"
      >
        <div class="text-gray-100 text-xl">
          <div class="p-2.5 mt-1 flex items-center">
            <ApplicationLogo class="block h-10 w-auto fill-current text-gray-800" />
            <h1 class="font-bold text-gray-200 text-[15px] ml-3">TailwindCSS</h1>
            <i
              class="bi bi-x cursor-pointer ml-auto lg:hidden"
              @click="toggleSidebar"
            ></i>
          </div>
          <div class="my-2 bg-gray-600 h-[1px]"></div>
        </div>
        <div
          class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
        >
          <i class="bi bi-house-door-fill"></i>
            <NavLink :href="route('dashboard')">
                <i class="bi bi-bookmark-fill"></i>
                <span class="text-[15px] text-gray-200 font-bold">Dashboard</span>
            </NavLink>
        </div>
        <div
          class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
        >
          <i class="bi bi-bookmark-fill"></i>
          <span class="text-[15px] ml-4 text-gray-200 font-bold">Post</span>
        </div>
        <div class="my-4 bg-gray-600 h-[1px]"></div>
        <div
          class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
          @click="toggleDropdown"
        >
          <i class="bi bi-chat-left-text-fill"></i>
          <div class="flex justify-between w-full items-center">
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Chatbox</span>
            <span
              :class="{'rotate-0': !isDropdownOpen, 'rotate-180': isDropdownOpen}"
              class="text-sm transform transition-transform duration-300"
            >
              <i class="bi bi-chevron-down"></i>
            </span>
          </div>
        </div>
        <div
          :class="{'hidden': !isDropdownOpen, 'block': isDropdownOpen }"
          class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold"
        >
          <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
            Social
          </h1>
          <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
            Personal
          </h1>
          <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
            Friends
          </h1>
        </div>
        <div
          class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
        >
          <i class="bi bi-box-arrow-in-right"></i>
          <span class="text-[15px] ml-4 text-gray-200 font-bold">Logout</span>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import ApplicationLogo from '@/Components/ApplicationLogo.vue';
  import NavLink from '@/Components/NavLink.vue';
  import { Link } from '@inertiajs/vue3';
  
  const isSidebarOpen = ref(false);
  const isDropdownOpen = ref(false);
  
  const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;
  };
  
  const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
  };
  </script>
  
  <style scoped>
  /* Add any scoped styles for SideNav.vue here */
  </style>