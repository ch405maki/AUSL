<template>
    <MainLayout>
      <Head title="Arellano Law Foundation Inc." />
      <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
          <div class="flex flex-col md:flex-row justify-between gap-8">
            <!-- Main content section -->
            <section class="w-full md:w-3/4 relative">
              <!-- Step 1 -->
              <div v-show="step === 1">
                <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start ml-2">
                  Arellano law Foundation Inc.
                </h2>
                  <div class="bg-white border-none rounded-lg  mb-6 relative">
                    <div class="bg-white border-none rounded-lg mb-6 relative">
                    <div class="flex flex-row sm:flex-row items-center justify-between mb-6">
                    <blockquote class="text-xl italic font-semibold text-gray-900 dark:text-white">
                        <svg class="w-8 h-8 text-gray-400 dark:text-gray-600 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                            <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
                        </svg>
                        <h2 class="text-xl font-normal text-gray-600">
                        The Arellano Law Foundation is a non-profit, non-stock organization established by alumni and faculty members of Arellano University for contributing to the upgrading of standards of the legal proffession and to the efficient, fair, and honest administration of justice.
                        <br>
                        <br>
                        Its major project in the attainment of this objective is the operation of Arellano Law School.
                      </h2>
                    </blockquote>
                    </div>
                  </div>
                  </div>
              </div>
            </section>
  
            <aside class="w-full md:w-1/4 sticky top-0">
            <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                <div class="ml-4">
                <h2 class="mb-4 text-lg leading-6 font-medium text-purple-900 capitalize">On this page</h2>
                <hr class="mb-4 border-1 border-purple-800">
                    <h3 class="text-lg font-normal text-gray-800 mb-8">Arellano law Foundation Inc.</h3>
                </div>
                <div class="ml-4">
                <h2 class="text-purple-900 text-lg font-medium mb-4">Related Links</h2>
                <hr class="mb-4 border-1 border-purple-800">
                <ul class="list-inside list-disc">
                    <li v-for="(item, index) in links" :key="index" class="mb-2 font-semibold">
                    <a :href="item.url" class="text-lg font-normal text-gray-600 hover:text-slate-900">{{ item.text }}</a> 
                    </li>
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

// Create a ref for the current step
const step = ref(1); // Initially set to Step 1

// Function to set the current step
const setStep = (newStep) => {
  step.value = newStep;
  console.log(`Current step set to: ${newStep}`); // Debugging log
};



const links = ref([
  { text: 'Board of Trustees', url: '#' },
  { text: 'Administration and Staff', url: '#' },
  { text: 'Departments', url: '#' }, 
]);

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