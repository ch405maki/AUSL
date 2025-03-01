<template>
    <Head title="Response Status" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">GWA Deficiency Responses</h2>
      </template>

      <template #action>
        <div class="flex items-center justify-between">
          <div class="p-2">
            <h1 class="text-lg font-bold">GWA Deficiency Responses</h1>
          </div>
          <!-- Search Input -->
          <div class="py-2 ">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Search by name, student number, or year level"
              class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>
        </div>
      </template>
  
      <div class="flex flex-col min-h-screen bg-gray-100">
        <main class="flex-grow">
          <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row w-full justify-center mb-6">
              <!-- Main content section -->
              <div class="w-full mx-4">
                <v-table fixed-header class="shadow-sm rounded-lg">
                  <thead>
                    <tr>
                      <th class="text-left">Student Number</th>
                      <th class="text-left">Year</th>
                      <th class="text-left">Full Name</th>
                      <th class="text-left">GWA</th>
                      <th class="text-left">Document</th>
                      <th class="text-left">Status</th>
                      <th class="text-left">Remarks</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(student, index) in filteredStudents" :key="student.id">
                      <td>{{ student.student_number }}</td>
                      <td>{{ student.year_level }}</td>
                      <td>{{ student.full_name }}</td>
                      <td>{{ student.gwa }}</td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <a
                          :href="`/storage/${student.document}`"
                          download
                          class="text-blue-500 hover:text-blue-700"
                        >
                          <i class="fa-solid fa-download"></i> Download
                        </a>
                      </td>
                      <td>{{ student.status }}</td>
                      <td>
                        <span
                          v-if="student.remarks === 'approve'"
                          class="px-2 py-1 text-sm text-white rounded-md bg-green-500"
                        >
                          Approved
                        </span>
                        <span
                          v-else-if="student.remarks === 'pending'"
                          class="px-2 py-1 text-sm text-white rounded-md bg-yellow-500"
                        >
                          Received
                        </span>
                        <span
                          v-else-if="student.remarks === 'denied'"
                          class="px-2 py-1 text-sm text-white rounded-md bg-red-500"
                        >
                          Denied
                        </span>
                        <span
                          v-else-if="student.remarks === 'encoded'"
                          class="px-2 py-1 text-sm text-white rounded-md bg-blue-500"
                        >
                          Encoded
                        </span>
                      </td>
                      <td class="text-center">
                        <button @click="openModal(student)" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600">
                          Update
                        </button>
                      </td> 
                    </tr>
                  </tbody>
                </v-table>
              </div>
              <!-- End main content section -->
            </div>
          </div>
        </main>
      </div>

      <!-- Update Modal -->
      <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg w-1/3">
          <h2 class="text-xl font-bold mb-4">Update Student Details</h2>
          <form @submit.prevent="updateStudent">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Printing By</label>
                <select v-model="form.printing_by" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    <option value="Emy">Emy</option>
                    <option value="Jay">Jay</option>
                    <option value="Grace">Grace</option>
                </select>
                </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Encoded By</label>
                <select v-model="form.encoded_by" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    <option value="Emy">Emy</option>
                    <option value="Jay">Jay</option>
                    <option value="Grace">Grace</option>
                </select>
            </div>
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700">GWA</label>
              <input v-model="form.gwa" type="number" step="0.01" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select v-model="form.status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    <option value="Probation">Probation</option>
                    <option value="Strict Probation">Strict Probation</option>
                    <option value="Waived First Sem Only">Waived First Sem Only</option>
                    <option value="Fourth Year Not Required">Fourth Year Not Required</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Remarks</label>
                <select v-model="form.remarks" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    <option value="approve">Approve</option>
                    <option value="denied">Denied</option>
                    <option value="encoded">Encoded</option>
                </select>
                </div>
            <div class="flex justify-end">
              <button type="button" @click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-gray-600">Cancel</button>
              <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
            </div>
          </form>
        </div>
      </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import axios from 'axios';

// Props
const props = defineProps({ students: { type: Array, required: true } });

// Search query
const searchQuery = ref('');

// Filtered students computed property
const filteredStudents = computed(() => {
  const query = searchQuery.value.toLowerCase();
  return props.students.filter((student) => {
    return (
      student.full_name.toLowerCase().includes(query) ||
      student.student_number.toLowerCase().includes(query) ||
      student.year_level.toLowerCase().includes(query)
    );
  });
});

// Modal state
const isModalOpen = ref(false);
const selectedStudent = ref(null);

// Form data
const form = useForm({
  printing_by: '',
  encoded_by: '',
  gwa: null,
  status: '',
  remarks: '',
});

// Open modal and set form data
const openModal = (student) => {
  selectedStudent.value = student;
  form.printing_by = student.printing_by;
  form.encoded_by = student.encoded_by;
  form.gwa = student.gwa;
  form.status = student.status;
  form.remarks = student.remarks;
  isModalOpen.value = true;
};

// Close modal
const closeModal = () => {
  isModalOpen.value = false;
  form.reset();
};

// Update student
const updateStudent = async () => {
  try {
    const response = await axios.put(`/api/students/${selectedStudent.value.id}`, form);
    closeModal();
    window.location.reload(); // Or use Inertia.js to reload the data
  } catch (error) {
    console.error('Error updating student:', error);
  }
};
</script>

<style scoped>
/* Modal backdrop */
.fixed {
  position: fixed;
  inset: 0;
  z-index: 1000;
  background-color: rgba(0, 0, 0, 0.2); /* Light dark overlay */
  backdrop-filter: blur(1px); /* Soft blur effect */
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Modal content */
.bg-white {
  background-color: white;
  z-index: 1001; /* Ensure modal content is above the backdrop */
  border-radius: 0.5rem;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
  width: 100%;
  max-width: 500px; /* Limit modal width */
  padding: 1.5rem;
}

/* Input and select styles */
input, select, textarea {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid #d1d5db;
  border-radius: 0.375rem;
  margin-bottom: 1rem; /* Add spacing between inputs */
}

textarea {
  resize: vertical;
  min-height: 100px; /* Set a minimum height for textarea */
}

/* Button styles */
button {
  padding: 0.5rem 1rem;
  border-radius: 0.375rem;
  font-weight: 500;
  transition: background-color 0.2s;
}

button:hover {
  opacity: 0.9;
}

/* Cancel button */
.bg-gray-500 {
  background-color: #6b7280;
}

/* Update button */
.bg-blue-500 {
  background-color: #3b82f6;
}
</style>