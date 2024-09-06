<template>
    <MainLayout>
      <Head title="Academic Calendar" />
      <main class="flex-grow">
        <div class="max-w-7xl mx-auto ">
          <div class="flex flex-col md:flex-row justify-between gap-8">
            <div class="flex flex-col md:flex-row w-full justify-center">
              <!-- Main content section -->
              <section class="w-full md:w-2/2 p-2">
                <h1 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start ml-4">
                    Holidays
                </h1>
                <div v-show="step === 1">
                  <div class="mb-8 relative px-2">
                    <div class="mb-8 px-2 text-center">
                    <h1 class="mt-1 text-xl sm:text-2xl lg:text-3xl font-bold text-purple-900">ARELLANO UNIVERSITY SCHOOL OF LAW</h1>
                    <p class="text-lg sm:text-xl lg:text-2xl font-semibold text-purple-900">Amended Academic Year <span class="font-bold underline">2023-2024</span></p>
                    </div>
                      <div class="text-gray-700 pl-2 sm:pl-4">
                        <table class="w-full text-left border-collapse">
                          <tbody>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Ninoy Aquino Day</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">August 21, 2024 (Wednesday)</td>
                            </tr>
                            <tr class="border-b"> 
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">National Heroes Day</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">August 26, 2024 (Monday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">All Saints Day</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">November 1, 2024 (Friday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Bonifacio Day</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">November 30, 2024 (Saturday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Pasay Day</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">December 2, 2024 (Monday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Feast of Immaculate Conception</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">December 8, 2024 (Sunday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Christmas Day</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">December 25, 2024 (Wednesday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Rizal Day</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">December 30, 2024 (Monday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">New Year's Day</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">January 1, 2025 (Wednesday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Chinese New Year</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">January 29, 2025 (Wednesday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">EDSA Revolution Anniversary</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">February 25, 2025 (Tuesday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Araw ng Kagitingan</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">April 9, 2025 (Wednesday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Maundy Thursday</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">April 17, 2025 (Thursday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Good Friday</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">April 18, 2025 (Friday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Black Saturday</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">April 19, 2025 (Saturday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Easter Sunday</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">April 20, 2025 (Sunday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Labor Day</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">May 1, 2025 (Thursday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Eid'l Adha (Feast of the Sacrifice)</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">June 6, 2025 (Friday)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Independence Day</td>
                                <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">June 12, 2025 (Thursday)</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </section>
            </div>
  
            <!-- asside -->
            <aside class="w-full md:w-1/3 sticky top-0 sm:mt-12">
              <div class="ml-2">
                <h2 class="mb-2 text-lg leading-6 font-medium text-purple-900 capitalize">On this page</h2>
                <hr class="mb-4 border-1 border-purple-800">
              </div>
              <ol class="relative ml-8 text-gray-500 border-s border-gray-200 dark:border-slate-600 dark:text-gray-400">
                <li 
                  class="mb-6 ms-6 cursor-pointer transition-colors duration-300" 
                  :class="step === 1 && 'text-slate-900'" 
                  @click="setStep(1)">
                  <span :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900', step === 3 ? 'bg-green-200 text-green-500 dark:bg-green-900 dark:text-green-400' : 'bg-gray-100 text-gray-500 dark:bg-slate-600 dark:text-gray-400']">
                    <v-icon>mdi-calendar</v-icon>
                  </span>
                  <h3 class="font-medium leading-tight">Holidays</h3>
                  <p class="text-sm">2024-2025</p>
                </li>
              </ol>
              <div class="ml-2">
                <h2 class="text-purple-900 text-lg font-medium mb-4">Related Links</h2>
                <hr class="mb-4 border-1 border-purple-800">
                <ul class="list-inside list-disc">
                  <li v-for="(item, index) in links" :key="index" class="mb-2 font-semibold">
                    <a :href="item.url" class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">{{ item.text }}</a>
                  </li>
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
  
    // Create a ref for the current step
    const step = ref(1); // Initially set to Step 1
  
    // Function to set the current step
    const setStep = (newStep) => {
    step.value = newStep;
    console.log(`Current step set to: ${newStep}`); // Debugging log
    };
  
    const links = ref([
      { text: 'Online Enrollment Guide', url: '/enrollment' },
      { text: 'Student ID Application', url: '/idApplication' },
      { text: 'Medical Information Form', url: 'https://docs.google.com/forms/d/e/1FAIpQLScZXZAGt2BnVhXl35xgSxLnj8CLWlcL0FImY2jz90PzJofpPw/viewform' }, 
      { text: 'Downloadable Registrar Forms', url: '/office/registrar' }, 
      { text: 'Guideline/Payment Procedure', url: '/office/accounting' }
    ]);
  
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