<template>
    <Head title="Chat" />
    <AuthenticatedLayout>
      <!-- <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Chat</h2>
      </template> -->
  
      <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900 lg:pt-10">
        <main class="flex-grow">
            <v-card flat>
                <v-card-text>
                <v-empty-state
                    headline="Whoops!"
                    title="This page is currently under development."
                    text="The content you are looking for is not available yet."
                    image="/images/AUSL_Logo.png"
                ></v-empty-state>
                </v-card-text>
            </v-card>
        </main>
        <!-- Footer -->
        <Footer />
        <!-- Footer -->
      </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import Footer from '@/Layouts/Partials/Footer.vue';
    import { ref, computed, defineProps } from 'vue';
    import { Head } from '@inertiajs/vue3';
  </script>
  
    <style scoped>
  
    </style>