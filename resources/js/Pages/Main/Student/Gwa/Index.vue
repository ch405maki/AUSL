<template>
  <MainLayout>
    <div class="max-w-7xl mx-auto p-24">
      <h2 class="text-2xl font-bold mb-10 text-center text-gray-700">Track Status</h2>
      
      <!-- Search Input -->
      <div class="relative max-w-sm mx-auto">
        <input
          v-model="searchId"
          class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          type="search"
          placeholder="Enter ID Number"
        />
        <button
          @click="handleSearch" 
          class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-700 bg-gray-100 border border-gray-300 rounded-r-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        >
          <i :class="['fa-solid', loading ? 'fa-spinner' : 'fa-magnifying-glass', loading ? 'animate-spin' : '']"></i>
        </button>
      </div>


      <!-- Search Results -->
      <transition
        enter-active-class="transition-opacity duration-500"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition-opacity duration-500"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <section v-if="student" class="relative overflow-hidden">
          <div class="mt-2 md:mt-0 py-12 pb-6 sm:py-16 lg:pb-24 overflow-hidden">
            <div class="text-xl font-bold mb-10 text-center text-gray-700 py-4">
              <h1>{{ student.student_number }}</h1>
              <h1>{{ student.full_name }}</h1>
            </div>
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 relative">
              <div class="relative mt-12 lg:mt-20">
                <div class="absolute inset-x-0 hidden xl:px-44 top-2 md:block md:px-20 lg:px-28">

                  <svg class="w-full" xmlns="http://www.w3.org/2000/svg" width="875" height="48" viewBox="0 0 875 48" fill="none">
                    <path
                      d="M2 29C20.2154 33.6961 38.9915 35.1324 57.6111 37.5555C80.2065 40.496 102.791 43.3231 125.556 44.5555C163.184 46.5927 201.26 45 238.944 45C312.75 45 385.368 30.7371 458.278 20.6666C495.231 15.5627 532.399 11.6429 569.278 6.11109C589.515 3.07551 609.767 2.09927 630.222 1.99998C655.606 1.87676 681.208 1.11809 706.556 2.44442C739.552 4.17096 772.539 6.75565 805.222 11.5C828 14.8064 850.34 20.2233 873 24"
                      :class="{ animate: student }"
                      stroke="#D4D4D8"
                      stroke-width="3"
                      stroke-linecap="round"
                      stroke-dasharray="1 12"
                    />
                  </svg>
                </div>
                <div 
                    class="relative grid text-center gap-y-8 sm:gap-y-10 md:gap-y-12 gap-x-12"
                    :class="[
                      student.status === 'Probation' || student.status === 'Strict Probation' 
                      ? 'md:grid-cols-4' 
                      : 'md:grid-cols-3',
                    ]"
                  >
                  <!-- Email Received -->
                  <transition appear name="status" mode="out-in">
                    <div :key="student.remarks">
                      <div
                        :class="[
                          'flex items-center justify-center w-16 h-16 mx-auto border-2 rounded-full shadow transition-all duration-300',
                          statusClasses.email.container
                        ]"
                      >
                        <span
                          :class="[
                            'text-xl font-semibold transition-all duration-300',
                            statusClasses.email.text
                          ]"
                        >
                          <i class="fa-solid fa-envelope-circle-check"></i>
                        </span>
                      </div>
                      <h3 class="mt-4 sm:mt-6 text-xl font-semibold leading-tight text-gray-900 md:mt-10">Email Received</h3>
                      <p
                        :class="[
                          'mt-3 sm:mt-4 text-base transition-all duration-300',
                          statusClasses.email.text
                        ]"
                      >
                        {{ statusMessages.email }}
                      </p>
                    </div>
                  </transition>

                  <!-- For Evaluation -->
                  <transition appear name="status" mode="out-in">
                    <div :key="student.remarks">
                      <div
                        :class="[
                          'flex items-center justify-center w-16 h-16 mx-auto border-2 rounded-full shadow transition-all duration-300',
                          statusClasses.evaluation.container
                        ]"
                      >
                        <span
                          :class="[
                            'text-xl font-semibold transition-all duration-300',
                            statusClasses.evaluation.text
                          ]"
                        >
                          <i :class="statusClasses.evaluation.icon"></i>
                        </span>
                      </div>
                      <h3 class="mt-4 sm:mt-6 text-xl font-semibold leading-tight text-gray-900 md:mt-10">For Evaluation</h3>
                      <p
                        :class="[
                          'mt-3 sm:mt-4 text-base transition-all duration-300',
                          statusClasses.evaluation.text
                        ]"
                      >
                        {{ statusMessages.evaluation }}
                      </p>
                    </div>
                  </transition>

                  <!-- Visit Onsite for Signing -->
                  <transition v-if="student.status === 'Probation' || student.status === 'Strict Probation'" appear name="status" mode="out-in">
                    <div :key="student.remarks">
                      <div
                        :class="[
                          'flex items-center justify-center w-16 h-16 mx-auto border-2 rounded-full shadow transition-all duration-300',
                          statusClasses.onsite.container
                        ]"
                      >
                        <span
                          :class="[
                            'text-xl font-semibold transition-all duration-300',
                            statusClasses.onsite.text
                          ]"
                        >
                          <i class="fa-solid fa-building"></i>
                        </span>
                      </div>
                      <h3 class="mt-4 sm:mt-6 text-xl font-semibold leading-tight text-gray-900 md:mt-10">Visit Onsite for Signing</h3>
                      <p
                        :class="[
                          'mt-3 sm:mt-4 text-base transition-all duration-300',
                          statusClasses.onsite.text
                        ]"
                      >
                        {{ statusMessages.onsite }}
                      </p>
                    </div>
                  </transition>

                  <!-- Subject Enlisted -->
                  <transition appear name="status" mode="out-in">
                    <div :key="student.remarks">
                      <div
                        :class="[
                          'flex items-center justify-center w-16 h-16 mx-auto border-2 rounded-full shadow transition-all duration-300',
                          statusClasses.enlisted.container
                        ]"
                      >
                        <span
                          :class="[
                            'text-xl font-semibold transition-all duration-300',
                            statusClasses.enlisted.text
                          ]"
                        >
                          <i class="fa-solid fa-clipboard-check"></i>
                        </span>
                      </div>
                      <h3 class="mt-4 sm:mt-6 text-xl font-semibold leading-tight text-gray-900 md:mt-10">Subject Enlisted</h3>
                      <p
                        :class="[
                          'mt-3 sm:mt-4 text-base transition-all duration-300',
                          statusClasses.enlisted.text
                        ]"
                      >
                        {{ statusMessages.enlisted }}
                      </p>
                    </div>
                  </transition>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div v-else-if="searchPerformed" class="mt-10 text-center text-red-600">
          No student found with the provided ID.
        </div>
      </transition>
    </div>
  </MainLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';
import MainLayout from '@/Layouts/MainLayout.vue';

const searchId = ref('');
const student = ref(null);
const error = ref(null); // Track error message
const searchTriggered = ref(false); // Track if search has been triggered
const loading = ref(false);
const searchPerformed = ref(false);

const handleSearch = async () => {
  if (!searchId.value) {
    student.value = null;
    error.value = null; // Reset error message if input is empty
    searchTriggered.value = false; // Reset search trigger if input is empty
    return;
  }

  searchTriggered.value = true; // Set search trigger to true
  error.value = null; // Reset error message
  loading.value = true; // Set loading to true after a delay
  searchPerformed.value = true;

  try {
    const response = await axios.get(`/api/students/${searchId.value}`);
    student.value = response.data;
  } catch (error) {
    student.value = null;
    console.error('Error fetching student:', error);
  } finally {
    setTimeout(() => {
      loading.value = false; // Set loading to false after a short delay
    }, 500); // 500ms = 0.5s
  }
};

// Computed properties for status classes and messages
const statusClasses = computed(() => {
  const remarks = student.value?.remarks?.toLowerCase() || '';
  return {
    email: {
      container: remarks === 'encoded' 
        ? 'bg-green-100 border-green-300' 
        : remarks === 'pending' 
        ? 'bg-yellow-100 border-yellow-300' 
        : 'bg-green-100 border-green-300',
      text: remarks === 'encoded' 
        ? 'text-green-700' 
        : remarks === 'pending' 
        ? 'text-yellow-700' 
        : 'text-green-700'
    },
    evaluation: {
      container: remarks === 'encoded' 
        ? 'bg-green-100 border-green-300' 
        : remarks === 'approve'
        ? 'bg-green-100 border-green-300' 
        : remarks === 'denied' 
        ? 'bg-red-100 border-red-300' 
        : 'bg-gray-100 border-gray-300',
      text: remarks === 'encoded' 
        ? 'text-green-700' 
        : remarks === 'approve'
        ? 'text-green-700' 
        : remarks === 'denied' 
        ? 'text-red-700' 
        : 'text-gray-700',
      icon: remarks === 'denied' 
        ? 'fa-solid fa-times-circle' 
        : 'fa-solid fa-list-check'
    },
    enlisted: {
      container: remarks === 'encoded' 
        ? 'bg-green-100 border-green-300' 
        : 'bg-gray-100 border-gray-300',
      text: remarks === 'encoded' || remarks === 'enlisted' 
        ? 'text-green-700' 
        : 'text-gray-700'
    },
    onsite: {
      container: remarks === 'encoded' 
        ? 'bg-green-100 border-green-300' 
        : remarks === 'approve'
        ? 'bg-green-100 border-green-300' 
        : remarks === 'denied' 
        ? 'bg-red-100 border-red-300' 
        : 'bg-gray-100 border-gray-300',
      text: remarks === 'encoded' 
        ? 'text-green-700' 
        : remarks === 'approve'
        ? 'text-green-700' 
        : remarks === 'denied' 
        ? 'text-red-700' 
        : 'text-gray-700',
      icon: remarks === 'denied' 
        ? 'fa-solid fa-times-circle' 
        : 'fa-solid fa-list-check'
    },
  };
});

// Computed property for status messages
const statusMessages = computed(() => {
  const remarks = student.value?.remarks?.toLowerCase() || '';
  const status = student.value?.status?.toLowerCase() || '';

  return {
    email: remarks === 'pending' 
      ? 'Pending' 
      : `Email received on ${new Date(student.value.created_at).toLocaleString('en-US', { 
          year: 'numeric', 
          month: 'long', 
          day: 'numeric'
        })}`,
    evaluation: (remarks === 'approve' || status === 'probation')
      ? `Evaluation in progress as of ${new Date(student.value.updated_at).toLocaleString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        hour12: true,
      })}`
      : remarks === 'denied' 
      ? 'Evaluation denied' 
      : remarks === 'encoded' 
      ? `Evaluation has been completed as of ${new Date(student.value.updated_at).toLocaleString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        hour12: true,
      })}`
      : 'Not yet evaluated',
    enlisted: remarks === 'encoded' 
      ? `Subjects enlisted as of ${new Date(student.value.updated_at).toLocaleString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        hour12: true,
      })}`
      : `Subjects not yet enlisted`,
    onsite: remarks === 'approve' 
      ? `Visit onsite for signing `
      : `Not yet visited onsite for signing`
  };
});
</script>

<style>
@keyframes shake {
  0%, 100% { transform: translateX(0); }
  25% { transform: translateX(-5px); }
  75% { transform: translateX(5px); }
}

.animate-shake {
  animation: shake 0.4s ease-in-out;
}

.status-enter-active,
.status-leave-active {
  transition: all 0.5s ease;
}

.status-enter-from,
.status-leave-to {
  opacity: 0;
  transform: scale(0.95);
}

.status-enter-to,
.status-leave-from {
  opacity: 1;
  transform: scale(1);
}

path {
  transition: stroke 0.5s ease-in-out;
}

path.animate {
  animation: animatePath 2s forwards;
}

@keyframes animatePath {
  0% {
    stroke-dashoffset: 1000;
  }
  100% {
    stroke-dashoffset: 0;
  }
}
</style>