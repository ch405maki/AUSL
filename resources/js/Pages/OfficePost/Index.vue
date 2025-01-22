<template>
  <Head title="Announcement" />

  <AuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Offices</h2>
    </template>

  <template #action>
    <div class="flex items-center p-3">
      <!-- Search Input -->
      <div class="relative mr-4 hidden md:block">
        <input
          v-model="searchQuery"
          type="text"
          placeholder="Search Title Here..."
          class="search-input"
        />
        <svg
          class="search-icon"
          width="20"
          height="20"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M17.753 15.852l-4.51-4.51a6.004 6.004 0 1 0-1.406 1.406l4.51 4.51a1 1 0 0 0 1.415-1.414zM9 13a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"
            fill="#9CA3AF"
          />
        </svg>
      </div>
  
      
      <!-- Add Announcement Button (always visible) -->
      <div class="flex justify-end flex-grow">
        <a href="officepost/create">
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
            
            <div v-for="post in posts" :key="post.id" class="post-item">
            <h2 class="text-xl font-bold">{{ post.title }}</h2>
            <p><strong>Category:</strong> {{ post.category }}</p>
            <p><strong>Created At:</strong> {{ formatDate(post.created_at) }}</p>

            <!-- Display the content or PDF -->
            <div v-if="post.content">
              <p>{{ post.content }}</p>
            </div>
            <div v-else-if="post.image.length">
              <embed  
                :src="post.image[0]"
                type="application/pdf"
                width="100%"
                height="600px"
              />
            </div>
            <div v-else>
              <p>No content available.</p>
            </div>
          </div>
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
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import Footer from '@/Layouts/Partials/Footer.vue';
import Swal from 'sweetalert2';
import { Inertia } from '@inertiajs/inertia';

// Define props for posts
const props = defineProps({
  posts: { type: Array, required: true },
});

// Reactive variables
const previewImage = ref(null);
const selectedPost = ref(null);

const formatDate = (dateString) => {
  const date = new Date(dateString);
  return date.toLocaleString();
};

const isPDF = (file) => file.endsWith(".pdf");

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


// Show a post
const showPost = (id) => {
  Inertia.visit(`/announcement/show/${id}`);
};

const edit = (id) => {
  Inertia.visit(`/announcement/edit/${id}`);
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
      form.delete(route('announcement.destroy', id));
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