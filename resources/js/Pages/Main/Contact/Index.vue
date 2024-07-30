<template>
    <MainLayout>
      <Head title="Enrollment Guide" />
      <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
          <div class="flex flex-col md:flex-row justify-between gap-8">
            <!-- Main content section -->
            <section class="w-full md:w-3/4 relative">
              <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start p-4 border-l-4 border-purple-900">
                Contact Us
              </h2>
              <!-- Step 1 -->
              <div v-show="step === 1">
                    <div class="bg-white border-none rounded-lg p-2 mb-6 relative">
                    <h2 class="text-xl sm:text-2xl text-left text-purple-900 font-bold mb-6 border-left">Contact Information</h2>
                    <div class="text-slate-600 leading-relaxed">
                        <p>Text here for details</p>
                        <div class="overflow-x-auto">
                            <v-table    
                            height="300px"
                            fixed-header
                        >
                            <thead>
                            <tr>
                                <th class="text-left">
                                    Department/Office
                                </th>
                                <th class="text-left">
                                    Local Numbers	
                                </th>
                                <th class="text-left">
                                    email address	
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr
                                v-for="item in desserts"
                                :key="item.name"
                            >
                                <td>{{ item.office }}</td>
                                <td>{{ item.local }}</td>
                                <td>{{ item.email }}</td>
                            </tr>
                            </tbody>
                        </v-table>
                        </div>
                    </div>
                    </div>
                </div>
  
              <!-- Step 2 -->
              <div v-show="step === 2">
                <div class="bg-white border-none rounded-lg p-2 mb-6 relative">
                  <h2 class="text-xl sm:text-2xl font-bold text-purple-900 mb-8">Campus Map</h2>
                  <div class="text-slate-600 leading-relaxed mb-8">
                    <img src="/images/contact/campus.jpg" alt="Step 2 Image" class="mb-8 font-medium mx-auto rounded-lg" />
                  </div>
                  <h2 class="text-xl sm:text-2xl font-bold text-purple-900 mb-8">Google Map</h2>
                  <div class="text-slate-600 leading-relaxed mb-4">
                    <!-- start google|facebook area -->
                    <div class="row px-2 py-2 mb-6">
                        <div class="google-maps shadow-xl rounded-lg">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.6906568880654!2d120.9925687736211!3d14.559674278080355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97bafba42c3%3A0x7859c5febabe4837!2sArellano%20University%20School%20of%20Law!5e0!3m2!1sen!2sph!4v1719103813103!5m2!1sen!2sph"
                            style="border:0;"
                            loading="lazy"
                        ></iframe>
                        </div>
                    </div>
                        <!-- end google|facebook area -->
                  </div>
                </div>
              </div>
  
              <!-- Step 3 -->
              <div v-show="step === 3">
                <div class="bg-white border-none rounded-lg p-4 mb-6 relative">
                  <h2 class="text-xl sm:text-2xl font-bold text-purple-900 mb-4">Social Media Page</h2>
                  <div class="text-slate-600 leading-relaxed">
                    <p>Content Here</p>
                  </div>
                </div>
              </div>
            </section>
  
            <aside class="w-full md:w-1/4 sticky top-0">
            <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                <div class="ml-4">
                <h2 class="mb-2 text-lg leading-6 font-bold text-purple-900 capitalize">On this page</h2>
                <hr class="mb-4 border-1 border-purple-800">
                </div>
                <ol class="relative ml-8 text-gray-500 border-s border-gray-200 dark:border-slate-600 dark:text-gray-400">
                <!-- Step 1 -->
                <li class="mb-10 ms-6 cursor-pointer transition-colors duration-300 hover:text-slate-900" :class="step === 1 && 'text-slate-900'" @click="setStep(1)">
                    <span :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white', step === 1 ? 'bg-green-200 text-green-500' : 'bg-gray-100 text-gray-500']">
                    <v-icon>mdi-email</v-icon>
                    </span>
                    <h3 class="font-medium leading-tight">Contact Form</h3>
                    <p class="text-sm">Send us a message</p>
                </li>
                <!-- Step 2 -->
                <li class="mb-10 ms-6 cursor-pointer transition-colors duration-300 hover:text-slate-900" :class="step === 2 && 'text-slate-900'" @click="setStep(2)">
                    <span :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white', step === 2 ? 'bg-green-200 text-green-500 ' : 'bg-gray-100 text-gray-500']">
                    <v-icon>mdi-map-marker</v-icon>
                    </span>
                    <h3 class="font-medium leading-tight">School Location</h3>
                    <p class="text-sm">Find us here</p>
                </li>
                <!-- Step 3 -->
                <li class="mb-10 ms-6 cursor-pointer transition-colors duration-300 hover:text-slate-900" :class="step === 3 && 'text-slate-900'" @click="setStep(3)">
                    <span :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white ', step === 3 ? 'bg-green-200 text-green-500' : 'bg-gray-100 text-gray-500']">
                    <v-icon>mdi-facebook</v-icon>
                    </span>
                    <h3 class="font-medium leading-tight">Social Media Links</h3>
                    <p class="text-sm">Follow us online</p>
                </li>
                </ol>
                <div class="ml-4">
                <h2 class="text-purple-900 text-lg font-medium mb-4">Related Links</h2>
                <hr class="mb-4 border-1 border-purple-800">
                <ul class="list-inside list-disc">
                    <li v-for="(item, index) in links" :key="index" class="mb-2 font-semibold">
                    <a :href="item.url" class="text-slate-700 text-lg font-normal text-gray-600 hover:text-slate-900">{{ item.text }}</a> 
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
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

// Create a ref for the current step
const step = ref(1); // Initially set to Step 1

// Function to set the current step
const setStep = (newStep) => {
  step.value = newStep;
  console.log(`Current step set to: ${newStep}`); // Debugging log
};


const desserts = ref([
  { office: 'Accounting Office', local: 13, email: 'accounting@arellanolaw.edu' },
]);


const links = ref([
  { text: 'Student ID Application', url: '/idApplication' },
  { text: 'AUSL Academic Calendar', url: 'acadCalendar' },
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


    
    .google-maps {
    min-width: 100%; /* Ensure a minimum width */
    height: 0;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    position: relative;
    overflow: hidden;
    }
    
    
    .google-maps iframe,
    .fb-bind iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
    .row {
        grid-template-columns: 1fr; /* Single column layout for mobile */
    }
    
    .google-maps,
    .fb-bind {
        padding-bottom: 56.25%; /* Maintain 16:9 aspect ratio for both */
    }
    }
</style>