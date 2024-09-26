<template>
    <MainLayout>
    <Head title="Gallery" />
        <div class="flex flex-col min-h-screen bg-gray-100">
            <main class="flex-grow">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col w-full mx-4 justify-center">
                        <!-- Gallery Details Section -->
                        <div class="w-full py-8 px-2">
                            <h3 class="text-2xl mb-8 font-bold text-purple-800">Year: {{ gallery.year }} / <span class="text-slate-800">{{ gallery.title }}</span></h3>
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
        </div>
    </MainLayout>
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
import MainLayout from '@/Layouts/MainLayout.vue';
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