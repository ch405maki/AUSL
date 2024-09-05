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
                    <h3 class="text-purple-900 font-bold my-6 text-xl sm:text-2xl text-pretty">AUSL Upcoming Events</h3>
                    <h6 class="mx-auto leading-relaxed text-base sm:text-xl">Discover various aspects of AUSL Departments and stay up-to-date with our latest announcements.</h6>
                    </div>
                </div>
                <!-- Cards -->
                <div class="flex flex-wrap mt-4">
                    <div class="w-full md:w-1/3 p-4" v-for="index of 7">
                    <div class="relative bg-white shadow-md hover:shadow-lg transition duration-200 rounded-lg overflow-hidden">
                        <img class="w-full h-59 object-cover" src="/images/test.jpg" alt="Event 1">
                        <div class="absolute top-4 right-4 bg-gradient-to-r from-purple-500 to-purple-600 text-white text-center p-2 rounded w-16">
                        <span class="text-md">Oct</span>
                        <span class="block text-3xl font-medium">23</span>
                        <span class="block text-md">2024</span>
                        </div>
                        <div class="p-4">
                        <h5 class="font-medium text-lg">
                            <a href="#" class="text-gray-800 hover:text-purple-900">Header Area Here!</a>
                        </h5>
                        <p class="mt-2 text-gray-500">Text area for short details of the content</p>
                        <a href="#" class="text-purple-900 mt-2 inline-block">Learn More</a>
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
    </script>
    
    <style scoped>
    </style>
    