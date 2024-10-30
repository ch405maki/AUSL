<template>
  <div>
    <!-- Hamburger Icon Button with Hover Effect -->
    <button @click="showDrawer = true" class="focus:outline-none rounded transition duration-300 ease-in-out transform hover:scale-110">
      <svg class="w-6 h-6 text-white hover:text-yellow-400 transition duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <!-- Side Drawer -->
    <div v-if="showDrawer" class="fixed inset-0 flex justify-end bg-gray-700 bg-opacity-50 z-50">
      <div class="bg-white w-64 p-6 h-full shadow-lg transform transition-transform translate-x-0 z-60">
        <h2 class="text-lg font-semibold mb-4">Menu</h2>

        <!-- Drawer Content -->
        <input
          type="text"
          v-model="searchQuery"
          placeholder="Enter search text"
          class="w-full px-3 py-2 border rounded"
        />

        <!-- Action Buttons -->
        <div class="mt-4 flex justify-end space-x-2">
          <button @click="closeDrawer" class="px-4 py-2 bg-gray-300 rounded">Close</button>
          <button @click="performSearch" class="px-4 py-2 bg-blue-600 text-white rounded">Search</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const showDrawer = ref(false);
const searchQuery = ref('');

// Close the drawer
function closeDrawer() {
  showDrawer.value = false;
}

// Perform the search
function performSearch() {
  console.log('Search query:', searchQuery.value);
  closeDrawer();
}
</script>

<style scoped>
/* Adjust styles for the drawer */
.fixed {
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.z-60 {
  z-index: 60;
}
</style>
