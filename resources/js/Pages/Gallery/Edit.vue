<template>
<AuthenticatedLayout>
    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-center mb-4">Update Gallery</h2>
    <form @submit.prevent="updateGallery" enctype="multipart/form-data">
      <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input
          v-model="form.title"
          type="text"
          id="title"
          placeholder="Enter the gallery title"
          required
          class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
        />
      </div>

      <div class="mb-4">
        <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
        <input
          v-model="form.year"
          type="text"
          id="year"
          placeholder="Enter the year"
          required
          class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
        />
      </div>

      <div class="w-full p-1">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div v-for="(image, index) in gallery.images" :key="index" class="mb-4">
                    <img :src="image" alt="Gallery Image" class="w-full rounded-lg shadow-sm" @click="showLightbox(index)" />
                </div>
            </div>
        </div>

      <div class="mb-4">
        <label for="newImages" class="block text-sm font-medium text-gray-700">Upload Additional Images</label>
        <input
          type="file"
          id="newImages"
          @change="handleFileChange"
          multiple
          class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border file:border-gray-300 file:text-sm file:font-semibold file:bg-blue-50 hover:file:bg-blue-100"
        />
      </div>

      <button
        type="submit"
        class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
      >
        Update Gallery
      </button>
    </form>
  </div>
</AuthenticatedLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps(['gallery']);
const form = ref({
  title: props.gallery.title,
  year: props.gallery.year,
  newImages: [],
});

const handleFileChange = (event) => {
  form.value.newImages = Array.from(event.target.files);
};

const updateGallery = () => {
  const formData = new FormData();
  formData.append('title', form.value.title);
  formData.append('year', form.value.year);
  formData.append('_method', 'PUT'); // Spoof the method to PUT for Laravel
  form.value.newImages.forEach((file, index) => {
    formData.append(`newImages[${index}]`, file);
  });

  Inertia.post(route('gallery.update', props.gallery.id), formData, {
    onSuccess: () => {
      Swal.fire('Success', 'Gallery updated successfully', 'success');
    },
    onError: (error) => {
      Swal.fire('Error', error.message || 'Failed to update gallery', 'error');
    },
  });
};
</script>

