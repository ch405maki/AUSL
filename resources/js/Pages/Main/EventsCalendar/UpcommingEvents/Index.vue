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
                    <h6 class="mx-auto leading-relaxed text-base sm:text-xl mb-6">Discover various aspects of AUSL Departments and stay up-to-date with our latest announcements.</h6>
                    </div>
                </div>
                <!-- Cards -->
                <div class="flex flex-wrap mt-4">
                <div class="w-full md:w-1/4 p-4" v-for="index of 4">
                    <div class="relative bg-white shadow-md hover:shadow-lg transition duration-200 overflow-hidden transform hover:scale-105 hover:-translate-y-1">
                    <a href="https://www.facebook.com/photo?fbid=986141886642309&set=a.530679615521874" title="Learn More" target="_blank" rel="noopener noreferrer">
                        <img class="w-full h-full object-cover" src="/images/event.jpg" alt="Event 1">
                    </a>
                    <div class="absolute top-4 right-4 bg-gradient-to-r from-purple-500 to-purple-600 text-white text-center p-2 rounded w-16">
                        <span class="text-md">Sept</span>
                        <span class="block text-3xl font-medium">6</span>
                        <span class="block text-md">2024</span>
                    </div>
                    <div class="p-4">
                        <h5 class="font-medium text-lg">
                        <a href="https://www.facebook.com/photo?fbid=986141886642309&set=a.530679615521874" class="text-gray-800 hover:text-purple-900">Barristers Send Off</a>
                        </h5>
                        <a href="https://www.facebook.com/photo?fbid=986141886642309&set=a.530679615521874" class="text-purple-900 mt-2 inline-block">Learn More</a>
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
    