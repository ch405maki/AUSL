
<template>
    <MainLayout>
        <v-empty-state
            headline="Whoops!"
            title="This page is currently under development."
            text="The content you are looking for is not available yet."
            image="/images/ausllogo2.png"
            class="text-white py-10"
            :style="{
                backgroundImage: 'url(/images/student/library.jpg)',
                backgroundSize: 'cover',
                backgroundPosition: 'center',
                height: '',
                width: '100%',
            }"
            >
            <template #headline>
                <h1 class="text-white">Whoops!</h1>
            </template>
        </v-empty-state>
    </MainLayout>
</template>

<script setup>
    import { ref} from 'vue';
    import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<style scoped>
.bg-library {
  background-image: url('/images/student/library.jpg');
  background-size: cover;
  background-position: center;
  height: 100svh;
  width: 100%;
}
</style>
