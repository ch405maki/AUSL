<template>
  <MainLayout>
    <Head title="Show Post" />
    <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
      <main class="flex-grow">
        <div class="bg-white">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row w-full justify-center">
              <!-- Main content section -->
              <div class="w-full md:w-2/2 p-2">
                <h1 class="text-purple-900 font-bold mb-4 mt-2 text-md sm:text-3xl text-pretty text-start ">
                  {{ post.title }}
                </h1>
                <hr class="mb-4 border-1 border-purple-900">
                <div class="text-justify font-normal text-slate-700 mb-4">
                    <p v-html="post.content"></p>
                </div>
                <div class="relative mb-2 flex justify-center items-center bg-slate-100">
                  <img :src="post.image" alt="Image Logo" class="object-center min-h-80 max-h-96 min-w-80 max-w-100">
                </div>
              </div>
              <!-- End main content section -->
              
              <!-- Links, Events & Seminars --> 
              <div class="w-full md:w-1/5 p-2 flex justify-start">
                <div class="text-left">
                  <div class="mb-2 mt-5">
                    <h2 class="text-purple-900 text-mb font-bold mb-4">Related Article</h2>
                    <hr class="mb-4 border-1 border-purple-900">
                    <ul class="list-inside list-disc">
                      <li v-for="(item, index) in links" :key="index" class="text-sm mb-2 font-medium text-slate-600">
                        <a :href="item.url" class="hover:text-slate-900">{{ item.text }}</a>   
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- End Links, Events & Seminars -->
            </div>
          </div>
        </div>
      </main>
    </div>
    </MainLayout>
  </template>
  
  
  <script setup>
    import { Link, Head } from '@inertiajs/vue3';
    import { defineProps } from 'vue';
    import { ref, computed } from 'vue';
    import MainLayout from '@/Layouts/MainLayout.vue';

    // Define props here
    const props = defineProps({
    post: {
      type: Object,
      required: true,
    },
  });

    
    // Sample data for links and events
    const links = ref([
      { text: 'Related Article ', url: 'https://aims.arellanolaw.edu/aims/students/' },
      { text: 'Related Article', url: '#event2' },
      { text: 'Related Article', url: '#event3' },
      { text: 'Related Article', url: '#event4' },
      { text: 'Related Article', url: '#event5' }
    ]);

    const screenWidth = ref(window.innerWidth);

    const updateScreenSize = () => {
      screenWidth.value = window.innerWidth;
    };

    const isSmallScreen = computed(() => screenWidth.value < 640);
    const isBigScreen = computed(() => screenWidth.value >= 640);
  </script>
  
  <style scoped>
  </style>
  