<template>
  <div class="flex flex-col md:flex-row justify-between gap-8 pt bg-cover bg-center h-100 p-10"
    style="background-image: url('/images/about/mvbg.jpg');">
    <!-- Main content section -->
    <section class="w-full relative">
      <!-- Slider Content -->
      <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
        <!-- Transition wrapper -->
        <transition name="fade-slide" mode="out-in">
          <div key="step" class="w-full">
            <!-- Step 1: Mission -->
            <div v-if="step === 1">
              <div class="border-none rounded-lg mb-6 relative text-center p-8">
                <h2 class="text-white font-bold text-xl sm:text-3xl text-pretty mb-8">Mission</h2>
                <p class="text-lg font-normal text-white mb-8">
                  We are an institution dedicated to educate and produce in a sublime manner individuals as adept counsels of law.
                  <br /><br />
                  We will advocate respect for the rule of law, human rights and dignity, defend the oppressed, protect our ecology, strive to be equal with others, serve God, our country and fellowmen.
                </p>
              </div>
            </div>

            <!-- Step 2: Vision -->
            <div v-if="step === 2">
              <div class="border-none rounded-lg mb-6 relative text-center">
                <h2 class="text-white font-bold text-xl sm:text-4xl text-pretty mb-8">Vision</h2>
                <p class="text-lg font-normal text-white mb-8">
                  We shall be the leading exponent of the Learner-Centered Method of teaching that integrates Ethics and Values in order to produce competent legal practitioners.
                  <br /><br />
                  We shall advance the use of state-of-the-art technologies and methodologies to train our students to become effective partners in nation building and as future leaders of the country.
                  <br /><br />
                  We shall utilize modern strategies and innovate policies in our goal to promote social justice, equality, and the rule of law.
                </p>
              </div>
            </div>
          </div>
        </transition>

        <!-- Navigation buttons with SVG arrows -->
        <div class="absolute top-1/2 left-4 transform -translate-y-1/2">
          <button @click="prevStep" class="p-0">
            <!-- Left Arrow SVG (Bold & White) -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-white hover:text-gray-400 transition-all duration-300">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
        </div>
        <div class="absolute top-1/2 right-4 transform -translate-y-1/2">
          <button @click="nextStep" class="p-0">
            <!-- Right Arrow SVG (Bold & White) -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-white hover:text-gray-400 transition-all duration-300">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref } from 'vue';

// Create a ref for the current step
const step = ref(1);

// Functions to navigate between steps in a loop
const prevStep = () => {
  step.value = step.value === 1 ? 2 : step.value - 1;
};

const nextStep = () => {
  step.value = step.value === 2 ? 1 : step.value + 1;
};
</script>

<style scoped>
/* Fade and Slide Transition */
.fade-slide-enter-active, .fade-slide-leave-active {
  transition: all 0.6s ease-in-out;
}

.fade-slide-enter-from, .fade-slide-leave-to {
  opacity: 0;
  transform: translateX(-20px);
}

.fade-slide-enter-to, .fade-slide-leave-from {
  opacity: 1;
  transform: translateX(0);
}
</style>
