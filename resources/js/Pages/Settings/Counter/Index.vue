<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Swal from 'sweetalert2';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3';

// Modal and form state
import { ref } from 'vue';
const showModal = ref(false);
const form = ref({
  id: null,
  title: '',
  target_date: '',
  type: 'none',
  is_active: true,
});

// Open modal (for add or edit)
const openModal = (event: any = null) => {
  if (event) {
    form.value = { ...event };
  } else {
    form.value = { id: null, title: '', target_date: '', type: 'none', is_active: true };
  }
  showModal.value = true;
};

const closeModal = () => {
  showModal.value = false;
};

// Submit form (store or update)
const submitForm = () => {
  if (form.value.id) {
    Inertia.put(`/admin/countdown/${form.value.id}`, form.value);
  } else {
    Inertia.post('/admin/countdown', form.value);
  }
  closeModal();
};

// Delete event
const deleteEvent = (event: any) => {
  Swal.fire({
    title: 'Are you sure?',
    text: 'This will delete the event permanently!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
  }).then((result) => {
    if (result.isConfirmed) {
      Inertia.delete(`/admin/countdown/${event.id}`);
    }
  });
};

// Toggle active status
const toggleActive = (event: any) => {
  Inertia.post(`/admin/countdown/${event.id}/toggle`);
};

// Access Inertia props
const page = usePage();
</script>



<template>
  <Head title="Countdown" />
  <AuthenticatedLayout>
    <template #action>
      <div class="flex justify-between items-center w-full p-3">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Countdown Controller</h2>
        <button @click="openModal()" class="bg-purple-600 text-white px-4 py-2 rounded">+ Add Event</button>
      </div>
    </template>

    <div class="flex flex-col min-h-screen bg-gray-100">
        <main class="flex-grow w-full px-4">
          <div class="overflow-x-auto" v-if="$page.props.events && $page.props.events.length > 0">
            <table class="min-w-full bg-white shadow rounded">
              <thead>
                <tr class="bg-gray-200 text-left">
                  <th class="p-2">Title</th>
                  <th class="p-2">Date</th>
                  <th class="p-2">Type</th>
                  <th class="p-2">Active</th>
                  <th class="p-2 text-right">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="event in $page.props.events" :key="event.id" class="border-b">
                  <td class="p-2">{{ event.title }}</td>
                  <td class="p-2">{{ new Date(event.target_date).toLocaleDateString() }}</td>
                  <td class="p-2">{{ event.type }}</td>
                  <td class="p-2">{{ event.is_active ? 'Yes' : 'No' }}</td>
                  <td class="p-2 space-x-2 text-right">
                    <button @click="openModal(event)" class="bg-blue-500 text-white px-2 py-1 rounded">Edit</button>
                    <button @click="toggleActive(event)" class="bg-yellow-500 text-white px-2 py-1 rounded">
                      {{ event.is_active ? 'Disable' : 'Enable' }}
                    </button>
                    <button @click="deleteEvent(event)" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Empty state -->
          <div v-else class="w-full text-center py-10 text-gray-500 text-lg">
            No events found.
          </div>
        </main>
    </div>

    <!-- Modal Form -->
    <div v-if="showModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
      <div class="bg-white p-6 rounded shadow w-full max-w-md">
        <h3 class="text-xl font-bold mb-4">{{ form.id ? 'Edit Event' : 'Add Event' }}</h3>
        <form @submit.prevent="submitForm">
          <div class="mb-2">
            <label class="block font-semibold mb-1">Title</label>
            <input type="text" v-model="form.title" class="w-full border px-2 py-1 rounded" required />
          </div>
          <div class="mb-2">
            <label class="block font-semibold mb-1">Date</label>
            <input type="date" v-model="form.target_date" class="w-full border px-2 py-1 rounded" required />
          </div>
          <div class="mb-2">
            <label class="block font-semibold mb-1">Type</label>
            <select v-model="form.type" class="w-full border px-2 py-1 rounded">
              <option value="none">None</option>
              <option value="exam">Exam</option>
              <option value="holiday">Holiday</option>
              <option value="enrollment">Enrollment</option>
            </select>
          </div>
          <div class="mb-2 flex items-center space-x-2">
            <input type="checkbox" v-model="form.is_active" />
            <label>Active</label>
          </div>
          <div class="flex justify-end space-x-2 mt-4">
            <button type="button" @click="closeModal()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
            <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded">Save</button>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>