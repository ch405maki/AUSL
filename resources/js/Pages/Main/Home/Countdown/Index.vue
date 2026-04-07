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

const startCountdown = (targetDate: string, endDate: string | null = null) => {
  const targetDateTime = new Date(targetDate).getTime();
  const endDateTime = endDate ? new Date(endDate).getTime() : null;
  const now = new Date().getTime();

  // If event has ended, don't start countdown
  if (endDateTime && now > endDateTime) {
    days.value = hours.value = minutes.value = seconds.value = 0;
    if (timer) clearInterval(timer);
    return;
  }

  // If event is ongoing (past target but within end date or no end date)
  if (now > targetDateTime && (!endDateTime || now <= endDateTime)) {
    days.value = 0;
    hours.value = 0;
    minutes.value = 0;
    seconds.value = 0;
    return;
  }

  const update = () => {
    const now = new Date().getTime();
    
    // Check if event is ongoing
    if (now > targetDateTime && (!endDateTime || now <= endDateTime)) {
      days.value = 0;
      hours.value = 0;
      minutes.value = 0;
      seconds.value = 0;
      if (timer) clearInterval(timer);
      return;
    }
    
    // If past end date
    if (endDateTime && now > endDateTime) {
      days.value = 0;
      hours.value = 0;
      minutes.value = 0;
      seconds.value = 0;
      if (timer) clearInterval(timer);
      return;
    }
    
    const distance = targetDateTime - now;

    if (distance > 0) {
      days.value = Math.floor(distance / (1000 * 60 * 60 * 24));
      hours.value = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      minutes.value = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      seconds.value = Math.floor((distance % (1000 * 60)) / 1000);
    } else {
      days.value = hours.value = minutes.value = seconds.value = 0;
    }
  };

  update();
  if (timer) clearInterval(timer);
  timer = setInterval(update, 1000);
};

// Format date range or single date
const formatDateRange = () => {
  if (!event.value) return '';
  
  const startDate = new Date(event.value.target_date);
  
  if (event.value.end_date) {
    const endDate = new Date(event.value.end_date);
    const startDay = startDate.getDate();
    const endDay = endDate.getDate();
    const month = startDate.toLocaleString('en-US', { month: 'long' });
    const year = startDate.getFullYear();
    
    // Check if same month and year
    if (startDate.getMonth() === endDate.getMonth() && 
        startDate.getFullYear() === endDate.getFullYear()) {
      return `${month} ${startDay} - ${endDay}, ${year}`;
    }
    // Different months
    return `${formatFullDate(startDate)} - ${formatFullDate(endDate)}`;
  }
  
  return formatFullDate(startDate);
};

const formatFullDate = (date: Date | string) => {
  const d = date instanceof Date ? date : new Date(date);
  return new Intl.DateTimeFormat('en-US', {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
  }).format(d);
};

// Check if event is current/ongoing
const isEventOngoing = () => {
  if (!event.value) return false;
  const now = new Date().getTime();
  const targetDateTime = new Date(event.value.target_date).getTime();
  const endDateTime = event.value.end_date ? new Date(event.value.end_date).getTime() : null;
  
  return now > targetDateTime && (!endDateTime || now <= endDateTime);
};

onMounted(() => {
  if (event.value) startCountdown(event.value.target_date, event.value.end_date);
});

// Watch for prop changes (if parent reloads)
watch(
  () => props.countdown,
  (val) => {
    event.value = val;
    if (val) startCountdown(val.target_date, val.end_date);
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
        {{ event ? formatDateRange() : '' }}
      </h1> 
      
      <!-- Show "Event in Progress" for current events -->
      <div v-if="isEventOngoing()" class="text-xl text-official-purple-600 mb-4">
        Event in Progress
      </div>
            
      <!-- Countdown Timer - Hide if ongoing -->
      <div v-if="!isEventOngoing()" class="flex flex-wrap justify-center text-lg sm:text-xl md:text-2xl lg:text-3xl mb-6">
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