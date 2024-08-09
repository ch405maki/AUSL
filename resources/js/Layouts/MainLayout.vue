<script setup>
import { onMounted } from 'vue';
import Footer from '@/Layouts/Partials/Footer.vue';
import NavBar from '@/Layouts/Partials/NavBar/Index.vue';

// Function to load Crisp chat script
const loadCrispChat = () => {
  window.$crisp = [];
  window.CRISP_WEBSITE_ID = "0eb66175-e176-41a6-bb43-8847771c8101";
  (function() {
    const d = document;
    const s = d.createElement("script");
    s.src = "https://client.crisp.chat/l.js";
    s.async = 1;
    d.getElementsByTagName("head")[0].appendChild(s);
  })();
};

// Load Crisp chat script on component mount
onMounted(() => {
  loadCrispChat();
});

// Function to handle chat icon click
const openChat = () => {
  // Additional logic for chat icon click if needed
};
</script>

<template>
  <div>
    <div class="min-h-screen">
      <!-- Primary Navigation Menu -->
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
    <!-- <v-icon class="floating-message-icon mdi mdi-message" @click="openChat" title="Chat with us"></v-icon> -->
  </div>
</template>

<style scoped>
.floating-message-icon {
  position: fixed;
  bottom: 40px; /* Move it up a little bit */
  right: 20px;
  background-color: #6200ea;
  color: white;
  border-radius: 50%;
  padding: 20px; /* Increase the size */
  font-size: 24px; /* Increase the icon size */
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