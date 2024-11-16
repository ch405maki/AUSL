<template>
  <MainLayout>
    <Head title="Show Post" />
    <div class="flex flex-col min-h-screen bg-green-100">
      <main class="flex-grow">
        <div class="bg-white">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row w-full justify-center">
              <!-- Main content section -->
              <div class="w-full md:w-2/2 p-2">
                <h1 class="text-purple-900 font-bold mb-4 mt-8 text-xl sm:text-3xl text-pretty text-start">
                  {{ post.title }}
                </h1>

                <nav class="bg-grey-light w-full rounded-md" aria-label="breadcrumb">
                  <ol class="list-reset flex mb-8">
                    <li><a href="#" class="text-neutral-500 hover:text-neutral-600 dark:text-neutral-200">Date Posted:</a></li>
                    <li><span class="mx-2 text-neutral-500 dark:text-neutral-200"> {{ formattedDate(post.created_at) }}</span></li>
                  </ol>
                </nav>
                <div class="text-lg font-normal text-gray-600 mb-4font-normal text-slate-700 mb-8">
                    <p v-html="post.content"></p>
                </div>
                <div class="relative mb-8 flex justify-center items-center bg-slate-100">
                  <div v-for="(image, index) in post.image" :key="index" class="w-full mb-4">
                    <img :src="image" alt="Post Image" class="object-cover w-full rounded-lg hover:cursor-zoom-in" @click="showLightbox(index)"/>
                  </div>
                </div>
                <!-- Breadcrumb -->
                <nav class="bg-grey-light w-full rounded-md" aria-label="breadcrumb">
                  <ol class="list-reset flex">
                    <li><a href="#" class="text-neutral-500 hover:text-neutral-600 dark:text-neutral-200">Home</a></li>
                    <li><span class="mx-2 text-neutral-500 dark:text-neutral-200">/ {{ post.title }}</span></li>
                  </ol>
                </nav>
                <!-- News and Announcement Section -->
              <div class="w-full">
                <h1 class="text-purple-900 font-bold mb-4 mt-8 text-md sm:text-xl text-pretty text-start">
                  Latest News
                </h1>
                <hr class="mb-4 border-1 border-purple-800">
                <div v-for="post in allPost" :key="post.id" id="news">
                  <div class="text-left flex items-justify mb-4">
                    <div v-if="post.image && post.image.length > 0" class="mr-0">
                      <img :src="post.image[0]" alt="Image Logo" class="min-w-32 w-32 h-min max-h-100 mr-2">
                    </div>
                    <div class=" ml-2">
                      <h3 class="text-purple-800 font-semibold text-md tracking-wide leading-6">
                        <a :href="`/show/${post.id}`" class="text-lg font-medium text-purple-900 hover:underline">{{ post.title }}</a>
                      </h3>
                      <p class="text-slate-600 ">{{ formattedDate(post.created_at) }}</p>
                      <p v-if="post.content.length > 0">
                        <div class="text-slate-700 text-lg font-normal text-gray-600" v-html="post.content.substring(0, 200)"></div>
                        <a :href="`/show/${post.id}`" class="text-lg font-normal text-gray-700 mb-4 hover:text-green-600 hover:underline">Read more</a>
                      </p>
                      <p v-else>{{ post.content }}</p>
                    </div>
                  </div>
                  <hr class="mb-4 border-1 border-purple-200">
                </div>
                <!-- End Breadcrumb -->
              </div>
              <!-- End News and Announcement Section -->
              </div>
              <!-- End main content section -->
              
              
              <!-- Links, Events & Seminars --> 
              <!-- Links, Events & Seminars --> 
              <div class="w-full md:w-1/3 p-2 flex justify-start">
                <div class="text-left">
                  <div class="mb-2 mt-10">
                  <div class="ml-4">
                    <h2 class="mb-4 text-lg leading-6 font-medium text-purple-900 capitalize">On this page</h2>
                    <hr class="mb-4 border-1 border-purple-800">
                        <h3 class="text-lg font-normal text-gray-800 mb-8">News</h3>
                    </div>
                    <div class="ml-4">
                    <h2 class="text-purple-900 text-lg font-medium mb-4">Related Links</h2>
                    <hr class="mb-4 border-1 border-purple-800">
                    <ul class="list-inside list-disc">
                        <RelatedLinks />
                    </ul>
                    </div>
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
    <vue-easy-lightbox
        :visible="visible"
        :imgs="post.image"
        :index="index"
        @hide="handleHide"
    />
  </template>
  
  
  <script setup>
    import { Link, Head } from '@inertiajs/vue3';
    import { defineProps } from 'vue';
    import { ref, computed } from 'vue';
    import MainLayout from '@/Layouts/MainLayout.vue';
    import VueEasyLightbox from 'vue-easy-lightbox';
    import RelatedLinks from '../Partials/RelatedLinks.vue';

    // Define props here
    const { post, allPost } = defineProps(['post', 'allPost']);

    const visible = ref(false);
    const index = ref(0);

    const showLightbox = (i) => {
        index.value = i;
        visible.value = true;
    };

    const handleHide = () => {
        visible.value = false;
    };
    
    // Sample data for links and events
    const links = ref([
      { text: 'Latest Anouncement', url: 'https://aims.arellanolaw.edu/aims/students/' },
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
  </style>
  