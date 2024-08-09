<template>
  <div v-if="loading">
    <LoadingAnimation />
  </div>
  <div v-else>
    <MainLayout>
      <Head title="Main Page" />

      <Carousel :items="props.carousells" :banners="props.banners" />
      <Message />
      <Post :posts="posts" />
      <Announcement :announcements="announcements" />
      <Gallery />
      <!-- <Alumni class="my-4" :items="props.alumni" /> -->
      <!-- <GoogleFacebook /> -->
      <RelatedWeb />

      <div v-if="showCookiePopup" class="fixed bottom-0 right-0 mb-4 mr-4 w-64">
        <div class="bg-white rounded-lg shadow-lg p-4">
          <div class="flex items-center justify-between mb-2">
            <div class="flex items-center">
              <img src="https://www.svgrepo.com/show/401340/cookie.svg" alt="Cookie" class="h-6 w-6 mr-2">
              <span class="text-gray-700 font-bold text-sm">Cookie Policy</span>
            </div>
            <button @click="closeCookiePopup" class="text-gray-500 hover:text-gray-700 focus:outline-none">
              <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
          <p class="text-gray-600 text-sm">
            We use cookies to enhance your experience. By continuing to visit this site, you agree to our use of cookies.
          </p>
          <button @click="closeCookiePopup" class="mt-4 bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">
            Accept
          </button>
        </div>
      </div>
    </MainLayout>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import MainLayout from '@/Layouts/MainLayout.vue';
import Carousel from '@/Pages/Main/Home/Partials/Carousel.vue';
import Message from '@/Pages/Main/Home/Dean/Message.vue';
import LoadingAnimation from '@/Pages/Main/Home/Partials/LoadingAnimation.vue';
import Post from '@/Pages/Main/Home/Post/Index.vue';
import Announcement from '@/Pages/Main/Home/Announcement/Index.vue';
import Gallery from '@Pages/Main/Home/Gallery/Index.vue';
import GoogleFacebook from '@Pages/Main/Contact/Prtials/GoogleFacebook.vue';
import RelatedWeb from '@Pages/Main/Home/Partials/RelatedWeb.vue';
// import Alumni from '@/Pages/Main/Alumni/Index.vue';

const loading = ref(true);
const showCookiePopup = ref(false);

const screenWidth = ref(window.innerWidth);

const updateScreenSize = () => {
  screenWidth.value = window.innerWidth;
};

const showAlert = () => {
  // Assuming you want to show an alert for the first banner in the list
  const banner = props.onLoadBanners[0]; // Adjust as needed to select the appropriate banner

  Swal.fire({
    title: banner.title || 'Default Title',
    text: banner.text || 'Default Text',
    icon: banner.icon || 'info',
    showCancelButton: true,
    confirmButtonText: banner.confirmButtonText || 'Confirm',
    cancelButtonText: banner.cancelButtonText || 'Cancel',
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = banner.url || '';
    } else {
      console.log('Action canceled');
    }
    showCookiePopup.value = true;
  });
};

const closeCookiePopup = () => {
  showCookiePopup.value = false;
};

// Define props here
const props = defineProps({
  posts: {
    type: Array,
    required: true
  },
  announcements: {
    type: Array,
    required: true
  },
  carousells: {
    type: Array,
    required: true
  },
  alumni: { 
    type: Array, 
    required: true 
  },
  banners: { 
    type: Array, 
    required: true 
  },
  onLoadBanners: { 
    type: Array, 
    required: true 
  },
});

onMounted(() => {
  // Simulate loading time
  setTimeout(() => {
    loading.value = false;
    
    // Execute remaining onMounted logic after loading is complete
    updateScreenSize();
    window.addEventListener('resize', updateScreenSize);
    
    showAlert();
  }, 2000); // Adjust the time as needed
});
</script>

<style scoped>
/* Add any additional styles if necessary */
</style>
