<template>
  <Head title="Closed Subjects" />
  <AuthenticatedLayout>
    <template #action>
      <div class="flex justify-end p-3 space-x-2">
        <v-btn color="primary" class="px-4" @click="showModal = true">
          Add Subject
        </v-btn>
        <a href="/closed-subjects">
          <v-btn color="secondary" class="px-4">
            Back
          </v-btn>
        </a>
      </div>
    </template>

    <main>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden mb-6">
          <h1 class="text-2xl font-bold">Closed Subjects</h1>
          <p class="mt-2">List of subjects that are currently closed for enrollment.</p>
        </div>

        <!-- Subjects List -->
        <div class="bg-white rounded shadow p-4">
          <ul v-if="subjects.length">
            <li
              v-for="subject in subjects"
              :key="subject.id"
              class="border-b py-2"
            >
              {{ subject.description }}
            </li>
          </ul>
          <p v-else class="text-gray-500">No subjects available.</p>
        </div>
      </div>
    </main>

    <!-- Modal Form -->
    <div v-if="showModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
      <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-xl font-semibold mb-4">Add New Subject</h2>
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
const form = ref({
  datetime: '', // holds the input from datetime-local
})
const errors = ref({})

const showModalAndReset = () => {
  form.value.datetime = ''
  errors.value = {}
  showModal.value = true
}

const submit = async () => {
  loading.value = true
  errors.value = {}

  try {
    // format date as text and store in description
    const dt = new Date(form.value.datetime)
    const formatted = dt.toLocaleString('en-US', {
      year: 'numeric', month: 'long', day: 'numeric',
      hour: 'numeric', minute: '2-digit',
      hour12: true,
    })

    const payload = { description: formatted }

    const response = await axios.post('/api/subjects', payload)

    props.subjects.push(response.data.subject)
    form.value.datetime = ''
    showModal.value = false
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
</script>



<style scoped>
</style>
