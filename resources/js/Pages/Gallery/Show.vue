<template>
    <Head title="Gallery Details" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gallery Details</h2>
        </template>

        <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900 lg:pt-10">
            <main class="flex-grow">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col w-full mx-4 justify-center">
                        <!-- Gallery Details Section -->
                        <div class="w-full p-1">
                            <h3 class="text-2xl font-bold text-purple-800">{{ gallery.year }}</h3>
                            <h3 class="text-2xl font-bold mb-4">{{ gallery.title }}</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                <div v-for="(image, index) in gallery.images" :key="index" class="mb-4">
                                    <img :src="image" alt="Gallery Image" class="w-full rounded-lg shadow-sm" @click="showLightbox(index)" />
                                </div>
                            </div>
                        </div>
                        <!-- End Gallery Details Section -->
                    </div>
                </div>
            </main>
            <!-- Footer -->
            <Footer />
            <!-- Footer -->
        </div>
    </AuthenticatedLayout>

    <!-- Lightbox -->
    <vue-easy-lightbox
        :visible="visible"
        :imgs="gallery.images"
        :index="index"
        @hide="handleHide"
    />
</template>

<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Footer from '@/Layouts/Partials/Footer.vue';
import VueEasyLightbox from 'vue-easy-lightbox';

const props = defineProps({
    gallery: {
        type: Object,
        required: true,
    },
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
</script>

<style scoped>
.w-full {
    max-width: 100%;
}
</style>