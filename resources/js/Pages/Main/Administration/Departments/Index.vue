<template>
  <MainLayout>
      <Head title="Administration Officers" />
        <main class="flex-grow">
          <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
            <div class="flex flex-col md:flex-row justify-between gap-8">
              <!-- Main content section -->
              <section class="w-full md:w-3/4 relative">
                <div class="flex items-center ml-2">
                  <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                    Directory of Offices
                  </h2>
                </div>
                <div class="ml-2 mb-8">
                  <p class="text-gray-600 text-base sm:text-lg">
                    Below is a comprehensive list of the key offices within our administration. Each office plays a crucial role in ensuring the smooth operation of our institution, offering essential services and support to both staff and students. For specific inquiries or assistance, please refer to the respective office listed.
                  </p>
                </div>

              <!-- Executive Director Info -->

              <table class="w-full text-sm sm:text-lg text-left rtl:text-right text-gray-500 dark:text-gray-400 ml-2 mb-8">
              <tbody>
                <tr
                  v-for="(office, index) in offices"
                  :key="index"
                  class="border-b"
                >
                  <td class="py-2 font-medium text-purple-900">
                    <a :href="office.url" class="font-normal hover:underline hover:text-purple-800">{{ office.text }}</a>
                  </td>
                </tr>
              </tbody>
            </table>
            </section>
  
              <aside class="w-full md:w-1/4 sticky top-0">
              <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12 text-sm sm:text-lg">
                  <div class="ml-4">
                      <h2 class="mb-4 leading-6 font-medium text-purple-900 capitalize">On this page</h2>
                      <hr class="mb-4 border-1 border-purple-800">
                      <h3 class="font-normal text-gray-800 mb-8">Departments</h3>
                  </div>
                  <div class="ml-4">
                      <h2 class="text-purple-900 font-medium mb-4">Related Links</h2>
                      <hr class="mb-4 border-1 border-purple-800">
                      <ul class="list-inside list-disc">
                          <li v-for="(item, index) in links" :key="index" class="mb-2 font-semibold">
                          <a :href="item.url" class="font-normal text-gray-600 hover:text-slate-900">{{ item.text }}</a> 
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
    { text: 'Arellano Law Foundation', url: '/administration/alf' },
    { text: 'Board of Trustees', url: '/administration/board_trustees' },
    { text: 'Addministration Officers', url: '/administration/admin_staff' },
    { text: 'Departments', url: '/administration/departments' }, 
  ]);

  const offices = [
  { text: 'Information Technology Center', url: '/administration/departments/itc' },
  { text: 'Other Name Of Offices', url: '#' },
];
  
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