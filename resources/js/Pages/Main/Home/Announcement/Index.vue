<template>
  <div class="text-center text-white bg-purple-100 py-6">
    <div class="max-w-7xl text-center text-white mx-auto py-4 px-4">
      <h1 class="font-bold text-gray-800 text-2xl mb-2">Announcements and Advisories</h1>
      <p class="font-medium text-gray-800 text-lg mb-10">
        Read about the latest AUSL Initiatives, Achievements, and Developments
      </p>

      <div class="announcement-carousel owl-carousel owl-theme">
        <div
          v-for="(announcement, index) in announcements"
          :key="announcement.id"
          class="item w-100 sm:w-72"
        >
          <div class="overflow-hidden mb-4 flex flex-col h-full relative card">
            <!-- Set a fixed height for the iframe -->
            <a :href="`/announcement/show/${announcement.id}`" class="block relative group">
              <iframe height="200" scrolling="no" :src="announcement.link + 'preview'" width="100%"></iframe>
              <!-- Overlay for hover effect -->
              <div class="overlay"></div>
            </a>
            <div class="p-4 flex flex-col flex-grow justify-between">
              <a
                :href="`/announcement/show/${announcement.id}`"
                class="font-bold text-lg text-gray-800 hover:text-purple-900 cursor-pointer"
              >{{ announcement.title }}</a>
              <p class="text-gray-600 mt-2 text-lg">{{ formattedDate(announcement.created_at) }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted } from 'vue';

const props = defineProps({
  announcements: {
    type: Array,
    required: true
  }
});

const formattedDate = (date) => {
  return new Date(date).toLocaleDateString();
};

onMounted(() => {
  if (typeof $ !== 'undefined') {
    const owlCarousel = $('.announcement-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      autoplay: true,
      autoplayTimeout: 8000,
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
      owlCarousel.trigger('play.owl.autoplay', [8000]);
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
