<template>
  <div class="bg-purple-900 py-6">
    <div class="text-center text-white py-6">
      <div class="max-w-7xl mx-auto flex flex-col items-center px-5 relative">
        <h1 class="font-bold text-2xl mb-4">What's in the News</h1>
        <p class="font-medium text-lg mb-10">
          Read about the latest AUSL Initiatives, Achievements, and Developments
        </p>

        <div class="post-carousel owl-carousel owl-theme">
          <div v-for="post in posts" :key="post.id" class="item">
            <div class="bg-white rounded-xs shadow-md overflow-hidden flex-none max-w-full min-h-[350px] flex flex-col justify-between">
              <img :src="post.image" alt="Card image" class="w-full h-64 object-cover">
              
              <!-- Fixed height for content area -->
              <div class="p-4 flex-grow flex flex-col justify-between min-h-[100px]">
                <a
                  :href="`/show/${post.id}`"
                  class="font-bold text-lg text-gray-800 hover:text-purple-900 cursor-pointer line-clamp-2"
                  >{{ post.title }}</a>
                <p class="text-slate-600">{{ formattedDate(post.created_at) }}</p>
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
    $('.post-carousel').owlCarousel({
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 6000,
    responsive: {
      0: { items: 1 },
      600: { items: 2 },
      1000: { items: 3 },
    }
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
</style>
