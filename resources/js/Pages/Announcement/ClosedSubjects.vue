<template>
  <Head title="Closed Subjects" />
  <AuthenticatedLayout>
    <template #action>
      <div class="flex justify-between p-3 space-x-2 items-center">
        <div>
            <h1 class="text-xl font-bold">Closed Subjects</h1>
            <p>Update status currently closed for enrollment.</p>
        </div>
        <div class="flex space-x-2">
            <v-btn v-if="subjects >= 0" color="primary" class="px-4" @click="openCreateModal">
                Add Subject
            </v-btn>
            <a href="/closed-subjects">
                <v-btn color="secondary" class="px-4">Back</v-btn>
            </a>
        </div>
      </div>
    </template>

    <main>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Subjects List -->
        <div class="bg-white rounded shadow p-4">
          <ul v-if="subjects.length">
            <li v-for="subject in subjects" :key="subject.id" class="py-2 flex justify-between items-center">
              <div>
                <strong>{{ subject.description }}</strong>
              </div>
              <div class="flex gap-2">
                <button
                        @click="updateNow(subject)"
                        class="px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700 transition"
                    >
                        Update Now
                    </button>
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

// ✅ Open modal to edit (if needed later)
const openEditModal = (subject) => {
  isEdit.value = true
  editingId.value = subject.id

  const dt = new Date(subject.description)
  form.value.datetime = dt.toISOString().slice(0, 16) // 'YYYY-MM-DDTHH:mm'
  errors.value = {}
  showModal.value = true
}

// ✅ Update subject with current date & time
const updateNow = async (subject) => {
  const now = new Date()
  const formatted = formatDate(now)

  try {
    const response = await axios.put(`/api/subjects/${subject.id}`, {
      description: formatted,
    })

    const index = props.subjects.findIndex(s => s.id === subject.id)
    if (index !== -1) {
      props.subjects[index] = response.data.subject
    }
  } catch (error) {
    console.error('Failed to update subject:', error)
  }
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


<style scoped>
</style>
