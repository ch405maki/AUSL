<template>
  <Head title="Gallery" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gallery</h2>
    </template>

    <div class="flex flex-col mx-8 my-8">
      <div class="flex justify-end mb-4">
        <!-- Navigation button to add images -->
        <a href="gallery/create">
          <v-btn color="primary" class="w-full md:w-auto px-4 py-2">
            Add Images
            <v-icon right>mdi-plus</v-icon>
          </v-btn>
        </a>
      </div>
    </div>

    <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900 ">
      <main class="flex-grow">
        <div class="max-w-7xl mx-auto">
          <div class="flex flex-col md:flex-row w-full justify-center">
            <!-- Main content section -->
            <div class="w-full  mx-8">
              <v-table fixed-header height="500px">
                <thead>
                  <tr>
                    <th class="text-left w-1/12">Year</th>
                    <th class="text-left">Event</th>
                    <th class="text-left">Sample Image</th>
                    <th class="text-left w-1/12">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(gallery, index) in galleries" :key="gallery.id">
                    <td>{{ gallery.year }}</td>
                    <td>{{ gallery.title }}</td>
                    <td>
                      <img v-if="gallery.images.length" :src="gallery.images[0]" alt="Gallery Image" class="carousell-image mb-2">
                    </td>
                    <td>
                      <v-btn color="red" @click="deletePost(gallery.id)" class="my-2" block>
                        Delete <v-icon right>mdi-delete</v-icon>
                      </v-btn>
                      <v-btn color="blue" @click="viewGallery(gallery.id)" class="my-2" block>
                        View <v-icon right>mdi-eye</v-icon>
                      </v-btn>
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
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Footer from '@/Layouts/Partials/Footer.vue';
import Swal from 'sweetalert2';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({ galleries: { type: Array, required: true } });

const form = useForm({ title: '', year: '', images: [] });
const previewImages = ref([]);
const errors = ref({});

const handleFileChange = (event) => {
  const files = event.target.files;
  previewImages.value = [];
  form.images = [];

  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    const reader = new FileReader();
    reader.onload = (e) => {
      previewImages.value.push(e.target.result);
    };
    reader.readAsDataURL(file);
    form.images.push(file);
  }
};

const removeImage = (index) => {
  previewImages.value.splice(index, 1);
  form.images.splice(index, 1);
};

const viewGallery = (id) => {
  Inertia.get(route('gallery.show', id));
};

const deletePost = (id) => {
  Swal.fire({
    title: 'Are you sure delete?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete',
    cancelButtonText: 'Cancel',
  }).then((result) => {
    if (result.isConfirmed) {
      form.delete(route('gallery.destroy', id));
    }
  });
};

const submitForm = () => {
  const formData = new FormData();
  formData.append('title', form.title);
  formData.append('year', form.year);
  form.images.forEach((image) => {
    formData.append('images[]', image);
  });

  form.post(route('gallery.store'), {
    data: formData,
    onSuccess: () => {
      form.reset();
      previewImages.value = [];
      errors.value = {};
    },
    onError: (error) => {
      errors.value = error;
    },
    headers: {
      'Content-Type': 'multipart/form-data',
    },
  });
};
</script>

<style scoped>
.carousell-image {
  max-width: 100%;
  width: 495px;
  height: 205px;
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

.preview-image {
  max-width: 100%;
  width: 150px;
  height: auto;
}

.grid-cols-2 {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1rem;
}
</style>
