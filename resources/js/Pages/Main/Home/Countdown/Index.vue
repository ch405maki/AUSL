<template>
    <div class="h-[600px] flex flex-col items-center justify-center text-slate-800">
        <!-- Logo or Header -->
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-4 text-official-purple-800 text-center">
            Classes Will Officially Start
        </h1>
                
        <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-6 text-official-purple-800 text-center">
            January 4, 2025
        </h1>
                
        <!-- Countdown Timer -->
        <div class="flex flex-wrap justify-center text-lg sm:text-xl md:text-2xl lg:text-3xl mb-6">
            <div class="mr-4 text-official-purple-800">
            <span class="font-semibold text-official-purple-700">{{ days }}</span> Days
            </div>
            <div class="mr-4 text-official-purple-800">
            <span class="font-semibold text-official-purple-700">{{ hours }}</span> Hours
            </div>
            <div class="mr-4 text-official-purple-800">
            <span class="font-semibold text-official-purple-700">{{ minutes }}</span> Minutes
            </div>
            <div class="text-official-purple-800">
            <span class="font-semibold text-official-purple-700">{{ seconds }}</span> Seconds
            </div>
        </div>
        </div>

  </template>
  
  <script setup>
  import { ref, onMounted } from "vue";
  
  // Countdown variables
  const days = ref(0);
  const hours = ref(0);
  const minutes = ref(0);
  const seconds = ref(0);
  
  // Set the target countdown date
  const countDownDate = new Date("Jan 4, 2025 00:00:00").getTime();
  
  // Update countdown function
  const updateCountdown = () => {
    const now = new Date().getTime();
    const distance = countDownDate - now;
  
    if (distance > 0) {
      days.value = Math.floor(distance / (1000 * 60 * 60 * 24));
      hours.value = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      minutes.value = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      seconds.value = Math.floor((distance % (1000 * 60)) / 1000);
    } else {
      clearInterval(timer);
    }
  };
  
  let timer;
  
  // Start the countdown on mount
  onMounted(() => {
    timer = setInterval(updateCountdown, 1000);
  });
  </script>
  