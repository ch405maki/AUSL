<template>
    <MainLayout>
      <Head title="Enrollment Guide" />
      <Header>Social Media Page</Header>
      <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 py-2 lg:py-8">
          <div class="flex flex-col md:flex-row justify-between gap-8">
            <!-- Main content section -->
            <section class="w-full md:w-3/4 relative ml-2">
              <div>
                <h2 class="text-official-purple-600 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                  Social Media Page
                </h2>
                <div class="bg-white border-none rounded-lg relative">
                  <!-- Social Media Links -->
                  <h2 class="text-official-purple-800 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                  Follow Us
                  </h2>
                  <ul class="text-slate-700">
                  <li
                    v-for="link in socialMediaLinks"
                    :key="link.name"
                    class="mb-4 flex items-center"
                  >
                    <a
                      :href="link.url"
                      :class="link.hoverClass"
                      class="
                          text-slate-700
                          text-lg font-normal
                          text-gray-600 
                          hover:text-slate-900 
                          hover:underline cursor-pointer 
                          flex items-center 
                          transition-transform 
                          duration-300 
                          ease-in-out 
                          transform 
                          hover:scale-110"
                        >
                      <img
                        :src="link.logo"
                        alt=""
                        class="w-10 h-10 mr-2 transition-transform duration-300 ease-in-out transform hover:scale-110"
                      />
                      <span>{{ link.name }}</span>
                    </a>
                  </li>
                </ul>
                </div>
              </div>
            </section>
  
            <aside class="w-full md:w-1/4 sticky top-0">
            <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
              <div class="ml-4">
                <h2 class="mb-4 text-lg leading-6 font-medium text-purple-900 capitalize">On this page</h2>
                <hr class="mb-4 border-1 border-purple-800">
                <h3 class="text-lg font-normal text-gray-800 mb-8">Social Media Links</h3>
              </div>
                <div class="ml-4">
                <h2 class="text-purple-900 text-lg font-medium mb-4">Related Links</h2>
                <hr class="mb-4 border-1 border-purple-800">
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
import RelatedLinks from './Components/RelatedLinks.vue';
import Header from '../Components/Header.vue';

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

const socialMediaLinks = [
  {
    name: "AUSL Facebook Page",
    url: "https://www.facebook.com/AUSLchiefs",
    logo: "/images/contact/social/AUSL.png",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "OSA Facebook Page",
    url: "https://www.facebook.com/AUSLOfficeofStudentAffairs",
    logo: "/images/contact/social/OSA.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Audio Visual Facebook Page",
    url: "https://www.facebook.com/avausl",
    logo: "/images/contact/social/AUSL.png",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Student Government",
    url: "https://www.facebook.com/AUSLSG",
    logo: "/images/contact/social/ALSG.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Singers",
    url: "https://www.facebook.com/arellanolawsingers",
    logo: "/images/contact/social/ALS.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Hotel Ops and Marshall",
    url: "https://www.facebook.com/arellanolawHOM",
    logo: "/images/contact/social/HOM.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Forensic Guild",
    url: "https://www.facebook.com/alfgpage",
    logo: "/images/contact/social/AFG.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Gazette",
    url: "https://www.facebook.com/GazetteAUSL",
    logo: "/images/contact/social/GAZETTE.png",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Commission On Election",
    url: "https://www.facebook.com/arellanolawcomelec",
    logo: "/images/contact/social/ALC.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Chiefs Environmental Society",
    url: "https://www.facebook.com/ausl.aces",
    logo: "/images/contact/social/ACES.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Tactical Society",
    url: "https://www.facebook.com/profile.php?id=61562394412215",
    logo: "/images/contact/social/ALTS.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Bar Operations",
    url: "https://facebook.com/auslbaroperations",
    logo: "/images/contact/social/BAROPS.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Athletics Society",
    url: "https://www.facebook.com/AUSLchiefs22",
    logo: "/images/contact/social/AUSLCHIEFS.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Golf Club",
    url: "https://www.facebook.com/profile.php?id=61559868311215",
    logo: "/images/contact/social/ALGC.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law PEERS",
    url: "https://www.facebook.com/AUSLPeers",
    logo: "/images/contact/social/PEERS.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "Arellano Law Academic Society",
    url: "https://www.facebook.com/alas.arellanolaw",
    logo: "/images/contact/social/ALAS.jpg",
    hoverClass: "hover:text-blue-600"
  },
  {
    name: "AUSL YouTube Channel",
    url: "https://www.youtube.com/@AUSLofficial",
    logo: "/images/contact/social/youtube.png",
    hoverClass: "hover:text-red-600"
  }
];

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


    
  .google-maps {
  min-width: 100%; /* Ensure a minimum width */
  height: 0;
  padding-bottom: 56.25%; /* 16:9 aspect ratio */
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

  .iframe-container {
  position: relative;
  width: 100%;
  padding-bottom: 56.25%; /* 16:9 aspect ratio (9 / 16 * 100) */
  height: 0;
  overflow: hidden;
}

.iframe-container iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}
</style>