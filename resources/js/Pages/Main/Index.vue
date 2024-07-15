<template>
  <MainLayout>
    <Head title="MainPage" />
    <div class="flex flex-col min-h-screen">
      <main class="flex-grow">
        <div>
          <div v-if="isSmallScreen">
            <Carousel :items="props.carousells" />
          </div>
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row w-full justify-center">
              <!-- Main content section -->
              <!-- left section -->
              <div class="w-full md:w-2/2 p-2">
                <div v-if="isBigScreen">
                  <Carousel :items="props.carousells" />
                </div>
                <h1 class="text-purple-900 font-bold my-2 font-bold text-xl sm:text-3xl text-start">
                  <b>News and Announcement Section</b>
                </h1>
                <hr class="mb-4 border-1 border-purple-800">
                <div v-for="post in props.posts" :key="post.id" id="news">
                  <div class="text-left flex items-justify mb-4">
                    <div class="mr-0">
                      <img :src="post.image" alt="Image Logo" class="min-w-32 w-32 h-min max-h-100 mr-2">
                    </div>
                    <div class="text-justify ml-2">
                      <h3 class="text-purple-800 font-semibold text-md tracking-wide leading-6">
                        <a :href="`/show/${post.id}`" class="hover:text-purple-900">{{ post.title }}</a>
                      </h3>
                      <p class="text-slate-600">{{ formattedDate(post.created_at) }}</p>
                      <p v-if="post.content.length > 0">
                        <div class="text-slate-700 font-normal" v-html="post.content.substring(0, 300)"></div>
                        <a :href="`/show/${post.id}`" class="hover:text-green-600"><i></i></a>
                      </p>
                      <p v-else>{{ post.content }}</p>
                    </div>
                  </div>
                  <hr class="mb-4 border-1 border-purple-200">
                </div>

                <!-- Breadcrumb -->
                <nav class="bg-grey-light w-full rounded-md" aria-label="breadcrumb">
                  <ol class="list-reset flex">
                    <li><a href="#" class="text-neutral-500 hover:text-neutral-600 dark:text-neutral-200">Home</a></li>
                    <li><span class="mx-2 text-neutral-500 dark:text-neutral-200">/</span></li>
                  </ol>
                </nav>
                <!-- End Breadcrumb -->
              </div>
              <!-- End main content section -->

              <!-- Links, Events & Seminars -->
              <!-- right section -->
              <div class="w-full md:w-1/4 p-2 flex justify-start hidden md:block">
                <div class="text-left">
                  <div class="mb-2">
                    <h2 class="text-purple-900 text-mb font-bold mb-2">Links, Events & Seminars</h2>
                    <hr class="mb-2 border-1 border-purple-800">
                    <ul class="list-inside list-disc">
                      <li v-for="(item, index) in links" :key="index" class="mb-2 font-semibold">
                        <a :href="item.url" class="py-1 text-sm text-slate-600 hover:text-slate-900">{{ item.text }}</a>
                      </li>
                    </ul>
                  </div>
                  <div class="mb-2">
                    <h2 class="text-purple-900 text-mb font-bold mb-2 mt-3">Photo Gallery</h2>
                    <hr class="mb-2 border-1 border-purple-800">
                    <ul class="list-inside list-disc">
                      <li v-for="(item, index) in events" :key="index" class="mb-2 font-semibold">
                        <a :href="item.url" class="py-1 text-sm text-slate-600 hover:text-slate-900">{{ item.text }}</a>
                      </li>
                    </ul>
                  </div>
                  <div class="mb-2">
                    <h2 class="text-purple-900 text-mb font-bold mb-2 mt-3">AUSL Publications</h2>
                    <hr class="mb-2 border-1 border-purple-800">
                    <ul class="list-inside list-disc">
                      <li v-for="(item, index) in publication" :key="index" class="mb-2 font-semibold">
                        <a :href="item.url" class="py-1 text-sm text-slate-600 hover:text-slate-900">{{ item.text }}</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- End Links, Events & Seminars -->
            </div>
          </div>

            <Gallery class="my-4" />

          <!-- <Publication class="my-4" /> -->
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <Testimonials class="my-4" :items="props.alumni" />
            <!-- start google|facebook area -->
            <div class="mt-6">
              <div class="basis-full md:basis-1/2 flex flex-col justify-center items-center px-4 py-4">
                <h1 class="text-purple-900 font-bold mb-3 font-bold mt-2 text-xl sm:text-3xl text-center">Stay connected with AUSL</h1>
                <p class="text-lg text-slate-700 text-center tracking-wide">
                  Discover the latest updates, events, and announcements from Arellano University School of Law. Stay informed and engaged with our community through our Facebook page or visit us onsite.
                </p>
              </div>
            </div>

            <div class="row px-2 py-2 mb-6">
              <div class="google-maps shadow-xl rounded-lg">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.6906568880654!2d120.9925687736211!3d14.559674278080355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97bafba42c3%3A0x7859c5febabe4837!2sArellano%20University%20School%20of%20Law!5e0!3m2!1sen!2sph!4v1719103813103!5m2!1sen!2sph"
                  style="border:0;"
                  allowfullscreen=""
                  loading="lazy"
                ></iframe>
              </div>
              <div class="fb-bind hidden sm:block shadow-xl rounded-lg">
                <iframe
                  src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAUSLchiefs&tabs=timeline%2Cevents&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                  style="border:none;overflow:hidden"
                  scrolling="no"
                  frameborder="0"
                  allowfullscreen=""
                  loading="lazy"
                  allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                ></iframe>
              </div>
            </div>
             <!-- end google|facebook area -->

            <!-- Start Related Websites -->
            <div class="flex flex-wrap justify-center items-start space-x-8">
              <div class="flex flex-col items-center w-24">
                <a href="https://www.arellano.edu.ph/news/sports-news/" class="text-center">
                  <img class="w-full transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0 transform hover:scale-105" src="/images/chiefsLogo.png" alt="Logo">
                  <span class="mt-2 block w-full text-center text-slate-700">Athletes</span>
                </a>
              </div>
              <div class="flex flex-col items-center w-24">
                <a href="https://lawphil.net/" class="text-center">
                  <img class="w-full transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0 transform hover:scale-105" src="/images/lawphilLogo.png" alt="Logo">
                  <span class="mt-2 block w-full text-center text-slate-700">LawPhil</span>
                </a>
              </div>
              <div class="flex flex-col items-center w-24">
                <a href="https://www.arellano.edu.ph/" class="text-center">
                  <img class="w-full transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0 transform hover:scale-105" src="/images/auLogo.png" alt="Logo">
                  <span class="mt-2 block w-full text-center text-slate-700">Arellano University</span>
                </a>
              </div>
            </div>
            <!-- End Related Websites -->
          </div>
        </div>
      </main>
    </div>

    <!-- Floating Message Icon -->
    <!-- <v-icon class="floating-message-icon mdi mdi-message" @click="openChat" title="Chat with us"></v-icon> -->
  </MainLayout>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import Swal from 'sweetalert2';
import Carousel from '@/Pages/Main/Carousel/Carousel.vue';
import Gallery from '@/Pages/Main/Gallery/Index.vue';
import Publication from '@/Pages/Main/Publication/Index.vue'
import Testimonials from '@/Pages/Main/Alumni/Index.vue'

// Define props here
const props = defineProps({
  posts: {
    type: Array,
    required: true
  },
  carousells: {
    type: Array,
    required: true
  },
  alumni: { 
    type: Array, 
    required: true 
  },
});

// Log the carousells data to the console
console.log('Carousells:', props.carousells);

const formattedDate = (dateString) => {
  const date = new Date(dateString);
  const formatted = date.toLocaleDateString('en-US', {
    month: 'long',
    day: 'numeric',
    year: 'numeric',
  });
  return formatted;
};

const links = ref([
  { text: 'Online Enrollment Guide', url: '/enrollment' },
  { text: 'Student ID Application', url: '/idApplication' },
  { text: 'AUSL Academic Calendar', url: 'acadCalendar' },
  { text: 'Medical Information Form', url: 'https://docs.google.com/forms/d/e/1FAIpQLScZXZAGt2BnVhXl35xgSxLnj8CLWlcL0FImY2jz90PzJofpPw/viewform' },
  { text: 'Downloadable Registrar Forms', url: '/office/registrar' },
  { text: 'Guideline/Payment Procedure', url: '/office/accounting' }
]);

const events = ref([
  { text: '2023 Events', url: '#event1' },
  { text: '2022 Events', url: '#event2' },
  { text: '2021 Events', url: '#event3' },
  { text: '2020 Events', url:'#event4' },
  { text: '2019 Events', url: '#event5' }
]);

const publication = ref([
  { text: 'Publication Link', url: '/enrollment' },
  { text: 'Publication Link', url: '/enrollment' },
  { text: 'Publication Link', url: '/enrollment' },
  { text: 'Publication Link', url: '/enrollment' },
  { text: 'Publication Link', url: '/enrollment' },
]);

const screenWidth = ref(window.innerWidth);

const updateScreenSize = () => {
  screenWidth.value = window.innerWidth;
};

const isSmallScreen = computed(() => screenWidth.value < 640);
const isBigScreen = computed(() => screenWidth.value >= 640);

onMounted(() => {
  updateScreenSize();
  window.addEventListener('resize', updateScreenSize);

  Swal.fire({
    title: 'Enrollment Going On!',
    text: 'Would you like to enroll now?',
    icon: 'info',
    showCancelButton: true,
    confirmButtonText: 'Enroll Now',
    cancelButtonText: 'Cancel'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'https://aims.arellanolaw.edu/aims/applicants/';
    } else {
      console.log('Enrollment canceled');
    }
  });
});

const openChat = () => {
  window.$crisp = [];
  window.CRISP_WEBSITE_ID = "0eb66175-e176-41a6-bb43-8847771c8101";
  (function() {
    const d = document;
    const s = d.createElement("script");
    s.src = "https://client.crisp.chat/l.js";
    s.async = 1;
    d.getElementsByTagName("head")[0].appendChild(s);
  })();
};
</script>

<style scoped>
.carousel-image {
  max-width: 100%;
  width: 100%;
  height: 100%;
  max-height: 100%;
  margin-right: 0px;
}

.row {
  display: grid;
  grid-template-columns: 1.5fr 1fr; /* Two columns with the first one being 1.5 times as wide */
  gap: 1rem; /* Adjust the gap as needed */
  margin: 0;
  padding: 0;
}

.google-maps {
  min-width: 300px; /* Ensure a minimum width */
  height: 0;
  padding-bottom: 56.25%; /* 16:9 aspect ratio */
  position: relative;
  overflow: hidden;
}

.fb-bind {
  min-width: 300px; /* Ensure a minimum width */
  height: 0;
  padding-bottom: 84.25%; /* Adjusted aspect ratio */
  position: relative;
  overflow: hidden;
}

.google-maps iframe,
.fb-bind iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}

/* Responsive adjustments */
@media (max-width: 640px) {
  .row {
    grid-template-columns: 1fr; /* Single column layout for mobile */
  }

  .google-maps,
  .fb-bind {
    padding-bottom: 56.25%; /* Maintain 16:9 aspect ratio for both */
  }
}

.v-card--reveal {
  align-items: center;
  bottom: 0;
  justify-content: center;
  opacity: .9;
  position: absolute;
  width: 100%;
}

.floating-message-icon {
  position: fixed;
  bottom: 40px; /* Move it up a little bit */
  right: 20px;
  background-color: #6200ea;
  color: white;
  border-radius: 50%;
  padding: 26px; /* Increase the size */
  font-size: 24px; /* Increase the icon size */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  cursor: pointer;
  transition: background-color 0.3s ease;
} 

.floating-message-icon:hover {
  background-color: #3700b3;
}
</style>