<template>
    <div class="text-center text-white bg-purple-900 py-6">
      <div class="max-w-7xl mx-auto flex flex-col items-center">
        <h1 class="font-bold text-2xl mb-4">What's in the News</h1>
        <p class="font-medium text-lg mb-6">Read about the latest AUSL Initiatives, Achievements, and Developments</p>
        
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
    { title: 'AUSL Launches New Program', image: 'https://via.placeholder.com/300x200' },
    { title: 'Students Achieve Top Honors', image: 'https://via.placeholder.com/300x200' },
    { title: 'Upcoming Legal Symposium', image: 'https://via.placeholder.com/300x200' },
    { title: 'New Research Initiatives', image: 'https://via.placeholder.com/300x200' }
  ]);
  </script>
  
  <style scoped>
  .shadow-md {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  </style>
  