<template>
    <MainLayout>
      <Head title="Show Post" />
      <div class="flex flex-col min-h-screen bg-gray-100">
        <main class="flex-grow">
          <div class="">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="flex flex-col md:flex-row w-full justify-center">
                <!-- Main content section -->
                <div class="w-full md:w-2/2 p-2">
                  <h1 class="text-official-purple-900 font-bold mb-6 mt-8 text-xl sm:text-3xl text-pretty text-start">
                    {{ post.title }}
                  </h1>
                  <!-- Breadcrumb -->
                  <nav class="bg-grey-light w-full rounded-md mb-6" aria-label="breadcrumb">
                    <ol class="list-reset flex">
                      <li><a href="#" class="text-neutral-500 hover:text-neutral-600 ">Date Posted:</a></li>
                      <li><span class="mx-2 text-neutral-500">{{ new Date(post.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}</span></li>
                    </ol>
                  </nav>
                  
                  <div id="accordion-flush">
                    <div v-for="(item, index) in exam" :key="item.id" class="border-b border-gray-200">
                        <h2 :id="`accordion-flush-heading-${item.id}`">
                            <button
                                type="button"
                                @click="toggleAccordion(item.id)"
                                :aria-expanded="expandedItem === item.id"
                                :aria-controls="`accordion-flush-body-${item.id}`"
                                title="Click to Expand"
                                class="flex items-center justify-between w-full p-5 cursor-pointer gap-3 transition duration-200 hover:bg-gray-200 cursor-pointer "
                                >
                                <span
                                    class="font-medium text-lg text-official-purple-800 transition duration-200 hover:text-official-purple-900"
                                >
                                    {{ item.title }}
                                </span>
                                <svg
                                    :class="expandedItem === item.id ? 'rotate-180' : ''"
                                    class="w-3 h-3 transition-transform duration-200 shrink-0"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6"
                                >
                                    <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5 5 1 1 5"
                                    />
                                </svg>
                            </button>
                        </h2>
                            <div
                              :id="`accordion-flush-body-${item.id}`"
                              class="transition-all duration-300"
                              v-show="expandedItem === item.id"
                              >
                              <div class="py-5">
                                  <!-- Render images with zoom-in cursor -->
                                  <div
                                    v-if="item.image && item.image.length"
                                    class="space-y-4"
                                  >
                                    <img
                                      v-for="(img, imgIndex) in item.image"
                                      :key="imgIndex"
                                      :src="img"
                                      class="w-full rounded-lg cursor-zoom-in"
                                      @click="openExamLightbox(item.image, imgIndex)"
                                    />
                                  </div>

                                  <p class="mb-2 text-gray-500 dark:text-gray-400">
                                  {{ item.content || '' }}
                                  </p>
                              </div>
                            </div>
                        </div>
                    </div>

                  <!-- Breadcrumb -->
                  <nav class="bg-grey-light w-full rounded-md mb-4 mt-10" aria-label="breadcrumb" width="100%">
                    <ol class="list-reset flex">
                      <li><a href="#" class="text-neutral-500 hover:text-neutral-600">Home</a></li>
                      <li><span class="mx-2 text-neutral-500">/ {{post.title}}</span></li>
                    </ol>
                  </nav>
                  
                </div>
                <!-- End main content section -->
                <!-- Links, Events & Seminars --> 
                <div class="w-full md:w-1/3  flex justify-start">
                  <div class="text-left">
                    <div class="mb-2 mt-10">
                    <div class="ml-4">
                      <button @click="shareToFacebook" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded flex items-center mb-4">
                        <svg width="800px" height="800px" viewBox="0 0 16 16" class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"><path fill="#1877F2" d="M15 8a7 7 0 00-7-7 7 7 0 00-1.094 13.915v-4.892H5.13V8h1.777V6.458c0-1.754 1.045-2.724 2.644-2.724.766 0 1.567.137 1.567.137v1.723h-.883c-.87 0-1.14.54-1.14 1.093V8h1.941l-.31 2.023H9.094v4.892A7.001 7.001 0 0015 8z"/><path fill="#ffffff" d="M10.725 10.023L11.035 8H9.094V6.687c0-.553.27-1.093 1.14-1.093h.883V3.87s-.801-.137-1.567-.137c-1.6 0-2.644.97-2.644 2.724V8H5.13v2.023h1.777v4.892a7.037 7.037 0 002.188 0v-4.892h1.63z"/></svg>
                        Share on Facebook
                      </button>
                      
                      <h2 class="mb-4 text-lg leading-6 font-medium text-official-purple-900 capitalize">On this page</h2>
                      <hr class="mb-4 border-1 border-official-purple-800">
                          <h3 class="text-lg font-normal text-gray-800 mb-8">Deans Announcement</h3>
                      </div>
                      <div class="ml-4">
                      <h2 class="text-official-purple-900 text-lg font-medium mb-4">Related Links</h2>
                      <hr class="mb-4 border-1 border-official-purple-800">
                      <ul class="list-inside list-disc">
                          <RelatedLinks />
                      </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Links, Events & Seminars -->
              </div>
            <!-- End News and Announcement Section --> 
            </div>
          </div>
        </main>
      </div>
    </MainLayout>
    <vue-easy-lightbox
      :visible="visible"
      :imgs="lightboxImages"
      :index="index"
      @hide="handleHide"
    />
  </template>
  
<script setup>
import { Link, Head } from '@inertiajs/vue3';
import { defineProps, ref, onMounted } from 'vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import VueEasyLightbox from 'vue-easy-lightbox';
import RelatedLinks from '@/Pages/Main/Home/Partials/RelatedLinks.vue';

/**
 * Component props
 */
const props = defineProps({
  post: {
    type: Array,
    required: true,
  },
  exam: { 
    type: Array, 
    required: true, 
  },
  deans: { 
    type: Array, 
    required: true, 
  },
});
// Lightbox
const visible = ref(false);
const index = ref(0);
const lightboxImages = ref([])


const openExamLightbox = (images, startIndex = 0) => {
  lightboxImages.value = images
  index.value = startIndex
  visible.value = true
}


const handleHide = () => {
  visible.value = false;
};

// Date Formatting
const formattedDate = (date) => {
  return new Date(date).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
};

// Owl Carousel
onMounted(() => {
  try {
    // ...
  } catch (error) {
    console.error('Owl Carousel initialization failed:', error);
  }
});

// Social Media Sharing
const shareToFacebook = () => {
  try {
    const url = encodeURIComponent(window.location.href);
    const fbShareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
    window.open(fbShareUrl, '_blank', 'width=600,height=400');
  } catch (error) {
    console.error('Facebook sharing failed:', error);
  }
};

// Accordion
const expandedItem = ref(null);

const toggleAccordion = (id) => {
  expandedItem.value = expandedItem.value === id ? null : id;
};


// Method to toggle the accordion
const toggleExamAccordion = (id) => {
  expandedItem.value = expandedItem.value === id ? null : id;
};
</script>

  
  <style scoped>
  .container {
    width: 100%;
    height: 100vh;
    overflow: hidden;
  }

  .responsive-iframe-container {
    position: relative;
    width: 100%;
    padding-bottom: 66.25%; 
  }

  .responsive-iframe-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
  }
  </style>
  