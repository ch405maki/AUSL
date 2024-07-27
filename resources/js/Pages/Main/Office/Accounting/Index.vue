    <template>
        <MainLayout>
        <Head title="Accounting" />
    
        <div class="flex flex-col min-h-screen">
            <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row w-full justify-center">
                <!-- Main content section -->
                <div class="w-full md:w-2/2 p-2">
                    <v-card class="soft-shadow">
                    <v-tabs-window v-model="tab">
                        <!-- tab1 -->
                        <v-tabs-window-item value="option-1">
                        <v-card flat>
                            <v-card-text>
                            <!-- Beautiful Header Section -->
                            <div class="header-container p-6 rounded-sm mb-6 border-l-4 border-purple-900 bg-purple-50">
                                <div class="text-left">
                                <h1 class="text-2xl font-bold text-purple-900 mb-4">Welcome to the Accounting Section</h1>
                                <p class="text-lg text-slate-800 mb-6">Discover various aspects of accounting and stay up-to-date with our latest announcements.</p>
                                </div>
                            </div>
                            <!-- End of Header Section initialOpen-->
    
                            <AccordionItem title="Notice">
                                <div class="text-center">
                                    <img src="/images/faculty/registrar/notice.jpg" class="mx-auto mb-4 rounded shadow-lg max-w-full h-auto max-h-lvh transform hover:scale-110 transition-transform duration-300" alt="Notice Image">
                                </div>
                            </AccordionItem>

                            <AccordionItem title="Payment Procedures">
                                <blockquote class="announce p-6 bg-gray-100 rounded-md mb-6">
                                <p class="mb-4 text-slate-800 font-semibold">You may settle your school fees through the following:</p>
                                <ul class="list-disc list-inside pl-4 mb-6">
                                    <li class="mb-4">A. Arellano University School of Law Campus - Bursar's Office</li>
                                    <li class="mb-4">B. Over-the-counter deposit at any BANCO DE ORO branch
                                    <ul class="list-disc list-inside pl-4 mb-4">
                                        <li class="mb-4">Fill-out cash/check transaction slip and deposit to:
                                        <br />Account Name: <b>ARELLANO LAW FOUNDATION INC.</b>
                                        </li>
                                    </ul>
                                    </li>
                                    <li class="mb-4">C. Online bank transfer
                                    <ul class="list-disc list-inside pl-4 mb-4">
                                        <li class="mb-4">Name of Bank: BANCO DE ORO UNIBANK
                                        <br />Account Name: ARELLANO LAW FOUNDATION INC.
                                        <br />Account No.: 0045 8000 3872
                                        </li>
                                        <li class="mb-4">For payment through bank, kindly email the copy/picture of the validated deposit slip (for over-the-counter deposit) or bank transfer confirmation (for online bank transfer) to: 
                                        <a href="mailto:jphorlina@arellanolaw.edu" class="text-blue-600 dark:text-blue-500 hover:underline">jphorlina@arellanolaw.edu</a> or 
                                        <a href="mailto:accounting@arellanolaw.edu" class="text-blue-600 dark:text-blue-500 hover:underline">accounting@arellanolaw.edu</a>.
                                        </li>
                                        <li class="mb-4">Please use your <b>FULL NAME</b> and <b>STUDENT NUMBER</b> as the email <b>SUBJECT</b> and include the following details:</li>
                                        <ul class="list-disc list-inside pl-4 mb-4">
                                        <li class="mb-4">a.) Date/Time of on-line transfer;</li>
                                        <li class="mb-4">b.) Bank where funds came from; and</li>
                                        <li class="mb-4">c.) The last three (3) digits of the account number where the transfer came from;</li>
                                        </ul>
                                        <li class="mb-4">An acknowledgement email will be sent back to you upon verification of your payment.</li>
                                    </ul>
                                    </li>
                                    <li class="mb-4">D. For online Transfer through <b>GCASH,</b> please furnish us with the email confirmation sent by GCASH.</li>
                                </ul>
                                <p class="mb-4 text-slate-800">You may claim your <b>OFFICIAL RECEIPTS</b> at the Bursar's Office whenever you are available.</p>
                                <p class="mb-4 text-slate-800">Should you have any clarifications, please do not hesitate to contact our Accounting Office at Tel Nos: 02-8404-3089 to 93 or kindly e-mail us at
                                    <a href="mailto:jphorlina@arellanolaw.edu" class="text-blue-600 dark:text-blue-500 hover:underline">jphorlina@arellanolaw.edu</a> or
                                    <a href="mailto:accounting@arellanolaw.edu" class="text-blue-600 dark:text-blue-500 hover:underline">accounting@arellanolaw.edu</a> and we will be more than glad to assist you.
                                </p>
                                <p class="text-slate-800"><b>For your guidance and information.</b></p>
                                </blockquote>
                            </AccordionItem>
    
                            <AccordionItem title="Rules Concerning Fees">
                                <blockquote class="announce p-6 bg-gray-100 rounded-md mb-6">
                                <p align="center" class="mb-4 text-slate-800"><b>Rules and Concerning Fees</b></p>
                                <p align="justify" class="mb-4 text-slate-600">1. When a student registers in a school, it is understood that he is enrolling for the entire semester for collegiate course.</p>
                                <p align="justify" class="mb-4 text-slate-600">2. A student who transfers or otherwise withdraws, in writing, during a regular semester within two weeks after the beginning of classes and who has already paid the pertinent tuition and other school fees in full or any length longer than one month shall be charged under the following schedule:</p>
                                <ul class="list-disc list-inside pl-4 mb-4 text-slate-600">
                                    <li class="mb-4">a. Ten percent (10%) of the total amount due for the term if he withdraws within the first week of classes, or twenty percent (20%) if within the second week of classes of whether or not has actually attended classes.</li>
                                    <li class="mb-4">b. The student shall be charged all the school fees in full if he withdraws anytime after the second week of classes.</li>
                                </ul>
                                <p align="right" class="text-slate-800"><b>Accounting Office</b></p>
                                </blockquote>
                            </AccordionItem>
    
                            <AccordionItem title="Guidelines for Credit Card Payments">
                                <blockquote class="announce p-6 bg-gray-100 rounded-md mb-6">
                                <p class="mb-4 text-slate-600">To: <b>ALL CONCERNED</b></p>
                                <p class="mb-4 text-slate-600">Date: February 11, 2021</p>
                                <p class="mb-4 text-slate-600">Re: <b>Guidelines for Credit Card Payments</b></p>
                                <p align="justify" class="mb-4 text-slate-600">For those intending to pay their tuition and other fees through credit card, payment may be done on-site.</p>
                                <p class="text-slate-600">For your guidance and information.</p>
                                </blockquote>
                            </AccordionItem>
                            </v-card-text>
                        </v-card>
                        </v-tabs-window-item>
                        <!-- tab2 -->
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
                    <!-- Section Header -->
                    <h2 class="mb-2 text-md leading-6 font-bold text-purple-900 capitalize">Accounting</h2>
                    <hr class="mb-2 border-1 border-purple-800">
                    
                    <!-- Tabs -->
                    <v-tabs v-model="tab" color="#22c55e" direction="vertical">
                        <!-- Tab 1 -->
                        <v-tab value="option-1">
                        <h1 :class="{
                            'text-gray-800': tab !== 'option-1',  // Non-active tab
                            'text-purple-900': tab === 'option-1', // Active tab
                            'capitalize text-md text-slate-600 hover:text-slate-900': true // Common styles
                        }">
                            Latest Announcements
                        </h1>
                        </v-tab>
                        <!-- Tab 2 -->
                        <v-tab value="option-2">
                        <h1 :class="{
                            'text-gray-800': tab !== 'option-2',  // Non-active tab
                            'text-purple-900': tab === 'option-2', // Active tab
                            'capitalize text-md text-slate-600 hover:text-slate-900': true // Common styles
                        }">
                            Archives
                        </h1>
                        </v-tab>
                    </v-tabs>
                    
                    <!-- Related Offices -->
                    <div class="mt-4">
                        <h2 class="mb-2 text-md leading-6 font-bold text-purple-900 capitalize">Related Offices</h2>
                        <hr class="mb-4 border-1 border-purple-800">
                        <ul class="list-inside list-disc">
                        <li v-for="(item, index) in links" :key="index" class="mb-2 font-semibold">
                            <a :href="item.url" class="py-1 text-sm text-slate-600 hover:text-slate-900">
                            {{ item.text }}
                            </a>
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
    import EmptyEstate from '@/Pages/Main/Student/EmptyState.vue'
    
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