<template>
  <div v-if="loading">
      <LoadingAnimation/>
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
    import MainLayout from '@/Layouts/MainLayout.vue';
    import Carousel from '@/Pages/Main/Carousel/Carousel.vue';
    import Message from '@/Pages/Main/Dean/Message.vue';
    import LoadingAnimation from '@/Pages/Main/Partials/LoadingAnimation.vue';
    import Post from '@/Pages/Main/Post/Post.vue';
    import Announcement from '@/Pages/Main/Announcement/Index.vue';
    import Gallery from './Gallery/Index.vue';
    import GoogleFacebook from './Contact/GoogleFacebook.vue';
    import Alumni from '@/Pages/Main/Alumni/Index.vue';
    
    const loading = ref(true);

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
        }, 2000); // Adjust the time as needed
    });
    </script>
    
    
    