<template>
    <div class="text-center text-white bg-purple-900 py-6">
        <div class="max-w-7xl mx-auto flex flex-col items-center">
            <h1 class="font-bold text-2xl mb-4">What's in the News</h1>
            <p class="font-medium text-lg mb-6">Read about the latest AUSL Initiatives, Achievements, and Developments</p>
            
            <div class="flex flex-wrap justify-center gap-6">
                <v-card v-for="index in 3" :key="index" class="w-full sm:w-80 bg-white text-black p-4 shadow-md rounded-lg">
                    I'm a news card
                </v-card>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
</script>