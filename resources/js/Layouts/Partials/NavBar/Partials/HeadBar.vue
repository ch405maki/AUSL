<template>
    <nav ref="firstNav" class="bg-official-red-50 hidden lg:block z-50 border-b-[1px] fixed top-0 left-0 right-0 transition-all duration-300">
        <div class="max-w-7xl mx-auto">  
            <!-- Flex container for right alignment -->
            <div class="flex justify-end mt-[2px]">
            <!-- Dynamic Banner Link with Custom Icon -->
            <!-- <a v-if="banners.length :href="banners[0].link" target="_blank" rel="noopener noreferrer" class="outline-none focus:outline-none px-2 rounded-md flex items-center min-w-24">
                <svg class="w-4 h-4 mr-1 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14 3h7v7h-2V5.414l-7.293 7.293-1.414-1.414L17.586 4H14V3z"/>
                    <path d="M5 5v14h14v-6h2v6a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h6v2H5z"/>
                </svg>
                <span class="pr-1 font-medium text-gray-800 hover:text-purple-900 hover:underline">{{ banners[0].title }}</span>
            </a> -->

            <!-- AIMS Faculty Link with Faculty Icon -->
            <a href="https://aims.arellanolaw.edu/aims/faculty/" target="_blank" rel="noopener noreferrer" class="outline-none focus:outline-none px-2 rounded-md flex items-center min-w-24">
                <!-- User/Faculty Icon -->
                <svg class="w-4 h-4 mr-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2a5 5 0 100 10 5 5 0 000-10zm0 12c-5.523 0-10 2.238-10 5v3h20v-3c0-2.762-4.477-5-10-5z"/>
                </svg>
                <span class="pr-1 font-medium text-white hover:text-official-purple-900 hover:underline">AIMS Faculty</span>
            </a>

            <!-- AIMS Students Link with Student Icon -->
            <a href="https://aims.arellanolaw.edu/aims/students/" target="_blank" rel="noopener noreferrer" class="outline-none focus:outline-none px-2 rounded-md flex items-center min-w-24">
                <!-- User/Student Icon -->
                <svg class="w-4 h-4 mr-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2a5 5 0 100 10 5 5 0 000-10zm0 12c-5.523 0-10 2.238-10 5v3h20v-3c0-2.762-4.477-5-10-5z"/>
                </svg>
                <span class="pr-1 font-medium text-white hover:text-official-purple-900 hover:underline">AIMS Students</span>
            </a>
            <a  :href="route('academic.barreview')"  class="outline-none focus:outline-none px-2 rounded-md flex items-center min-w-24">
                <svg class="w-4 h-4 mr-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14 3h7v7h-2V5.414l-7.293 7.293-1.414-1.414L17.586 4H14V3z"/>
                    <path d="M5 5v14h14v-6h2v6a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h6v2H5z"/>
                </svg>
                <span class="pr-1 font-medium text-white hover:text-official-purple-900 hover:underline">Bar Review</span>
            </a>
            <a  :href="route ('academic.mcle')" class="outline-none focus:outline-none px-2 rounded-md flex items-center min-w-24">
                <svg class="w-4 h-4 mr-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14 3h7v7h-2V5.414l-7.293 7.293-1.414-1.414L17.586 4H14V3z"/>
                    <path d="M5 5v14h14v-6h2v6a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h6v2H5z"/>
                </svg>
                <span class="pr-1 font-medium text-white hover:text-official-purple-900 hover:underline">MCLE</span>
            </a>
            </div>
        </div>
    </nav>
</template>

<script setup>
    import { ref, onMounted } from 'vue';
    import { usePage } from '@inertiajs/vue3';
    const banners = ref([]);
    const fetchBanners = async () => {
    try {
        const response = await fetch('/banners');
        banners.value = await response.json();
    } catch (error) {
        console.error('Error fetching banners:', error);
    }
    };

    onMounted(fetchBanners);

    const { props: { ziggy } } = usePage();
    const route = window.route;

    const mainContentClass = ref('');

    const updateMainContentClass = () => {
    const width = window.innerWidth;
    mainContentClass.value = width >= 1024 ? 'main-content-desktop' : 'main-content-mobile';
    };

    onMounted(() => {
    updateMainContentClass();
    window.addEventListener('resize', updateMainContentClass);
    });
</script>
    
    <style scoped>

    .garamond {
    font-family: 'Garamond', serif;
    }

    .nav-btn {
    font-size: 0.875rem;
    color: white;
    transition: color 0.3s ease-in-out, opacity 0.3s ease-in-out;
    box-shadow: none !important;
    opacity: 1 !important;
    padding: 0.5rem 0.75rem;
    margin-right: 0.25rem;
    }

    .nav-btn:hover {
    color: #e2e8f0;
    box-shadow: none !important;
    opacity: 1 !important;
    }

    .active-tab {
    color: whitesmoke;
    border-bottom: 2px solid whitesmoke;
    border-radius: 0;
    }

    .main-content {
    transition: padding-top 0.2s ease-in-out;
    padding-top: 8rem;
    }

    .main-content-mobile {
    padding-top: 3rem;
    }

    @media (max-width: 1024px) {
    .nav-btn {
        font-size: 0.75rem;
        padding: 0.375rem 0.5rem;
        margin-right: 0.125rem;
    }
    }

    @media (max-width: 768px) {
    .nav-btn {
        font-size: 0.625rem;
        padding: 0.25rem 0.375rem;
        margin-right: 0.0625rem;
    }
    }

    .second-nav {
    top: 0 !important;
    }

    li>ul {
    transform: translatex(100%) scale(0);
    }

    li:hover>ul {
    transform: translatex(101%) scale(1);
    }

    li>button svg {
    transform: rotate(-90deg);
    }

    li:hover>button svg {
    transform: rotate(-270deg);
    }

    .group:hover .group-hover\:scale-100 {
    transform: scale(1);
    }

    .group:hover .group-hover\:-rotate-180 {
    transform: rotate(180deg);
    }

    .scale-0 {
    transform: scale(0);
    }

    .min-w-32 {
    min-width: 8rem;
    }
    </style>