<template>
    <!-- Start Related Websites -->
    <div class="flex flex-wrap justify-center items-start space-x-8 my-16">
        <div class="flex flex-col items-center w-14 sm:w-16 md:w-20" v-for="(link, index) in relatedLinks" :key="index">
            <a :href="link.link" class="text-center">
                <img class="w-full transition-all duration-300 rounded-lg cursor-pointer hover:grayscale-0 transform hover:scale-105" :src="link.image" alt="Logo">
                <span class="mt-2 block w-full text-center text-slate-700 text-sm">{{link.text}}</span>
            </a>
        </div>
    </div>
    <!-- End Related Websites -->
</template>

<script setup>
import { ref } from 'vue';

const relatedLinks = ref([
    {text:'Arellano University', link: 'https://www.arellano.edu.ph/', image:'/images/auLogo.png'},
    {text:'IChief', link: 'https://ichief.arellanolaw.org/', image:'/images/alflogo.png'},
    {text:'LawPhil', link: 'https://lawphil.net/', image:'/images/lawphilLogo.png'},
    {text:'Arellano Law Foundation', link: 'https://arellanolaw.org/', image:'/images/alflogo.png'},
]);
</script>
