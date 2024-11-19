<template>
  <div v-if="loading">
    <LoadingAnimation />
  </div>
  <div v-else>
    <MainLayout>
      <Head title="Main Page" />

      <Carousel :items="props.carousells" :banners="props.banners" />
      <Message />
      <Announcement :announcements="announcements" :events="props.events" />
      <Post :posts="posts" />
      <Gallery />
      <GoogleFacebook />
      <RelatedWeb />

      <!-- Cookie popup with animation, shown only if showCookiePopup is true -->
      <transition name="fade">
      <div v-if="showCookiePopup" class="cookie-popup fixed bottom-0 left-0 right-0 flex items-center justify-center py-4 z-50 mx-4 sm:mx-10">
        <div class="container mx-auto px-4 py-2 bg-white rounded-lg shadow-lg border border-official-purple-300">
          <div class="flex flex-wrap items-center justify-between">
            <div class="flex items-center px-[2px] w-full md:w-7/12 lg:w-2/3">
              <div class="md:mb-0">
                <h3 class="text-sm font-bold text-black flex items-center">
                  We use cookies
                  <img src="https://www.svgrepo.com/show/401340/cookie.svg" alt="Cookie" class="ml-2 h-6 w-6 mr-2">
                </h3>
                <p class="text-xs font-medium text-body-color">
                  We use cookies to ensure you get the best experience on ArellanoLaw.edu <br>
                  By continuing to browse our site, you are agreeing to our use of cookies. Find out more 
                  <a :href="route('privacy_policy')" class="text-official-purple-800 underline">Click here</a>
                </p>
              </div>
            </div>
            <div class="flex items-center w-full md:w-5/12 lg:w-1/3 justify-end space-x-3 pr-2">
              <button @click="acceptCookies" class="rounded-lg bg-official-purple-600 px-8 h-9 text-sm font-semibold
                text-white hover:bg-official-purple-500 focus:outline-none focus:ring-2
                focus:ring-official-purple-500 focus:ring-offset-2">Accept</button>
            </div>
          </div>
        </div>
      </div>
    </transition>

    </MainLayout>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import MainLayout from '@/Layouts/MainLayout.vue';
import Carousel from '@/Pages/Main/Home/Partials/Carousel.vue';
import Message from '@/Pages/Main/Home/Dean/Index.vue';
import LoadingAnimation from '@/Pages/Main/Home/Partials/LoadingAnimation.vue';
import Post from '@/Pages/Main/Home/Post/Index.vue';
import Announcement from '@/Pages/Main/Home/Announcement/Index.vue';
import Gallery from '@/Pages/Main/Home/Gallery/Index.vue';
import GoogleFacebook from '@/Pages/Main/Contact/Partials/GoogleFacebook.vue';
import RelatedWeb from '@/Pages/Main/Home/Partials/RelatedWeb.vue';

const loading = ref(true);
const showCookiePopup = ref(false); // Initially set to false

const acceptCookies = () => {
  showCookiePopup.value = false; // Hide the popup
  sessionStorage.setItem('cookiesAccepted', 'true'); // Set flag in session storage
};

const props = defineProps({
  posts: { type: Array, required: true },
  events: { type: Array, required: true },
  announcements: { type: Array, required: true },
  carousells: { type: Array, required: true },
  alumni: { type: Array, required: true },
  banners: { type: Array, required: true },
  onLoadBanners: { type: Array, required: true },
});

onMounted(() => {
  // Simulate loading time
  setTimeout(() => {
    loading.value = false;
    // Check if cookies have already been accepted this session
    if (!sessionStorage.getItem('cookiesAccepted')) {
      showCookiePopup.value = true; // Show popup if not accepted
    }
  }, 2000);
});
</script>

<style scoped>
/* Fade transition for the popup */
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s ease, transform 0.5s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
  transform: translateY(20px);
}
</style>
