<template>
  <div class="bg-purple-900 py-6">
    <div class="text-center text-white py-6">
      <div class="max-w-7xl mx-auto flex flex-col items-center px-5">
        <h1 class="font-bold text-2xl mb-4">What's in the News</h1>
        <p class="font-medium text-lg mb-10">Read about the latest AUSL Initiatives, Achievements, and Developments</p>
        <div
          ref="scrollContainer"
          class="w-full overflow-x-auto scrollbar-hide"
          @mousedown="handleMouseDown"
          @mousemove="handleMouseMove"
          @mouseup="handleMouseUp"
          @mouseleave="handleMouseLeave"
          @scroll="updateCurrentPage"
          style="overflow-y: hidden;"
        >
          <div class="flex flex-nowrap gap-6 justify-start snap-x snap-mandatory">
            <div
              v-for="post in posts"
              :key="post.id"
              class="bg-white rounded-xs shadow-md overflow-hidden flex-none w-72 snap-center"
            >
              <img :src="post.image" alt="Card image" class="w-full h-48 object-cover">
              <div class="p-4">
                <a :href="`/show/${post.id}`" class="font-bold text-lg text-gray-800 hover:text-purple-900 cursor-pointer">{{ post.title }}</a>
                <p class="text-slate-600">{{ formattedDate(post.created_at) }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="flex justify-center mt-8">
          <span v-for="(post, index) in posts" :key="index" class="mx-1">
            <span :class="currentPage === index ? 'bg-gray-800' : 'bg-gray-400'" class="block w-3 h-3 rounded-full"></span>
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
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

const scrollContainer = ref(null);
const isDragging = ref(false);
const startX = ref(0);
const scrollLeft = ref(0);
const currentPage = ref(0);

const handleMouseDown = (e) => {
  isDragging.value = true;
  startX.value = e.pageX - scrollContainer.value.offsetLeft;
  scrollLeft.value = scrollContainer.value.scrollLeft;
};

const handleMouseMove = (e) => {
  if (!isDragging.value) return;
  e.preventDefault();
  const x = e.pageX - scrollContainer.value.offsetLeft;
  const walk = (x - startX.value) * 2; // scroll speed multiplier
  scrollContainer.value.scrollLeft = scrollLeft.value - walk;
};

const handleMouseUp = () => {
  isDragging.value = false;
};

const handleMouseLeave = () => {
  isDragging.value = false;
};

const updateCurrentPage = () => {
  const cardWidth = scrollContainer.value.scrollWidth / posts.value.length;
  currentPage.value = Math.round(scrollContainer.value.scrollLeft / cardWidth);
};

onMounted(() => {
  window.addEventListener('mouseup', handleMouseUp);
  window.addEventListener('mouseleave', handleMouseLeave);
});
</script>

<style scoped>
.scrollbar-hide::-webkit-scrollbar {
  display: none;
}

.scrollbar-hide {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}

.shadow-md {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>
