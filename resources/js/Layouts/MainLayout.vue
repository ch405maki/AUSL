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
      </main>

      <!-- Footer -->
      <Footer />
    </div>

    <!-- Floating Message Icon with Tooltip -->
    <v-icon class="floating-message-icon mdi mdi-message" title="Chat with us"></v-icon>
  </div>
</template>

<script setup>
import { onMounted } from 'vue';
import Footer from '@/Layouts/Partials/Footer.vue';
import NavBar from '@/Layouts/Partials/NavBar/Index.vue';
import SideDrawer from './Partials/NavBar/Partials/SideDrawer.vue';
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
</style>