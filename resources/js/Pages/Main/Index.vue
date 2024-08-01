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
      <Announcement />
      <Gallery />
      <!-- <Alumni class="my-4" :items="props.alumni" /> -->
      <GoogleFacebook />
    </MainLayout>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import MainLayout from '@/Layouts/MainLayout.vue';
import Carousel from '@/Pages/Main/Carousel/Carousel.vue';
import Message from '@/Pages/Main/Dean/Message.vue';
import LoadingAnimation from '@/Pages/Main/Partials/LoadingAnimation.vue';
import Post from '@/Pages/Main/Post/Post.vue';
import Announcement from '@/Pages/Main/Announcement/Index.vue';
import Gallery from './Gallery/Index.vue';
import GoogleFacebook from './Contact/GoogleFacebook.vue';
// import Alumni from '@/Pages/Main/Alumni/Index.vue';

const loading = ref(true);

const screenWidth = ref(window.innerWidth);

const updateScreenSize = () => {
  screenWidth.value = window.innerWidth;
};

const showAlert = () => {
  Swal.fire({
    title: 'Enrollment Going On!',
    text: 'Would you like to enroll now?',
    icon: 'info',
    showCancelButton: true,
    confirmButtonText: 'Enroll Now',
    cancelButtonText: 'Cancel'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'https://aims.arellanolaw.edu/aims/applicants/';
    } else {
      console.log('Enrollment canceled');
    }
  });
};

// Define props here
const props = defineProps({
  posts: {
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
