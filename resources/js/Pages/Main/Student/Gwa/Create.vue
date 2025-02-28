<template>
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
          <input
            v-model="form.year_level"
            type="text"
            required
            placeholder="Enter year level"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
          />
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
        <div>
          <label class="block text-sm font-medium text-gray-700">Document</label>
          <input
            v-model="form.document"
            type="text"
            placeholder="Enter document details"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
          />
        </div>
      </div>

      <!-- Submit Button -->
      <div class="flex justify-center">
        <button
          type="submit"
          class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
        <i class="fa-solid fa-paper-plane"></i> Submit
        </button>
      </div>
    </form>
  </div>
</MainLayout>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import MainLayout from '@/Layouts/MainLayout.vue';

// Form data
const form = ref({
  student_number: '',
  year_level: '',
  full_name: '',
  email: '',
  contact_number: '',
  document: '',
  remarks: 'pending',
});

// Save student function
const saveStudent = async () => {
  try {
    const response = await axios.post('/api/students', form.value);
    alert('Student saved successfully!');
    console.log(response.data);
    // Reset form after successful submission
    form.value = {
      student_number: '',
      year_level: '',
      full_name: '',
      email: '',
      contact_number: '',
      document: '',
      remarks: 'pending',
    };
  } catch (error) {
    alert('Error saving student!');
    console.error(error);
  }
};
</script>