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

                  <!-- Subject Offered Status -->
                  <div id="accordion-flush">
                    <div class="border-b border-gray-200">
                      <h2 id="accordion-flush-heading-1">
                        <button
                          type="button"
                          title="Click to Expand"
                          class="flex items-center justify-between w-full p-5 cursor-pointer gap-3 transition duration-200 hover:bg-gray-200"
                          @click="toggleExamAccordion('accordion-flush-body-exam')"
                        >
                          <span class="font-medium text-lg text-official-purple-800 transition duration-200 hover:text-official-purple-900">
                            Subject Offered Status As of: <span class="font-bold text-lg text-official-purple-900">December 13, 2024 [ 8:45am ]</span>
                          </span>
                          <svg
                            class="w-3 h-3 shrink-0"
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
                              :d="expandedItem === 'accordion-flush-body-exam' ? 'M1 1l4 4 4-4' : 'M9 5L5 1 1 5'"
                            />
                          </svg>
                        </button>
                      </h2>
                      <div
                        id="accordion-flush-body-exam"
                        class="transition-all duration-300 overflow-hidden"
                        :class="{ 'hidden': expandedItem !== 'accordion-flush-body-exam', 'block': expandedItem === 'accordion-flush-body-exam' }"
                      >
                      <div class="p-6">
                        <div class="responsive-iframe-container ">
                        <iframe 
                          src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQ47NVN7URV9-0nSYIYB7IECmT1__c0-YatkygbYo7CdChd3clxR8YgAuI-o8jgJW9TpbBPDAB-RHQc/pubhtml?gid=952579375&amp;single=true&amp;widget=true&amp;headers=false"
                          frameborder="0"
                          width="100%"
                          height="100%"
                        ></iframe>
                      </div>
                      </div>
                      </div>
                    </div>
                  </div>

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
                                  <img
                                  v-if="item.image && item.image.length"
                                  :src="item.image[0]"
                                  alt="Exam Image"
                                  class="w-full rounded-lg mb-4 object-cover cursor-zoom-in"
                                  @click="showLightbox(index)"
                                  />
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
  
              <!-- News and Announcement Section -->
              <div class="w-7xl px-2">
              <h1 class="text-official-purple-900 font-bold mb-4 mt-8 text-md sm:text-xl text-pretty text-start">
                Latest Deans Announcement
              </h1>
              <hr class="mb-4 border-1 border-official-purple-800">
              <div class="w-full">
                    <div v-for="dean in deans" :key="dean.id" id="news">
                      <div class="text-left flex items-justify mb-4">
                        <!-- Conditionally render dean.pubmat image -->
                        <div v-if="dean.pubmat" class="mr-0 hidden sm:block">
                          <img :src="dean.pubmat" alt="Image Logo" class="min-w-32 w-32 h-min max-h-100 mr-2">
                        </div>

                        <!-- Conditionally render fallback image -->
                        <div v-else class="relative w-32 mr-2 hidden sm:block">
                          <!-- Image -->
                          <img src="/images/announcement/announcementbg.jpg" alt="Announcement Image" class="w-full h-auto rounded-md">

                          <!-- Overlay for hover effect -->
                          <div class="absolute inset-0 opacity-50"></div>

                          <!-- Overlay text -->
                          <h1
                            class="absolute inset-0 flex items-center justify-center text-white text-xs font-bold px-2 text-center duration-300"
                          >
                            {{ dean.title.length > 26 ? dean.title.slice(0, 21) + '...' : dean.title }}
                          </h1>
                        </div>

                        <!-- Content section -->
                        <div class="ml-2">
                          <h3 class="text-official-purple-800 font-semibold text-md tracking-wide leading-6">
                            <a
                              :href="dean.category === 'Exam' ? `/exam/show/${dean.id}` : `/deans/show/${dean.id}`"
                              class="text-lg font-medium text-official-purple-900 hover:underline"
                              >
                                {{ dean.title }}
                            </a>                           
                          </h3>
                          <p class="text-slate-600">
                            {{ new Date(dean.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}
                          </p>
                          <div v-if="dean.content">
                            <p v-if="dean.content.length > 0">
                              <div class="text-slate-700 text-lg font-normal text-gray-600" v-html="dean.content.substring(0, 400)"></div>
                            </p>
                            <p v-else>{{ dean.content }}</p>
                          </div>
                          <a
                            :href="dean.category === 'Exam' ? `/exam/show/${dean.id}` : `/deans/show/${dean.id}`"
                            class="text-lg font-normal text-gray-700 mb-4 hover:text-official-purple-600 hover:underline"
                            >Read more
                          </a>                        
                        </div>
                      </div>

                    <hr class="mb-4 border-1 border-official-purple-200">
                    </div>
                    <!-- End Breadcrumb -->
                </div>
                </div>
            <!-- End News and Announcement Section -->  
            </div>
          </div>
        </main>
      </div>
    </MainLayout>
    <vue-easy-lightbox
  :visible="visible"
  :imgs="exam.map(item => item.image[0]).filter(img => img)" 
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

const showLightbox = (i) => {
  index.value = i;
  visible.value = true;
};

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
  