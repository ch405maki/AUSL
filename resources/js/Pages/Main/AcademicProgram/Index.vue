<template>
    <MainLayout>
        <Head title="Academic Program" />
        <main class="flex-grow">
        <div class="container mx-auto px-4 py-4 lg:py-8">
            <div class="flex flex-col md:flex-row justify-center">
            <!-- Main content section -->
            <div class="w-full p-1">
                <EmptyEstate />
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
    import EmptyEstate from '@/Pages/Main/Student/EmptyState.vue'

</script>