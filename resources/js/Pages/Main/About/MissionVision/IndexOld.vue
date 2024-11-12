<template>
  <div
    class="flex flex-col md:flex-row justify-between gap-8 pt bg-cover bg-center h-100 p-10"
    style="background-image: url('/images/about/mvbg.jpg');"
  >
    <!-- Mission section -->
    <section class="w-full md:w-1/2">
      <div class="border-none rounded-lg text-center">
        <h2 class="text-white font-bold text-xl sm:text-3xl">Mission</h2>
        <p class="text-lg font-normal text-white">
          We are an institution dedicated to educate and produce in a sublime manner individuals as adept counsels of law.
          <br /><br />
          We will advocate respect for the rule of law, human rights and dignity, defend the oppressed, protect our ecology, strive to be equal with others, serve God, our country and fellowmen.
        </p>
      </div>
    </section>

    <!-- Vision section -->
    <section class="w-full md:w-1/2">
      <div class="border-none rounded-lg text-center">
        <h2 class="text-white font-bold text-xl sm:text-3xl">Vision</h2>
        <p class="text-lg font-normal text-white">
          We shall be the leading exponent of the Learner-Centered Method of teaching that integrates Ethics and Values to produce competent legal practitioners.
          <br /><br />
          We shall advance the use of state-of-the-art technologies and methodologies to train our students to become effective partners in nation-building and as future leaders of the country.
          <br /><br />
          We shall utilize modern strategies and innovate policies in our goal to promote social justice, equality, and the rule of law.
        </p>
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
