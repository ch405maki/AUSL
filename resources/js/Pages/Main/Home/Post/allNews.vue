<template>
    <MainLayout>
      <Head title="Academic Guidelines" />
      <Header> AUSL News</Header>
      <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
          <div class="flex flex-col md:flex-row justify-between gap-8">
            <!-- Main content section -->
            <section class="w-full md:w-3/4 relative">
              <!-- Step 1 -->
              <div class="ml-2">
                <h2 class="text-official-purple-800 font-bold mb-8 text-xl sm:text-2xl text-pretty text-start">
                  AUSL News
                </h2>
                <div class="w-full">
                    <div v-for="news in allNews" :key="news.id" id="news">
                    <div class="text-left flex items-justify mb-4">
                        <div v-if="news.image && news.image.length > 0" class="mr-0">
                        <img :src="news.image[0]" alt="Image Logo" class="min-w-32 w-32 h-min max-h-100 mr-2">
                        </div>
                        <div class="text-justify ml-2">
                        <h3 class="text-purple-800 font-semibold text-md tracking-wide leading-6">
                            <a :href="`/show/${news.id}`" class="text-lg font-medium text-purple-900 hover:underline">{{ news.title }}</a>
                        </h3>
                        <p class="text-slate-600 ">
                            {{ new Date(news.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}
                        </p>
                        <div v-if="news.content">
                            <p v-if="news.content.length > 0">
                            <div class="text-slate-700 text-lg font-normal text-gray-600" v-html="news.content.substring(0, 200)"></div>
                            </p>
                            <p v-else>{{ news.content }}</p>
                        </div>
                        <a :href="`/show/${news.id}`" class="text-lg font-normal text-gray-700 mb-4 hover:text-official-purple-600 hover:underline">Read more</a>
                        </div>
                    </div>
                    <hr class="mb-4 border-1 border-purple-200">
                    </div>
                    <!-- End Breadcrumb -->
                </div>
                <!-- End News and news Section -->
                </div>
            </section>
  
            <aside class="w-full md:w-1/4 sticky top-0">
            <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                <div class="ml-4">
                <h2 class="mb-4 text-lg leading-6 font-medium text-purple-900 capitalize">On this page</h2>
                <hr class="mb-4 border-1 border-purple-800">
                    <h3 class="text-lg font-normal text-gray-800 mb-8"> AUSL News</h3>
                </div>
                <div class="ml-4">
                <h2 class="text-purple-900 text-lg font-medium mb-4">Related Links</h2>
                <hr class="mb-4 border-1 border-purple-800">
                <ul class="list-inside list-disc">
                    <RelatedLinks />
                </ul>
                </div>
            </div>
            </aside>
        </div>
      </div>
    </main>
  </MainLayout>
  </template>

<script setup>
  import { ref } from 'vue';
  import { reactive, onMounted, onBeforeUnmount } from 'vue';
  import { Head } from '@inertiajs/vue3';
  import MainLayout from '@/Layouts/MainLayout.vue';
  import { defineProps } from 'vue';
  import Header from '../../Components/Header.vue';
  import RelatedLinks from '../Partials/RelatedLinks.vue';

//   import RelatedLinks from '../Components/RelatedLinks.vue';
  
const props = defineProps({
  allNews: {
    type: Array,
    required: true
  },
});
  
  const isMobile = reactive({ value: window.innerWidth <= 768 });
  
  const checkIfMobile = () => {
  isMobile.value = window.innerWidth <= 768;
  };
  
  onMounted(() => {
  window.addEventListener('resize', checkIfMobile);
  });
  
  onBeforeUnmount(() => {
  window.removeEventListener('resize', checkIfMobile);
  });
  </script>
  
  <style scoped>
  .container {
  max-width: 1200px;
  }
  
  .sticky {
  position: sticky;
  top: 0;
  }
  
  .overflow-y-auto {
  overflow-y: auto;
  }
  
  .h-screen {
  height: 100vh;
  }
  
  .fixed {
  position: fixed;
  }
  
  .bottom-4 {
  bottom: 1rem;
  }
  
  .right-4 {
  right: 1rem;
  }
  
  .flex {
  display: flex;
  }
  
  .space-x-2 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(0.5rem * var(--tw-space-x-reverse));
  margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
  }
  
  .v-btn {
  margin-top: 16px;
  margin-right: 8px;
  }
  </style>