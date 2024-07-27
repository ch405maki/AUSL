<template>
  <div class="relative overflow-hidden">
    <div class="absolute inset-0">
      <v-parallax src="/images/arellanobuilding.jpg" height="400" class="opacity-50 blur-effect"></v-parallax>
      <div class="absolute inset-0 bg-purple-200 opacity-50"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 py-8">
      <!-- Left Column -->
      <div class="basis-full md:basis-1/2 flex flex-col justify-center items-center px-4 py-8">
        <h1 class="text-purple-900 mb-3 font-bold mt-2 text-xl sm:text-3xl text-center">Photo Gallery</h1>
        <p class="text-lg font-medium text-slate-800 text-center tracking-wide">A collection of captured moments from recent </p>
        <p class="text-lg font-medium text-slate-800 text-center mb-4 tracking-wide">AUSL School Events.</p>
        <v-btn color="#581c87" dark @click="navigateToGallery">
          <v-icon left>mdi-rocket</v-icon>
          Explore More
        </v-btn>
      </div>

      <!-- Right Column -->
      <div class="basis-full md:basis-1/2 overflow-hidden pt-2">
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