<template>
  <div class="text-center text-white bg-purple-100 py-6">
    <div class="max-w-7xl text-center text-white mx-auto py-4 px-4">
      <h1 class="font-bold text-gray-800 text-2xl mb-2">Announcements and Advisories</h1>
      <p class="font-medium text-gray-800 text-lg mb-8">Read about the latest AUSL Initiatives, Achievements, and Developments</p>

      <div
        ref="swipeContainer"
        @mousedown="handleMouseDown"
        @mouseleave="handleMouseLeave"
        @mouseup="handleMouseUp"
        @mousemove="handleMouseMove"
        @scroll="updateCurrentPage"
        class="overflow-x-scroll scrollbar-hide mb-4 relative px-0.5"
        style="overflow-y: hidden;"
      >
        <div class="flex snap-x snap-mandatory gap-6">
          <div
            v-for="(announcement, index) in announcements"
            :key="announcement.id"
            class="flex-none w-72 snap-center"
          >
            <div class="bg-white border-1 border border-gray-200 overflow-hidden mb-4 flex flex-col h-full">
              <iframe height="200" scrolling="no" :src="announcement.link + 'preview'" width="100%"></iframe>
              <div class="p-4 flex flex-col flex-grow">
                <h3 @click="$inertia.visit(route('announcement.show', { id: announcement.id }))"
                  class="text-lg leading-6 font-bold text-gray-900 hover:underline hover:text-purple-900 cursor-pointer">
                  {{ announcement.title }}
                </h3>
                <p class="text-gray-600 mt-2 text-lg">{{ formattedDate(announcement.created_at) }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="flex justify-center mt-8">
        <span v-for="(announcement, index) in announcements" :key="index" class="mx-1">
          <span :class="currentPage === index ? 'bg-gray-800' : 'bg-gray-400'" class="block w-3 h-3 rounded-full"></span>
        </span>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { defineProps } from 'vue';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
  announcements: {
    type: Array,
    required: true
  }
});

const { $inertia } = usePage().props;

const swipeContainer = ref(null);
const isDown = ref(false);
const startX = ref(0);
const scrollLeft = ref(0);
const currentPage = ref(0);

const handleMouseDown = (e) => {
  isDown.value = true;
  startX.value = e.pageX - swipeContainer.value.offsetLeft;
  scrollLeft.value = swipeContainer.value.scrollLeft;
};

const handleMouseLeave = () => {
  isDown.value = false;
};

const handleMouseUp = () => {
  isDown.value = false;
};

const handleMouseMove = (e) => {
  if (!isDown.value) return;
  e.preventDefault();
  const x = e.pageX - swipeContainer.value.offsetLeft;
  const walk = (x - startX.value) * 1;
  swipeContainer.value.scrollLeft = scrollLeft.value - walk;
};

const updateCurrentPage = () => {
  const cardWidth = swipeContainer.value.scrollWidth / props.announcements.length;
  currentPage.value = Math.round(swipeContainer.value.scrollLeft / cardWidth);
};

const formattedDate = (date) => {
  return new Date(date).toLocaleDateString();
};

onMounted(() => {
  swipeContainer.value.addEventListener('mousedown', handleMouseDown);
  swipeContainer.value.addEventListener('mouseleave', handleMouseLeave);
  swipeContainer.value.addEventListener('mouseup', handleMouseUp);
  swipeContainer.value.addEventListener('mousemove', handleMouseMove);
  swipeContainer.value.addEventListener('scroll', updateCurrentPage);
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
</style>
