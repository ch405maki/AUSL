<template>
    <AuthenticatedLayout>
      <template #action>
        <div class="flex justify-end p-3">
          <!-- Navigation button to add images -->
          <a href="/galleries">
            <v-btn color="primary" class="w-full md:w-auto px-4 py-2">
              Back
            </v-btn>
          </a>
        </div>
      </template>

    <div class="flex flex-col min-h-screen">
      <main class="flex-grow">
        <div class="max-w-7xl mx-auto">
          <div class="flex flex-col md:flex-row w-full justify-center mb-6">
          <!-- Main content section -->
            <div class="w-full mx-4">
              <div class="w-full py-4 flex justify-start bg-white rounded-lg">
              <form @submit.prevent="submitForm" class="w-full mx-8">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12">
                  <!-- For year input -->
                  <div class="col-span-full">
                    <label for="year" class="block text-sm font-medium leading-6 text-gray-900">Year</label>
                    <input
                      id="year"
                      name="year"
                      type="text"
                      v-model="form.year"
                      class="mt-2 block w-52 border border-gray-300 rounded-lg"
                      pattern="\d{4}" 
                      maxlength="4"
                      placeholder="YYYY"
                    />
                    <span v-if="errors.year" class="text-red-500 text-sm">{{ errors.year }}</span>
                  </div>

                  <!-- Title Input Section -->
                  <div class="col-span-full">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <input
                      id="title"
                      name="title"
                      type="text"
                      v-model="form.title"
                      class="mt-2 w-full border border-gray-300 rounded-lg"
                    />
                    <span v-if="errors.title" class="text-red-500 text-sm">{{ errors.title }}</span>
                  </div>
                  <!-- Image Upload Section -->
                  <div class="col-span-full">
                    <label for="image-upload" class="block text-sm font-medium leading-6 text-gray-900">Gallery Photo</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                      <div v-if="previewImages.length" class="mb-4 grid grid-cols-2 gap-2">
                        <div v-for="(image, index) in previewImages" :key="index" class="relative mb-2">
                          <img :src="image" alt="Selected Image Preview" class="preview-image rounded-lg shadow-sm" />
                          <button @click="removeImage(index)" class="remove-button">X</button>
                        </div>
                      </div>
                      <div v-else class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                          <path
                            fill-rule="evenodd"
                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                            clip-rule="evenodd"
                          />
                        </svg>
                        <div class="mt-2 flex text-sm leading-6 text-gray-600">
                          <label
                            for="image-upload"
                            class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600 hover:text-indigo-500"
                          >
                            <span>Upload images</span>
                            <input id="image-upload" name="image-upload" type="file" class="sr-only" @change="handleFileChange" multiple />
                          </label>
                          <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                      </div>
                    </div>
                    <span v-if="errors.images" class="text-red-500 text-sm">{{ errors.images }}</span>
                  </div>
                  <!-- Submit Button -->
                  <div class="sm:col-span-12 flex justify-center">
                    <PrimaryButton :disabled="form.processing">
                      <i class="fa-solid fa-save"></i> Save
                    </PrimaryButton>
                  </div>
                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
    import { ref } from 'vue';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import { useForm } from '@inertiajs/vue3';
    import Swal from 'sweetalert2';
    import { Inertia } from '@inertiajs/inertia';
    
    const form = useForm({ title: '', year: '', images: [] });
    const previewImages = ref([]);
    const errors = ref({});
    
    const handleFileChange = (event) => {
      const files = event.target.files;
      previewImages.value = [];
      form.images = [];
    
      Array.from(files).forEach(file => {
        const reader = new FileReader();
        reader.onload = (e) => previewImages.value.push(e.target.result);
        reader.readAsDataURL(file);
        form.images.push(file);
      });
    };
    
    const removeImage = (index) => {
      previewImages.value.splice(index, 1);
      form.images.splice(index, 1);
    };
    
    const submitForm = () => {
      const formData = new FormData();
      formData.append('title', form.title);
      formData.append('year', form.year);
      form.images.forEach((image) => formData.append('images[]', image));
    
      form.post(route('gallery.store'), {
        data: formData,
        onSuccess: () => {
          form.reset();
          previewImages.value = [];
          errors.value = {};
        },
        onError: (error) => errors.value = error,
        headers: { 'Content-Type': 'multipart/form-data' },
      });
    };
  </script>
  
  <style scoped>
    .remove-button {
      background-color: #f56565;
      color: #fff;
      border-radius: 50%;
      padding: 0.25rem;
      width: 1.5rem;
      height: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1rem;
      cursor: pointer;
      border: none;
      position: absolute;
      top: 0.25rem;
      right: 0.25rem;
    }
    
    .remove-button:hover {
      background-color: #e53e3e;
    }
  
    .preview-image {
      max-width: 100%;
      width: 150px; /* Adjust the width as needed */
      height: auto;
    }
  
    .grid-cols-2 {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1rem;
    }
  </style>
  