<template>
    <MainLayout>
        <Head title="Juris Doctor Curriculum" />
        <div class="flex flex-col min-h-screen">
        <div class="relative mb-4">
            <img src="/images/headerbg.jpg" alt="Background Image" class="w-full h-auto object-cover" />
            <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-white text-lg sm:text-xl md:text-2xl lg:text-4xl font-bold text-center">
                {{ office }} Department
            </h1>
            </div>
        </div>
        <main class="flex-grow">
            <div class="bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row w-full justify-center">
                <div class="w-full md:w-2/2">
                    <div class="flex border-b border-official-purple-800">
                    <button
                        class="w-1/2 p-2 text-center font-medium focus:outline-none"
                        :class="{ 'active': activeTab === 'tab1', 'bg-gray-100 text-gray-600': activeTab !== 'tab1' }"
                        @click="setActiveTab('tab1')"
                    >
                        <p class="text-sm sm:text-sm md:text-md lg:text-lg font-bold">Latest Announcement(s)</p>
                    </button>
                    <button
                        class="w-1/2 p-2 text-center font-medium focus:outline-none"
                        :class="{ 'active': activeTab === 'tab2', 'bg-gray-100 text-gray-600': activeTab !== 'tab2' }"
                        @click="setActiveTab('tab2')"
                    >
                        <p class="text-sm sm:text-sm md:text-md lg:text-lg font-bold">Archives</p>
                    </button>
                    </div>
                    
                    <div v-show="activeTab === 'tab1'" class="tabcontent">
                    <div class="grid grid-flow-col text-left rounded-lg mt-8 mb-8">
                        <div>
                        <div class="bg-white border-none rounded-lg mb-6 relative">
                            <div class="text-slate-600 leading-relaxed">
                            <div>
                                <div class="mx-auto max-w-full">
                                <div class="divide-y divide-gray-100">
                                    <div v-for="(post, index) in posts" :key="post.id"
                                    :class="index % 2 === 0 ? 'bg-gray-100' : 'bg-white'">
                                    <details class="group rounded-sm transition duration-300 border-b border-gray-200">
                                        <summary
                                        class="flex cursor-pointer list-none items-center justify-between px-2 py-[8px] text-base sm:text-lg md:text-xl lg:text-xl font-medium text-official-purple-800 group-hover:bg-official-purple-100 group-open:text-primary-500 transition duration-300">
                                        {{ post.title }}
                                        <div>
                                            <svg class="w-5 h-5 text-gray-500 transition group-open:rotate-90" xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                            </path>
                                            </svg>
                                        </div>
                                        </summary>
                                        <div class="p-4">
                                        <p
                                            class="pb-4 mt-2 text-sm sm:text-base md:text-base lg:text-lg font-normal text-gray-800 leading-relaxed"
                                            v-html="post.content"></p>
                                        <div v-if="post.link" class="relative mb-8 flex justify-center items-center bg-slate-100">
                                            <div class="container">
                                            <iframe frameborder="0" height="800" scrolling="no" :src="post.link + 'preview'" width="100%"></iframe>
                                            </div>
                                        </div>
                                        <div v-if="post.image" class="relative mb-8 flex flex-col items-center bg-slate-100">
                                            <div v-for="(image, index) in post.image" :key="index" class="w-full mb-4">
                                            <img
                                                :src="image"
                                                alt="Post Image"
                                                class="object-cover w-full rounded-lg hover:cursor-zoom-in"
                                                @click="openLightbox1(index, post.image)"
                                            />
                                            </div>
                                        </div>
                                        </div>
                                    </details>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    
                    <div v-show="activeTab === 'tab2'" class="tabcontent">
                    <div class="grid grid-flow-col text-left rounded-lg mt-8 mb-8">
                        <div>
                        <div class="bg-white border-none rounded-lg mb-6 relative">
                            <div class="text-slate-600 leading-relaxed">
                            <div>
                                <div class="mx-auto max-w-full">
                                <div class="divide-y divide-gray-100">
                                    <div v-for="(post, index) in archives" :key="post.id" 
                                    :class="index % 2 === 0 ? 'bg-gray-100' : 'bg-white'">
                                    <details class="group rounded-sm transition duration-300 border-b border-gray-200">
                                        <summary
                                        class="flex cursor-pointer list-none items-center justify-between px-2 py-[8px] text-base sm:text-lg md:text-xl lg:text-xl font-medium text-official-purple-800 group-hover:bg-official-purple-100 group-open:text-primary-500 transition duration-300">
                                        {{ post.title }}
                                        <div>
                                            <svg class="w-5 h-5 text-gray-500 transition group-open:rotate-90" xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                            </path>
                                            </svg>
                                        </div>
                                        </summary>
                                        <div class="p-4">
                                        <p
                                            class="pb-4 mt-2 text-sm sm:text-base md:text-base lg:text-lg font-normal text-gray-800 leading-relaxed"
                                            v-html="post.content"></p>
                                        <div v-if="post.link" class="relative mb-8 flex justify-center items-center bg-slate-100">
                                            <div class="container">
                                            <iframe frameborder="0" height="800" scrolling="no" :src="post.link + 'preview'" width="100%"></iframe>
                                            </div>
                                        </div>
                                        <div v-if="post.image" class="relative mb-8 flex flex-col items-center bg-slate-100">
                                            <div v-for="(image, index) in post.image" :key="index" class="w-full mb-4">
                                            <img :src="image" alt="Post Image" class="object-cover w-full rounded-lg hover:cursor-zoom-in"
                                                @click="openLightbox(index)"
                                            />
                                            </div>
                                        </div>
                                        </div>
                                    </details>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                
                <aside class="w-full md:w-1/3 sticky top-0 ">
                    <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                    <div class="ml-4">
                        <div class="relative mb-8 flex flex-col items-center bg-slate-100">
                        <div class="w-full mb-4">
                            <img
                                :src="`/images/offices/${office}.jpg`"
                                alt="Office Image"
                                class="object-cover w-full rounded-lg hover:cursor-zoom-in"
                                @click="openLightboxForOfficeImage(`/images/offices/${office}.jpg`)"
                            />
                        </div>
                        </div>
                        <h2 class="mb-4 text-base sm:text-base md:text-md lg:text-lg leading-6 font-medium text-official-purple-900 capitalize">On this page</h2>
                        <hr class="mb-4 border-1 border-official-purple-800">
                        <h3 class="text-base sm:text-base md:text-md lg:text-lg font-normal text-gray-800 mb-8">
                        {{ office }}
                        </h3>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-official-purple-900 text-base sm:text-base md:text-md lg:text-lg font-medium mb-4">Related Links</h2>
                        <hr class="mb-4 border-1 border-official-purple-800">
                        <ul class="list-inside list-disc">
                        <RelatedLinks />
                        </ul>
                    </div>
                    </div>
                </aside>
                </div>
            </div>
            </div>
        </main>
        </div>
    </MainLayout>
    
    <!-- Lightbox for posts -->
    <vue-easy-lightbox
        :visible="isLightboxVisible"
        :imgs="lightboxImages"
        :index="currentImageIndex"
        @hide="isLightboxVisible = false"
    />
    <!-- Lightbox for office image -->
    <vue-easy-lightbox
        :visible="isOfficeLightboxVisible"
        :imgs="[officeImage]"
        @hide="isOfficeLightboxVisible = false"
    />
</template>
    
<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import RelatedLinks from './Components/RelatedLinks.vue';
import VueEasyLightbox from 'vue-easy-lightbox';

// Define props for posts
const props = defineProps({
    office: { type: String },
    posts: { type: Array, required: true },
    archives: { type: Array, required: true },
});

const activeTab = ref('tab1');

function setActiveTab(tabName) {
    activeTab.value = tabName;
}

// Reactive variables for lightbox
const isLightboxVisible = ref(false);
const currentImage = ref('');
const lightboxImages = ref([]);
const currentImageIndex = ref(0);

// Reactive variable for office image lightbox
const isOfficeLightboxVisible = ref(false);
const officeImage = ref('');

// Function to open the lightbox for posts
function openLightbox(src) {
    currentImage.value = src;
    isLightboxVisible.value = true;
}

// Function to open the lightbox for office image
function openLightboxForOfficeImage(src) {
    officeImage.value = src;
    isOfficeLightboxVisible.value = true;
}

// Function to open lightbox for posts with multiple images
function openLightbox1(index, images) {
    currentImageIndex.value = index;
    lightboxImages.value = images; // Pass the array of images
    isLightboxVisible.value = true;
}
</script>
    
<style scoped>
    @import url('https://db.onlinewebfonts.com/c/14ab77252fbc4bdca1dbdf8051cb7e96?family=BF+Invicta+W00+Bold');
    
    .text-invicta {
        font-family: 'BF Invicta W00 Bold', sans-serif;
    }
    
    .active {
        background-color: #004ea8; 
        color: #fff;
    }
    
    .tabcontent {
        transition: opacity 0.3s ease-in-out;
    }
    
    
    .active {
        background-color: #004ea8; /* official purple */
        color: #fff;
    }
    
    .text-gray-600 {
        color: #333;
    }
</style>