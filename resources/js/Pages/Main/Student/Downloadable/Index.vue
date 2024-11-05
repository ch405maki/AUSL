<template>
    <MainLayout>
        <Head title="Downloadable Forms" />
        <Header>Downloadable Forms</Header>
          <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
              <div class="flex flex-col md:flex-row justify-between gap-8">
                <!-- Main content section -->
                <section class="w-full md:w-3/4 relative">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-8">
                        <thead class="text-xs text-gray-700 bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-lg font-medium text-purple-900 mb-8">
                                    Form Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-lg font-medium text-purple-900 mb-8">
                                    Form Type
                                </th>
                                <th scope="col" class="px-6 py-3 text-lg font-medium text-purple-900 mb-8">
                                    Size
                                </th>
                                <th scope="col" class="px-6 py-3 text-lg font-medium text-purple-900 mb-8">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr v-for="pdf in pdfs" :key="pdf.name" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ pdf.name }}</td>
                            <td class="px-6 py-4">PDF</td>
                            <td class="px-6 py-4">{{ pdf.size }}</td>
                            <td class="px-6 py-4">
                            <a :href="pdf.path" download class="flex items-center text-purple-500 hover:text-purple-700 text-lg font-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 fill-current" viewBox="0 0 24 24">
                                <path d="M12 16.5l-4-4h2.5V3h3v9.5H16l-4 4zm-7 1.5h14v2H5v-2z"/>
                                </svg>
                                Download
                            </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </section>
    
                <aside class="w-full md:w-1/4 sticky top-0">
                <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                    <div class="ml-4">
                        <h2 class="mb-4 text-lg leading-6 font-medium text-purple-900 capitalize">On this page</h2>
                        <hr class="mb-4 border-1 border-purple-800">
                        <h3 class="text-lg font-normal text-gray-800 mb-8">Downloadable Forms</h3>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-purple-900 text-lg font-medium mb-4">Related Links</h2>
                        <hr class="mb-4 border-1 border-purple-800">
                        <ul class="list-inside list-disc">
                            <RelatedLinks />
                        </ul>
                    </div>
                </div>
                </aside>
            </div>
          </div>
        </main>
    </MainLayout>
    </template>
    
    <script setup>
    import { ref, computed } from 'vue';
    import { Head } from '@inertiajs/vue3';
    import MainLayout from '@/Layouts/MainLayout.vue';
    import Header from '../../Components/Header.vue';
    import RelatedLinks from '../Components/RelatedLinks.vue';

    // Get the PDFs data passed from the controller
    const props = defineProps({
    pdfs: Array
    });
    </script>
    
    <style scoped>
    
    </style>