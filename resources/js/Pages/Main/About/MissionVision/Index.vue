<template>
    <MainLayout>
      <Head title="Arellano Law Foundation Inc." />
      <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
          <div class="flex flex-col md:flex-row justify-between gap-8">
            <!-- Main content section -->
            <section class="w-full md:w-3/4 relative">
              <!-- Step 1 -->
              <div class="ml-2">
                <div class="mb-8">
                    <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                        Mission and Vision  
                    </h2>
                    <div class="bg-white border-none rounded-lg mb-6 relative">
                        <h2 class="text-lg sm:text-xl font-bold text-gray-700 mb-8">Mission</h2>
                        <p class="text-lg font-normal text-gray-600 mb-8 ">
                        We are an institution dedicated to educate and produce in a sublime manner individuals as adept counsels of law.
                        <br>
                        <br>
                        We will advocate respect for the rule of law, human rights and dignity, defend the oppressed, protect our ecology, strive to be equal with others, serve God, our country and fellowmen.
                        </p>
                        <h2 class="text-lg sm:text-xl font-bold text-gray-700 mb-8">Vision</h2>
                        <p class="text-lg font-normal text-gray-600 mb-8">
                        We shall be the leading exponent of the Learner-Centered Method of teaching that integrates Ethics and Values in order to produce competent legal practitioners.
                        <br>
                        <br>
                        We shall advance the use of state-of-the-art technologies and methodologies to train our students to become effective partners in nation building and as future leaders of the country.
                        <br>
                        <br>
                        We shall utilize modern strategies and innovate policies in our goal to promote social justice, equality and the rule of law.
                        </p>
                    </div>
                </div>
            </div>
            </section>

            <aside class="w-full md:w-1/4 sticky top-0">
            <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                <div class="ml-4">
                <h2 class="mb-4 text-lg leading-6 font-medium text-purple-900 capitalize">On this page</h2>
                <hr class="mb-4 border-1 border-purple-800">
                    <h3 class="text-lg font-normal text-gray-800 mb-8">Mission and Vision</h3>
                </div>
                <div class="ml-4">
                <h2 class="text-purple-900 text-lg font-medium mb-4">Related Links</h2>
                <hr class="mb-4 border-1 border-purple-800">
                <ul class="list-inside list-disc">
                    <li v-for="(item, index) in links" :key="index" class="mb-2 font-semibold">
                    <a :href="item.url" class="text-lg font-normal text-gray-600 hover:text-slate-900">{{ item.text }}</a> 
                    </li>
                </ul>
                </div>
            </div>
            </aside>
        </div>
      </div>
    </main>
  </MainLayout>
</template>

<script setup>
import { ref } from 'vue';
import { reactive, onMounted, onBeforeUnmount } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

// Create a ref for the current step
const step = ref(1); // Initially set to Step 1

// Function to set the current step
const setStep = (newStep) => {
  step.value = newStep;
  console.log(`Current step set to: ${newStep}`); // Debugging log
};

const links = ref([
      { text: 'History', url: '#' },
      { text: 'Mission and Vision', url: '#' },
      { text: 'Alma Mater Hymn', url: '#' },
      { text: 'Arellano Law Foundation', url: '/administration/alf' },
    ]);

const isMobile = reactive({ value: window.innerWidth <= 768 });

const checkIfMobile = () => {
  isMobile.value = window.innerWidth <= 768;
};

onMounted(() => {
  window.addEventListener('resize', checkIfMobile);
});

onBeforeUnmount(() => {
  window.removeEventListener('resize', checkIfMobile);
});
</script>

<style scoped>
.container {
  max-width: 1200px;
}

.sticky {
  position: sticky;
  top: 0;
}

.overflow-y-auto {
  overflow-y: auto;
}

.h-screen {
  height: 100vh;
}

.fixed {
  position: fixed;
}

.bottom-4 {
  bottom: 1rem;
}

.right-4 {
  right: 1rem;
}

.flex {
  display: flex;
}

.space-x-2 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(0.5rem * var(--tw-space-x-reverse));
  margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
}

.v-btn {
  margin-top: 16px;
  margin-right: 8px;
}
</style>