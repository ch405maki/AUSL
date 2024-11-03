    <template>
        <MainLayout>
        <Head title="Events Calendar" />
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4">
            <section class="text-gray-600 body-font">
                <div class="container mx-auto py-8">
                <!-- Row -->
                <div class="flex justify-center">
                    <div class="w-full md:w-2/3 text-center">
                    <h3 class="text-purple-900 font-bold my-6 text-xl sm:text-2xl text-pretty">AUSL Events</h3>
                    <h6 class="mx-auto leading-relaxed text-base sm:text-xl mb-6">Discover various aspects of AUSL Departments and stay up-to-date with our latest announcements.</h6>
                    </div>
                </div>
                <!-- Cards -->
                <div class="flex flex-wrap mt-4">
                <div class="w-full md:w-1/4 p-4" v-for="event in events" :key="event.id">
                    <div class="relative bg-white shadow-md hover:shadow-lg transition duration-200 overflow-hidden transform hover:scale-105 hover:-translate-y-1 hover:cursor-pointer">
                    <a :href="event.link" title="Learn More" target="_blank" rel="noopener noreferrer">
                    <div v-if="event.image && event.image.length > 0">
                        <img class="w-full h-full object-cover" :src="event.image[0]" alt="Event Banner">
                    </div>
                    </a>
                    <div class="p-4">
                        <h5 class="font-medium text-lg">
                        <a :href="event.link"  class="text-gray-800 hover:text-purple-900">{{ event.title }}</a>
                        </h5>
                        <a :href="event.link"  class="text-purple-900 mt-2 inline-block">Learn More</a>
                    </div>
                    </div>
                </div>
                </div>
                </div>
            </section>
            </div>
        </main>
        </MainLayout>
    </template>
    
    <script setup>
    import { ref } from 'vue';
    import { reactive, onMounted, onBeforeUnmount } from 'vue';
    import { Head } from '@inertiajs/vue3';
    import MainLayout from '@/Layouts/MainLayout.vue';
    import { Inertia } from '@inertiajs/inertia';
    import { defineProps } from 'vue';

    const props = defineProps({
    events: {
        type: Array,
        required: true
        },
    });
    </script>
    
    <style scoped>
    </style>
    