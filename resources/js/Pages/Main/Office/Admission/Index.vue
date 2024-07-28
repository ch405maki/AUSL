<template>
    <MainLayout>
        <Head title="Admission" />

        <div class="flex flex-col min-h-screen">
            <main class="flex-grow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row w-full justify-center">
                        <!-- Main content section -->
                        <div class="w-full md:w-2/2 p-2">
                            <v-card class="soft-shadow">
                                <v-tabs-window v-model="tab">
                                    <!-- Admission Information Tab -->
                                    <v-tabs-window-item value="option-1">
                                        <v-card flat>
                                            <v-card-text>
                                                <!-- Beautiful Header Section -->
                                                <div class="header-container p-6 rounded-sm mb-6 border-l-4 border-purple-900 bg-purple-50">
                                                    <div class="text-left">
                                                        <h1 class="text-2xl font-bold text-purple-900 mb-4">Welcome to the Admissions Section</h1>
                                                        <p class="text-lg text-slate-800 mb-6">Discover various aspects of Admissions and stay up-to-date with our latest announcements.</p>
                                                    </div>
                                                </div>
                                                <!-- End of Header Section -->

                                                <!-- Accordion Items -->
                                                <AccordionItem title="Interview Schedule">
                                                    <div class="item">
                                                        <button class="collapsible flex items-center space-x-2 text-lg font-bold text-purple-700 hover:text-purple-900 mb-4">
                                                            <img src="imgs/collet.png" alt="Schedule Icon" class="w-6 h-6">
                                                            <span>Interview Schedule</span>
                                                        </button>
                                                        <div class="content p-4 bg-gray-50 border border-gray-200 rounded-md">
                                                            <div class="announce">
                                                                <a name="is"></a>
                                                                <p class="text-slate-700 text-base mb-4">
                                                                    <img src="imgs/007.jpg" alt="Interview" class="float-right w-40 h-auto mb-4 ml-4 rounded">
                                                                    <b>(Freshmen & Transferees)</b><br>
                                                                    Our Interview Schedule for the incoming Semester will be held every Monday, Thursday, Friday & Saturday.
                                                                </p>
                                                                <p class="text-slate-700 text-base">
                                                                    For questions and inquiries please call:<br>
                                                                    AUSL Admission Office at 8404-3089 to 93 local 33
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </AccordionItem>

                                                <AccordionItem title="Academic Requirements">
                                                    <div class="item">
                                                        <button class="collapsible flex items-center space-x-2 text-lg font-bold text-purple-700 hover:text-purple-900 mb-4">
                                                            <img src="imgs/collet.png" alt="Requirements Icon" class="w-6 h-6">
                                                            <span>Academic Requirements</span>
                                                        </button>
                                                        <div class="content p-4 bg-gray-50 border border-gray-200 rounded-md">
                                                            <div class="announce">
                                                                <p class="text-slate-700 text-base mb-4">
                                                                    Please provide original and photocopy of all required documents.
                                                                </p>
                                                                <ul class="list-inside list-disc text-slate-700 text-base">
                                                                    <li>Holder of Bachelor's degree in the arts or sciences.</li>
                                                                    <li>Must have earned the following undergraduate units:
                                                                        <ul class="list-inside list-disc ml-6">
                                                                            <li>Rizal - 3 units</li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </AccordionItem>

                                                <AccordionItem title="Freshmen Requirements Checklist">
                                                    <div class="item">
                                                        <button class="collapsible flex items-center space-x-2 text-lg font-bold text-purple-700 hover:text-purple-900 mb-4">
                                                            <img src="imgs/collet.png" alt="Checklist Icon" class="w-6 h-6">
                                                            <span>Freshmen Requirements Checklist</span>
                                                        </button>
                                                        <div class="content p-4 bg-gray-50 border border-gray-200 rounded-md">
                                                            <div class="announce">
                                                                <ul class="list-inside list-disc text-slate-700 text-base">
                                                                    <li>Completed online application form (<a href="http://www.arellanolaw.edu" class="text-purple-700 hover:underline">www.arellanolaw.edu</a>)</li>
                                                                    <!-- Uncomment if needed
                                                                    <li>PhiLSAT Certificate of Eligibility</li>
                                                                    <ul class="list-inside list-disc ml-6">
                                                                        <li>Copy for Law School</li>
                                                                        <li>Copy for LEB</li>
                                                                    </ul> -->
                                                                    <li>Transfer Credentials/Honorable Dismissal</li>
                                                                    <li>Official Transcript of Records (Pre-Law Course) with remarks:<br><b><i>"Copy for Arellano University School of Law"</i></b></li>
                                                                    <li>Certificate of Good Moral Character (<i>From the school where you graduated</i>)</li>
                                                                    <li>PSA Birth Certificate</li>
                                                                    <li>Birth Certificate, Local Civil Registry (LCR copy)</li>
                                                                    <li>PSA Marriage Certificate if applicable</li>
                                                                    <li>Two (2) pcs. 2x2 colored photo with white background and printed name</li>
                                                                    <li>Examination Fee of Php 1,000.00</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </AccordionItem>

                                                <AccordionItem title="Transferee Requirements Checklist">
                                                    <div class="item">
                                                        <button class="collapsible flex items-center space-x-2 text-lg font-bold text-purple-700 hover:text-purple-900 mb-4">
                                                            <img src="imgs/collet.png" alt="Checklist Icon" class="w-6 h-6">
                                                            <span>Transferee Requirements Checklist</span>
                                                        </button>
                                                        <div class="content p-4 bg-gray-50 border border-gray-200 rounded-md">
                                                            <div class="announce">
                                                                <ul class="list-inside list-disc text-slate-700 text-base">
                                                                    <li>Copy of Grades</li>
                                                                    <li>Transfer Credentials/Honorable Dismissal</li>
                                                                    <li>PSA Birth Certificate</li>
                                                                    <li>Birth Certificate, Local Civil Registry (LCR copy)</li>
                                                                    <li>PSA Marriage Certificate if applicable</li>
                                                                    <li>Two (2) Certificate of Good Moral Character (GMC) from their previous law school duly signed by:
                                                                        <ul class="list-inside list-disc ml-6">
                                                                            <li>Dean of the law school</li>
                                                                            <li>Former professor at the law school</li>
                                                                        </ul>
                                                                    </li>
                                                                    <!-- Uncomment if needed
                                                                    <li>PhiLSAT Certificate of Eligibility (Certified True Copy from previous law school) mandatory for enrolled students starting First Semester AY 2017-2018</li>
                                                                    -->
                                                                    <li>Official Transcript of Records from previous law school with remarks:<br><b><i>"Copy for Arellano University School of Law"</i></b></li>
                                                                    <li>Certificate of Eligibility for Admission into the Law Course (Certified True Copy)</li>
                                                                    <li>Official Transcript of Records (Pre-Law Course) - Certified True Copy</li>
                                                                    <li>Two (2) pcs. 2x2 colored photo with white background and printed name</li>
                                                                    <li>Examination Fee of Php 1,000.00</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </AccordionItem>
                                                <!-- End of Accordion Items -->
                                            </v-card-text>
                                        </v-card>
                                    </v-tabs-window-item>

                                    <!-- Placeholder Tab -->
                                    <v-tabs-window-item value="option-2">
                                        <v-card flat>
                                            <v-card-text>
                                                <EmptyEstate />
                                            </v-card-text>
                                        </v-card>
                                    </v-tabs-window-item>
                                </v-tabs-window>
                            </v-card>
                        </div>
                        <!-- End main content section -->

                        <!-- Links -->
                        <div class="w-full md:w-1/5 p-2 flex justify-start mt-4">
                            <div class="text-left">
                                <div class="mb-2">
                                    <h2 class="mb-2 text-md leading-6 font-bold text-purple-900 capitalize">Admissions</h2>
                                    <hr class="mb-2 border-1 border-purple-800">
                                    <v-tabs v-model="tab" color="#22c55e" direction="vertical">
                                        <v-tab style="none" value="option-1">
                                            <h1 :class="{'text-grey-800': tab !== 'option-1', 'capitalize text-md text-slate-600 hover:text-slate-900': true, 'text-purple-900': tab === 'option-1'}">Latest Anouncement's</h1>
                                        </v-tab>
                                        <v-tab value="option-2">
                                            <h1 :class="{'text-grey-800': tab !== 'option-2', 'capitalize text-md text-slate-600 hover:text-slate-900': true, 'text-purple-900': tab === 'option-2'}">Archives</h1>
                                        </v-tab>
                                    </v-tabs>
                                    <div class="mt-4">
                                        <h2 class="mb-2 text-md leading-6 font-bold text-purple-900 capitalize leading-tight">Related Offices</h2>
                                        <hr class="mb-4 border-1 border-purple-800">
                                        <ul class="list-inside list-disc">
                                            <li v-for="(item, index) in links" :key="index" class="mb-2 font-semibold">
                                                <a :href="item.url" class="py-1 text-sm text-slate-600 hover:text-slate-900">{{ item.text }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Links -->
                    </div>
                </div>
            </main>
        </div>
    </MainLayout>
</template>

<script setup>
import { ref, computed, defineProps } from 'vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import EmptyEstate from '@/Pages/Main/Partials/EmptyState.vue'

// AccordionItem component definition
const AccordionItem = {
    props: {
        title: {
            type: String,
            required: true
        },
        initialOpen: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            isOpen: this.initialOpen
        };
    },
    methods: {
        toggle() {
            this.isOpen = !this.isOpen;
        }
    },
    template: `
        <div class="relative mb-4">
            <h6 class="relative block w-full">
                <button @click="toggle" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-800 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3 transition-colors hover:bg-gray-100 dark:hover:bg-gray-700">
                    <span>{{ title }}</span>
                    <svg class="w-3 h-3 transform transition-transform" :class="{'rotate-180': isOpen}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h6>
            <div v-show="isOpen" class="overflow-hidden transition-all duration-300 ease-in-out">
                <div class="py-2 border-b border-gray-200 dark:border-gray-700">
                    <slot></slot>
                </div>
            </div>
        </div>
    `
};

// Props definition for the main component
const props = defineProps({
    post: {
        type: Object,
        required: true
    }
});

const tab = ref('option-1');

// Computed property to get the title of the active tab
const activeTabTitle = computed(() => {
    switch (tab.value) {
        case 'option-1':
            return 'History of AUSL';
        case 'option-2':
            return 'Mission and Vision';
    }
});

const links = ref([
    { text: 'Accounting', url: '/office/accounting' },
    { text: 'Admissions', url: '/office/admission' },
    { text: "Dean's", url: '/office/deans' },
    { text: 'Registrar', url: '/office/registrar' }
]);

const screenWidth = ref(window.innerWidth);

const updateScreenSize = () => {
    screenWidth.value = window.innerWidth;
};

const isSmallScreen = computed(() => screenWidth.value < 640);
const isBigScreen = computed(() => screenWidth.value >= 640);

window.addEventListener('resize', updateScreenSize);
</script>

<style scoped>
.text-invicta {
    font-family: 'BF Invicta W00 Bold', sans-serif;
}

.soft-shadow {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.announce p {
    margin-bottom: 16px;
}

.announce ul {
    list-style-type: disc;
    padding-left: 1.25rem;
}

.announce li {
    margin-bottom: 16px;
}

.header-container {
    background-color: rgba(238, 242, 255, 1);
}
</style>
