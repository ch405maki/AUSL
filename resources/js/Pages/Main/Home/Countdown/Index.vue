<template>
  <div class="relative h-[600px] flex flex-col items-center justify-center text-slate-800 overflow-hidden">

    <!-- Christmas Balls - Upper Right -->
    <img
      src="/images/christmas/balls.png"
      class="absolute top-0 right-0 
            w-24 sm:w-32 md:w-40 lg:w-48
            opacity-90 pointer-events-none select-none"
    />

    <!-- Christmas Gifts - Lower Left -->
    <img
      src="/images/christmas/gifts.png"
      class="absolute bottom-0 left-0 
            w-32 sm:w-40 md:w-56 lg:w-64
            opacity-90 pointer-events-none select-none"
    />

    <!-- BEFORE CHRISTMAS -->
    <h1 v-if="mode === 'christmas'" 
        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-6 text-official-purple-800 text-center">
      {{ days }} Days Before Christmas
    </h1>

    <!-- MERRY CHRISTMAS -->
    <h1 v-if="mode === 'christmas-day'"
        class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-red-600 drop-shadow-xl mb-6">
      🎄 Merry Christmas!
    </h1>

    <!-- AFTER CHRISTMAS → NEW YEAR COUNTDOWN -->
    <h1 v-if="mode === 'newyear'"
        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-6 text-official-purple-800 text-center">
      {{ days }} Days Before New Year
    </h1>

    <!-- NEW YEAR DAY -->
    <h1 v-if="mode === 'newyear-day'"
        class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-blue-600 drop-shadow-xl mb-6">
      🎆 Happy New Year!
    </h1>

    <!-- Countdown (Visible for both Christmas & New Year) -->
    <div v-if="mode === 'christmas' || mode === 'newyear'"
         class="flex flex-wrap justify-center text-lg sm:text-xl md:text-2xl lg:text-3xl mb-6">
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

const days = ref(0);
const hours = ref(0);
const minutes = ref(0);
const seconds = ref(0);
const mode = ref("christmas");

// Real target dates
const christmasDate = new Date("December 25, 2025 00:00:00").getTime();
const newYearDate = new Date("January 1, 2026 00:00:00").getTime();

// TEST MODE
const TEST_MODE = false;
const TEST_NOW = new Date("January 1, 2026 12:00:00").getTime();

const updateCountdown = () => {
  const now = TEST_MODE ? TEST_NOW : new Date().getTime();

  if (now < christmasDate) {
    const distance = christmasDate - now;
    mode.value = "christmas";
    days.value = Math.floor(distance / (1000 * 60 * 60 * 24));
    hours.value = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    minutes.value = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    seconds.value = Math.floor((distance % (1000 * 60)) / 1000);
    return;
  }

  if (now >= christmasDate && now < christmasDate + 86400000) {
    mode.value = "christmas-day";
    return;
  }

  if (now < newYearDate) {
    const distance = newYearDate - now;
    mode.value = "newyear";
    days.value = Math.floor(distance / (1000 * 60 * 60 * 24));
    hours.value = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    minutes.value = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    seconds.value = Math.floor((distance % (1000 * 60)) / 1000);
    return;
  }

  mode.value = "newyear-day";
};

let timer;
onMounted(() => {
  updateCountdown();
  timer = setInterval(updateCountdown, 1000);
});
</script>

