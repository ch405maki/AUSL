<template>
    <MainLayout>
      <Head title="Academic Calendar" />
      <div class="relative mb-4">
        <img src="/images/headerbg.jpg" alt="Background Image" class="w-full h-auto object-cover" />
        <div class="absolute inset-0 flex items-center justify-center">
          <h1 class="text-white text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl font-bold text-center">
            ARELLANO UNIVERSITY SCHOOL OF LAW
            <br>
            Amended Academic Year <br><span class="underline">{{ activeTab === '2024-2025' ? '2024-2025' : '2025-2026' }}</span>
          </h1>
        </div>
      </div>
      <main class="flex-grow">
        <div class="max-w-7xl mx-auto">
          <div class="flex flex-col md:flex-row justify-between">
            <div class="flex flex-col md:flex-row w-full justify-center">
              <!-- Main content section -->
              <section class="w-full px-6">
                <!-- Tab Content -->
                <AcademicYear2025 v-if="activeTab === '2025-2026'" />
                <AcademicYear2024 v-if="activeTab === '2024-2025'" />
              </section>
            </div>
  
            <!-- asside -->
            <aside class="w-full md:w-1/3 sticky top-0 sm:mt-12 mb-6 pl-4">
                <div class="ml-2">
                  <h2 class="text-official-purple-900 text-lg font-medium mb-2">On this page</h2>
                  <hr class="mb-2 border-1 border-official-purple-800">
                  <h1 class="text-lg font-normal text-gray-800">Academic Calendar</h1>
                  <h1 
                    @click="activeTab = '2025-2026'"
                      :class="[
                        'text-lg font-normal underline cursor-pointer mb-1',
                        activeTab === '2025-2026' ? 'text-purple-800' : 'text-gray-600 hover:text-purple-800'
                      ]"
                    >
                      Academic Year 2025-2026
                    </h1>
                    <h1 
                      @click="activeTab = '2024-2025'"
                      :class="[
                        'text-lg font-normal underline cursor-pointer mb-8',
                        activeTab === '2024-2025' ? 'text-purple-800' : 'text-gray-600 hover:text-purple-800'
                      ]"
                    >
                      Academic Year 2024-2025
                  </h1>
                </div>
              <div class="ml-2">
                <h2 class="text-official-purple-900 text-md sm:text-lg font-medium mb-4">Related Links</h2>
                <hr class="mb-4 border-1 border-official-purple-800">
                <ul class="list-inside list-disc">
                  <RelatedLinks />
                </ul>
              </div>
            </aside>
          </div>
        </div>
      </main>
    </MainLayout>
  </template>
  
  
  <script setup>
    import { ref } from 'vue';
    import { Head } from '@inertiajs/vue3';
    import MainLayout from '@/Layouts/MainLayout.vue';  
    import RelatedLinks from '../Components/RelatedLinks.vue';
    import AcademicYear2024 from './Components/AcademicYear2024.vue';
    import AcademicYear2025 from './Components/AcademicYear2025.vue';
    import Header from '../../Components/Header.vue';

    // Tab state - default to 2025-2026 as shown in your example
    const activeTab = ref('2025-2026');
  
    // Create a ref for the current step
    const step = ref(1);
  </script>