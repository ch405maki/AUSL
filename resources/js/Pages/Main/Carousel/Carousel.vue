<template>
  <v-carousel
    :height="carouselHeight"
    show-arrows="hover"
    cycle
    hide-delimiter-background
  >
    <v-carousel-item
      v-for="(item, i) in items"
      :key="i"
      class="relative"
    >
    <img 
        :src="item.image" 
        class="carousel-image w-[2833px] sm:h-[310px] md:h[340px] lg:h-[400px] xl:h[] h-[210px] object-fit" 
        alt="Carousel Image"
      />
    </v-carousel-item>
    <div class="absolute inset-0 flex items-center justify-end p-4">
      <button>
        <div v-for="(banner, index) in banners" :key="index">
          <a
            :href="banner.link"
            class="enroll-link font-sans text-purple-900 hover:text-purple-950 pr-16 py-2 rounded relative hidden sm:block"
          >
            {{ banner.title }}
            <span class="absolute inset-0 z-10" aria-hidden="true"></span>
          </a>
        </div>
      </button>
    </div>
  </v-carousel>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const props = defineProps({
  items: {
    type: Array,
    required: true
  },
  banners: {
    type: Array,
    required: false
  }
});

const carouselHeight = ref('400px');

const updateCarouselHeight = () => {
  if (window.innerWidth <= 768) {
    carouselHeight.value = '200px';
  } else if (window.innerWidth <= 1024) {
    carouselHeight.value = '300px';
  } else {
    carouselHeight.value = '400px';
  }
};

onMounted(() => {
  updateCarouselHeight();
  window.addEventListener('resize', updateCarouselHeight);
});

onUnmounted(() => {
  window.removeEventListener('resize', updateCarouselHeight);
});
</script>

<style scoped>
.v-carousel-item {
  position: relative;
  overflow: hidden;
}
</style>
