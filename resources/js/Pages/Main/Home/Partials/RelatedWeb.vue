<template>
  <!-- Start Related Websites -->
  <div class="flex flex-wrap justify-center items-start gap-6 sm:gap-8 my-10 sm:my-16">
    <div
      v-for="(link, index) in relatedLinks"
      :key="index"
      class="flex flex-col items-center
             w-12 sm:w-16 md:w-20"
    >
      <a :href="link.link" class="text-center">
        <!-- Logo -->
        <img
          :src="link.image"
          alt="Logo"
          class="w-full rounded-lg cursor-pointer
                 transition-all duration-300
                 hover:scale-105 hover:grayscale-0"
        />

        <!-- Text -->
        <span
          class="mt-1 sm:mt-2 block w-full
                 text-[10px] sm:text-sm md:text-base
                 text-slate-700 leading-tight"
        >
          {{ link.text }}
        </span>
      </a>
    </div>
  </div>
  <!-- End Related Websites -->
</template>

<script setup>
import { ref } from 'vue';

const relatedLinks = ref([
    {text:'Arellano University', link: 'https://www.arellano.edu.ph/', image:'/images/auLogo.png'},
    {text:'IChief LMS', link: 'https://ichief.arellanolaw.org/', image:'/images/alflogo.png'},
    {text:'LawPhil', link: 'https://lawphil.net/', image:'/images/lawphilLogo.png'},
    {text:'Arellano Law Foundation', link: 'https://arellanolaw.org/', image:'/images/alflogo.png'},
]);
</script>
