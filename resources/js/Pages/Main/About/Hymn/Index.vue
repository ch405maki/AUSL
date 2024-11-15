<template>
  <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
    <div class="flex flex-col md:flex-row justify-between gap-8">
      <!-- Video section -->
      <section class="w-full md:w-1/2">
        <div class="ml-2">
          <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
            Arellano University School of Law
          </h2>
          <div class="bg-white border-none rounded-lg relative">
            <div class="mt-4 flex justify-center items-center">
              <video controls class="max-w-full h-auto">
                <source src="/videos/auslHymn.mp4" type="video/mp4">
              </video>
            </div>
            <div class="mt-8 text-start">
            <p class="text-2xl sm:text-2xl font-bold text-purple-900 mb-2">Hail to the Chief</p>
            <p class="text-lg text-gray-600 mb-8">By Dean Mariano F. Magsalin, Jr.</p>

            <div class="tracking-wide text-lg font-normal text-gray-600 ">
              <p>Hail Alma Mater</p>
              <p>Hail to the Chief</p>
              <p>Hail Arellano Law</p>
              <p>Our loyalty we pledge to keep</p>
              <p>Our hearts and minds do commit</p>
              <p>To stand for what is just and right</p>
              <p>To always be the best</p>
              <br>
              <p>Hail to the Chief</p>
              <p>Hail Alma Mater</p>
              <p>Hail Arellano Law</p>
              <p>Our voices will ring forever</p>
              <p>Arellano, Arellano</p>
              <p>O hail!</p>
            </div>
          </div>
          </div>
        </div>
      </section>

      <!-- Lyrics section -->
      <section class="w-full md:w-1/2">
        <div class="bg-white border-none rounded-lg relative">
          <div class="ml-2">
          <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
            Arellano University
          </h2>
          <div class="bg-white border-none rounded-lg relative">
            <div class="mt-4 flex justify-center items-center">
              <video controls class="max-w-full h-auto">
                <source src="/videos/auslHymn.mp4" type="video/mp4">
              </video>
            </div>
            <div class="mt-8 text-start">
            <p class="text-2xl sm:text-2xl font-bold text-purple-900 mb-2">Title...</p>
            <p class="text-lg text-gray-600 mb-8">By...</p>

            <div class="tracking-wide text-lg font-normal text-gray-600 ">
              <p>Lyrics...</p>
            </div>
          </div>
          </div>
        </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';

// Check if the screen is mobile
const isMobile = ref(false);

const checkIfMobile = () => {
  isMobile.value = window.innerWidth <= 768;
};

onMounted(() => {
  checkIfMobile();
  window.addEventListener('resize', checkIfMobile);
});

onBeforeUnmount(() => {
  window.removeEventListener('resize', checkIfMobile);
});
</script>

<style scoped>
/* Custom styles if needed */
</style>
