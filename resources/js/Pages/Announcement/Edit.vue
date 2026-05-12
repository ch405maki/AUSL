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
  
          <!-- Existing Pubmat Preview -->
          <div v-if="existingPubmatUrl && pubmatMode !== 'create'" class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Current Pubmat</label>
            <img :src="existingPubmatUrl" alt="Current Pubmat" class="w-48 h-auto rounded-lg shadow-sm border" />
          </div>

          <!-- Pubmat Section -->
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Pubmat</label>
            <div class="flex gap-2 mt-1">
              <button type="button" @click="pubmatMode = 'none'" :class="['px-3 py-1 rounded text-sm', pubmatMode === 'none' ? 'bg-gray-800 text-white' : 'bg-gray-200 text-gray-700']">Keep Existing</button>
              <button type="button" @click="pubmatMode = 'create'" :class="['px-3 py-1 rounded text-sm', pubmatMode === 'create' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700']">Create New</button>
              <button type="button" @click="pubmatMode = 'upload'" :class="['px-3 py-1 rounded text-sm', pubmatMode === 'upload' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700']">Upload New</button>
            </div>

            <!-- Create Mode -->
            <div v-if="pubmatMode === 'create'" class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-6">
              <div class="lg:col-span-2">
                <div id="pubmat-preview-edit" class="relative max-w-full mx-auto border rounded-lg overflow-hidden">
                    <div class="relative">
                    <img src="/images/announcement/announcementbg.jpg" alt="Pubmat Background" class="w-full" />
                    <div class="absolute top-20 left-10 text-white font-semibold text-2xl p-4" style="max-width: 600px; word-wrap: break-word;">
                      <div v-html="pubmatContent"></div>
                    </div>
                    <div class="absolute top-80 left-10 text-white font-normal text-base p-4" style="max-width: 600px; word-wrap: break-word;">
                      <div class="text-center" v-html="pubmatFootnote"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="lg:col-span-1 space-y-4">
                <div>
                  <label for="pubmat-content-edit" class="block text-sm font-medium text-gray-700">Pubmat Content</label>
                  <ckeditor id="pubmat-content-edit" :editor="editor" v-model="pubmatContent" :config="pubmatEditorConfig"></ckeditor>
                </div>
                <div>
                  <label for="pubmat-footnote-edit" class="block text-sm font-medium text-gray-700">Pubmat Footnote</label>
                  <ckeditor id="pubmat-footnote-edit" :editor="editor" v-model="pubmatFootnote" :config="pubmatEditorConfig"></ckeditor>
                </div>
              </div>
            </div>

            <!-- Upload Mode -->
            <div v-if="pubmatMode === 'upload'" class="mt-4">
              <input
                type="file"
                id="pubmat"
                @change="handlePubmatChange"
                accept="image/*"
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border file:border-gray-300 file:text-sm file:font-semibold file:bg-blue-50 hover:file:bg-blue-100"
              />
            </div>
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
import { ref, computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import CKEditor from '@ckeditor/ckeditor5-vue';
import html2canvas from 'html2canvas';
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
  created_at: props.post.created_at ? formatDate(props.post.created_at) : '', 
  newImages: [],
  pubmat: null,
});

const pubmatMode = ref(props.post.pubmat ? 'none' : 'none');
const pubmatContent = ref('<p>Text content goes here.</p>');
const pubmatFootnote = ref('<p>Foot note.</p>');

const existingPubmatUrl = computed(() => props.post.pubmat || null);

const handleFileChange = (event) => {
  form.value.newImages = Array.from(event.target.files);
};

const handlePubmatChange = (event) => {
  form.value.pubmat = event.target.files[0];
};

const updatePost = async () => {
  if (!form.value.created_at) {
    Swal.fire('Error', 'Date is required', 'error');
    return;
  }

  const formData = new FormData();
  formData.append('title', form.value.title);
  formData.append('content', form.value.content);
  formData.append('link', form.value.link);
  formData.append('created_at', form.value.created_at);
  formData.append('_method', 'PUT');

  form.value.newImages.forEach((file, index) => {
    formData.append(`newImages[${index}]`, file);
  });

  if (pubmatMode.value === 'create') {
    const targetEl = document.querySelector('#pubmat-preview-edit');
    if (targetEl) {
      try {
        const canvas = await html2canvas(targetEl, { scale: 2, useCORS: true });
        const blob = await new Promise(resolve => canvas.toBlob(resolve, 'image/webp', 0.85));
        if (blob) {
          formData.append('pubmat', new File([blob], 'pubmat.webp', { type: 'image/webp' }));
        }
      } catch (e) {
        console.error('Pubmat capture failed:', e);
      }
    }
  } else if (form.value.pubmat) {
    formData.append('pubmat', form.value.pubmat);
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

const pubmatEditorConfig = {
  toolbar: ['heading', 'bold', 'italic', 'fontSize', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'mediaEmbed'],
};
</script>

