<template>
  <div ref="fotoramaContainer" 
      class="fotorama" 
      data-transition="crossfade"
      data-fit="cover"
      data-width="100%" 
      data-ratio="1152/323" 
      data-nav="false"  
      data-autoplay="7000">
    <div v-for="(item, i) in items" :key="i" class="carousel-item">
      <img :src="item.image" class="carousel-image object-fit" alt="Carousel Image" />
    </div>
    <div class="fotorama-indicators"></div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, nextTick } from 'vue';

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

const fotoramaContainer = ref(null);

const initializeFotorama = () => {
  const $fotorama = $(fotoramaContainer.value).fotorama();
  const fotorama = $fotorama.data('fotorama');

  // Log items and check for blank slides
  console.log('Items:', props.items);

  // Create indicators
  const indicatorsContainer = $(fotoramaContainer.value).find('.fotorama-indicators');
  props.items.forEach((_, index) => {
    const indicator = $('<div class="indicator"></div>');
    indicatorsContainer.append(indicator);
  });

  // Update indicator on slide change
  fotorama.on('fotorama:showend', (e, fotorama) => {
    indicatorsContainer.find('.indicator').removeClass('active');
    indicatorsContainer.find('.indicator').eq(fotorama.activeIndex).addClass('active');
  });
};

onMounted(() => {
  nextTick(() => {
    initializeFotorama();
  });
});

onUnmounted(() => {
  if ($(fotoramaContainer.value).data('fotorama')) {
    $(fotoramaContainer.value).data('fotorama').destroy();
  }
});
</script>

<style scoped>
.carousel-item {
  position: relative;
  overflow: hidden;
}

.fotorama-indicators {
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  justify-content: center;
}

.fotorama-indicators .indicator {
  width: 10px;
  height: 10px;
  background-color: #ccc;
  border-radius: 50%;
  margin: 0 5px;
  transition: background-color 0.3s;
}

.fotorama-indicators .indicator.active {
  background-color: #000;
}
</style>
