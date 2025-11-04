<template>
  <div>
    <div class="min-h-screen relative">
      <!-- Falling Snow Overlay - Fixed at highest z-index -->
      <div class="snow-overlay">
        <div 
          v-for="snowflake in snowflakes" 
          :key="snowflake.id"
          class="snowflake absolute text-white"
          :class="snowflake.animationClass"
          :style="{
            left: snowflake.left + 'vw',
            fontSize: snowflake.size + 'px',
            animationDuration: snowflake.duration + 's',
            animationDelay: snowflake.delay + 's',
            opacity: snowflake.opacity
          }"
        >
          {{ snowflake.symbol }}
        </div>
      </div>

      <!-- Navigation Menu -->
      <nav class="bg-white border-b border-gray-100">
        <NavBar />
      </nav>

      <!-- Page Heading -->
      <header class="bg-white shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>

      <!-- Page Content -->
      <main>
        <slot />

        <!-- Cookie popup with animation -->
        <transition name="fade">
          <div 
            v-if="showCookiePopup" 
            class="cookie-popup fixed bottom-0 left-0 right-0 flex items-center justify-center py-4 z-50 mx-4 sm:mx-10"
          >
            <div class="container mx-auto px-4 py-2 bg-white rounded-lg shadow-lg border border-official-purple-300">
              <div class="flex flex-wrap items-center justify-between">
                <div class="flex items-center px-[2px] w-full md:w-7/12 lg:w-2/3">
                  <div class="md:mb-0">
                    <h3 class="text-sm font-bold text-black flex items-center">
                      We use cookies
                      <img src="https://www.svgrepo.com/show/401340/cookie.svg" alt="Cookie" class="ml-2 h-6 w-6 mr-2">
                    </h3>
                    <p class="text-xs font-medium text-body-color">
                      We use cookies to ensure you get the best experience on ArellanoLaw.edu <br>
                      By continuing to browse our site, you are agreeing to our use of cookies. Find out more 
                      <a :href="route('privacy_policy')" class="text-official-purple-800 underline">Click here</a>
                    </p>
                  </div>
                </div>
                <div class="flex items-center w-full md:w-5/12 lg:w-1/3 justify-end space-x-3 pr-2">
                  <button 
                    @click="acceptCookies" 
                    class="rounded-lg bg-official-purple-600 px-8 h-9 text-sm font-semibold text-white hover:bg-official-purple-500 focus:outline-none focus:ring-2 focus:ring-official-purple-500 focus:ring-offset-2"
                  >
                    Accept
                  </button>
                </div>
              </div>
            </div>
          </div>
        </transition>
      </main>

      <!-- Footer -->
      <Footer />
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Footer from '@/Layouts/Partials/Footer.vue';
import NavBar from '@/Layouts/Partials/NavBar/Index.vue';
import SideDrawer from './Partials/NavBar/Partials/SideDrawer.vue';
import { Inertia } from '@inertiajs/inertia';

const loading = ref(true);
const showCookiePopup = ref(false);
const snowflakes = ref([]);

// Snowflake symbols
const symbols = ['❄', '❅', '❆', '✻', '•'];
const animationClasses = ['pattern-1', 'pattern-2', 'pattern-3', 'pattern-4', 'pattern-5', 'straight'];

const createSnowflakes = () => {
  const numFlakes = 80;
  const newSnowflakes = [];
  
  for (let i = 0; i < numFlakes; i++) {
    newSnowflakes.push({
      id: i,
      left: Math.random() * 100,
      size: Math.random() * 12 + 8,
      duration: Math.random() * 10 + 10,
      delay: Math.random() * 15,
      opacity: Math.random() * 0.7 + 0.3,
      symbol: symbols[Math.floor(Math.random() * symbols.length)],
      animationClass: animationClasses[i % animationClasses.length]
    });
  }
  
  snowflakes.value = newSnowflakes;
};

const acceptCookies = () => {
  showCookiePopup.value = false; 
  localStorage.setItem('cookiesAccepted', 'true');
};

onMounted(() => {
  // Handle cookie popup logic
  setTimeout(() => {
    loading.value = false;
    if (!localStorage.getItem('cookiesAccepted')) {
      showCookiePopup.value = true;
    }
  }, 2000);

  // Create snowflakes
  createSnowflakes();
});
</script>

<style scoped>
/* Floating Message Icon */
.floating-message-icon {
  position: fixed;
  bottom: 40px;
  right: 20px;
  background-color: #6200ea;
  color: white;
  border-radius: 50%;
  padding: 20px;
  font-size: 24px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.floating-message-icon:hover {
  background-color: #3700b3;
}

/* Tooltip Hover Animation */
.relative:hover #tooltip-animation {
  visibility: visible;
  opacity: 1;
}

/* Fade Transition */
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s ease-in-out;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
.fade-enter-to, .fade-leave-from {
  opacity: 1;
}

/* --- Enhanced Falling Snow Animation - TOP PRIORITY --- */
.snow-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  pointer-events: none;
  overflow: hidden;
  z-index: 9999;
}

.snowflake {
  position: absolute;
  top: -100px;
  color: white;
  text-shadow: 0 0 10px rgba(255, 255, 255, 0.9);
  animation-timing-function: linear;
  animation-iteration-count: infinite;
  user-select: none;
  pointer-events: none;
  z-index: 10000;
}

/* Pattern 1: Gentle sway */
.snowflake.pattern-1 {
  animation-name: snow-fall-pattern-1;
}

@keyframes snow-fall-pattern-1 {
  0% {
    transform: translateY(-100px) translateX(-20px) rotate(0deg);
    opacity: 0;
  }
  10% {
    opacity: 1;
  }
  50% {
    transform: translateY(50vh) translateX(30px) rotate(180deg);
  }
  90% {
    opacity: 1;
  }
  100% {
    transform: translateY(100vh) translateX(-10px) rotate(360deg);
    opacity: 0;
  }
}

/* Pattern 2: Wide arc */
.snowflake.pattern-2 {
  animation-name: snow-fall-pattern-2;
}

@keyframes snow-fall-pattern-2 {
  0% {
    transform: translateY(-100px) translateX(15px) rotate(0deg);
    opacity: 0;
  }
  10% {
    opacity: 1;
  }
  50% {
    transform: translateY(50vh) translateX(-40px) rotate(180deg);
  }
  90% {
    opacity: 1;
  }
  100% {
    transform: translateY(100vh) translateX(20px) rotate(360deg);
    opacity: 0;
  }
}

/* Pattern 3: Zigzag */
.snowflake.pattern-3 {
  animation-name: snow-fall-pattern-3;
}

@keyframes snow-fall-pattern-3 {
  0% {
    transform: translateY(-100px) translateX(-25px) rotate(0deg);
    opacity: 0;
  }
  10% {
    opacity: 1;
  }
  25% {
    transform: translateY(25vh) translateX(35px) rotate(90deg);
  }
  50% {
    transform: translateY(50vh) translateX(-30px) rotate(180deg);
  }
  75% {
    transform: translateY(75vh) translateX(25px) rotate(270deg);
  }
  90% {
    opacity: 1;
  }
  100% {
    transform: translateY(100vh) translateX(-15px) rotate(360deg);
    opacity: 0;
  }
}

/* Pattern 4: Slow drift */
.snowflake.pattern-4 {
  animation-name: snow-fall-pattern-4;
}

@keyframes snow-fall-pattern-4 {
  0% {
    transform: translateY(-100px) translateX(10px) rotate(0deg);
    opacity: 0;
  }
  10% {
    opacity: 1;
  }
  33% {
    transform: translateY(33vh) translateX(-15px) rotate(120deg);
  }
  66% {
    transform: translateY(66vh) translateX(20px) rotate(240deg);
  }
  90% {
    opacity: 1;
  }
  100% {
    transform: translateY(100vh) translateX(-5px) rotate(360deg);
    opacity: 0;
  }
}

/* Pattern 5: Spiral */
.snowflake.pattern-5 {
  animation-name: snow-fall-pattern-5;
}

@keyframes snow-fall-pattern-5 {
  0% {
    transform: translateY(-100px) translateX(0px) rotate(0deg);
    opacity: 0;
  }
  10% {
    opacity: 1;
  }
  25% {
    transform: translateY(25vh) translateX(25px) rotate(90deg);
  }
  50% {
    transform: translateY(50vh) translateX(-25px) rotate(180deg);
  }
  75% {
    transform: translateY(75vh) translateX(25px) rotate(270deg);
  }
  90% {
    opacity: 1;
  }
  100% {
    transform: translateY(100vh) translateX(0px) rotate(360deg);
    opacity: 0;
  }
}

/* Straight falling pattern */
.snowflake.straight {
  animation-name: snow-fall-straight;
}

@keyframes snow-fall-straight {
  0% {
    transform: translateY(-100px) rotate(0deg);
    opacity: 0;
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
  }
  100% {
    transform: translateY(100vh) rotate(360deg);
    opacity: 0;
  }
}
</style>