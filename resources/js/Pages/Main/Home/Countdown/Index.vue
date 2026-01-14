<script setup lang="ts">
import { ref, onMounted, watch } from 'vue';

const props = defineProps<{ countdown: any }>();

const event = ref(props.countdown || null);

// Countdown variables
const days = ref(0);
const hours = ref(0);
const minutes = ref(0);
const seconds = ref(0);

let timer: any;

const startCountdown = (targetDate: string) => {
  const countDownDate = new Date(targetDate).getTime();

  const update = () => {
    const now = new Date().getTime();
    const distance = countDownDate - now;

    if (distance > 0) {
      days.value = Math.floor(distance / (1000 * 60 * 60 * 24));
      hours.value = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      minutes.value = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      seconds.value = Math.floor((distance % (1000 * 60)) / 1000);
    } else {
      clearInterval(timer);
      days.value = hours.value = minutes.value = seconds.value = 0;
    }
  };

  update();
  timer = setInterval(update, 1000);
};

onMounted(() => {
  if (event.value) startCountdown(event.value.target_date);
});

// Format a date to a full readable string
const formatFullDate = (dateString: string) => {
  if (!dateString) return '';
  const date = new Date(dateString);

  return new Intl.DateTimeFormat('en-US', {
    year: 'numeric', // 2026
    month: 'long',   // January
    day: 'numeric',  // 23
  }).format(date);
};


// Watch for prop changes (if parent reloads)
watch(
  () => props.countdown,
  (val) => {
    event.value = val;
    if (val) startCountdown(val.target_date);
  }
);
</script>

<template>
    <div class="h-[600px] flex flex-col items-center justify-center text-slate-800">
      <!-- Logo or Header -->
      <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-4 text-official-purple-800 text-center">
        {{ event?.title || 'No Upcoming Event' }}
      </h1>
            
      <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-6 text-official-purple-800 text-center">
        {{ event ? formatFullDate(event.target_date) : '' }}
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
