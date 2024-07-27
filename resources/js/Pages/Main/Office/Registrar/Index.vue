    <template>
        <MainLayout>
        <Head title="Registrar" />
        <div class="flex flex-col min-h-screen">
            <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row w-full justify-center">
                <!-- Main content section -->
                <div class="w-full md:w-2/2 p-2">
                    <v-card class="soft-shadow">
                    <div>
                        <!-- Main Tabs -->
                        <v-tabs-window v-model="tab">
                        <!-- tab1 -->
                        <v-tabs-window-item value="option-1">
                            <v-card flat>
                            <v-card-text>
                                <!-- Beautiful Header Section -->
                                <div class="header-container p-6 rounded-sm mb-6 border-l-4 border-purple-900 bg-purple-50">
                                    <div class="text-left">
                                    <h1 class="text-2xl font-bold text-purple-900 mb-4">Welcome to the Registrar's Section</h1>
                                    <p class="text-lg text-slate-800 mb-6">Discover various aspects of Registrar's and stay up-to-date with our latest announcements.</p>
                                    </div>
                                </div>
                                <!-- End of Header Section initialOpen-->
                                
                                <AccordionItem title="Issuance and Release of 2024 BAR Documents">
                                    <div class="item"> Description</div>
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
                        <!-- tab3 -->
                        <v-tabs-window-item value="option-3">
                            <v-card flat>
                            <v-card-text>
                                <EmptyEstate />
                            </v-card-text>
                            </v-card>
                        </v-tabs-window-item>
                        </v-tabs-window>
                    </div>
                    </v-card>
                </div>
                <!-- End main content section -->
                <!-- Links -->
                <div class="w-full md:w-1/5 p-2 flex justify-start mt-4">
                    <div class="text-left w-full">
                    <div class="mb-2">
                        <h2 class="mb-2 text-md leading-6 font-bold text-purple-900 capitalize">Registrar's</h2>
                        <hr class="mb-2 border-1 border-purple-800">
                        <!-- v-tabs component with dynamic tab handling -->
                        <v-tabs v-model="tab" color="#22c55e" direction="vertical">
                        <v-tab style="none" value="option-1" @click="toggleDropdown" class="flex items-center">
                            <h1 :class="{'text-grey-800': tab !== 'option-1', 'capitalize text-md text-slate-600 hover:text-slate-900': true, 'text-purple-900': tab === 'option-1'}">Latest Announcements</h1>
                        </v-tab>
                        
                        <!-- Main menu items -->
                        <v-tab value="option-2">
                            <h1 :class="{'text-grey-800': tab !== 'option-2', 'capitalize text-md text-slate-600 hover:text-slate-900': true, 'text-purple-900': tab === 'option-2'}">
                            Memorandum Archives
                            </h1>
                        </v-tab>
                        <v-tab value="option-3">
                            <h1 :class="{'text-grey-800': tab !== 'option-3', 'capitalize text-md text-slate-600 hover:text-slate-900': true, 'text-purple-900': tab === 'option-3'}">
                            Forms
                            </h1>
                        </v-tab>
                        <div class="mt-4">
                            <h2 class="mb-2 text-md leading-6 font-bold text-purple-900 capitalize">Official Email Address</h2>
                            <hr class="mb-2 border-1 border-purple-800">
                            <a href="mailto:registrar@university.edu" class="ml-4 text-mb font-semibold text-slate-600 transition-colors hover:underline hover:text-purple-900">
                                registrar@university.edu
                            </a>
                        </div>
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
    import { Link, Head } from '@inertiajs/vue3';
    import { defineProps, ref, computed } from 'vue';
    import MainLayout from '@/Layouts/MainLayout.vue';
    import EmptyEstate from '@/Pages/Main/Student/EmptyState.vue'
    
    // Define props here
    const props = defineProps({
        post: {
        type: Object,
        required: true,
        },
    });
    
    const tab = ref('option-1');
    const subTab = ref('bar-documents-2024');
    const showDropdown = ref(false);
    
    const toggleDropdown = () => {
        showDropdown.value = !showDropdown.value;
    };

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
            <div class="py-2 border-b border-gray-200 dark:border-gray-700 ml-4">
                <slot></slot>
            </div>
            </div>
        </div>
        `
    };
    
    // Computed property to get the title of the active tab
    const activeTabTitle = computed(() => {
        switch (tab.value) {
        case 'option-1':
            return '/';
        case 'option-2':
            return '/';
        case 'option-3':
            return '/';
        case 'bar-documents-2024':
            return '/';
        case 'graduation-application':
            return '/';
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
    </script>
    
    <style scoped>
    @import url('https://db.onlinewebfonts.com/c/14ab77252fbc4bdca1dbdf8051cb7e96?family=BF+Invicta+W00+Bold');
    
    .text-invicta {
        font-family: 'BF Invicta W00 Bold', sans-serif;
    }
    
    .soft-shadow {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    </style>