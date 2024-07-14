<template>
    <MainLayout>
      <Head title="ID Application" />
      <main class="flex-grow">
        <div class="container mx-auto px-4 py-4 lg:py-8">
          <div class="flex flex-col md:flex-row justify-between gap-8">
            <!-- Main content section -->
            <section class="w-full md:w-3/4 overflow-y-auto h-screen relative">
            <!-- Step 1 -->
            <div v-show="step === 1">
                <div class="bg-white border-none shadow-lg rounded-lg mb-6 relative">
                <h2 class="text-2xl sm:text-2xl font-bold text-purple-900 mb-4 capitalize">Student ID Application and Releasing Procedures</h2>
                <blockquote class="text-gray-700 pl-2 sm:pl-4 flex flex-wrap items-center">
                    <div class="w-full md:w-2/3">
                    <p align="justify" class="mb-4"><span class="font-semibold">STEP 1.</span> Completely fill up and submit the online application at: <a href="https://arellanolaw.edu/ausl-id" class="text-purple-700 underline">https://arellanolaw.edu/ausl-id.</a></p>
                    <p align="justify" class="mb-4"><span class="font-semibold">STEP 2.</span> After submitting the form, your application will be validated. Once application is confirmed, the student will receive a confirmation email that the student ID is ready for release.</p>
                    <p align="justify" class="mb-4"><span class="font-semibold">STEP 3.</span> To claim the ID, proceed to the IT Center, 3rd floor Admin Bldg. and present your confirmation email.</p>
                    <p align="justify" class="mb-4">If your Student ID will be claimed by another person or via courier delivery services, please provide an Authorization letter with photocopy of Government Issued ID of the student and the authorized representative.</p>
                    </div>
                    <div class="w-full md:w-1/3 flex justify-end">
                        <a href="https://arellanolaw.edu/ausl-id" target="IDapp">
                            <img src="https://via.placeholder.com/220" width="220" class="mr-4 mb-4 rounded-lg" alt="ID Application Image" />
                        </a>
                    </div>
                </blockquote>
                </div>
            </div>
            </section>

            <aside class="w-full md:w-1/4 sticky top-0 p-6">
                <div class="ml-4">
                    <h2 class="mb-2 text-md leading-6 font-bold text-purple-900 capitalize leading-tight">Student ID</h2>
                    <hr class="mb-4 border-1 border-purple-800">
                </div>
                <ol class="relative ml-8 text-gray-500 border-s border-gray-200 dark:border-slate-600 dark:text-gray-400">
                    <li class="mb-10 ms-6 cursor-pointer transition-colors duration-300 hover:text-slate-900" :class="step === 1 && 'text-slate-900'" @click="setStep(1)">
                        <span :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900', step === 1 ? 'bg-green-200 text-green-500 dark:bg-green-900 dark:text-green-400' : 'bg-gray-100 text-gray-500 dark:bg-slate-600 dark:text-gray-400']">
                            <v-icon>mdi-check</v-icon>
                        </span>
                        <h3 class="font-medium leading-tight">Steps</h3>
                        <p class="text-sm">Application and releasing procedures</p>
                    </li>
                </ol>
                <div class="ml-4">
                    <h2 class="mb-2 text-md leading-6 font-bold text-purple-900 capitalize leading-tight">Related Links</h2>
                    <hr class="mb-4 border-1 border-purple-800">
                    <ul class="list-inside list-disc">
                      <li v-for="(item, index) in links" :key="index" class="mb-2 font-semibold">
                        <a :href="item.url" class="py-1 text-sm text-slate-600 hover:text-slate-900">{{ item.text }}</a>
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
  { text: 'AUSL Academic Calendar', url: '/acadCalendar' },
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