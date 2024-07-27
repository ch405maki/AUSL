<!-- resources/js/Components/PostComponent.vue -->
<template>
  <div class="text-center text-white bg-purple-900 py-6">
    <div class="max-w-7xl mx-auto flex flex-col items-center">
      <h1 class="font-bold text-2xl mb-4">What's in the News</h1>
      <p class="font-medium text-lg mb-6">Read about the latest AUSL Initiatives, Achievements, and Developments</p>
      <div class="flex flex-wrap justify-center gap-6">
        <div v-for="post in posts" :key="post.id" class="bg-white rounded-xs shadow-md overflow-hidden w-72">
          <img :src="post.image" alt="Card image" class="w-full h-48 object-cover">
          <div class="p-4">
            <a :href="`/show/${post.id}`" class="font-bold text-lg text-gray-800 hover:text-purple-900 cursor-pointer">{{ post.title }}</a>
            <p class="text-slate-600">{{ formattedDate(post.created_at) }}</p>
            <!-- <p v-if="post.content.length > 0" class="text-slate-700 font-normal" v-html="post.content.substring(0, 200)"></p> -->
            <!-- <a :href="`/show/${post.id}`" class="hover:text-green-600">Read more</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
  posts: {
    type: Array,
    required: true
  }
});

const { $inertia } = usePage().props;

const isBigScreen = ref(window.innerWidth >= 768);
window.addEventListener('resize', () => {
  isBigScreen.value = window.innerWidth >= 768;
});

const formattedDate = (date) => {
  return new Date(date).toLocaleDateString();
};

const navigateToPost = (postId) => {
  $inertia.visit(`/show/${postId}`);
};
</script>

<style scoped>
.shadow-md {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>
