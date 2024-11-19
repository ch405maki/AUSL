<template>
  <div class="bg-official-purple-800 py-6">
    <div class="text-white py-6">
      <div class="max-w-7xl mx-auto flex flex-col items-start px-5 relative">
        <h1 class="text-left text-left mb-2 font-bold text-2xl md:text-xl lg:text-2xl">What's in the News</h1>
        <p class="font-normal text-md md:text-lg lg:text-xl mb-8">
          Read about the latest AUSL Initiatives, Achievements, and Developments
        </p>
        <div class="post-carousel owl-carousel owl-theme">
          <div v-for="post in posts" :key="post.id" class="item">
            <div class="rounded-xs overflow-hidden flex-none max-w-full min-h-[350px] flex flex-col justify-between relative card">
            <!-- Image wrapper with overlay -->
            <a :href="`/show/${post.id}`" class="block relative group">
              <div v-if="post.image && post.image.length > 0" class="image-wrapper">
                <img :src="post.image[0]" alt="Post image" class="w-full h-64 object-cover">
                <!-- Overlay that appears on hover -->
                <div class="overlay"></div>
              </div>
            </a>
            <!-- Content area -->
            <div class="p-4 flex-grow flex flex-col justify-between min-h-[100px]">
              <!-- Title with flex-grow to push the date down -->
              <a
                :href="`/show/${post.id}`"
                class="font-semibold text-lg text-white text-left hover:text-official-purple-900 hover:underline cursor-pointer line-clamp-2 flex-grow"
              >{{ post.title }}</a>
              <!-- Date that stays at the bottom -->
              <p class="text-gray-100 text-left mt-auto">{{ new Date(post.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}</p>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const props = defineProps({
  posts: {
    type: Array,
    required: true
  }
});

const formattedDate = (date) => {
  return new Date(date).toLocaleDateString();
};

onMounted(() => {
  if (typeof $ !== 'undefined') {
    const owlCarousel = $('.post-carousel').owlCarousel({
      loop: true,
      margin: 10,
      autoplay: true,
      autoplayTimeout: 4000,
      responsive: {
        0: { items: 1 },
        600: { items: 2 },
        1000: { items: 3 },
      }
    });

    // Pause autoplay on mouseover
    $('.post-carousel').on('mouseover', function() {
      owlCarousel.trigger('stop.owl.autoplay');
    });

    // Resume autoplay on mouseleave
    $('.post-carousel').on('mouseleave', function() {
      owlCarousel.trigger('play.owl.autoplay', [4000]);
    });
  } else {
    console.error('jQuery is not loaded');
  }
});
</script>

<style scoped>
/* Custom styles for Owl Carousel navigation buttons */
.owl-nav .owl-prev, .owl-nav .owl-next {
  background: white;
  color: black;
  border-radius: 50%; /* Make buttons round */
  width: 30px; /* Adjust size */
  height: 30px; /* Adjust size */
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px; /* Adjust icon size */
}

.owl-nav .owl-prev {
  left: 10px; /* Adjust positioning */
}

.owl-nav .owl-next {
  right: 10px; /* Adjust positioning */
}

/* Optional: Ensure buttons are above carousel items */
.owl-nav-wrapper {
  z-index: 10;
}

/* Line clamp to limit title length */
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2; /* Show only two lines */
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.card {
  position: relative;
}

.image-wrapper {
  position: relative;
  overflow: hidden;
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
</style>
