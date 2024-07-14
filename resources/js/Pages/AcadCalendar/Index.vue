<template>
    <MainLayout>
        <Head title="Academic Calendar" />
        <main class="flex-grow">
        <div class="container mx-auto px-4 py-4 lg:py-8">
            <div class="flex flex-col md:flex-row justify-center">
            <!-- Main content section -->
            <div class="w-full p-1">
                <h1 class="text-xl md:text-2xl lg:text-3xl font-bold">Academic Calendar Page</h1>
            </div>
            </div>
        </div>
        </main>
    </MainLayout>
</template>

<script setup>
    import { ref } from 'vue';
    import { Head } from '@inertiajs/vue3';
    import { Inertia } from '@inertiajs/inertia';
    import MainLayout from '@/Layouts/MainLayout.vue';

</script>