<template>
    <MainLayout>
      <Head title="Deans Corner" />
      <Header>Dean's Corner</Header>
      <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
          <div class="flex flex-col md:flex-row justify-between gap-8">
            <!-- Main content section -->
            <section class="w-full md:w-3/4 relative">
              <!-- Step 1 -->
              <div class="ml-2">
                <h2 class="text-official-purple-800 font-bold mb-8 text-xl sm:text-2xl text-pretty text-start">
                   Dean's Announcement
                </h2>
                <div class="w-full">
                    <div v-for="dean in deans" :key="dean.id" id="news">
                    <div class="text-left flex items-justify mb-4">
                          <div v-if="dean.pubmat" class="mr-0 ">
                          <img :src="dean.pubmat" alt="Image Logo" class="min-w-32 w-32 h-min max-h-100 mr-2">
                          </div>
                          <div v-else class="relative w-32 mr-2">
                            <!-- Image -->
                            <img src="/images/announcement/announcementbg.jpg" alt="Announcement Image" class="w-full h-auto rounded-md">

                            <!-- Overlay for hover effect -->
                            <div class="absolute inset-0 opacity-50"></div>

                            <!-- Overlay text -->
                            <h1
                              class="absolute inset-0 flex items-center justify-center text-white text-xs font-bold px-2 text-center  duration-300"
                            >
                              {{ dean.title.length > 26 ? dean.title.slice(0, 21) + '...' : dean.title }}
                            </h1>
                          </div>
                        
                        <div class="ml-2">
                        <h3 class="text-official-purple-800 font-semibold text-md tracking-wide leading-6">
                            <a :href="`/deans/show/${dean.id}`" class="text-lg font-medium text-official-purple-900 hover:underline nowarp">{{ dean.title }}</a>
                        </h3>
                        <p class="text-slate-600 ">
                            {{ new Date(dean.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}
                        </p>
                        <div v-if="dean.content">
                            <p v-if="dean.content.length > 0">
                            <div class="text-slate-700 text-lg font-normal text-gray-600" v-html="dean.content.substring(0, 200)"></div>
                            </p>
                            <p v-else>{{ dean.content }}</p>
                        </div>
                        <a :href="`/deans/show/${dean.id}`" class="text-lg font-normal text-gray-700 mb-4 hover:text-official-purple-600 hover:underline">Read more</a>
                        </div>
                    </div>
                    <hr class="mb-4 border-1 border-official-purple-200">
                    </div>
                    <!-- End Breadcrumb -->
                </div>
                <!-- End News and Announcement Section -->
                </div>
            </section>
  
            <aside class="w-full md:w-1/4 sticky top-0">
            <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                <div class="ml-4">
                <h2 class="mb-4 text-lg leading-6 font-medium text-official-purple-900 capitalize">On this page</h2>
                <hr class="mb-4 border-1 border-official-purple-800">
                    <h3 class="text-lg font-normal text-gray-800 mb-8">Deans Corner</h3>
                </div>
                <div class="ml-4">
                <h2 class="text-official-purple-900 text-lg font-medium mb-4">Related Links</h2>
                <hr class="mb-4 border-1 border-official-purple-800">
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
  import RelatedLinks from '../../Home/Partials/RelatedLinks.vue'

//   import RelatedLinks from '../Components/RelatedLinks.vue';
  
  const props = defineProps({
  deans: { type: Array, required: true },
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