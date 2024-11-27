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
      <Countdown />
      <Gallery />
      <GoogleFacebook />
      <RelatedWeb />

      

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
import Countdown from './Countdown/Index.vue';

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
