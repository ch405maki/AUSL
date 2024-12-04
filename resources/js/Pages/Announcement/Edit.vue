<template>
    <AuthenticatedLayout>
      <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center mb-4">Update Post</h2>
        <form @submit.prevent="updatePost" enctype="multipart/form-data">
        <!-- Created At Date -->
          <div class="mb-4">
            <label for="created_at" class="block text-sm font-medium text-gray-700">Date</label>
            <input
              v-model="form.created_at"
              type="date"
              id="created_at"
              class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
            />
          </div>
          <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input
              v-model="form.title"
              type="text"
              id="title"
              placeholder="Enter title"
              required
              class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
            />
          </div>
  
        <!-- CKEditor for Content -->
        <div class="mb-4">
          <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
          <ckeditor
            v-model="form.content"
            :editor="editor"
            :config="editorConfig"
            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
          />
        </div>
          <div class="mb-4">
            <label for="link" class="block text-sm font-medium text-gray-700">Link</label>
            <input
              v-model="form.link"
              type="url"
              id="link"
              placeholder="Enter URL (optional)"
              class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
            />
          </div>
  
          <!-- Image Upload Section -->
          <div class="w-full p-1">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
              <div v-for="(image, index) in post.image" :key="index" class="mb-4">
                <img :src="image" alt="Image" class="w-full rounded-lg shadow-sm" @click="showLightbox(index)" />
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
  
          <div class="mb-4">
            <label for="pubmat" class="block text-sm font-medium text-gray-700">Upload Pubmat Image</label>
            <input
              type="file"
              id="pubmat"
              @change="handlePubmatChange"
              class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border file:border-gray-300 file:text-sm file:font-semibold file:bg-blue-50 hover:file:bg-blue-100"
            />
          </div>
  
          <button
            type="submit"
            class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
          >
            Update Post
          </button>
        </form>
      </div>
    </AuthenticatedLayout>
  </template>
  
  
  <script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import CKEditor from '@ckeditor/ckeditor5-vue';

const props = defineProps(['post']);

// Helper to format date to YYYY-MM-DD
const formatDate = (date) => {
  const d = new Date(date);
  const month = String(d.getMonth() + 1).padStart(2, '0');
  const day = String(d.getDate()).padStart(2, '0');
  const year = d.getFullYear();
  return `${year}-${month}-${day}`;
};

const form = ref({
  title: props.post.title,
  content: props.post.content ?? '',
  link: props.post.link || '',
  created_at: props.post.created_at ? formatDate(props.post.created_at) : '', // Format the date
  newImages: [],
  pubmat: null,
});

const handleFileChange = (event) => {
  form.value.newImages = Array.from(event.target.files);
};

const handlePubmatChange = (event) => {
  form.value.pubmat = event.target.files[0];
};

const updatePost = () => {
  if (!form.value.created_at) {
    Swal.fire('Error', 'Date is required', 'error');
    return;
  }

  const formData = new FormData();
  formData.append('title', form.value.title);
  formData.append('content', form.value.content); // Add content
  formData.append('link', form.value.link); // Add link
  formData.append('created_at', form.value.created_at); // Always append the date
  formData.append('_method', 'PUT'); // Spoof the method to PUT for Laravel

  form.value.newImages.forEach((file, index) => {
    formData.append(`newImages[${index}]`, file);
  });

  if (form.value.pubmat) {
    formData.append('pubmat', form.value.pubmat); // Add pubmat
  }

  Inertia.post(route('announcement.update', props.post.id), formData, {
    onSuccess: () => {
      Swal.fire('Success', 'Updated successfully', 'success');
    },
    onError: (error) => {
      Swal.fire('Error', error.message || 'Failed to update', 'error');
    },
  });
};

const editor = ClassicEditor;
const editorConfig = {
  toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo'],
};
</script>

