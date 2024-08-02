<template>
  <div>
    <!-- Sidebar -->
    <div
      :class="['fixed top-0 bottom-0 p-2 w-[210px] overflow-y-auto bg-gray-900 transition-transform duration-300', { 'transform -translate-x-full lg:translate-x-0': !isSidebarOpen }]"
    >
      <div class="text-gray-100 text-xl text-left">
        <div class="p-2.5 mt-1 flex items-center">
          <Link :href="route('main')" class="flex items-center">
            <img src="/images/ausllogo2.png" alt="Image Logo" class="max-w-full h-full max-h-8 mr-2 transition-transform duration-300 transform hover:scale-105">
          </Link>
          <div>
            <div class="text-invicta uppercase font-bold text-[11px] tracking-wide leading-tight">ARELLANO UNIVERSITY</div>
            <div class="text-invicta uppercase font-bold text-[11px] tracking-wide leading-tight">SCHOOL OF LAW</div>
          </div>
        </div>
        <div class="my-2 bg-gray-600 h-[1px]"></div>
      </div>

      <div v-for="link in links" :key="link.name" class="py-1 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-purple-600 text-white text-left">
        <NavLink :href="route(link.route)">
          <i :class="[link.icon, 'text-white', 'p-1']"></i>
          <span class="text-[12px] ml-2 text-gray-200 font-bold">{{ link.name }}</span>
        </NavLink>
      </div>
      

      <div class="my-4 bg-gray-600 h-[1px]"></div>

      <!-- Settings Dropdown -->
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-purple-600 text-white text-left" @click="toggleDropdown">
        <i class="mdi mdi-cog text-white-600 p-2"></i>
        <div class="flex justify-between w-full items-center">
          <span class="text-[12px] ml-2 text-gray-200 font-bold">Settings</span>
          <span :class="{'rotate-0': !isDropdownOpen, 'rotate-180': isDropdownOpen}" class="text-sm transform transition-transform duration-300">
            <i class="mdi mdi-chevron-down"></i>
          </span>
        </div>
      </div>

      <div :class="{'hidden': !isDropdownOpen, 'block': isDropdownOpen}" class="text-[12px] ml-2 text-gray-200 font-bold ml-12">
        <h1 class="cursor-pointer p-2 hover:bg-purple-600 rounded-md mt-1" @click="$inertia.visit(route('banner'))">Main Banner</h1>
        <h1 class="cursor-pointer p-2 hover:bg-purple-600 rounded-md mt-1" @click="$inertia.visit(route('onload'))">On Load Banner</h1>
        <!-- Add more dropdown items as needed -->
      </div>

      <!-- <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white text-left" @click="toggleDropdown">
        <i class="mdi mdi-chat text-white rounded-full bg-blue-600 p-2"></i>
        <div class="flex justify-between w-full items-center">
          <span class="text-[15px] ml-2 text-gray-200 font-bold">Chatbox</span>
          <span :class="{'rotate-0': !isDropdownOpen, 'rotate-180': isDropdownOpen}" class="text-sm transform transition-transform duration-300">
            <i class="mdi mdi-chevron-down"></i>
          </span>
        </div>
      </div>

      <div :class="{'hidden': !isDropdownOpen, 'block': isDropdownOpen}" class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold">
        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">Support</h1>
        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">Support</h1>
      </div> -->
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import NavLink from '@/Components/NavLink.vue';

const isSidebarOpen = ref(false);
const isDropdownOpen = ref(false);

const toggleSidebar = () => {
  isSidebarOpen.value = !isSidebarOpen.value;
};

const toggleDropdown = () => {
  isDropdownOpen.value = !isDropdownOpen.value;
};

const links = [
  { name: 'Dashboard', route: 'dashboard', icon: 'mdi mdi-view-dashboard' },
  { name: 'Announcement', route: 'posts', icon: 'mdi mdi-post' },
  { name: 'Posts', route: 'posts', icon: 'mdi mdi-post' },
  { name: 'Carousell', route: 'carousell', icon: 'mdi mdi-image' },
  { name: 'Gallery', route: 'gallery', icon: 'mdi mdi-folder-multiple-image' },
  { name: 'Testimonial', route: 'alumni', icon: 'mdi mdi-account-group' },
  { name: 'Manage Users', route: 'users', icon: 'mdi mdi-account-cog' }
  // add settings dropdown menu = Banner
];
</script>

<style scoped>
/* Add any scoped styles for SideNav.vue here */
</style>
