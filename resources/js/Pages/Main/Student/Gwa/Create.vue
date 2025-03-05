<template>
  <Head title="GWA Def. Response" />
  <MainLayout>
    <div class="max-w-7xl mx-auto p-10">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">GWA Deficiency Response</h2>
      <form @submit.prevent="saveStudent" class="space-y-4">
        <!-- Grid Container -->
        <div class="grid grid-cols-2 gap-4">
          <!-- Student Number -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Student Number</label>
            <input
              v-model="form.student_number"
              type="text"
              required
              placeholder="Enter student number"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
            />
          </div>

          <!-- Year Level -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Year Level</label>
            <select
              v-model="form.year_level"
              required
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
            >
              <option value="">Select Year Level</option>
              <option value="1st Year">1st Year</option>
              <option value="2nd Year">2nd Year</option>
              <option value="3rd Year">3rd Year</option>
              <option value="4th Year">4th Year</option>
            </select>
          </div>

          <!-- Full Name -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Full Name</label>
            <input
              v-model="form.full_name"
              type="text"
              required
              placeholder="Enter full name"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
            />
          </div>

          <!-- Email -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input
              v-model="form.email"
              type="email"
              required
              placeholder="Enter email address"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
            />
          </div>

          <!-- Contact Number -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Contact Number</label>
            <input
              v-model="form.contact_number"
              type="text"
              required
              placeholder="Enter contact number"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
            />
          </div>

          <!-- Document -->
          <div class="col-span-2 flex gap-4">
            <!-- Letter to Dean -->
            <div class="w-1/2">
              <h1 class="font-semibold tracking-wider mb-4">Letter to Dean</h1>
              <div class="flex items-center justify-center w-full">
                <label
                  for="letter-to-dean"
                  class="mb-4 flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100"
                >
                  <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg
                      class="w-8 h-8 mb-4 text-gray-500"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 20 16"
                    >
                      <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"
                      />
                    </svg>
                    <p v-if="!form.document" class="mb-2 text-sm text-gray-500">
                      <span class="font-semibold">Click to upload</span> or drag and drop
                    </p>
                    <p v-if="!form.document" class="text-xs text-gray-500">PDF, DOC, or DOCX (MAX. 5MB)</p>
                    <p v-if="form.document" class="mt-2 text-sm text-gray-600">
                      Selected file: <span class="text-official-purple-600 font-semibold">{{ form.document.name }}</span>
                    </p>
                  </div>
                  <input
                    id="letter-to-dean"
                    type="file"
                    class="hidden"
                    @change="handleFileUpload"
                  />
                </label>
              </div>
            </div>

            <!-- RO 26 -->
            <div class="w-1/2">
              <h1 class="font-semibold tracking-wider mb-4">RO 26</h1>
              <div class="flex items-center justify-center w-full">
                <label
                  for="ro-26"
                  class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100"
                >
                  <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg
                      class="w-8 h-8 mb-4 text-gray-500"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 20 16"
                    >
                      <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"
                      />
                    </svg>
                    <p v-if="!form.ro26" class="mb-2 text-sm text-gray-500">
                      <span class="font-semibold">Click to upload</span> or drag and drop
                    </p>
                    <p v-if="!form.ro26" class="text-xs text-gray-500">PDF, DOC, or DOCX (MAX. 5MB)</p>
                    <p v-if="form.ro26" class="mt-2 text-sm text-gray-600">
                      Selected file
                      : <span class="text-official-purple-600 font-semibold">{{ form.ro26.name }}</span>
                    </p>
                  </div>
                  <input
                    id="ro-26"
                    type="file"
                    class="hidden"
                    @change="handleRO26Upload"
                  />
                </label>
              </div>
            </div>
          </div>

          </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
          <button
            type="submit"
            class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            :disabled="loading"
          >
            <i v-if="!loading" class="fa-solid fa-paper-plane"></i>
            <i v-else class="fa-solid fa-spinner fa-spin"></i>
            {{ loading ? 'Sending...' : 'Submit' }}
          </button>
        </div>
      </form>
    </div>
  </MainLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import axios from 'axios';
import MainLayout from '@/Layouts/MainLayout.vue';
import Swal from 'sweetalert2';

const loading = ref(false);

// Form data
const form = ref({
  student_number: '',
  year_level: '',
  full_name: '',
  email: '',
  contact_number: '',
  document: null, // Store the file object here
  remarks: 'pending',
});

// Handle file upload
const handleFileUpload = (event) => {
  const file = event.target.files[0];
  if (file) {
    form.value.document = file; // Store the file object
  }
};

const saveStudent = async () => {
  try {
    loading.value = true;

    // Create FormData object for file upload
    const formData = new FormData();
    formData.append('student_number', form.value.student_number);
    formData.append('year_level', form.value.year_level);
    formData.append('full_name', form.value.full_name);
    formData.append('email', form.value.email);
    formData.append('contact_number', form.value.contact_number);
    formData.append('remarks', form.value.remarks);

    if (form.value.document) {
      formData.append('document', form.value.document, form.value.document.name);
    }

    // Send the form data to the API
    const response = await axios.post('/api/students', formData, {
      headers: {
        'Content-Type': 'multipart/form-data', // Required for file uploads
      },
    });

    loading.value = false; // Set loading to false after receiving the response

    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: 'Your response has been sent successfully!',
      showConfirmButton: false,
      timer: 1500,
      background: '#f7f7f7',
      iconColor: '#34C759',
      color: '#333',
    });

    // Reset form after successful submission
    form.value = {
      student_number: '',
      year_level: '',
      full_name: '',
      email: '',
      contact_number: '',
      document: null,
      remarks: 'pending',
    };
  } catch (error) {
    loading.value = false; 
    console.error(error.response.data);
    Swal.fire({
      icon: 'error',
      title: 'Error Sending your Data!',
      text: error.response.data.message
    });
  }
};
</script>