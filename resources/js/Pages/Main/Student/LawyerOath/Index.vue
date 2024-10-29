<template>
    <MainLayout>
        <Head title="Lawyer's Oath" />
        <Header>Lawyer's Oath</Header>
          <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
              <div class="flex flex-col md:flex-row justify-between gap-8">
                <!-- Main content section -->
                <section class="w-full md:w-3/4 relative">
                  <!-- Step 1 -->
                  <div>
                    <img src="/images/student/lawyersOath.jpg" class="carousel-image object-fit ml-2" alt="Carousel Image" />
                  </div>
                </section>
    
                <aside class="w-full md:w-1/4 sticky top-0">
                <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                    <div class="ml-4">
                        <h2 class="mb-4 text-lg leading-6 font-medium text-purple-900 capitalize">On this page</h2>
                        <hr class="mb-4 border-1 border-purple-800">
                        <h3 class="text-lg font-normal text-gray-800 mb-8">Lawyer's Oath</h3>
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
    import Header from '../../Components/Header.vue';
    import RelatedLinks from '../Components/RelatedLinks.vue';
    
    // Create a ref for the current step
    const step = ref(1); // Initially set to Step 1
    
    // Function to set the current step
    const setStep = (newStep) => {
      step.value = newStep;
      console.log(`Current step set to: ${newStep}`); // Debugging log
    };
    
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