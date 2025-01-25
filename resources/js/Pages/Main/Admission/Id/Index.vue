<template>
  <MainLayout>
    <Head title="ID Application" />
    <main class="flex-grow">
      <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
        <div class="flex flex-col md:flex-row justify-between gap-8">
          <!-- Main content section -->
          <section class="w-full md:w-3/4 relative">
            <!-- Step 1 -->
            <div class="ml-2">
              <h2 class="text-official-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                ID Application
              </h2>
                <div class="mb-6 relative">
                  <div class="flex flex-row sm:flex-row items-center justify-between mb-6">
                    <div class="mb-6 relative">
                    <h2 class="text-official-purple-900 font-bold mb-8 text-xl sm:text-2xl text-pretty text-start">Student ID Application and Releasing Procedures</h2>
                    <blockquote class="text-gray-700 pl-0 sm:pl-4 flex flex-wrap items-center">
                        <div class="w-full ">
                        <p class="mb-4 text-lg font-normal text-gray-800 mb-8"><span class="text-lg font-normal text-gray-800 mb-8">STEP 1.</span> Completely fill up and submit the online application at: <a href="https://arellanolaw.edu/ausl-id" class="text-official-purple-700 underline">https://arellanolaw.edu/ausl-id.</a></p>
                        <p class="mb-4 text-lg font-normal text-gray-800 mb-8"><span class="text-lg font-normal text-gray-800 mb-8">STEP 2.</span> After submitting the form, your application will be validated. Once application is confirmed, the student will receive a confirmation email that the student ID is ready for release.</p>
                        <p class="mb-4 text-lg font-normal text-gray-800 mb-8"><span class="text-lg font-normal text-gray-800 mb-8">STEP 3.</span> To claim the ID, proceed to the IT Center, 3rd floor Admin Bldg. and present your confirmation email.</p>
                        <p class="mb-4 text-lg font-normal text-gray-800 mb-8">If your Student ID will be claimed by another person or via courier delivery services, please provide an Authorization letter with photocopy of Government Issued ID of the student and the authorized representative.</p>
                        </div>
                    </blockquote>
                  </div>
                </div>
                </div>
            </div>
          </section>

          <aside class="w-full md:w-1/4 sticky top-0">
          <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
              <div class="ml-4">
              <h2 class="mb-4 text-lg leading-6 font-medium text-official-purple-900 capitalize">On this page</h2>
              <hr class="mb-4 border-1 border-official-purple-800">
                <h3 class="text-lg font-normal text-gray-800 mb-8">ID Application.</h3>
              </div>
              <div class="ml-4">
              <h2 class="text-official-purple-900 text-lg font-medium mb-4">Related Links</h2>
              <hr class="mb-4 border-1 border-official-purple-800">
              <ul class="list-inside list-disc">
                  <RelatedLinks />
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
import RelatedLinks from '../Components/RelatedLinks.vue';

// Create a ref for the current step
const step = ref(1); // Initially set to Step 1

// Function to set the current step
const setStep = (newStep) => {
step.value = newStep;
console.log(`Current step set to: ${newStep}`); // Debugging log
};

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