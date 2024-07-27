<template>
    <div class="text-center text-white bg-purple-900 py-6">
      <div class="max-w-7xl mx-auto flex flex-col items-center">
        <h1 class="font-bold text-2xl mb-4">What's in the News</h1>
        <p class="font-medium text-lg mb-6">Read about the latest AUSL Initiatives, Achievements, and Developments</p>
        
        <div class="flex flex-wrap justify-center gap-6">
          <div v-for="card in cards" :key="card.title" class="bg-white rounded-xs shadow-md overflow-hidden w-72">
            <img :src="card.image" alt="Card image" class="w-full h-48 object-cover">
            <div class="p-4">
              <h2 class="font-bold text-lg text-gray-800 hover:text-purple-900 cursor-pointer">{{ card.title }}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const cards = ref([
    { title: 'Arellano University School of Law Ranked 3rd of the 10 highly contributing law schools in the country', image: '/images/post/image1.jpeg' },
    { title: 'Congratulations to The 3, 812 Successful Bar Examinees', image: '/images/post/image3.jpeg' },
    { title: 'Congratulations to Claudine De Luna-Panotes', image: '/images/post/image2.jpeg' },
  ]);
  </script>
  
  <style scoped>
  .shadow-md {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  </style>
  