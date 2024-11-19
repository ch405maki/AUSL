<template>
    <MainLayout>
      <Head title="Enrollment Guide" />
      <div class="relative mb-4">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.6906568880654!2d120.9925687736211!3d14.559674278080355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97bafba42c3%3A0x7859c5febabe4837!2sArellano%2University%20School%20of%20Law!5e0!3m2!1sen!2sph!4v1719103813103!5m2!1sen!2sph"
          style="border:0; width: 100%; height: 300px;"
          loading="lazy"
        ></iframe>
        <div class="absolute inset-0 bg-black opacity-20 pointer-events-none"></div>
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
          <h1 class="text-white text-2xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold text-center">
            <span>School Location</span>
          </h1>
        </div>
      </div>
      <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 py-2 lg:py-8">
          <div class="flex flex-col md:flex-row justify-between gap-8">
            <!-- Main content section -->
            <section class="w-full md:w-3/4 relative ml-2">
                <div>
                <h2 class="text-official-purple-600 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                  School Location
                </h2>
                <div class="bg-white border-none rounded-lg mb-6 relative">
                  <h2 class="text-official-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">Address</h2>
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
                  <h2 class="text-official-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">Campus Map</h2>
                  <div class="text-slate-600 leading-relaxed mb-8">
                    <div v-for="(image, index) in images" :key="index" @click="openLightbox(index)">
                      <img :src="image" 
                        class="cursor-pointer w-full max-w-[200px] md:max-w-[300px] lg:max-w-[300px] h-auto" 
                        style="aspect-ratio: 4 / 5;" 
                        />
                    </div>
                </div>
                </div>
              </div>
            </section>
  
            <aside class="w-full md:w-1/4 sticky top-0">
            <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
              <div class="ml-4">
                <h2 class="mb-4 text-lg leading-6 font-medium text-official-purple-900 capitalize">On this page</h2>
                <hr class="mb-4 border-1 border-official-purple-800">
                <h3 class="text-lg font-normal text-gray-800 mb-8">School Location</h3>
              </div>
                <div class="ml-4">
                <h2 class="text-official-purple-900 text-lg font-medium mb-4">Related Links</h2>
                <hr class="mb-4 border-1 border-official-purple-800">
                <ul class="list-inside list-disc">
                    <RelatedLinks />
                </ul>
                </div>
            </div>
            </aside>
        </div>
      </div>
    </main>
    <VueEasyLightbox
    :visible="showLightbox"
    :imgs="images"
    :index="currentImage"
    @hide="showLightbox = false"
    />
  </MainLayout>
</template>

<script setup>
import { ref } from 'vue';
import { reactive, onMounted, onBeforeUnmount } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import RelatedLinks from './Components/RelatedLinks.vue';
import VueEasyLightbox from 'vue-easy-lightbox';

const isMobile = reactive({ value: window.innerWidth <= 768 });

const showLightbox = ref(false);
const currentImage = ref(0);

const images = [
"/images/contact/campus.jpg",
];

function openLightbox(index) {
currentImage.value = index;
showLightbox.value = true;
}

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