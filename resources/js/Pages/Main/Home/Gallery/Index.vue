<template>
  <div class="h-[600px] relative overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
      <v-parallax src="/images/arellanobuilding.jpg" class="opacity-50 w-full h-full bg-cover bg-center blur-effect"></v-parallax>
      <div class="absolute inset-0 bg-gradient-to-r from-official-purple-500/50 via-official-purple-400/40 to-official-purple-300/40 backdrop-blur-md opacity-50"></div>
    </div>

    <!-- Content -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 h-full">
      <!-- Left Column -->
      <div class="basis-full md:basis-1/2 flex flex-col justify-center items-center px-4 py-8">
        <h1 class="text-official-purple-800 mb-4 font-bold mt-2 text-2xl sm:text-3xl text-center">Photo Gallery</h1>
        <p class="text-xl font-medium text-slate-800 text-center tracking-wide">A collection of captured moments from recent </p>
        <p class="text-xl font-medium text-slate-800 text-center mb-6 tracking-wide">AUSL School Events.</p>
        <a :href="route('gallery.browse')" class="cursor-pointer text-official-purple-900 font-medium mt-4 mb-4 border-[1px] border-official-purple-800 hover:bg-official-purple-800 hover:text-white rounded-xl px-4 py-2 transition-colors duration-300">
          See Our Photo Gallery
        </a>
      </div>

      <!-- Right Column -->
      <div class="basis-full md:basis-1/2 overflow-hidden hidden md:block">
        <CardCarousel />
      </div>
    </div>
  </div>
</template>



<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import CardCarousel from './CardCarousel.vue';

const navigateToGallery = () => {
  Inertia.visit(route('gallery.browse'));
};

const openGallery = () => {
  Inertia.visit(route('gallery.browse'))
};
</script>

<style scoped>
.bokeh-background {
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)), url('/path/to/bokeh-image.jpg');
  background-size: cover;
  background-position: center;
}

.blur-effect {
  backdrop-filter: blur(10px);
}
</style>