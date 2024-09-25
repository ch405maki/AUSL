<template>
    <MainLayout>
        <Head title="Gallery" />
        <div class="flex flex-col min-h-screen">
            <main class="flex-grow">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col md:flex-row w-full justify-center">
                        <!-- Main content section -->
                        <div class="w-full p-1">
                            <div class="flex flex-col w-full mb-20 mt-10 text-center">
                                <h1 class="text-purple-900 font-bold my-6 text-xl sm:text-2xl text-pretty">Our Gallery</h1>
                                <p class="lg:w-2/3 mx-auto leading-relaxed text-base sm:text-xl">
                                    Discover various aspects of AUSL Departments and stay up-to-date with our latest announcements.
                                </p>
                            </div>

                            <div>
                            <!-- <div v-for="(gallery, index) in galleries" :key="gallery.id">
                                <div class="text-purple-900 font-extrabold mb-3 font-bold mt-2 uppercase text-mb sm:text-xl text-pretty text-start">
                                    {{ gallery.year }}
                                </div>
                                <div @click="viewImages(gallery.id)" class="text-purple-900 font-extrabold mb-3 font-bold mt-2 uppercase text-mb sm:text-xl text-pretty text-start cursor-pointer hover-effect">
                                    {{ gallery.title }}
                                </div>
                                <div class="hidden md:table-cell">
                                    <img v-if="gallery.images.length" :src="gallery.images[0]" alt="Gallery Image" class="carousell-image image-right my-2">
                                </div>
                            </div> -->
                                
                                <!-- Masonry grid -->
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <div v-for="(gallery, index) in galleries" :key="gallery.id" class="grid gap-4">
                                    <!-- Display only the first image -->
                                    <div v-if="gallery.images.length" class="overflow-hidden rounded-lg">
                                        <img class="w-full h-59 object-cover transform transition duration-300 ease-in-out hover:scale-110 h-auto max-w-full rounded-lg cursor-pointer" @click="viewImages(gallery.id)" :src="gallery.images[0]" alt="Gallery Image">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- End main content section -->
                    </div>
                </div>
            </main>
        </div>
</MainLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
import MainLayout from '@/Layouts/MainLayout.vue';

const props = defineProps({
    galleries: {
        type: Array,
        required: true,
    },
});

const viewImages = (id) => {
    Inertia.visit(route('gallery.browse.show', id));
};
</script>

<style scoped>
.carousell-image {
    max-width: 100%;
    width: 495px;
    height: 205px;
    margin-right: 0px;
    transition: transform 0.3s ease-in-out;
}

.image-right {
    float: right;
}

.mx-auto.text-center {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.v-btn {
    width: 100%;
    transition: all 0.3s ease-in-out;
}

.v-btn:hover {
    transform: scale(1.05);
}

.v-icon {
    margin-left: 8px;
}

.p-4 {
    padding: 1px;
}

.cursor-pointer {
    cursor: pointer;
}

.hover-effect:hover {
    color: #18b46b; /* Change to a lighter shade of purple */
    text-decoration: underline;
}

/* Zoom effect on image when title is hovered */
.hover-effect:hover + td img {
    transform: scale(1.05);
}
</style>