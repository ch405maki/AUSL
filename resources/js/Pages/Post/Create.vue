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
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden ">
                  <form @submit.prevent="submitForm" class="bg-white py-6 mb-8 shadow-sm rounded-lg">
                      <div class="mx-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12">
                        <!-- category Input -->
                        <div class="sm:col-span-6">
                          <InputLabel for="created_at" value="Date" />
                          <TextInput
                            id="created_at"
                            v-model="form.created_at"
                            required
                            type="date"
                            class="mt-1 block w-full border border-gray-300 rounded-lg"
                          />
                        </div>

                        <!-- Title Input -->
                        <div class="sm:col-span-12">
                          <InputLabel for="title" value="Title" />
                          <TextInput
                            id="title"
                            v-model="form.title"
                            autofocus
                            required
                            type="text"
                            class="mt-1 block w-full border border-gray-300 rounded-lg"
                            placeholder="Headline Here..."
                          />
                        </div>

                        <!-- Content Input with CKEditor -->
                        <div class="sm:col-span-12">
                          <InputLabel for="content" value="Content" />
                          <ckeditor :editor="editor" v-model="form.content" :config="editorConfig"></ckeditor>
                        </div>

                        <!-- Conditional Rendering Sections -->
                        <!-- Image Upload Section -->
                        <div class="col-span-full">
                          <label for="image-upload" class="block text-sm font-medium leading-6 text-gray-900">Upload Image (s)</label>
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
                          <span v-if="errors.image" class="text-red-500 text-sm">{{ errors.image }}</span>
                        </div>

                        <div v-if="form.category === 'Announcement'" class="sm:col-span-12 mt-4">
                          <InputLabel for="link" value="Link" />
                          <TextInput
                            id="link"
                            v-model="form.link"
                            autofocus
                            required
                            type="text"
                            class="mt-1 block w-full border border-gray-300 rounded-lg"
                            placeholder="Enter link..."
                          />
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
            </main>
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

const form = useForm({
  title: '',
  content: '',
  image: [],
  category: 'News',
  state: 'Active',
  link: null,
  created_at: '',
});

const previewImages = ref([]);
const errors = ref({});

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
    
    const removeImage = (index) => {
      previewImages.value.splice(index, 1);
      form.image.splice(index, 1);
    };

const submitForm = () => {
  const formData = new FormData();
  formData.append('title', form.title);
  formData.append('content', form.content);
  form.image.forEach((image) => formData.append('image[]', image));
  formData.append('created_at', form.created_at);

  form.post(route('posts.store'), {
    data: formData,
      onSuccess: () => {
        form.reset();
        previewImages.value = [];
        errors.value = {};
      },
    onError: (error) => errors.value = error,
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