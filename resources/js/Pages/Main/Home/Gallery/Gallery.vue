<template>
    <MainLayout>
        <Head title="Gallery" />
        <div class="flex flex-col min-h-screen">
            <main class="flex-grow">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col md:flex-row w-full justify-center">
                        <!-- Main content section -->
                        <div class="w-full p-1">
                            <v-table fixed-header height="500px">
                                <thead>
                                    <tr>
                                        <th class="text-left text-gray-700 w-1/12 text-xl"><h1>Year</h1></th>
                                        <th class="text-left text-gray-700 font-extrabold mb-3 text-xl">Event</th>
                                        <th class="text-right text-gray-700 font-extrabold mb-3 hidden md:table-cell text-xl">Sample Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(gallery, index) in galleries" :key="gallery.id">
                                        <td class="text-purple-900 font-extrabold mb-3 font-bold mt-2 uppercase text-mb sm:text-xl text-pretty text-start">
                                            {{ gallery.year }}
                                        </td>
                                        <td @click="viewImages(gallery.id)" class="text-purple-900 font-extrabold mb-3 font-bold mt-2 uppercase text-mb sm:text-xl text-pretty text-start cursor-pointer hover-effect">
                                            {{ gallery.title }}
                                        </td>
                                        <td class="hidden md:table-cell">
                                            <img v-if="gallery.images.length" :src="gallery.images[0]" alt="Gallery Image" class="carousell-image image-right my-2">
                                        </td>
                                    </tr>
                                </tbody>
                            </v-table>
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