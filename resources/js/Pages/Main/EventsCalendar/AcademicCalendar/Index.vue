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
                  Regular Program
                </h1>
                <!-- Step 1 -->
                <div v-show="step === 1">
                  <div class="mb-8 relative px-2">
                    <div class="mb-8 pl-2">
                      <h1 class="mt-1 text-xl sm:text-2xl lg:text-3xl font-bold text-purple-900">ARELLANO UNIVERSITY SCHOOL OF LAW</h1>
                      <p class="text-lg sm:text-xl lg:text-2xl font-semibold text-purple-900">Amended Academic Year <span class="font-bold underline">2024-2025</span></p>
                    </div>
                    <div class="text-gray-700 pl-2 sm:pl-4">
                      <table class="w-full text-left mt-4">
                        <thead>
                          <tr>
                            <td colspan="3"><b class="text-gray-800 text-lg font-semibold py-2">First Semester</b></td>
                          </tr>
                        </thead>
                        <tbody class="bg-white text-slate-600">
                          <!-- First Semester Enrollment -->
                          <tr>
                            <td rowspan="7" class="text-gray-800 text-lg font-semibold py-2">Enrollment</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Freshmen</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">July 1, 2024</td>
                          </tr>
                          <tr>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Refresher</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">July 1, 2024</td>
                          </tr>
                          <tr>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Graduating Students (w/ remaining 27 units)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">July 10-11, 2024</td>
                          </tr>
                          <tr>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Fourth Year (w/ remaining 48 units)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">July 12-13, 2024</td>
                          </tr>
                          <tr>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Third Year</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">July 14-15, 2024</td>
                          </tr>
                          <tr>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Second Year</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">July 16-17, 2024</td>
                          </tr>
                          <tr>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">First Year (Old)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">July 18-19, 2024</td>
                          </tr>
    
                          <!-- First Semester Events -->
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Faculty Meeting</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">July 16, 2024</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Orientation For New Students</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">July 17, 2024</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t border-gray-400 text-gray-800 text-lg font-semibold py-2 italic">Classes Start</td>
                            <td class="border-t border-gray-400 border-gray-400 text-gray-800 text-lg font-semibold py-2 italic">July 20, 2024</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Last Day For Late Enrollment</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">August 2, 2024</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Last Day For Dropping (w/ retention)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">August 2, 2024</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Preliminary Examinations (4 weeks)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">August 17-23, 2024</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Mid-Term Examinations (10 weeks)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">September 28 - October 6, 2024</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Deadline For Submission Of Mid-Term Grades</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">October 20, 2024</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Final Examinations (18 weeks)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">November 16-24, 2024</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Deadline For Submission Of Final Grades</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">December 9, 2024</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Holiday Break</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Dec. 20, 2024 - Jan 2, 2025</td>
                          </tr>
    
                          <!-- Second Semester -->
                          <tr class="pt-6">
                            <td colspan="3" class="py-2 border-gray-400 text-gray-800 text-lg font-semibold"><hr class=""><b class="text-gray-800 text-lg font-semibold">Second Semester</b><hr class="border-t border-gray-400"></td>
                          </tr>
                          <tr>
                            <td rowspan="6" class="text-gray-800 text-lg font-semibold py-2">Enrollment</td>
                            <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">New Students & Transferees</td>
                            <td class="text-gray-700 text-lg font-normal hover:text-slate-900 py-2">December 3, 2024</td>
                          </tr>
                          <tr>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Graduating (w/ remaining 27 units)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">December 10-11, 2024</td>
                          </tr>
                          <tr>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Fourth Year (w/ remaining 48 units and below)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">December 12-13, 2024</td>
                          </tr>
                          <tr>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Third Year</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">December 14-15, 2024</td>
                          </tr>
                          <tr>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Second Year</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">December 16-17, 2024</td>
                          </tr>
                          <tr>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">First Year (Old Students)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">December 18-19, 2024</td>
                          </tr>
    
                          <!-- Second Semester Events -->
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Faculty Meeting</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">December 17, 2024</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Orientation For New Students</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">January 3, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t border-gray-400 text-lg font-semibold hover:text-slate-900 py-2 italic">Classes Start</td>
                            <td class="border-t border-gray-400 text-lg font-semibold hover:text-slate-900 py-2 italic">January 4, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Last Day For Late Enrollment</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">January 17, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Last Day For Dropping (w/ retention)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">January 17, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Preliminary Examinations (4 weeks)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">February 1-7, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Mid-Term Examinations (10 weeks)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">March 15-23, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Deadline For Submission Of Mid-Term Grades</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">April 6, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Graduating Fellowship/Seminar</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">April 5-6, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Final Examinations (Graduating)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">April 26 - May 4, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Deadline For Submission Of Final Grades</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">May 18, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Final Examinations (Non-Graduating) (18 weeks)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">May 5-11, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Deadline For Submission Of Final Grades</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">May 25, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Deliberation</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">May 30, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Graduation Day</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">June 5, 2025</td>
                          </tr>
    
                          <!-- Summer -->
                          <tr class="pt-6">
                            <td colspan="3" class="py-2"><hr class="border-t border-gray-400"><b class="text-lg font-semibold hover:text-slate-900 py-2">Summer</b><hr class="border-t border-gray-400"></td>
                          </tr>
                          <tr>
                            <td colspan="2" class="text-lg font-semibold hover:text-slate-900 py-2 italic">Enrollment</td>
                            <td class="text-lg font-semibold hover:text-slate-900 py-2 italic">May 17-18, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-lg font-semibold hover:text-slate-900 py-2 italic">Classes Start</td>
                            <td class="border-t text-lg font-semibold hover:text-slate-900 py-2 italic">May 19, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Final Examinations (6 weeks)</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">June 26-28, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Summer Classes End</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">June 28, 2025</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">Deadline For Submission Of Final Grades</td>
                            <td class="border-t text-gray-700 text-lg font-normal hover:text-slate-900 py-2">July 12, 2025</td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="mt-6 text-center">
                        <v-alert
                          v-model="alert"
                          border="start"
                          color="deep-purple-accent-4"
                          variant="tonal"
                        >
                          <a href="pdfs/acadcal24-25.pdf" class="flex items-center justify-center text-purple-900 hover:text-purple-700">
                            <v-icon class="mr-2">mdi-download</v-icon>See the original copy of the document.
                          </a>
                        </v-alert>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
  
            <!-- asside -->
            <aside class="w-full md:w-1/3 sticky top-0 sm:mt-12">
              <div class="ml-2">
                <h2 class="text-purple-900 text-lg font-medium mb-4">On this page</h2>
                <hr class="mb-4 border-1 border-purple-800">
              </div>
              <ol class="relative ml-8 text-gray-500 border-s border-gray-200 dark:border-slate-600 dark:text-gray-400">
                <li 
                  class="mb-6 ms-6 cursor-pointer transition-colors duration-300" 
                  :class="step === 1 && 'text-slate-900'" 
                  @click="setStep(1)">
                  <span :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900', step === 1 ? 'bg-green-200 text-green-500 dark:bg-green-900 dark:text-green-400' : 'bg-gray-100 text-gray-500 dark:bg-slate-600 dark:text-gray-400']">
                    <v-icon>mdi-calendar</v-icon>
                  </span>
                  <h3 class="font-medium leading-tight">Academic Year</h3>
                  <p class="text-sm">2024-2025</p>
                </li>
              </ol>
              <div class="ml-2">
                <h2 class="text-purple-900 text-lg font-medium mb-4">Related Links</h2>
                <hr class="mb-4 border-1 border-purple-800">
                <ul class="list-inside list-disc">
                  <li v-for="(item, index) in links" :key="index" class="mb-2 font-semibold">
                    <a :href="item.url" class="text-gray-700 text-lg font-normal hover:text-slate-900">{{ item.text }}</a>
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
  
    // Function to go to the next step
    const nextStep = () => {
    if (step.value < 3) {
      step.value++;
    }
    };
  
    // Function to go to the previous step
    const prevStep = () => {
    if (step.value > 1) {
      step.value--;
    }
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