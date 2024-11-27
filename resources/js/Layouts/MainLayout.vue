<template>
  <div>
    <div class="min-h-screen">
      <!-- Navigation Menu -->
      <nav class="bg-white border-b border-gray-100">
        <NavBar />
      </nav>

      <!-- Page Heading -->
      <header class="bg-white shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>

      <!-- Page Content -->
      <main>
        <slot />

        <!-- Cookie popup with animation -->
        <transition name="fade">
          <div 
            v-if="showCookiePopup" 
            class="cookie-popup fixed bottom-0 left-0 right-0 flex items-center justify-center py-4 z-50 mx-4 sm:mx-10"
          >
            <div class="container mx-auto px-4 py-2 bg-white rounded-lg shadow-lg border border-official-purple-300">
              <div class="flex flex-wrap items-center justify-between">
                <div class="flex items-center px-[2px] w-full md:w-7/12 lg:w-2/3">
                  <div class="md:mb-0">
                    <h3 class="text-sm font-bold text-black flex items-center">
                      We use cookies
                      <img src="https://www.svgrepo.com/show/401340/cookie.svg" alt="Cookie" class="ml-2 h-6 w-6 mr-2">
                    </h3>
                    <p class="text-xs font-medium text-body-color">
                      We use cookies to ensure you get the best experience on ArellanoLaw.edu <br>
                      By continuing to browse our site, you are agreeing to our use of cookies. Find out more 
                      <a :href="route('privacy_policy')" class="text-official-purple-800 underline">Click here</a>
                    </p>
                  </div>
                </div>
                <div class="flex items-center w-full md:w-5/12 lg:w-1/3 justify-end space-x-3 pr-2">
                  <button 
                    @click="acceptCookies" 
                    class="rounded-lg bg-official-purple-600 px-8 h-9 text-sm font-semibold text-white hover:bg-official-purple-500 focus:outline-none focus:ring-2 focus:ring-official-purple-500 focus:ring-offset-2"
                  >
                    Accept
                  </button>
                </div>
              </div>
            </div>
          </div>
        </transition>
      </main>

      <!-- Footer -->
      <Footer />
    </div>
  </div>
</template>


<script setup>
import {ref, onMounted } from 'vue';
import Footer from '@/Layouts/Partials/Footer.vue';
import NavBar from '@/Layouts/Partials/NavBar/Index.vue';
import SideDrawer from './Partials/NavBar/Partials/SideDrawer.vue';
import { Inertia } from '@inertiajs/inertia';

const loading = ref(true);
const showCookiePopup = ref(false); // Initially set to false

const acceptCookies = () => {
  showCookiePopup.value = false; 
  sessionStorage.setItem('cookiesAccepted', 'true');
};

onMounted(() => {
  // Simulate loading time
  setTimeout(() => {
    loading.value = false;
    if (!sessionStorage.getItem('cookiesAccepted')) {
      Inertia.get(route('log'));
      showCookiePopup.value = true; 
      
    }
  }, 2000);
});
</script>


<style scoped>
.floating-message-icon {
  position: fixed;
  bottom: 40px;
  right: 20px;
  background-color: #6200ea;
  color: white;
  border-radius: 50%;
  padding: 20px;
  font-size: 24px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.floating-message-icon:hover {
  background-color: #3700b3;
}

.relative:hover #tooltip-animation {
  visibility: visible;
  opacity: 1;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s ease-in-out; /* Smooth fade in/out */
}

.fade-enter-from, .fade-leave-to {
  opacity: 0; /* Initial and final states */
}

.fade-enter-to, .fade-leave-from {
  opacity: 1; /* Fully visible state */
}

</style>