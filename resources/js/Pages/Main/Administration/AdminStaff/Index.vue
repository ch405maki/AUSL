<template>
    <MainLayout>
        <Head title="Administration Officers" />
          <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
              <div class="flex flex-col md:flex-row justify-between gap-8">
                <!-- Main content section -->
                <section class="w-full md:w-3/4 relative">
                  <!-- Step 1 -->
                  <div class="flex items-center">
                    <img src="/images/alflogo.png" alt="Image Logo" class="max-w-full h-full max-h-16 mr-6 transition-transform duration-300 transform hover:scale-105">
                    <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-3xl text-pretty text-start ml-2">
                        Administration Officers
                    </h2>
                    <div class="text-slate-600 leading-relaxed mb-8 ml-2">
                    </div>
                    
                  </div>
                  <div class="flex items-center mt-8 ml-2">
                        <div class="shrink-0 flex items-center text-slate-700">
                        <div>
                            <div class="uppercase font-bold text-lg tracking-wide leading-tight ml-20">Executive Director: <span class="capitalize italic ml-4">Atty. Jallorina, Mark Simon</span></div>
                        </div>
                        </div>
                    </div>
                </section>
    
                <aside class="w-full md:w-1/4 sticky top-0">
                <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                    <div class="ml-4">
                        <h2 class="mb-4 text-lg leading-6 font-medium text-purple-900 capitalize">On this page</h2>
                        <hr class="mb-4 border-1 border-purple-800">
                        <h3 class="text-lg font-normal text-gray-800 mb-8">Administration Officers</h3>
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