<template>
    <MainLayout>
      <Head title="Enrollment Guide" />
      <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
          <div class="flex flex-col md:flex-row justify-between gap-8">
            <!-- Main content section -->
            <section class="w-full md:w-3/4 relative ml-2">
              <!-- Step 1 -->
              <div v-show="step === 1">
                <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                  Contact Us
                </h2>
                  <div class="bg-white border-none rounded-lg  mb-6 relative">
                    <div class="bg-white border-none rounded-lg mb-6 relative">
                    <div class="flex flex-col sm:flex-row items-center justify-between mb-6">
                      <h2 class="text-lg sm:text-xl text-left text-gray-700 font-bold mb-4 sm:mb-0">Contact Information</h2>
                      <div class="relative sm:ml-auto">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative">
                          <div class="absolute inset-y-0 left-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-900" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                          </div>
                          <input type="text" id="table-search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-purple-500 focus:border-purple-500" placeholder="Search for Contact Information">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-slate-600 leading-relaxed">
                      <div class="overflow-x-auto">
                        <v-table    
                          height="500px"
                          fixed-header
                        >
                          <thead>
                            <tr>
                              <th class="text-gray-700 text-lg font-normal hover:text-slate-900">
                                Department/Office
                              </th>
                              <th class="text-gray-700 text-lg text-center font-normal hover:text-slate-900">
                                Local Numbers
                              </th>
                              <th class="text-gray-700 text-lg font-normal hover:text-slate-900" v-if="!isMobile">
                                Email Address
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="item in contact" :key="item.name" class="hover:bg-purple-100 hover:bg-round-lg whitespace-nowrap">
                              <td class="text-gray-700 text-lg font-normal whitespace-nowrap py-2">
                                {{ item.office }}
                                <br v-if="isMobile">
                                <span v-if="isMobile" class="flex items-center">
                                  {{ item.email }}
                                </span>
                              </td>
                              <td class="text-gray-700 text-lg font-medium text-center whitespace-nowrap">
                                {{ item.local }}
                              </td>
                              <td v-if="!isMobile" class="text-gray-700 text-lg font-normal whitespace-nowrap">
                                <span class="flex items-center">
                                  <v-icon>mdi-email</v-icon>
                                  {{ item.email }}
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </v-table>
                      </div>
                  </div>
                  </div>
              </div>
  
              <!-- Step 2 -->
              <div v-show="step === 2">
                <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                  School Location
                </h2>
                <div class="bg-white border-none rounded-lg mb-6 relative">
                  <h2 class="text-lg sm:text-xl font-bold text-gray-700 mb-8">Address</h2>
                  <div class="text-slate-600 leading-relaxed mb-8">
                    <div class="flex items-center">
                    <div class="shrink-0 flex items-center text-slate-700">
                      <Link :href="route('main')" class="flex items-center">
                        <img src="/images/alflogo.png" alt="Image Logo" class="max-w-full h-full max-h-16 mr-2 transition-transform duration-300 transform hover:scale-105">
                      </Link>
                      <div class="ml-4">
                        <div class="uppercase font-bold text-lg tracking-wide leading-tight">ARELLANO LAW FOUNDATION</div>
                        <div class="text-lg font-normal text-gray-600 hover:text-slate-900 text-warp">
                          Taft Avenue Corner Menlo Street, Pasay City, Metro Manila, Philippines.
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  <h2 class="text-lg sm:text-xl font-bold text-gray-700 mb-8">Campus Map</h2>
                  <div class="text-slate-600 leading-relaxed mb-8">
                    <img src="/images/contact/campus.jpg" alt="Step 2 Image" class="mb-8 font-medium mx-auto rounded-lg" />
                  </div>
                  <h2 class="text-lg sm:text-xl font-bold text-gray-700 mb-8">Google Map</h2>
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
                <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                  Social Media Page
                </h2>
                <div class="bg-white border-none rounded-lg relative">
                  <!-- Social Media Links -->
                  <h2 class="text-slate-700 font-bold my-8 text-lg sm:text-xl text-pretty text-start">Follow us</h2>
                  <ul class="text-slate-700">
                  <li
                    v-for="link in socialMediaLinks"
                    :key="link.name"
                    class="mb-4 flex items-center"
                  >
                    <a
                      :href="link.url"
                      :class="link.hoverClass"
                      class="
                          text-slate-700
                          text-lg font-normal
                          text-gray-600 
                          hover:text-slate-900 
                          hover:underline cursor-pointer 
                          flex items-center 
                          transition-transform 
                          duration-300 
                          ease-in-out 
                          transform 
                          hover:scale-110"
                        >
                      <img
                        :src="link.logo"
                        alt=""
                        class="w-10 h-10 mr-2 transition-transform duration-300 ease-in-out transform hover:scale-110"
                      />
                      <span>{{ link.name }}</span>
                    </a>
                  </li>
                </ul>
                </div>
              </div>
            </section>
  
            <aside class="w-full md:w-1/4 sticky top-0">
            <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                <div class="ml-4">
                <h2 class="mb-2 text-lg leading-6 font-medium text-purple-900 capitalize">On this page</h2>
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


const contact = ref([
  { office: 'Accounting Office', local: 13, email: 'accounting@arellanolaw.edu' },
  { office: 'Admissions Office 1', local: 33, email: 'admissions@arellanolaw.edu' },
  { office: 'Admissoins Office 2', local: 51, email: 'admissions@arellanolaw.edu' },
  { office: 'Alumni Office', local: 32, email: 'alumni@arellanolaw.edu' },
]);


const links = ref([
  { text: 'Student ID Application', url: '/idApplication' },
  { text: 'AUSL Academic Calendar', url: 'acadCalendar' },
  { text: 'Medical Information Form', url: 'https://docs.google.com/forms/d/e/1FAIpQLScZXZAGt2BnVhXl35xgSxLnj8CLWlcL0FImY2jz90PzJofpPw/viewform' }, 
  { text: 'Downloadable Registrar Forms', url: '/office/registrar' }, 
  { text: 'Guideline/Payment Procedure', url: '/office/accounting' }
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
const socialMediaLinks = [
  {
    name: "AUSL Facebook Page",
    url: "https://www.facebook.com/AUSLchiefs",
    logo: "/images/contact/social/AUSL.png",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "OSA Facebook Page",
    url: "https://www.facebook.com/AUSLOfficeofStudentAffairs",
    logo: "/images/contact/social/OSA.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Audio Visual Facebook Page",
    url: "https://www.facebook.com/avausl",
    logo: "/images/contact/social/AUSL.png",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Student Government",
    url: "https://www.facebook.com/AUSLSG",
    logo: "/images/contact/social/ALSG.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Singers",
    url: "https://www.facebook.com/arellanolawsingers",
    logo: "/images/contact/social/ALS.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Hotel Ops and Marshall",
    url: "https://www.facebook.com/arellanolawHOM",
    logo: "/images/contact/social/HOM.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Forensic Guild",
    url: "https://www.facebook.com/alfgpage",
    logo: "/images/contact/social/AFG.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Gazette",
    url: "https://www.facebook.com/GazetteAUSL",
    logo: "/images/contact/social/GAZETTE.png",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Commission On Election",
    url: "https://www.facebook.com/arellanolawcomelec",
    logo: "/images/contact/social/ALC.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Chiefs Environmental Society",
    url: "https://www.facebook.com/ausl.aces",
    logo: "/images/contact/social/ACES.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Tactical Society",
    url: "https://www.facebook.com/profile.php?id=61562394412215",
    logo: "/images/contact/social/ALTS.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Bar Operations",
    url: "https://facebook.com/auslbaroperations",
    logo: "/images/contact/social/BAROPS.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Athletics Society",
    url: "https://www.facebook.com/AUSLchiefs22",
    logo: "/images/contact/social/AUSLCHIEFS.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Golf Club",
    url: "https://www.facebook.com/profile.php?id=61559868311215",
    logo: "/images/contact/social/ALGC.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law PEERS",
    url: "https://www.facebook.com/AUSLPeers",
    logo: "/images/contact/social/PEERS.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Academic Society",
    url: "https://www.facebook.com/alas.arellanolaw",
    logo: "/images/contact/social/ALAS.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "AUSL YouTube Channel",
    url: "https://www.youtube.com/@AUSLofficial",
    logo: "/images/contact/social/youtube.png",
    hoverClass: "hover:text-red-600"
  }
];
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

  .iframe-container {
  position: relative;
  width: 100%;
  padding-bottom: 56.25%; /* 16:9 aspect ratio (9 / 16 * 100) */
  height: 0;
  overflow: hidden;
}

.iframe-container iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}
</style>