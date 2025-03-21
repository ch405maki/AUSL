<template>
  <div class="card-carousel">
    <div
      v-for="(card, index) in cards"
      :key="index"
      :class="[
        'my-card',
        { active: index === activeIndex, prev: index === prevIndex, next: index === nextIndex }
      ]"
      @click="handleClick(index)"
    >
      <img :src="card.image" alt="Card Image" class="card-image" />
    </div>
  </div>
</template>

<script>
import { ref, onMounted, onBeforeUnmount } from 'vue';

export default {
  setup() {
    const cards = ref([
      { image: '/images/002.jpg' },
      { image: '/images/004.jpg' },
      { image: '/images/008.jpg' },
      { image: '/images/002.jpg' },
      { image: '/images/004.jpg' },
    ]);

    const activeIndex = ref(0);
    const prevIndex = ref(cards.value.length - 1);
    const nextIndex = ref(1);
    const autoPlayInterval = ref(null);

    const updateIndices = (index) => {
      activeIndex.value = index;
      prevIndex.value = (index - 1 + cards.value.length) % cards.value.length;
      nextIndex.value = (index + 1) % cards.value.length;
    };

    const handleClick = (index) => {
      updateIndices(index);
      resetAutoPlay(); // Reset auto-play timer on manual click
    };

    const startAutoPlay = () => {
      autoPlayInterval.value = setInterval(() => {
        const next = (activeIndex.value + 1) % cards.value.length;
        updateIndices(next);
      }, 3000); // Adjust the interval as needed (3000ms = 3 seconds)
    };

    const resetAutoPlay = () => {
      if (autoPlayInterval.value) {
        clearInterval(autoPlayInterval.value);
      }
      startAutoPlay();
    };

    onMounted(() => {
      updateIndices(Math.floor(cards.value.length / 2));
      startAutoPlay(); // Start auto-play when component is mounted
    });

    onBeforeUnmount(() => {
      if (autoPlayInterval.value) {
        clearInterval(autoPlayInterval.value); // Clean up the interval on component unmount
      }
    });

    return {
      cards,
      activeIndex,
      prevIndex,
      nextIndex,
      handleClick,
      startAutoPlay,
    };
  },
};
</script>

<style scoped>
.card-carousel {
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  height: 20rem; /* Ensure the container has a fixed height */
}

.my-card {
  height: 19rem;
  width: 30rem; /* Increased width */
  position: absolute;
  z-index: 1;
  transform: scale(0.6) translateY(-2rem);
  opacity: 0;
  cursor: pointer;
  pointer-events: none;
  background: linear-gradient(to top, #2e5266, #6e8898);
  transition: transform 1s, opacity 1s;
}

.my-card:after {
  content: '';
  position: absolute;
  height: 2px;
  width: 100%;
  border-radius: 100%;
  background-color: rgba(0, 0, 0, 0.3);
  bottom: -5rem;
  filter: blur(4px);
}

.my-card.active {
  z-index: 3;
  transform: scale(1) translateY(0) translateX(0);
  opacity: 1;
  pointer-events: auto;
}

.my-card.prev {
  z-index: 2;
  transform: scale(0.8) translateY(-1rem) translateX(-18rem); /* Adjusted for increased width */
  opacity: 0.6;
  pointer-events: auto;
}

.my-card.next {
  z-index: 2;
  transform: scale(0.8) translateY(-1rem) translateX(18rem); /* Adjusted for increased width */
  opacity: 0.6;
  pointer-events: auto;
}

.card-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
</style>
