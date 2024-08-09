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
                  <h1 class="text-purple-900 font-bold mb-4 mt-8 text-xl sm:text-3xl text-pretty text-start">
                    {{post.title}}
                  </h1>
                  <hr class="mb-4 border-1 border-purple-900">
                  <!-- Breadcrumb -->
                  <nav class="bg-grey-light w-full rounded-md mb-4" aria-label="breadcrumb">
                    <ol class="list-reset flex">
                      <li><a href="#" class="text-neutral-500 hover:text-neutral-600 dark:text-neutral-200">Date Posted:</a></li>
                      <li><span class="mx-2 text-neutral-500 dark:text-neutral-200">{{ formattedDate(post.created_at) }}</span></li>
                    </ol>
                  </nav>
                  <div class="text-lg font-normal text-gray-600 mb-4 font-normal text-slate-700 mb-8">
                    <p v-html="post.content"></p>
                  </div>
                  <div class="relative mb-8 flex justify-center items-center bg-slate-100">
                    <div class="container">
                        <iframe frameborder="0" height="800" scrolling="no" :src="post.link + 'preview'" width="100%"></iframe>
                    </div>
                  </div>

                  <!-- Breadcrumb -->
                  <nav class="bg-grey-light w-full rounded-md mb-4" aria-label="breadcrumb">
                    <ol class="list-reset flex">
                      <li><a href="#" class="text-neutral-500 hover:text-neutral-600 dark:text-neutral-200">Home</a></li>
                      <li><span class="mx-2 text-neutral-500 dark:text-neutral-200">/ {{post.title}}</span></li>
                    </ol>
                  </nav>
                  
                <!-- News and Announcement Section -->
                 Content Here...
                <!-- End News and Announcement Section -->
                </div>
                <!-- End main content section -->
                <!-- Links, Events & Seminars --> 
                <div class="w-full md:w-1/3 p-2 flex justify-start">
                  <div class="text-left">
                    <div class="mb-2 mt-10">
                      <h1 class="text-purple-900 text-lg font-medium mb-4">See Also</h1>
                      <hr class="mb-4 border-1 border-purple-900">
                      <ul class="list-inside list-disc">
                        <li v-for="(item, index) in links" :key="index" class="mb-2">
                          <a :href="item.url" class="text-slate-700 text-lg font-normal text-gray-600 hover:text-slate-900">{{ item.text }}</a>   
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
    const { post, allPost } = defineProps(['post', 'allPost']);
  
      
      // Sample data for links and events
      const links = ref([
        { text: 'Latest Anouncement', url: '#' },
        { text: 'Upcomming Events', url: '#event2' },
        { text: 'Related Article', url: '#event3' },
        { text: 'Related Article', url: '#event4' },
        { text: 'Related Article', url: '#event5' }
      ]);
  
      const formattedDate = (date) => {
        return new Date(date).toLocaleDateString();
      };  
    </script>
    
    <style scoped>
    .container {
      width: 100%;
      height: 100vh;
      overflow: hidden;
    }
    </style>