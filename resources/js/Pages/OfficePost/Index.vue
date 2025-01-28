<template>
  <Head title="Announcement" />

  <AuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Offices</h2>
    </template>

  <template #action>
    <div class="flex items-center p-3">
      <!-- Search Input -->
        <div class="text-lg font-semibold text-gray-800">
          {{ category }}
        </div>

      <!-- Add Announcement Button (always visible) -->
      <div class="flex justify-end flex-grow">
        <a :href="route('officepost.create')">
          <v-btn color="primary" class="w-full md:w-auto px-4">
            Add Post
            <v-icon right>mdi-plus</v-icon>
          </v-btn>
        </a>
      </div>
    </div>
  </template>

  <div class="flex flex-col min-h-screen bg-gray-100 ">
    <main class="flex-grow">
      <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row w-full justify-center mb-6">
          <!-- Main content section -->
          <div class="w-full mx-4">
            <v-table fixed-header class="shadow-sm rounded-lg">
              <thead>
                <tr>
                  <th class="text-left hidden md:table-cell">Number</th>
                  <th class="text-left hidden md:table-cell">Date</th>
                  <th class="text-left">Title</th>
                  <th class="text-left hidden md:table-cell">Content</th>
                  <th class="text-left hidden md:table-cell">Preview</th>
                  <th class="text-left">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(post, index) in filteredPosts" :key="post.id">
                  <td class="text-center hidden md:table-cell">{{ index + 1 }}</td>
                  <td>{{ new Date(post.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}</td>
                  <td>{{ post.title }}</td>
                  <td v-if="post && post.content">
                    <div v-html="limitedContent(post.content)"></div>
                  </td>
                  <td v-else>No content available</td>
                  <td class="hidden md:table-cell">
                    <div v-if="post.image && post.image.length > 0">
                    <img :src="post.image[0]" alt="Image Logo" class="my-2 min-w-32 w-32 h-min max-h-100 mr-2 rounded-sm">
                    </div>
                  </td>
                  <td>
                  <div class="flex items-center gap-2">
                    <!-- Update Button -->
                    <button
                      class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-md"
                      @click="updatePostStatus(post.id, post.title)"
                    >
                      Archive
                    </button>
                    <!-- Delete Button -->
                    <button
                      class="bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-2 rounded-md"
                      @click="deletePost(post.id, post.title)"
                    >
                      Delete
                    </button>
                  </div>
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
</AuthenticatedLayout>
</template>

<script setup>
import { ref, computed} from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

function limitedContent(content) {
  if (!content) return '';
  return content.length > 200 ? content.substring(0, 200) + '...' : content;
}

// Define props for posts
const props = defineProps({
  category: { type: String },
  posts: { type: Array, required: true },
});

const form = useForm({
  title: '',
  content: '',
  image: null,
});

const formatDate = (dateString) => {
  const date = new Date(dateString);
  return date.toLocaleString();
};

const searchQuery = ref('');
const years = ref([2025, 2024, 2023, 2022, 2021, 2020]);
const selectedYear = ref('');
const selectedCategory = ref('');

const filteredPosts = computed(() => {
    return props.posts.filter(post => {
        const matchesQuery = post.title.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            post.state.toLowerCase().includes(searchQuery.value.toLowerCase());
        const matchesCategory = !selectedCategory.value || post.category === selectedCategory.value;
        const matchesYear = selectedYear.value ? new Date(post.created_at).getFullYear() === Number(selectedYear.value) : true;
        return matchesQuery && matchesYear && matchesCategory;
    });
});

const updatePostStatus = (id, title) => {
  Swal.fire({
    title: `Are you sure you want to archive "${title}"?`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, archive it!',
    cancelButtonText: 'No, cancel!',
  }).then((result) => {
    if (result.isConfirmed) {
      form.put(route('officepost.archive', id), {
        onSuccess: () => {
          Swal.fire({
            title: 'Archived!',
            text: `"${title}" has been archived successfully.`,
            icon: 'success',
          });
        },
        onError: () => {
          Swal.fire({
            title: 'Error!',
            text: 'Failed to archive the post. Please try again.',
            icon: 'error',
          });
        },
      });
    }
  });
};

// Delete a post with confirmation using SweetAlert
const deletePost = (id, title) => {
  Swal.fire({
    title: `Are you sure you want to delete "${title}"?`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
  }).then((result) => {
    if (result.isConfirmed) {
      form.delete(route('officepost.destroy', id));
    }
  });
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
  
  .search-input {
      width: 350px;
      padding: 0.5rem;
      padding-left: 2.5rem;
      border: 1px solid #ddd;
      border-radius: 0.375rem;
  }
  
  .search-icon {
      position: absolute;
      top: 50%;
      left: 0.5rem;
      transform: translateY(-50%);
      color: #9CA3AF;
  }


.post-item {
  margin-bottom: 20px;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 8px;
  background-color: #f9f9f9;
}
</style>