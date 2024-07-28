<template>
    <div class="text-center text-white bg-purple-100 py-8">
      <div class="max-w-7xl mx-auto flex flex-col items-center">
        <h1 class="font-bold text-gray-800 text-2xl mb-4">Anouncements and Advisories</h1>
        <p class="font-medium text-gray-800 text-lg mb-6">Read about the latest AUSL Initiatives, Achievements, and Developments</p>
        
        <div class="flex flex-wrap justify-center gap-6">
          <div v-for="card in cards" :key="card.title" class="bg-white rounded-xs shadow-md overflow-hidden w-72">
            <img :src="card.image" alt="Card image" class="w-full h-48 object-cover">
            <div class="p-4">
              <h2 class="font-bold text-lg text-gray-800">{{ card.title }}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const cards = ref([
    { title: 'Face-to-face class suspension; all classes will be conducted online via Zoom.', image: 'https://via.placeholder.com/300x200' },
    { title: 'Header Here', image: 'https://via.placeholder.com/300x200' },
    { title: 'Header Here', image: 'https://via.placeholder.com/300x200' },
    { title: 'Header Here', image: 'https://via.placeholder.com/300x200' }
  ]);
  </script>
  
  <style scoped>
  .shadow-md {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  </style>
  