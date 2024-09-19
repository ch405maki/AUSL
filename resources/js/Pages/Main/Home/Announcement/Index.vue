<template>
  <div class="py-6">
    <div class="max-w-7xl mx-auto py-4 px-4">
      <div class="px-2 relative">
        <div class="grid grid-cols-1 sm:grid-cols-12 gap-10">
          <!-- Left Column: Announcements and Events -->
          <div class="sm:col-span-6 lg:col-span-8">
            <h1 class="text-slate-800 text-left mb-4 font-bold text-lg md:text-xl lg:text-2xl">
              Announcements and Events
            </h1>
            <p class="font-normal text-slate-700 text-md md:text-lg lg:text-xl mb-8">
              Read about the latest AUSL Initiatives, Achievements, and Developments.
            </p>

            <!-- Announcements List -->
            <div v-for="(announcement, index) in paginatedAnnouncements" :key="announcement.id" class="flex items-center mb-2 pb-4 border-b">
              <!-- <div class="mr-2 min-w-32 w-32 h-min max-h-80">
                <iframe scrolling="no" :src="announcement.link + 'preview'" height="80" width="100%"></iframe>
              </div> -->
              <div class="text-base flex flex-col justify-center">
                <a :href="`/announcement/show/${announcement.id}`" class="text-official-purple-800 font-normal text-md md:text-lg lg:text-xl hover:text-official-purple-800 leading-snug hover:underline transition-all duration-300">
                  {{ announcement.title }}
                </a>
                <p class="text-slate-700 text-sm md:text-base">
                  Posted: {{ formattedDate(announcement.created_at) }}
                </p>
              </div>
            </div>

            <!-- Pagination Controls -->
            <div class="flex flex-col items-center mt-8">
            <!-- Help text -->
            <span class="text-sm text-gray-700 dark:text-gray-400">
                Showing 
                <span class="font-semibold text-gray-900 dark:text-white">{{ startEntry }}</span> 
                to 
                <span class="font-semibold text-gray-900 dark:text-white">{{ endEntry }}</span> 
                of 
                <span class="font-semibold text-gray-900 dark:text-white">{{ props.announcements.length }}</span> 
                Announcements
            </span>
            <div class="inline-flex mt-2 xs:mt-0">
              <!-- Buttons -->
              <button @click="previousPage" :disabled="currentPage === 1" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-official-purple-800 rounded-s hover:bg-official-purple-700 disabled:opacity-50">
                <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                Prev
              </button>
              <button @click="nextPage" :disabled="currentPage * itemsPerPage >= announcements.length" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-official-purple-800 border-0 border-s border-gray-700 rounded-e hover:bg-official-purple-700 disabled:opacity-50">
                Next
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
              </button>
            </div>
          </div>
          </div>

          <!-- Right Column: Event Highlight -->
          <div class="sm:col-span-12 lg:col-span-4 p-4">
            <div class="overflow-hidden flex flex-col max-w-xl mx-auto">
                <a href="https://www.facebook.com/photo?fbid=986141886642309&set=a.530679615521874">
                    <img class="w-full h-full" src="/images/event.jpg" alt="Event Banner">
                </a>
                <div class="relative -mt-24 px-10 pt-5 pb-6 bg-white m-10 shadow-lg ">
                  <p class="text-slate-700 text-sm md:text-base">September 6, 2024</p>
                    <a href="https://www.facebook.com/photo?fbid=986141886642309&set=a.530679615521874"
                        class="font-semibold text-lg inline-block hover:text-official-purple-800 transition duration-500 ease-in-out inline-block mb-1">The
                        Barristers Send Off</a>
                    <p class="text-gray-600 text-xs">
                        By
                        <a href="#" class="text-xs text-official-purple-800 transition duration-500 ease-in-out">
                            Office of the Student Affair
                        </a>
                    </p>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const props = defineProps({
  announcements: {
    type: Array,
    required: true
  }
});

const currentPage = ref(1);
const itemsPerPage = 4;

// Calculate the start and end entries
const startEntry = computed(() => (currentPage.value - 1) * itemsPerPage + 1);
const endEntry = computed(() => {
  const end = currentPage.value * itemsPerPage;
  return end > props.announcements.length ? props.announcements.length : end;
});

const formattedDate = (date) => {
  return new Date(date).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
};

const paginatedAnnouncements = computed(() => {
  const start = (currentPage.value - 1) * itemsPerPage;
  const end = start + itemsPerPage;
  return props.announcements.slice(start, end);
});

const previousPage = () => {
  if (currentPage.value > 1) {
    currentPage.value -= 1;
  }
};

const nextPage = () => {
  if (currentPage.value * itemsPerPage < props.announcements.length) {
    currentPage.value += 1;
  }
};
</script>

<style scoped>
</style>
