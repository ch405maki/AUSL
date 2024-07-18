<template>
<MainLayout>
    <Head title="Student" />
    <Carousel/>

    <nav class="bg-white w-full">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="w-full flex justify-center items-center md:order-1" id="navbar-sticky">
            <ul class="flex flex-col text-center p-4 md:p-0 font-medium rounded-lg bg-gray-50 md:space-x-2 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li v-for="link in links" :key="link.text">
                <a :href="link.href" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-900 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                {{ link.text }}
                </a>
            </li>
            </ul>
        </div>
        </div>
    </nav>

    <Message />

</MainLayout>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import Carousel from './Carousel.vue';
import Message from './Message.vue'

const links = ref([
  { text: 'Online Enrollment Guide', href: '#' },
  { text: 'Student ID Application', href: '#' },
  { text: 'AUSL Academic Calendar', href: '#' },
  { text: 'Student Medical Form', href: '#' },
  { text: 'Guideline/Payment Procedure', href: '#' },
  { text: 'Downloadable Registrar Form', href: '#' },
]);
</script>

<style scoped>

</style>