<template>
    <div>
      <!-- Search Icon Button -->
      <button @click="showModal = true">
        <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
      </button>
  
      <!-- Modal -->
      <div v-if="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded shadow-lg max-w-sm w-full">
          <h2 class="text-lg font-semibold mb-4">Search</h2>
          
          <!-- Input Field -->
          <input
            type="text"
            v-model="searchQuery"
            placeholder="Enter search text"
            class="w-full px-3 py-2 border rounded"
          />
  
          <!-- Action Buttons -->
          <div class="mt-4 flex justify-end space-x-2">
            <button @click="closeModal" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
            <button @click="performSearch" class="px-4 py-2 bg-blue-600 text-white rounded">Search</button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const showModal = ref(false);
  const searchQuery = ref('');
  
  // Close the modal
  function closeModal() {
    showModal.value = false;
  }
  
  // Perform the search
  function performSearch() {
    // Emit or handle search here
    console.log('Search query:', searchQuery.value);
    closeModal();
  }
  </script>
  
  <style scoped>
  /* Modal styling */
  .fixed {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
  </style>
  