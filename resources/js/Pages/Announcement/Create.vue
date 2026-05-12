<template>
  <Head title="Create" />
    <AuthenticatedLayout>
        <template #action >
          <div class="flex justify-end p-3">
          <a href="/posts">
            <v-btn color="primary" class="w-full md:w-auto px-4">
                Back
            </v-btn>
            </a>
          </div>
        </template>  

        <main>
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden ">
              {{ imagePath }}
              <form @submit.prevent="submitForm" class="bg-white py-6 mb-8 shadow-sm rounded-lg">
                  <div class="mx-8 grid grid-cols-1 gap-x-6 gap-y-8 grid-cols-12">
                    <!-- category Input -->
                    <div class="col-span-12 grid grid-cols-2 gap-6">
                    <!-- Category Input -->
                    <div>
                      <InputLabel for="category" value="Category" />
                      <select
                        v-model="form.category"
                        class="mt-1 block w-full border border-gray-300 rounded-lg"
                        id="category"
                        required
                      >
                        <option value="Announcement">Announcement</option>
                        <option value="Deans">Deans Corner</option>
                        <option value="Events">Events</option>
                        <option value="Exam">Exams [Deans]</option>
                        <option value="underExam">Under Exam [Deans]</option>
                      </select>
                    </div>

                    <!-- Created At Input -->
                    <div>
                      <InputLabel for="created_at" value="Date" />
                      <TextInput
                        id="created_at"
                        v-model="form.created_at"
                        required
                        type="date"
                        class="mt-1 block w-full border border-gray-300 rounded-lg"
                      />
                    </div>
                  </div>

                    <!-- Title Input -->
                  <div class="col-span-12">
                    <InputLabel for="title" value="Title" />
                    <TextInput
                      id="title"
                      v-model="titleCaseTitle"
                      autofocus
                      required
                      type="text"
                      class="mt-1 block w-full border border-gray-300 rounded-lg"
                      placeholder="Headline Here..."
                    />
                  </div>

                    <!-- Pubmat Section -->
                    <div class="col-span-12">
                      <InputLabel value="Pubmat" />
                      <div class="flex gap-2 mt-1">
                        <button type="button" @click="pubmatMode = 'none'" :class="['px-3 py-1 rounded text-sm', pubmatMode === 'none' ? 'bg-gray-800 text-white' : 'bg-gray-200 text-gray-700']">None</button>
                        <button type="button" @click="pubmatMode = 'create'" :class="['px-3 py-1 rounded text-sm', pubmatMode === 'create' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700']">Create Pubmat</button>
                        <button type="button" @click="pubmatMode = 'upload'" :class="['px-3 py-1 rounded text-sm', pubmatMode === 'upload' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700']">Upload Pubmat</button>
                      </div>

                      <!-- Create Mode -->
                      <div v-if="pubmatMode === 'create'" class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2">
                          <div id="pubmat-preview" class="relative max-w-full mx-auto border rounded-lg overflow-hidden">
                            <div class="relative">
                              <img src="/images/announcement/announcementbg.jpg" alt="Pubmat Background" class="w-full" />
                              <div
                                class="absolute text-white font-semibold"
                                style="top: 22%; left: 3%; right: 3%; max-width: 94%; word-wrap: break-word; font-size: clamp(0.8rem, 3.5vw, 2.5rem); line-height: 1.2; letter-spacing: 0.01em; padding: 0.5%; padding-top: 0;"
                              >
                                <div v-html="pubmatContent"></div>
                              </div>
                              <div
                                class="absolute text-white font-normal"
                                style="top: 78%; left: 3%; right: 3%; max-width: 94%; word-wrap: break-word; font-size: clamp(0.5rem, 1.8vw, 1.25rem); line-height: 1.4; letter-spacing: 0.01em; padding: 0.5%; padding-top: 0;"  >
                                <div class="text-center" v-html="pubmatFootnote"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="lg:col-span-1 space-y-4">
                          <div>
                            <InputLabel for="pubmat-content" value="Pubmat Content" />
                            <ckeditor id="pubmat-content" :editor="editor" v-model="pubmatContent" :config="pubmatEditorConfig"></ckeditor>
                          </div>
                          <div>
                            <InputLabel for="pubmat-footnote" value="Pubmat Footnote" />
                            <ckeditor id="pubmat-footnote" :editor="editor" v-model="pubmatFootnote" :config="pubmatEditorConfig"></ckeditor>
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
                          class="mt-1 block w-full border border-gray-300 rounded-lg"
                        />
                        <div v-if="previewPubmat" class="mt-2 relative w-[100px]">
                          <img :src="previewPubmat" alt="Pubmat Preview" class="w-full h-auto rounded-md" />
                          <button @click="removePubmat" type="button" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center font-bold">X</button>
                        </div>
                      </div>
                    </div>

                    <!-- Content Input with CKEditor -->
                    <div class="col-span-12">
                      <InputLabel for="content" value="Content" />
                      <ckeditor :editor="editor" v-model="form.content" :config="editorConfig"></ckeditor>
                    </div>

                    <!-- Image Upload Section -->
                    <div class="col-span-12">
                      <label for="image-upload" class="block text-sm font-medium leading-6 text-gray-900">Upload Image (s)</label>
                      <div class="mt-2 flex justify-center rounded-lg border border-dashed border-
                      gray-900/25 px-6 py-10">
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
                      <span v-if="errors.image" class="text-red-500 text-sm">{{ errors.image }}</span>
                    </div>

                    <!-- Iframe Input -->
                    <div class="col-span-12">
                      <InputLabel for="iframe" value="Iframe" />
                      <TextInput
                        id="iframe"
                        v-model="form.iframe"
                        autofocus
                        type="text"
                        class="mt-1 block w-full border border-gray-300 rounded-lg"
                        placeholder="iframe Here..."
                      />
                    </div>

                    <div class="col-span-12 mt-4">
                      <InputLabel for="link" value="Link" />
                      <TextInput
                        id="link"
                        v-model="form.link"
                        autofocus
                        type="text"
                        class="mt-1 block w-full border border-gray-300 rounded-lg"
                        placeholder="Enter link..."
                      />
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="col-span-12 flex justify-center">
                      <PrimaryButton :disabled="processing">
                        <i class="fa-solid fa-save"></i> Save
                      </PrimaryButton>
                    </div>
                  </div>
              </form>
              </div>
            </div>
        </main>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Footer from '@/Layouts/Partials/Footer.vue';
import Swal from 'sweetalert2';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Inertia } from '@inertiajs/inertia';
import html2canvas from 'html2canvas';
const props = defineProps({
  imagePath: String, 
});


const form = useForm({
title: '',
content: '',
iframe: '',
image: [],
pubmat: null,
category: '',
state: 'Active',
link: null,
created_at: '',
});

const previewImages = ref([]);
const previewPubmat = ref(null); // Ref for pubmat preview
const errors = ref({});

const pubmatMode = ref('create');
const pubmatContent = ref('<p>Text content goes here.</p>');
const pubmatFootnote = ref('<p>Foot note.</p>');
const processing = ref(false);

// Handle file change for images
const handleFileChange = (event) => {
const files = event.target.files;
previewImages.value = [];
form.image = [];

Array.from(files).forEach(file => {
const reader = new FileReader();
reader.onload = (e) => previewImages.value.push(e.target.result);
reader.readAsDataURL(file);
form.image.push(file);
});
};

// Handle pubmat file change
const handlePubmatChange = (event) => {
const file = event.target.files[0];
if (file) {
const reader = new FileReader();
reader.onload = (e) => previewPubmat.value = e.target.result; // Set preview for pubmat
reader.readAsDataURL(file);
form.pubmat = file; // Assign the file to the form pubmat field
}
};

const removeImage = (index) => {
previewImages.value.splice(index, 1);
form.image.splice(index, 1);
};

const removePubmat = () => {
previewPubmat.value = null;
form.pubmat = null;
};

// Submit the form
const submitForm = async () => {
processing.value = true;
const formData = new FormData();
formData.append('title', form.title);
formData.append('content', form.content);
formData.append('category', form.category);
formData.append('created_at', form.created_at);
if (form.iframe) formData.append('iframe', form.iframe);
if (form.link) formData.append('link', form.link);
form.image.forEach((image) => formData.append('image[]', image));

if (pubmatMode.value === 'create') {
  const targetEl = document.querySelector('#pubmat-preview');
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
} else if (form.pubmat) {
  formData.append('pubmat', form.pubmat);
}

Inertia.post(route('announcement.store'), formData, {
onSuccess: () => {
  form.reset();
  previewImages.value = [];
  previewPubmat.value = null;
  pubmatMode.value = 'none';
  pubmatContent.value = '<p>Text content goes here.</p>';
  pubmatFootnote.value = '<p>Foot note.</p>';
  errors.value = {};
  processing.value = false;
},
onError: (error) => {
  errors.value = error;
  processing.value = false;
},
});
};

const titleCaseTitle = computed({
  get() {
    return form.title;
  },
  set(value) {
    form.title = value.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
  },
});

const editor = ClassicEditor;
const editorConfig = {
toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote','insertTable', 'mediaEmbed', ],
};

const pubmatEditorConfig = {
toolbar: ['heading', 'bold', 'italic', 'fontSize', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'mediaEmbed'],
};
</script>


<style scoped>
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