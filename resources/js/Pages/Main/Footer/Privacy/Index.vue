<template>
  <MainLayout>
    <Head title="Arellano Law Foundation Inc." />
    <Header>Website Privacy Policy Notice</Header>
    <main class="flex-grow">
      <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
        <div class="flex flex-col md:flex-row justify-between gap-8">
          <!-- Main content section -->
          <section class="w-full md:w-3/4 relative">
              <!-- Step 1 -->
              <div class="ml-2">
                <div class="mb-8">
                <h2 class="text-official-purple-900 font-bold mt-4 mb-2 text-xl sm:text-2xl text-pretty text-left">
                  Website Privacy Policy Notice
                </h2>
                <div class="border-none rounded-lg relative text-left">
                  <p>Arellano Law Foundation (ALF) is committed to protecting privacy. This Website Privacy Policy describes the terms and conditions relating to the handling of certain personal information, which may be collected by using this website.</p>
                  <br>
                  <p>By using the website and submitting personal information through the website, the user expressly consents to the collection, use, and disclosure of the user's personal information in accordance with this Website Privacy Policy.</p>
                  <br>
                  <p>Please read this Website Privacy Policy carefully so that you understand our privacy practices.</p>
                </div>
                <h2 class="text-official-purple-900 font-bold mb-2 mt-8 text-xl sm:text-2xl text-pretty text-left">
                  Scope
                </h2>
                <div class="border-none rounded-lg relative text-left">
                <p>This Website Privacy Policy applies to personal information collected by this website.</p>
                </div>
                <h2 class="text-official-purple-900 font-bold mb-2 mt-8 text-xl sm:text-2xl text-pretty text-left">
                  Security
                </h2>
                <div class="border-none rounded-lg relative text-left">
                <p>ALF is committed to ensuring the security of your information. We maintain reasonable safeguards in this website to protect against unauthorized disclosure, use, alteration or destruction of the personal information you provide on the Site. If you have any questions about security at our Site, you can send an email to dpo@arellanolaw.edu</p>
                </div>
                <h2 class="text-official-purple-900 font-bold mb-2 mt-8 text-xl sm:text-2xl text-pretty text-left">
                  Sharing Your Information
                </h2>
                <div class="border-none rounded-lg relative text-left">
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
                <h2 class="text-official-purple-900 font-bold mb-2 mt-8 text-xl sm:text-2xl text-pretty text-left">
                Links To Other Websites
                </h2>
                <div class="border-none rounded-lg relative text-left">
                <p>This website contains links to other websites. The School is not responsible for the privacy practices of these other sites.</p>
                <br>
                <p>In case the user follows a link to any of these websites, the School does not accept any responsibility or liability for these policies.</p>
                </div>
                <h2 class="text-official-purple-900 font-bold mb-2 mt-8 text-xl sm:text-2xl text-pretty text-left">
                  Changes To Statement
                </h2>
                <div class="border-none rounded-lg relative text-left mb-10">
                <p>Any changes in this privacy policy in the future will be posted on this page even without prior notice to all our stakeholders. We encourage the user to check on this page regularly for any changes.</p>
                </div>

                <h1 class="text-official-purple-900 font-bold text-xl sm:text-lg text-pretty">Contact Us</h1>
                <p class="text-official-purple-900 mb-2 font-bold text-lg sm:text-xl text-pretty">
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
                <!-- <p class="text-gray-600 mt-4"><i>Last updated: 29 May 2018</i></p> -->
                </div>
            </div>
            </section>

          <aside class="w-full md:w-1/3 sticky top-0">
          <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
            <img 
              src="/images/privacy/registration.jpg" 
              alt="Background Image" 
              class="w-full h-auto object-cover cursor-pointer"
              @click="showLightbox(0)" 
            />
            <img 
              src="/images/privacy/corseal.png" 
              alt="Background Image" 
              class="w-full h-auto object-cover cursor-pointer"
              @click="showLightbox(1)" 
            />
          </div>
          </aside>
      </div>
    </div>
    
    <!-- Lightbox component -->
    <VueEasyLightbox 
      :visible="lightboxVisible" 
      :imgs="imageList" 
      :index="lightboxIndex" 
      @hide="lightboxVisible = false" 
    />
  </main>
</MainLayout>
</template>

<script setup>
import { ref, reactive, onMounted, onBeforeUnmount } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import VueEasyLightbox from 'vue-easy-lightbox';
import Header from '../../Components/Header.vue';

// Images array for lightbox
const imageList = [
'/images/privacy/registration.jpg',
'/images/privacy/corseal.jpg'
];

// Lightbox state variables
const lightboxVisible = ref(false);
const lightboxIndex = ref(0);

// Function to open the lightbox at the specified image index
const showLightbox = (index) => {
lightboxIndex.value = index;
lightboxVisible.value = true;
};

// Other code for layout and resize detection
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
/* Your existing styles */
.container {
max-width: 1200px;
}
</style>
