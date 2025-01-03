<template>
    <MainLayout>
        <Head title="Downloadable Forms" />
        <Header>Downloadable Forms</Header>
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
                <div class="flex flex-col lg:flex-row justify-between gap-8">
                    <!-- Main content section -->
                    <section class="w-full lg:w-3/4">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 mb-8">
                                <thead class="text-xs text-gray-700 bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 text-sm lg:text-lg font-medium text-official-purple-900">
                                            Code
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-sm lg:text-lg font-medium text-official-purple-900">
                                            Description
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-sm lg:text-lg font-medium text-official-purple-900">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="pdf in pdfs"
                                        :key="pdf.code"
                                        class="border-b"
                                    >
                                        <td class="px-4 py-4 text-sm lg:text-lg font-normal text-gray-800">
                                            {{ pdf.code }}
                                        </td>
                                        <td class="px-4 py-4 text-sm lg:text-lg font-normal text-gray-800">
                                            {{ pdf.description }}
                                        </td>
                                        <td class="px-4 py-4">
                                            <a
                                                :href="pdf.url"
                                                download
                                                class="flex items-center text-official-purple-500 hover:text-official-purple-700 text-sm lg:text-lg font-normal whitespace-nowrap"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 lg:w-5 h-4 lg:h-5 mr-1 fill-current" viewBox="0 0 24 24">
                                                    <path d="M12 16.5l-4-4h2.5V3h3v9.5H16l-4 4zm-7 1.5h14v2H5v-2z" />
                                                </svg>
                                                Download
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                                    Downloadable Forms
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
    import { Head } from '@inertiajs/vue3';
    import MainLayout from '@/Layouts/MainLayout.vue';
    import Header from '../../Components/Header.vue';
    import RelatedLinks from '../Components/RelatedLinks.vue';

    const pdfs = ref([
      { code: 'RO3', description: 'Application for Academic Load Revision', url: '/pdf/RO3.pdf' },
      { code: 'RO4', description: 'Application for Completion Form', url: '/pdf/RO4.pdf' },
      { code: 'RO6', description: 'Request for School Documents', url: '/pdf/RO6.pdf' },
      { code: 'RO7', description: 'Application for Leave of Absence (LOA)', url: '/pdf/RO7.pdf' },
      { code: 'RO10', description: 'Application for the Degree of Juris Doctor', url: '/pdf/RO10.pdf' },
      { code: 'RO10b', description: 'Curriculum Evaluation Form (SY 2013-2014)', url: '/pdf/RO10b.pdf' },
      { code: 'RO13b', description: 'Authorization to Release Students Academic and Personal Data', url: '/pdf/RO13b.pdf' },
      { code: 'RO26', description: 'Application for Additional Subjects for Manual Enrollment', url: '/pdf/RO26.pdf' },
    ]);
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