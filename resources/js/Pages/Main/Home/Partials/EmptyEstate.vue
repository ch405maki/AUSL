
<template>
    <MainLayout>
        <v-empty-state
        headline="Whoops!"
        title="This page is currently under development."
        text="The content you are looking for is not available yet."
        image="/images/ausllogo2.png"
        >
        </v-empty-state>
    </MainLayout>
</template>

<script setup>
    import { ref} from 'vue';
    import MainLayout from '@/Layouts/MainLayout.vue';
</script>

