<template>
  <MainLayout>
    <Head title="Show Post" />
    <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
      <main class="flex-grow">
        <div class="bg-white">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row w-full justify-center">
              <!-- Main content section -->
              <div class="w-full md:w-2/2 p-2">
                <h1 class="text-purple-900 font-bold mb-6 mt-8 text-xl sm:text-3xl text-pretty text-start">
                  {{ post.title }}
                </h1>
                <!-- Breadcrumb -->
                <nav class="bg-grey-light w-full rounded-md mb-6" aria-label="breadcrumb">
                  <ol class="list-reset flex">
                    <li><a href="#" class="text-neutral-500 hover:text-neutral-600 dark:text-neutral-200">Date Posted:</a></li>
                    <li><span class="mx-2 text-neutral-500 dark:text-neutral-200">{{ new Date(post.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}</span></li>
                  </ol>
                </nav>
                <div class="text-lg font-normal text-gray-600 mb-4 font-normal text-slate-700 mb-8">
                  <p v-html="post.content"></p>
                </div>
                <div v-if="post.link" class="relative mb-8 flex justify-center items-center bg-slate-100">
                  <div class="container">
                    <iframe frameborder="0" height="800" scrolling="no" :src="post.link + 'preview'" width="100%"></iframe>
                  </div>
                </div>

                <div v-if="post.image" class="relative mb-8 flex flex-col items-center bg-slate-100">
                  <div v-for="(image, index) in post.image" :key="index" class="w-full mb-4">
                    <img :src="image" alt="Post Image" class="object-cover w-full rounded-lg hover:cursor-zoom-in" @click="showLightbox(index)"/>
                  </div>
                </div>

                <!-- Breadcrumb -->
                <nav class="bg-grey-light w-full rounded-md mb-4" aria-label="breadcrumb" width="100%">
                  <ol class="list-reset flex">
                    <li><a href="#" class="text-neutral-500 hover:text-neutral-600 dark:text-neutral-200">Home</a></li>
                    <li><span class="mx-2 text-neutral-500 dark:text-neutral-200">/ {{post.title}}</span></li>
                  </ol>
                </nav>
                
              </div>
              <!-- End main content section -->
              <!-- Links, Events & Seminars --> 
              <div class="w-full md:w-1/3 p-2 flex justify-start">
                <div class="text-left">
                  <div class="mb-2 mt-10">
                    <button @click="shareToFacebook" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded flex items-center mb-4">
                      <svg width="800px" height="800px" viewBox="0 0 16 16" class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"><path fill="#1877F2" d="M15 8a7 7 0 00-7-7 7 7 0 00-1.094 13.915v-4.892H5.13V8h1.777V6.458c0-1.754 1.045-2.724 2.644-2.724.766 0 1.567.137 1.567.137v1.723h-.883c-.87 0-1.14.54-1.14 1.093V8h1.941l-.31 2.023H9.094v4.892A7.001 7.001 0 0015 8z"/><path fill="#ffffff" d="M10.725 10.023L11.035 8H9.094V6.687c0-.553.27-1.093 1.14-1.093h.883V3.87s-.801-.137-1.567-.137c-1.6 0-2.644.97-2.644 2.724V8H5.13v2.023h1.777v4.892a7.037 7.037 0 002.188 0v-4.892h1.63z"/></svg>
                      Share on Facebook
                    </button>
                    <h1 class="text-purple-900 text-lg font-medium mb-4">See Also</h1>
                    <hr class="mb-4 border-1 border-purple-900">
                    <ul class="list-inside list-disc">
                      <li v-for="(item, index) in links" :key="index" class="mb-2">
                        <a :href="item.url" class="text-slate-700 text-lg font-normal text-gray-600 hover:text-slate-900">{{ item.text }}</a>   
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- End Links, Events & Seminars -->
            </div>

            <!-- News and Announcement Section -->
            <div class="w-7xl px-2">
            <h1 class="text-purple-900 font-bold mb-4 mt-8 text-md sm:text-xl text-pretty text-start">
              Latest Announcement
            </h1>
            <hr class="mb-4 border-1 border-purple-800">
            <div class="announcement-carousel owl-carousel owl-theme">
              <div
                v-for="(announcement, index) in announcements || []"
                :key="announcement?.id || index"
                class="item w-100 sm:w-72"
              >
                <div class="overflow-hidden mb-4 flex flex-col h-full relative card">
                  <div class="overflow-hidden rounded-lg relative group">
                  <a :href="`/announcement/show/${announcement.id}`" class="block relative group">
                    <img src="/images/announcement/announcementbg.jpg" alt="Announcement Image" class="w-full h-100 object-cover">
                    <!-- Overlay for hover effect -->
                    <div class="overlay"></div>
                  </a>
                  <a :href="`/announcement/show/${announcement.id}`" class="absolute inset-0 text-white text-sm flex items-end p-4">
                      <h1
                        class="w-full text-center py-36 sm:py-20 text-3xl sm:text-xl font-bold cursor-pointer opacity-100 group-hover:opacity-100 transition-opacity duration-300"
                      >
                        {{ announcement.category }}
                      </h1>
                    </a>
                  </div>
                  <div class="p-4 flex flex-col flex-grow justify-between">
                    <a
                      :href="announcement ? `/announcement/show/${announcement.id}` : '#'"
                      class="font-bold text-lg text-left text-gray-800 hover:text-purple-900 cursor-pointer"
                    >{{ announcement?.title || 'No Title Available' }}</a>
                    <p class="text-gray-600 mt-2 text-left text-lg">{{ announcement ? new Date(announcement.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) : '' }}</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Breadcrumb -->
          </div>
          <!-- End News and Announcement Section -->  
          </div>
        </div>
      </main>
    </div>
  </MainLayout>
  <vue-easy-lightbox
        :visible="visible"
        :imgs="post.image"
        :index="index"
        @hide="handleHide"
    />
</template>

<script setup>
  import { Link, Head } from '@inertiajs/vue3';
  import { defineProps } from 'vue';
  import { ref } from 'vue';
  import MainLayout from '@/Layouts/MainLayout.vue';
  import { onMounted } from 'vue';
  import VueEasyLightbox from 'vue-easy-lightbox';

  const props = defineProps({
    post: {
      type: Array,
      required: true
    },
    announcements: {
      type: Array,
      required: true
    }
  });

  const visible = ref(false);
  const index = ref(0);

  const showLightbox = (i) => {
      index.value = i;
      visible.value = true;
  };

  const handleHide = () => {
      visible.value = false;
  };

  const links = ref([
    { text: 'Latest Announcement', url: '#' },
    { text: 'Upcoming Events', url: '#event2' },
    { text: 'Related Article', url: '#event3' },
    { text: 'Related Article', url: '#event4' },
    { text: 'Related Article', url: '#event5' }
  ]);

  const formattedDate = (date) => {
  return new Date(date).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
};

onMounted(() => {
    if (typeof $ !== 'undefined') {
      const owlCarousel = $('.announcement-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
          0: { 
            items: 1,
            center: true, // Centering the single item on mobile
          },
          600: { items: 2 },
          800: { items: 3 },
          1000: { items: 4 }
        }
      });
  
      // Pause autoplay on mouseover
      $('.announcement-carousel').on('mouseover', function() {
        owlCarousel.trigger('stop.owl.autoplay');
      });
  
      // Resume autoplay on mouseleave
      $('.announcement-carousel').on('mouseleave', function() {
        owlCarousel.trigger('play.owl.autoplay', [5000]);
      });
    } else {
      console.error('jQuery is not loaded');
    }
  });

  const shareToFacebook = () => {
    const url = encodeURIComponent(window.location.href);
    const fbShareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
    window.open(fbShareUrl, '_blank', 'width=600,height=400');
  };
</script>

<style scoped>
.container {
  width: 100%;
  height: 100vh;
  overflow: hidden;
}
</style>
