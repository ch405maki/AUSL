<template>
    <div class="group inline-block relative">
        <button class="outline-none focus:outline-none px-2 py-2 text-white rounded-md flex items-center min-w-32">
        <span class="pr-1 font-normal flex-1 garamond uppercase">Contact Us</span>
        <span>
            <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-300 ease-in-out"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>;
            </svg>
        </span>
        </button>
        <ul class="bg-white border rounded-md shadow-lg transform scale-0 group-hover:scale-100 absolute transition duration-300 ease-in-out origin-top min-w-52 mt-2">
        <li class="rounded-md px-2 py-2 transition duration-150 ease-in-out">
            <a :href="(route('contact.index'))" class="block w-full text-left text-gray-600 hover:text-slate-900 font-normal cursor-pointer">Contact Us</a>
        </li>
        <li class="rounded-md px-2 py-2 transition duration-150 ease-in-out">
            <a :href="(route('contact.location'))" class="block w-full text-left text-gray-600 hover:text-slate-900 font-normal cursor-pointer">Location</a>
        </li>
        <li class="rounded-md px-2 py-2 transition duration-150 ease-in-out">
            <a :href="(route('contact.socials'))" class="block w-full text-left text-gray-600 hover:text-slate-900 font-normal cursor-pointer">Social Media Links</a>
        </li>
        </ul>
    </div>
</template>

    <script setup>
        import { ref, onMounted } from 'vue';
        import { usePage } from '@inertiajs/vue3';

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
    @import url('https://db.onlinewebfonts.com/c/2bf40ab72ea4897a3fd9b6e48b233a19?family=Garamond');

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