<template>
  <Head title="Settings" />

  <AuthenticatedLayout>
      <template #header>
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">Documents</h2>
      </template>
      <div class="flex flex-col min-h-screen">
          <main class="flex-grow">
              <div class="max-w-7xl mx-auto">
                  <div class="flex flex-col md:flex-row w-full justify-center">
                      <!-- Main content section -->
                      <div class="w-full md:w-2/3 p-1">
                          <v-table class="shadow-sm rounded-lg">
                              <thead>
                                  <tr>
                                      <th class="text-left">Code</th>
                                      <th class="text-left">Title</th>
                                      <th class="text-left">Location</th>
                                      <th class="text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr v-for="document in documents" :key="document.id" >
                                      <td>{{ document.code || 'N/A' }}</td>
                                      <td>{{ document.title }}</td>
                                      <td>{{ document.location }}</td>
                                      <td>
                                        <a
                                          :href="`/documents/${document.id}/download`"
                                          class="text-indigo-500 hover:underline"
                                        >
                                          Download
                                        </a>
                                      </td> 
                                  </tr>
                              </tbody>
                          </v-table>
                      </div>
                      <!-- End main content section -->

                      <!-- Upload Document Form -->
                      <div class="w-full md:w-1/3 p-3 flex justify-start bg-white rounded-lg mt-1 shadow-sm">
                        <form @submit.prevent="uploadDocument" class="space-y-4 w-full">
                          <div>
                            <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                            <input
                              type="text"
                              id="code"
                              v-model="form.code"
                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                              placeholder="Enter code"
                            />
                          </div>

                          <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input
                              type="text"
                              id="title"
                              v-model="form.title"
                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                              placeholder="Enter title"
                            />
                          </div>

                          <div>
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <input
                              type="text"
                              id="location"
                              v-model="form.location"
                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                              placeholder="Enter location"
                            />
                          </div>

                          <div>
                            <label for="file" class="block text-sm font-medium text-gray-700">PDF File</label>
                            <input
                              type="file"
                              id="file"
                              @change="handleFileUpload"
                              accept=".pdf"
                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                            />
                          </div>

                          <button
                            type="submit"
                            class="w-full py-2 px-4 bg-purple-600 text-white rounded-md shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2"
                          >
                            Upload Document
                          </button>
                        </form>
                      </div>
                      <!-- End Upload Document Form -->
                  </div>
              </div>
          </main>
      </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { router, usePage } from '@inertiajs/vue3';

const { documents } = usePage().props;

const form = ref({
  title: '',
  code: '',
  location: '',
  file: null,
});

const handleFileUpload = (e) => {
  form.value.file = e.target.files[0];
};

const uploadDocument = () => {
  const formData = new FormData();
  formData.append('title', form.value.title);
  formData.append('code', form.value.code);
  formData.append('location', form.value.location);
  formData.append('file', form.value.file);

  router.post('/documents', formData);
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