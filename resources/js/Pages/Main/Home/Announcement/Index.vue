<template>
<div class="bg-official-purple-50 py-6">
<div class="max-w-7xl mx-auto px-4 lg:py-8">
    <div class="flex flex-col md:flex-row justify-between gap-8  pl-1 sm:pl-1">
      <!-- Main content section -->
      <section class="w-full md:w-3/4 relative">
        <div class="text-center py-6">
        <div class="max-w-7xl mx-auto py-4">
          <h1 class="text-slate-800 text-left mb-2 font-bold text-2xl md:text-xl lg:text-2xl">
            Announcements
          </h1>
          <p class="font-normal text-left text-slate-700 text-md md:text-lg lg:text-xl mb-8">
            <!-- Read about the latest AUSL Initiatives, Achievements, and Developments. -->
          </p>
          
          <div class="announcement-carousel owl-carousel owl-theme">
            <div
              v-for="(announcement, index) in announcements"
              :key="announcement.id"
              
            >
            <div class="overflow-hidden mb-4 flex flex-col h-full relative card">
              <div class="overflow-hidden rounded-lg relative group">
                  <!-- Conditionally render the announcement image or fallback image -->
                  <a 
                      :href="announcement.category === 'Announcement' 
                          ? `/announcement/show/${announcement.id}` 
                          : announcement.category === 'Exam' 
                          ? `/exam/show/${announcement.id}` 
                          : `/deans/show/${announcement.id}`" 
                      class="block relative group"
                  >
                      <img 
                          :src="announcement.pubmat || '/images/announcement/announcementbg.jpg'" 
                          alt="Announcement Image" 
                          class="w-full h-100 object-cover"
                      />
                      <!-- Overlay for hover effect -->
                      <div class="overlay"></div>
                  </a>

                  <!-- Title overlay for announcement -->
                  <a 
                      :href="announcement.category === 'Announcement' 
                          ? `/announcement/show/${announcement.id}` 
                          : announcement.category === 'Exam' 
                          ? `/exam/show/${announcement.id}` 
                          : `/deans/show/${announcement.id}`" 
                      class="absolute inset-0 text-white text-sm flex items-end p-4"
                  >
                      <h1 v-if="!announcement.pubmat" class="w-full py-36 sm:py-20 text-3xl sm:text-xl font-bold cursor-pointer opacity-100 group-hover:opacity-100 transition-opacity duration-300">
                          {{ announcement.title.length > 26 ? announcement.title.slice(0, 21) + '...' : announcement.title }}
                      </h1>
                  </a>
              </div>

              <div class="p-4 flex flex-col flex-grow justify-between">
                  <!-- Announcement title link -->
                  <a 
                      :href="announcement.category === 'Announcement' 
                          ? `/announcement/show/${announcement.id}` 
                          : announcement.category === 'Exam' 
                          ? `/exam/show/${announcement.id}` 
                          : `/deans/show/${announcement.id}`"
                      class="font-bold text-lg text-left text-gray-800 hover:text-official-purple-900 cursor-pointer"
                  >
                      {{ announcement.title || 'Null' }}
                  </a>
                  <!-- Announcement date -->
                  <p class="text-gray-600 mt-2 text-left text-lg">
                      {{ new Date(announcement.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}
                  </p>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>

  <aside class="w-full md:w-1/4 sticky top-0 mb-6 sm:mb-0">
    <div class="mb-8 mt-2">
      <!-- Right Column: Event Highlight -->
      <div class="sm:col-span-12 lg:col-span-4">
        <div class="flex justify-between items-center py-7 mb-[4px]">
        <h1 class="text-slate-800 font-bold text-2xl lg:text-2xl">  
          Events
        </h1>
        <a 
          :href="route('events.upcomming')" 
          class="block sm:hidden w-[200px] max-w-xs text-center text-slate-800 font-medium text-base border border-official-purple-800 hover:bg-official-purple-800 hover:text-white rounded-xl px-4 py-2 transition-colors duration-300">
          Show All Events
        </a>
      </div>

        <div class="overflow-hidden flex flex-col max-w-xl mb-10 mx-auto">
          <a :href="events.link ">
            <!-- Hide image on mobile screens -->
            <div 
              v-if="events.image && events.image.length > 0" 
              class="hidden sm:block">
              <img class="w-full sm:h-64 object-cover" 
                :src="events.image[0]" 
                alt="Event Banner">
            </div>
          </a>
        </div>
        <div class="hidden sm:block flex justify-center sm:justify-start mb-6">
          <a :href="route('events.upcomming')" class="text-slate-800 font-medium text-base border border-official-purple-800 hover:bg-official-purple-800 hover:text-white rounded-xl px-4 py-2 transition-colors duration-300">
            Show All Events
          </a>
        </div>
      </div>
    </div>
  </aside>
  </div>
</div>
</div>
</template>
  
  <script setup>
  import {onMounted } from 'vue';
  import { Link, Head } from '@inertiajs/vue3';
  import { ref } from 'vue';

  
  const props = defineProps({
    announcements: {
      type: Array,
      required: true
    },
    events: {
      type: Array,
      required: true
    }
  });

  const formattedDate = (date) => {
    return new Date(date).toLocaleDateString();
  };
  
  onMounted(() => {
    if (typeof $ !== 'undefined') {
      const owlCarousel = $('.announcement-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
          0: { 
            items: 1,
            center: true, // Centering the single item on mobile
          },
          600: { items: 2 },
          1000: { items: 3 }
        }
      });
  
      // Pause autoplay on mouseover
      $('.announcement-carousel').on('mouseover', function() {
        owlCarousel.trigger('stop.owl.autoplay');
      });
  
      // Resume autoplay on mouseleave
      $('.announcement-carousel').on('mouseleave', function() {
        owlCarousel.trigger('play.owl.autoplay', [5000]);
      });
    } else {
      console.error('jQuery is not loaded');
    }
  });
  </script>
  
  <style scoped>
  .owl-carousel .item {
    display: flex;
    justify-content: center;
  }
  
  .owl-nav .owl-prev, .owl-nav .owl-next {
    background: white;
    color: black;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
  }
  
  .owl-nav .owl-prev {
    left: 10px;
  }
  
  .owl-nav .owl-next {
    right: 10px;
  }
  
  .owl-nav-wrapper {
    z-index: 10;
  }
  
  .card {
    position: relative;
  }
  
  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(128, 0, 128, 0.6); /* Purple with 60% opacity */
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  
  .image-wrapper:hover .overlay {
    opacity: 0.7; /* 70% visible on hover */
  }
  
  /* Optional: Ensure the items are centered on mobile */
  @media (max-width: 600px) {
    .owl-carousel .owl-item {
      display: flex;
      align-items: center;
      justify-content: center;
    }
  }
  </style>