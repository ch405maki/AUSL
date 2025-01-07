<template>
    <Head title="Downloadable Forms" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Downloadable Forms</h2>
      </template>

      <template #action>
        <div class="flex justify-end flex-grow p-3">
            <a href="#">
                <v-btn @click="showModal = true" color="primary" class="w-full md:w-auto px-4">
                    Upload Form
                    <v-icon right>mdi-plus</v-icon>
                </v-btn>
            </a>
        </div>
      </template>
  
      <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
        <main class="flex-grow">
          <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row w-full justify-center mb-6">
              <!-- Main content section -->
              <div class="w-full mx-4">
                <!-- Table area -->
              </div>
              <!-- End main content section -->
            </div>
          </div>
        </main>
      </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head, Link, useForm } from '@inertiajs/vue3';
  import Swal from 'sweetalert2';
  import PrimaryButton from '@/Components/PrimaryButton.vue';
  import { Inertia } from '@inertiajs/inertia';

  const form = useForm({
    link: '',
  });

</script>

  
  <style scoped>
  .carousell-image {
    max-width: 100%;
    width: 495px;
    height: 205px;
    margin-right: 0px;
  }
  
  .mx-auto.text-center {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .v-btn {
    width: 100%;
    transition: all 0.3s ease-in-out;
  }
  
  .v-btn:hover {
    transform: scale(1.05);
  }
  
  .v-icon {
    margin-left: 8px;
  }
  
  .p-4 {
    padding: 1px;
  }
  </style>