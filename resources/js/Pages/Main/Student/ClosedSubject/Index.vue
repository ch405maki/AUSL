<template>
    <MainLayout>
        <Head title="Closed Subjects" />
        <div class="relative mb-4">
            <img src="/images/headerbg.jpg" alt="Background Image" class="w-full h-auto object-cover" />
            <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-white text-sm sm:text-lg md:text-2xl lg:text-3xl xl:text-4xl font-bold text-center">
                ARELLANO UNIVERSITY SCHOOL OF LAW
                <br>
                Closed Subjects as of July 4, 2024
            </h1>
            </div>
        </div>
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-8 py-4 lg:py-8 text-center">
                <div class="flex flex-col lg:flex-row justify-between gap-8">
                    <!-- Main content section -->
                    <section class="w-full lg:w-3/4">
                        <div class="relative overflow-x-auto">
                            <div class="content" align="center" style="max-height: 100%;"> 
                                <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQ47NVN7URV9-0nSYIYB7IECmT1__c0-YatkygbYo7CdChd3clxR8YgAuI-o8jgJW9TpbBPDAB-RHQc/pubhtml?gid=952579375&amp;single=true&amp;widget=true&amp;headers=false" 
                                    width="700" Height="400">
                                </iframe>
                            </div>
                        </div>
                    </section>

                    <!-- Sidebar -->
                    <aside class="w-full lg:w-1/4">
                        <div class="mb-8 sm:mt-4 lg:mt-8">
                            <div class="ml-2 lg:ml-4">
                                <h2 class="mb-4 text-base lg:text-lg leading-6 font-medium text-official-purple-900 capitalize">
                                    On this page
                                </h2>
                                <hr class="mb-4 border-1 border-official-purple-800">
                                <h3 class="text-sm lg:text-lg font-normal text-gray-800 mb-8">
                                    Closed Subjects
                                </h3>
                            </div>
                            <div class="ml-2 lg:ml-4">
                                <h2 class="text-official-purple-900 text-base lg:text-lg font-medium mb-4">Related Links</h2>
                                <hr class="mb-4 border-1 border-official-purple-800">
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
    import { Head, usePage } from '@inertiajs/vue3';
    import MainLayout from '@/Layouts/MainLayout.vue';
    import Header from '../../Components/Header.vue';
    import RelatedLinks from '../Components/RelatedLinks.vue';

    const { documents } = usePage().props;
    </script>
    
    <style scoped>
    /* Mobile-specific table enhancements */
    @media (max-width: 768px) {
        table th, table td {
            padding: 0.5rem; /* Adjust padding for smaller screens */
            font-size: 0.875rem; /* Smaller font for better fit */
        }
    
        table {
            display: block; /* Makes table scrollable */
            overflow-x: auto; /* Enables horizontal scrolling for tables */
        }
    
        .whitespace-nowrap {
            white-space: nowrap; /* Prevents text wrapping */
        }
    
        .flex-col > section {
            margin-bottom: 2rem; /* Add spacing between sections */
        }
    }
    </style>