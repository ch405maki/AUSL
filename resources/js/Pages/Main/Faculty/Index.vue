<template>
    <MainLayout>
        <Head title="Faculty" />
        <EmptyEstate />
    </MainLayout>
</template>

<script setup>
import { ref } from 'vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import EmptyEstate from '@/Pages/Main/Partials/EmptyState.vue'
</script>