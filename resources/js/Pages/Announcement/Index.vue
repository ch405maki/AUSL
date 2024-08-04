<template>
    <Head title="Post" />
  
    <AuthenticatedLayout>
      <template #header>
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">Post</h2>
      </template>
  
      <div class="flex flex-col mx-8 my-8">
        <div class="flex justify-end mb-4">
          <!-- Navigation button to add images -->
          <a href="posts/create">
            <v-btn color="primary" class="w-full md:w-auto px-4 py-2">
              Add Post
              <v-icon right>mdi-plus</v-icon>
            </v-btn>
          </a>
        </div>
      </div>
      
      <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
        <main class="flex-grow">
          <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row w-full justify-center">
              <!-- Main content section -->
              <div class="w-full mx-8">
                <v-table fixed-header height="500px">
                  <thead>
                    <tr>
                      <th class="text-left">Number</th>
                      <th class="text-left">Title</th>
                      <th class="text-left">Content</th>
                      <th class="text-left">Preview</th>
                      <th class="text-left">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(post, index) in posts" :key="post.id">
                      <td>{{ index + 1 }}</td>
                      <td>{{ post.title }}</td>
                      <td v-html="post.content.substring(0, 200)"></td>
                      <td><img :src="post.image" alt="Image Logo" class="min-w-32 w-32 h-min max-h-100 mr-2"></td>
                      <td>
                        <v-menu anchor="bottom end" open-on-hover>
                          <template v-slot:activator="{ props }">
                            <v-btn color="primary" v-bind="props">
                              Action
                              <v-icon end>mdi-wrench</v-icon>
                            </v-btn>
                          </template>
                          <v-list>
                            <v-list-item>
                              <div class="mx-auto text-center p-4">
                                <v-btn color="red" @click="deletePost(post.id, post.title)" class="my-2" block>
                                  Delete
                                  <v-icon right>mdi-delete</v-icon>
                                </v-btn>
                                <v-btn color="primary" @click="() => showPost(post.id)" class="my-2" block>
                                  Show
                                  <v-icon right>mdi-eye</v-icon>
                                </v-btn>
                              </div>
                            </v-list-item>
                          </v-list>
                        </v-menu>
                      </td>
                    </tr>
                  </tbody>
                </v-table>
              </div>
              <!-- End main content section -->
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
  import InputLabel from '@/Components/InputLabel.vue';
  import PrimaryButton from '@/Components/PrimaryButton.vue';
  import TextInput from '@/Components/TextInput.vue';
  import { Inertia } from '@inertiajs/inertia';
  
  const props = defineProps({
    posts: { type: Array, required: true },
  });
  
  const form = useForm({
    title: '',
    content: '',
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
  
  const showPost = (id) => {
  Inertia.visit(`/show/${id}`);
  };
  
  const deletePost = (id, title) => {
    const alerta = Swal.mixin({
      buttonsStyling: true,
    });
  
    alerta.fire({
      title: 'Are you sure delete ' + title + ' ?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: '<i class="fa-solid fa-check"></i> Yes, delete',
      cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
    }).then((result) => {
      if (result.isConfirmed) {
        form.delete(route('posts.destroy', id));
      }
    });
  };
  
  const submitForm = () => {
    const formData = new FormData();
    formData.append('title', form.title);
    formData.append('content', form.content);
    if (form.image) {
      formData.append('image', form.image);
    }
  
    form.post(route('posts.store'), {
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