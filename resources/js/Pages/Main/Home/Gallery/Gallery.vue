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
                                <h1 class="text-official-purple-900 font-bold my-6 text-xl sm:text-2xl text-pretty">Our Gallery</h1>
                                <p class="lg:w-2/3 mx-auto leading-relaxed text-base sm:text-xl">
                                    Discover A collection of captured moments from recent 
                                </p>
                                <p class="lg:w-2/3 mx-auto leading-relaxed text-base sm:text-xl">
                                    AUSL School Events.
                                </p>
                            </div>

                            <div>
                            <!-- Masonry grid -->
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div v-for="(gallery, index) in galleries" :key="gallery.id" class="grid gap-4 relative">
                            <!-- Display only the first image -->
                            <div v-if="gallery.images.length" class="overflow-hidden rounded-lg relative group">  <!-- Added group class -->
                                <img
                                    class="w-full h-full object-cover transform transition duration-300 ease-in-out group-hover:scale-110 max-w-full rounded-lg cursor-pointer" 
                                    @click="viewImages(gallery.id)"
                                    :src="gallery.images[0]"
                                    alt="Gallery Image"
                                />
                                <!-- Gradient text overlay on the image -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent bg-opacity-50 text-white text-sm flex items-end p-4">
                                    <h1 class="w-full p-6 cursor-pointer hover:underline opacity-100 group-hover:opacity-100 transition-opacity duration-300" @click="viewImages(gallery.id)">
                                        {{ gallery.title }} <br>{{ gallery.year }}
                                    </h1>
                                </div>
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