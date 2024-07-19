<template>
    <MainLayout>
        <Head title="Student" />
        <div v-if="loading">
            <LoadingAnimation/>
        </div>
        <div v-else>
            <Carousel/>
            <NavBar />
            <Message />
            <Post />
        </div>
    </MainLayout>
    </template>
    
    <script setup>
    import { ref, onMounted } from 'vue';
    import { Head } from '@inertiajs/vue3';
    import MainLayout from '@/Layouts/MainLayout.vue';
    import Carousel from './Carousel.vue';
    import Message from './Message.vue';
    import NavBar from './NavBar.vue';
    import LoadingAnimation from './LoadingAnimation.vue';
    import Post from './Post.vue';
    
    const loading = ref(true);
    
    onMounted(() => {
        // Simulate loading time
        setTimeout(() => {
            loading.value = false;
        }, 2000); // Adjust the time as needed
    });
    </script>
    
    <style scoped>
    </style>
    