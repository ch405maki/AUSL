<template>
    <MainLayout>
        <Head title="Main Page" />
        <div v-if="loading">
            <LoadingAnimation/>
        </div>
        <div v-else>
            <Carousel :items="props.carousells" />
            <Message />
            <Post :posts="posts" />
            <Announcement />
            <Gallery />
            <GoogleFacebook />
        </div>
    </MainLayout>
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
    });


    onMounted(() => {
        // Simulate loading time
        setTimeout(() => {
            loading.value = false;
        }, 2000); // Adjust the time as needed
    });
    </script>
    
    
    