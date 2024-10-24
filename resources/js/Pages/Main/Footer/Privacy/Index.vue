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
                <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-center">
                  WEBSITE PRIVACY POLICY NOTICE
                </h2>
                <div class="border-none rounded-lg relative text-center">
                  <p>Arellano Law Foundation (ALF) is committed to protecting privacy. This Website Privacy Policy describes the terms and conditions relating to the handling of certain personal information, which may be collected by using this website.</p>
                  <br>
                  <p>By using the website and submitting personal information through the website, the user expressly consents to the collection, use, and disclosure of the user's personal information in accordance with this Website Privacy Policy.</p>
                  <br>
                  <p>Please read this Website Privacy Policy carefully so that you understand our privacy practices.</p>
                </div>
                <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-center">
                  SCOPE
                </h2>
                <div class="border-none rounded-lg relative text-center">
                <p>This Website Privacy Policy applies to personal information collected by this website.</p>
                </div>
                <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-center">
                  SECURITY
                </h2>
                <div class="border-none rounded-lg relative text-center">
                <p>ALF is committed to ensuring the security of your information. We maintain reasonable safeguards in this website to protect against unauthorized disclosure, use, alteration or destruction of the personal information you provide on the Site. If you have any questions about security at our Site, you can send an email to dpo@arellanolaw.edu</p>
                </div>
                <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-center">
                  SHARING YOUR INFORMATION
                </h2>
                <div class="border-none rounded-lg relative text-center">
                <p>The personal data obtained from this website is entered and stored within the School's authorized information and communications system and will only be accessed by the Arellano Law Foundation and its authorized personnel.</p>
                <br>
                <p>Information from this website will not be shared with third parties, except on the following instances:</p>
                <br>
                <ul class="">
                  <li>1. As required by law;</li>
                  <li>2. As necessary to protect the interests of ALF;</li>
                  <li>3. With service providers acting on our behalf who have agreed to protect the confidentiality of the data;</li>
                </ul>
                </div>
                <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-center">
                LINKS TO OTHER WEBSITES
                </h2>
                <div class="border-none rounded-lg relative text-center">
                <p>This website contains links to other websites. The School is not responsible for the privacy practices of these other sites.</p>
                <br>
                <p>In case the user follows a link to any of these websites, the School does not accept any responsibility or liability for these policies.</p>
                </div>
                <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-center">
                  CHANGES TO STATEMENT
                </h2>
                <div class="border-none rounded-lg relative text-center mb-10">
                <p>Any changes in this privacy policy in the future will be posted on this page even without prior notice to all our stakeholders. We encourage the user to check on this page regularly for any changes.</p>
                </div>

                <h1 class="text-purple-900 font-semibold text-xl sm:text-lg text-pretty">Contact Us</h1>
                <p class="text-purple-900 mb-2 font-semibold text-lg sm:text-xl text-pretty">
                  The Data Protection Officer
                </p>
                <p>                  
                  Arellano Law Foundation
                  <br>
                  Taft Avenue corner Menlo Street, Pasay City
                  <br>
                  (02) 404-3089 local 15
                  <br>
                  dpo@arellanolaw.edu
                </p>
                <p class="text-gray-600 mt-4"><i>Last updated: 29 May 2018</i></p>
                </div>
            </div>
            </section>

            <aside class="w-full md:w-1/2 sticky top-0">
            <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
              <img src="/images/privacyPolicy/registration.jpg" alt="Background Image" class="w-full h-auto object-cover ">
              <img src="/images/privacyPolicy/corseal.jpg" alt="Background Image" class="w-full h-auto object-cover ">
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