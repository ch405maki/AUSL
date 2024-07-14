<template>
    <Head title="carousell" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Carousell</h2>
      </template>
  
      <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900 lg:pt-10">
        <main class="flex-grow">
          <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row w-full justify-center">
              <!-- Main content section -->
              <div class="w-full md:w-2/3 p-1">
                <v-table fixed-header height="500px">
                  <thead>
                    <tr>
                      <th class="text-left w-1/12">Number</th>
                      <th class="text-left">Preview</th>
                      <th class="text-left w-1/12">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(post, index) in carousells" :key="post.id">
                      <td>{{ index + 1 }}</td>
                      <td><img :src="post.image" alt="Image Logo" class="carousell-image"></td>
                      <td>
                        <v-btn color="red" @click="deletePost(post.id)" class="my-2" block>
                          Delete <v-icon right>mdi-delete</v-icon>
                        </v-btn>
                      </td>
                    </tr>
                  </tbody>
                </v-table>
              </div>
              <!-- End main content section -->
  
              <!-- Links, Events & Seminars -->
              <div class="w-full md:w-1/3 p-2 flex justify-start">
                <form @submit.prevent="submitForm" class="w-full">
                  <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12">
                    <!-- Image Upload Section -->
                    <div class="col-span-full">
                      <label for="image-upload" class="block text-sm font-medium leading-6 text-gray-900">Carousell Photo</label>
                      <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div v-if="previewImage" class="mb-4">
                          <img :src="previewImage" alt="Selected Image Preview" class="w-full rounded-lg shadow-sm" />
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
                              class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500"
                            >
                              <span>Upload an image</span>
                              <input id="image-upload" name="image-upload" type="file" class="sr-only" @change="handleFileChange" />
                            </label>
                            <p class="pl-1">or drag and drop</p>
                          </div>
                          <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                        </div>
                      </div>
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
              <!-- End Links, Events & Seminars -->
            </div>
          </div>
        </main>
        <!-- Footer -->
        <Footer />
        <!-- Footer -->
      </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head, Link, useForm } from '@inertiajs/vue3';
  import Footer from '@/Layouts/Partials/Footer.vue';
  import Swal from 'sweetalert2';
  import PrimaryButton from '@/Components/PrimaryButton.vue';
  import { Inertia } from '@inertiajs/inertia';
  
  const props = defineProps({
    carousells: { type: Array, required: true },
  });
  
  const form = useForm({
    image: null,
  });
  
  const previewImage = ref(null);
  
  const handleFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = (e) => {
        previewImage.value = e.target.result;
      };
      reader.readAsDataURL(file);
    } else {
      previewImage.value = null;
    }
    form.image = file;
  };
  
  const deletePost = (id) => {
    const alerta = Swal.mixin({
      buttonsStyling: true,
    });
  
    alerta.fire({
      title: 'Are you sure delete?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: '<i class="fa-solid fa-check"></i> Yes, delete',
      cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
    }).then((result) => {
      if (result.isConfirmed) {
        form.delete(route('carousell.destroy', id));
      }
    });
  };
  
  const submitForm = () => {
    const formData = new FormData();
    if (form.image) {
      formData.append('image', form.image);
    }
  
    form.post(route('carousell.store'), {
      data: formData,
      onSuccess: () => {
        // Clear the form after a successful submission
        form.reset();
        previewImage.value = null;
      },
      headers: {
        'Content-Type': 'multipart/form-data',
      },
    });
  };
  
  const editor = ClassicEditor;
  const editorConfig = {
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
  };
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