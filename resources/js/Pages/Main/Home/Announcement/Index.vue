<template>
  <div class="py-6">
    <div class="max-w-7xl mx-auto py-4 px-4">
      <div class="px-2 relative">
        <div class="grid grid-cols-1 sm:grid-cols-12 gap-10">
          <!-- Left Column: Announcements and Events -->
          <div class="sm:col-span-6 lg:col-span-8">
            <h1 class="mb-4 font-semibold text-xl md:text-2xl lg:text-2xl text-slate-800 leading-tight tracking-wide">
              Announcements and Events
            </h1>
            <p class="font-light text-gray-700 text-lg md:text-xl lg:text-2xl mb-8">
              Read about the latest AUSL Initiatives, Achievements, and Developments.
            </p>

            <!-- Announcements List -->
            <div v-for="(announcement, index) in paginatedAnnouncements" :key="announcement.id" class="flex items-center mb-4 pb-5 border-b">
              <div class="mr-2 min-w-32 w-32 h-min max-h-80">
                <iframe scrolling="no" :src="announcement.link + 'preview'" height="80" width="100%"></iframe>
              </div>
              <div class="text-base flex flex-col justify-center">
                <p class="text-gray-600 text-sm md:text-base">
                  Posted: {{ formattedDate(announcement.created_at) }}
                </p>
                <a :href="`/announcement/show/${announcement.id}`" class="text-gray-800 font-medium text-lg md:text-xl hover:text-official-purple-800 leading-snug hover:underline transition-all duration-300">
                  {{ announcement.title }}
                </a>
              </div>
            </div>

            <!-- Pagination Controls -->
            <div class="flex justify-center mt-6">
              <button @click="previousPage" :disabled="currentPage === 1" class="px-4 py-2 bg-official-purple-800 text-white rounded-md mr-2 hover:bg-official-purple-700 disabled:opacity-50">Previous</button>
              <button @click="nextPage" :disabled="currentPage * itemsPerPage >= announcements.length" class="px-4 py-2 bg-official-purple-800 text-white rounded-md hover:bg-official-purple-700 disabled:opacity-50">Next</button>
            </div>
          </div>

          <!-- Right Column: Event Highlight -->
          <div class="sm:col-span-12 lg:col-span-4">
            <a href="https://www.facebook.com/photo?fbid=986141886642309&set=a.530679615521874" target="_blank" rel="noopener noreferrer">
              <div class="h-80 bg-cover text-center overflow-hidden rounded-sm shadow-lg"
                style="background-image: url('/images/event.jpg')"
                title="Visit link">
              </div>
            </a>
            <div class="mt-3 bg-white rounded-sm shadow-lg p-4 leading-normal">
              <p class="text-sm uppercase font-bold text-official-purple-800 hover:text-gray-900 tracking-wider transition duration-500 ease-in-out">
                Event
              </p>
              <p class="text-gray-600 text-sm md:text-base">September 6, 2024</p>
              <a href="https://www.facebook.com/photo?fbid=986141886642309&set=a.530679615521874" class="text-gray-800 font-semibold text-xl mt-2 hover:text-official-purple-800 transition-all duration-300" target="_blank" rel="noopener noreferrer">
                Barristers Send Off
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';

const props = defineProps({
  announcements: {
    type: Array,
    required: true
  }
});

const currentPage = ref(1);
const itemsPerPage = 3;

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

onMounted(() => {
  if (typeof $ !== 'undefined') {
    const owlCarousel = $('.announcement-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      autoplay: true,
      autoplayTimeout: 5000,
      responsive: {
        0: { 
          items: 1,
          center: true, // Centering the single item on mobile
        },
        600: { items: 2 },
        1000: { items: 4 }
      }
    });

    // Pause autoplay on mouseover
    $('.announcement-carousel').on('mouseover', function() {
      owlCarousel.trigger('stop.owl.autoplay');
    });

    // Resume autoplay on mouseleave
    $('.announcement-carousel').on('mouseleave', function() {
      owlCarousel.trigger('play.owl.autoplay', [5000]);
    });
  } else {
    console.error('jQuery is not loaded');
  }
});
</script>

<style scoped>
.owl-carousel .item {
  display: flex;
  justify-content: center;
}

.owl-nav .owl-prev, .owl-nav .owl-next {
  background: white;
  color: black;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
}

.owl-nav .owl-prev {
  left: 10px;
}

.owl-nav .owl-next {
  right: 10px;
}

.owl-nav-wrapper {
  z-index: 10;
}

.card {
  position: relative;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(128, 0, 128, 0.6); /* Purple with 60% opacity */
  opacity: 0;
  transition: opacity 0.3s ease;
}

.image-wrapper:hover .overlay {
  opacity: 0.7; /* 70% visible on hover */
}

/* Optional: Ensure the items are centered on mobile */
@media (max-width: 600px) {
  .owl-carousel .owl-item {
    display: flex;
    align-items: center;
    justify-content: center;
  }
}
</style>
