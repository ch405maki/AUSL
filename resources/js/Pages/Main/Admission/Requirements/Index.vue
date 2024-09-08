<template>
  <MainLayout>
    <Head title="Academic Guidelines" />
    <main class="flex-grow">
      <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
        <div class="flex flex-col md:flex-row justify-between gap-8">
          <!-- Main content section -->
          <section class="w-full md:w-3/4 relative">
            <!-- Step 1 -->
            <div class="ml-2">
              <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                  Requirements
              </h2>
              
              <div class="grid grid-flow-col text-center rounded-lg mt-8 mb-8">
                  <table class="w-full text-sm text-left text-gray-500  border border-green-900">
                      <tbody>
                          <tr v-for="index of 4" class="border-b odd:bg-white even:bg-gray-50">
                          <th scope="row" class="px-4 py-2 text-lg font-normal text-gray-600 whitespace-wrap hover:bg-official-purple-50" title="Click for subject description">
                            <details class="group">
                            <summary
                              class="flex  hover:underline cursor-pointer list-none items-center justify-between text-lg font-medium text-secondary-900 group-open:text-official-purple-900">
                              Interview Schedule
                              <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="block h-5 w-5 group-open:hidden">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden h-5 w-5 group-open:block">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                </svg>
                              </div>
                            </summary>
                            <div class="pb-4 mt-2 text-secondary-500 text-lg font-normal text-gray-800">
                              <p>
                                (Freshmen & Transferees) Our Interview Schedule for the incoming Semester will be held every Monday, Thursday, Friday & Saturday
                                <br><br>
                                For questions and inquiries please call:
                                AUSL Admission Office at 8404-3089 to 93 local 33
                              </p>
                            </div>
                          </details>

                          </th>
                          </tr>
                      </tbody>
                      </table>
                  </div>
              </div>
          </section>

          <aside class="w-full md:w-1/4 sticky top-0">
          <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
              <div class="ml-4">
              <h2 class="mb-4 text-lg leading-6 font-medium text-purple-900 capitalize">On this page</h2>
              <hr class="mb-4 border-1 border-purple-800">
                  <h3 class="text-lg font-normal text-gray-800 mb-8">Requirements</h3>
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
import RelatedLinks from '../Components/RelatedLinks.vue';

const props = defineProps({
guidelines: { type: Array, required: true },
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