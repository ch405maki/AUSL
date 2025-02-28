<template>
  <MainLayout>
    <div class="max-w-7xl mx-auto p-10">
      <h2 class="text-2xl font-bold mb-10 text-center text-gray-700">Track My Status</h2>
      
      <!-- Search Input -->
      <div class="relative max-w-sm mx-auto">
        <input
          v-model="searchId"
          @input="handleSearch"
          class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          type="search"
          placeholder="Enter ID Number"
        />
        <button
          @click="handleSearch"
          class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-700 bg-gray-100 border border-gray-300 rounded-r-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        >
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M14.795 13.408l5.204 5.204a1 1 0 01-1.414 1.414l-5.204-5.204a7.5 7.5 0 111.414-1.414zM8.5 14A5.5 5.5 0 103 8.5 5.506 5.506 0 008.5 14z"
            />
          </svg>
        </button>
      </div>

      <!-- Search Results -->
      <section v-if="student" class="relative overflow-hidden">
        <div class="mt-2 md:mt-0 py-12 pb-6 sm:py-16 lg:pb-24 overflow-hidden">
          <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 relative">
            <div class="relative mt-12 lg:mt-20">
              <div class="absolute inset-x-0 hidden xl:px-44 top-2 md:block md:px-20 lg:px-28">
                <svg class="w-full" xmlns="http://www.w3.org/2000/svg" width="875" height="48" viewBox="0 0 875 48" fill="none">
                  <path
                    d="M2 29C20.2154 33.6961 38.9915 35.1324 57.6111 37.5555C80.2065 40.496 102.791 43.3231 125.556 44.5555C163.184 46.5927 201.26 45 238.944 45C312.75 45 385.368 30.7371 458.278 20.6666C495.231 15.5627 532.399 11.6429 569.278 6.11109C589.515 3.07551 609.767 2.09927 630.222 1.99998C655.606 1.87676 681.208 1.11809 706.556 2.44442C739.552 4.17096 772.539 6.75565 805.222 11.5C828 14.8064 850.34 20.2233 873 24"
                    stroke="#D4D4D8"
                    stroke-width="3"
                    stroke-linecap="round"
                    stroke-dasharray="1 12"
                  />
                </svg>
              </div>
              <div class="relative grid grid-cols-1 text-center gap-y-8 sm:gap-y-10 md:gap-y-12 md:grid-cols-3 gap-x-12">
                <!-- Email Received -->
                <div>
                  <div
                    :class="[
                      'flex items-center justify-center w-16 h-16 mx-auto border-2 rounded-full shadow',
                      student.remarks.toLowerCase() === 'pending'
                        ? 'bg-yellow-100 border-yellow-300'
                        : 'bg-green-100 border-green-300'
                    ]"
                  >
                    <span
                      :class="[
                        'text-xl font-semibold',
                        student.remarks.toLowerCase() === 'pending'
                          ? 'text-yellow-700'
                          : 'text-green-700'
                      ]"
                    >
                      <i class="fa-solid fa-envelope-circle-check"></i>
                    </span>
                  </div>
                  <h3 class="mt-4 sm:mt-6 text-xl font-semibold leading-tight text-gray-900 md:mt-10">Email Received</h3>
                  <p
                    :class="[
                      'mt-3 sm:mt-4 text-base',
                      student.remarks.toLowerCase() === 'pending'
                        ? 'text-yellow-700'
                        : 'text-green-700'
                    ]"
                  >
                    {{ student.remarks.toLowerCase() === 'pending' ? 'Pending' : `Email received on ${new Date(student.created_at).toLocaleString('en-US', { 
                      year: 'numeric', 
                      month: 'long', 
                      day: 'numeric'
                    })}` }}
                  </p>
                </div>

                <!-- For Evaluation -->
                <div>
                  <div
                    :class="[
                      'flex items-center justify-center w-16 h-16 mx-auto border-2 rounded-full shadow',
                      student.remarks.toLowerCase() === 'approve'
                        ? 'bg-blue-100 border-blue-300'
                        : 'bg-gray-100 border-gray-300'
                    ]"
                  >
                    <span
                      :class="[
                        'text-xl font-semibold',
                        student.remarks.toLowerCase() === 'approve'
                          ? 'text-blue-700'
                          : 'text-gray-700'
                      ]"
                    >
                      <i class="fa-solid fa-clipboard-check"></i>
                    </span>
                  </div>
                  <h3 class="mt-4 sm:mt-6 text-xl font-semibold leading-tight text-gray-900 md:mt-10">For Evaluation</h3>
                  <p
                    :class="[
                      'mt-3 sm:mt-4 text-base',
                      student.remarks.toLowerCase() === 'approve'
                        ? 'text-blue-700'
                        : 'text-gray-700'
                    ]"
                  >
                    {{ student.remarks.toLowerCase() === 'approve' ? 'Not yet evaluated' : `Evaluation in progress` }}
                  </p>
                </div>

                <!-- Subject Enlisted -->
                <div>
                  <div
                    :class="[
                      'flex items-center justify-center w-16 h-16 mx-auto border-2 rounded-full shadow',
                      student.remarks.toLowerCase() === 'enlisted'
                        ? 'bg-green-100 border-green-300'
                        : 'bg-gray-100 border-gray-300'
                    ]"
                  >
                    <span
                      :class="[
                        'text-xl font-semibold',
                        student.remarks.toLowerCase() === 'enlisted'
                          ? 'text-green-700'
                          : 'text-gray-700'
                      ]"
                    >
                      <i class="fa-regular fa-circle-check"></i>
                    </span>
                  </div>
                  <h3 class="mt-4 sm:mt-6 text-xl font-semibold leading-tight text-gray-900 md:mt-10">Subject Enlisted</h3>
                  <p
                    :class="[
                      'mt-3 sm:mt-4 text-base',
                      student.remarks.toLowerCase() === 'enlisted'
                        ? 'text-green-700'
                        : 'text-gray-700'
                    ]"
                  >
                    {{ student.remarks.toLowerCase() === 'enlisted' ? 'Subjects enlisted' : `Subjects not yet enlisted` }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- No Results Message -->
      <div v-if="searchId && !student" class="mt-10 text-center text-gray-600">
        No student found with the provided ID.
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import MainLayout from '@/Layouts/MainLayout.vue';

// Reactive variables
const searchId = ref('');
const student = ref(null);

// Function to handle search
const handleSearch = async () => {
  if (!searchId.value) {
    student.value = null;
    return;
  }

  try {
    const response = await axios.get(`/api/students/${searchId.value}`);
    student.value = response.data;
  } catch (error) {
    student.value = null;
    console.error('Error fetching student:', error);
  }
};
</script>