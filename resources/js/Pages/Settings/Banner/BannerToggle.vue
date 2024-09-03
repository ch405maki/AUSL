<template>
    <div>
      <!-- Toggle Banner Button -->
      <button @click="toggleBanner" class="px-4 py-2 bg-purple-900 text-white rounded hover:bg-purple-950">
        Toggle Banner
      </button>
      
      <!-- Banner Card -->
      <v-card v-if="isBannerVisible" flat>
        <p>This is a toggled banner content.</p>
      </v-card>
  
      <!-- Banner Form -->
      <form @submit.prevent="updateBanner" class="mt-4 space-y-4">
        <div>
          <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
          <input
            id="title"
            v-model="form.title"
            type="text"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
            required
          />
        </div>
        <div>
          <label for="link" class="block text-sm font-medium text-gray-700">Link</label>
          <input
            id="link"
            v-model="form.text"
            type="url"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
            required
          />
        </div>
        <button
          type="submit"
          class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >
          Update Banner
        </button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import { Inertia } from '@inertiajs/inertia';
  
  // Initialize state
  const isBannerVisible = ref(false);
  const bannerId = ref(null);
  const form = ref({
    title: '',
    link: ''
  });
  
  // Function to toggle banner state
  const toggleBanner = async () => {
    isBannerVisible.value = !isBannerVisible.value;
    if (bannerId.value !== null) {
      await Inertia.put(`/banners/${bannerId.value}`, { state: isBannerVisible.value });
    }
  };
  
  // Function to update banner details
  const updateBanner = async () => {
    if (bannerId.value !== null) {
      await Inertia.put(`/banners/${bannerId.value}`, form.value);
    }
  };
  
  // Fetch banner state and details on mount
  const fetchBannerState = async () => {
    try {
      // Fetch the banner data from the route
      const response = await fetch('/banner');
      const bannerData = await response.json();
      if (bannerData) {
        isBannerVisible.value = bannerData.state;
        bannerId.value = bannerData.id;
        form.value.title = bannerData.title;
        form.value.link = bannerData.link;
      }
    } catch (error) {
      console.error('Failed to fetch banner state:', error);
    }
  };
  
  // On component mount, fetch the initial banner state and details
  onMounted(() => {
    fetchBannerState();
  });
  </script>
  
  <style scoped>
  /* Scoped styles if needed */
  </style>
  