<template>
  <Head title="Closed Subjects" />
  <AuthenticatedLayout>
    <template #action>
      <div class="flex justify-between p-3 space-x-2 items-center">
        <div>
            <h1 class="text-lg font-medium  text-zinc-700">Closed Subjects</h1>
            <p>Update status currently closed for enrollment.</p>
        </div>
        <div class="flex space-x-2">
            <v-btn color="primary" class="px-4" @click="openCreateModal">
                Update Status
            </v-btn>
            <a href="/subjects-status">
                <v-btn color="secondary" class="px-4">Back</v-btn>
            </a>
        </div>
      </div>
    </template>
    <div class="mx-2 mb-4">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="rounded-lg bg-indigo-600 p-2 shadow-lg sm:p-3">
                <div class="flex flex-wrap items-center justify-between">
                    <div class="flex w-0 flex-1 items-center">
                        <span class="flex rounded-lg bg-indigo-800 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-6 w-6 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                        </span>
                        <p class="ml-3 truncate font-medium text-white">
                            <span class="">Click here to access the spreadsheet!</span>
                        </p>
                    </div>
                    <div class="order-3  w-full flex-shrink-0 sm:order-2 sm:mt-0 sm:w-auto">
                        <a target="_blank" rel="noopener noreferrer" class="flex items-center justify-center rounded-md border border-transparent bg-white px-4 py-2 text-sm font-medium text-indigo-600 shadow-sm hover:bg-indigo-50"
                            href="https://docs.google.com/spreadsheets/d/16GjGa6wNNc2vQEZjseEDR2CVa6g9ZgfV8UyRXf32Kp0/edit?gid=0#gid=0">Click Here!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Subjects List -->
        <div class="rounded-lg bg-white shadow p-4 ">
          <h1 class="text-xl font-medium text-zinc-700">Update Status Logs</h1>
          <ul v-if="subjects.length">
            <li v-for="subject in subjects" :key="subject.id" class="border-b py-2 flex justify-between items-center">
              <div>
                <strong>{{ subject.description }}</strong>
              </div>
              <div class="flex gap-2">
                <!-- <button
                        @click="updateNow(subject)"
                        class="px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700 transition"
                    >
                        Update Now
                  </button> -->
                  <button
                      @click="destroy(subject.id)"
                      class="px-3 py-2 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700 transition"
                  >
                      Delete
                  </button>
                </div>
            </li>
          </ul>
          <p v-else class="text-gray-500">No status available.</p>
        </div>
      </div>
    </main>

    <!-- Modal Form -->
    <div
        v-if="showModal"
        class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center"
        >

      <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-xl font-semibold mb-4">
          {{ isEdit ? 'Edit Status' : 'Add New status' }}
        </h2>
        <form @submit.prevent="submit">
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Date & Time</label>
            <input
              v-model="form.datetime"
              type="datetime-local"
              class="w-full border border-gray-300 rounded px-3 py-2"
              :class="{ 'border-red-500': errors.description }"
            />
            <div v-if="errors.description" class="text-red-500 text-sm mt-1">
              {{ errors.description }}
            </div>
          </div>
          <div class="flex justify-end space-x-2">
            <button type="button" @click="showModal = false" class="px-4 py-2 bg-gray-300 rounded">
              Cancel
            </button>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded" :disabled="loading">
              {{ loading ? 'Saving...' : 'Save' }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'

const props = defineProps({
  subjects: Array,
})

const showModal = ref(false)
const loading = ref(false)
const isEdit = ref(false)
const editingId = ref(null)

const form = ref({
  datetime: '',
})
const errors = ref({})

// Format date to display like: July 4, 2025 2:30 PM
const formatDate = (datetimeString) => {
  const dt = new Date(datetimeString)
  return dt.toLocaleString('en-US', {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    hour: 'numeric',
    minute: '2-digit',
    hour12: true,
  })
}

// ✅ Open modal to add new subject
const openCreateModal = () => {
  isEdit.value = false
  editingId.value = null
  form.value.datetime = ''
  errors.value = {}
  showModal.value = true
}

// ✅ Submit from modal (create or update)
const submit = async () => {
  loading.value = true
  errors.value = {}

  try {
    const formatted = formatDate(form.value.datetime)

    if (isEdit.value && editingId.value) {
      const response = await axios.put(`/api/subjects/${editingId.value}`, {
        description: formatted,
      })

      const index = props.subjects.findIndex(s => s.id === editingId.value)
      if (index !== -1) {
        props.subjects[index] = response.data.subject
      }
    } else {
      const response = await axios.post('/api/subjects', {
        description: formatted,
      })

      props.subjects.push(response.data.subject)
    }

    showModal.value = false
    form.value.datetime = ''
  } catch (error) {
    if (error.response?.status === 422) {
      errors.value = error.response.data.errors
    } else {
      console.error('Unexpected error:', error)
    }
  } finally {
    loading.value = false
  }
}

// ✅ Delete subject
const destroy = async (id) => {
  if (!confirm('Are you sure you want to delete this subject?')) return

  try {
    await axios.delete(`/api/subjects/${id}`)
    const index = props.subjects.findIndex(s => s.id === id)
    if (index !== -1) {
      props.subjects.splice(index, 1)
    }
  } catch (error) {
    console.error('Delete failed', error)
  }
}
</script>