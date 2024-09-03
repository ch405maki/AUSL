<template>
    <MainLayout>
        <Head title="Information Technology Center" />
          <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
              <div class="flex flex-col md:flex-row justify-between gap-8">
                <!-- Main content section -->
                <section class="w-full md:w-3/4 relative">
                  <div class="flex items-center ml-2">
                    <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                        {{offices.office_name}}
                    </h2>
                  </div>
                  <div class="ml-2 mb-8">
                    <p v-html="offices.office_function" class="text-gray-600 text-normal sm:text-lg"></p>
                  </div>
                  
                  <!-- Start Info -->
                  <v-carousel
                    height="auto"
                    show-arrows="hover"
                    cycle
                    hide-delimiter-background
                    :interval="6000"
                    :hide-delimiter-background="$vuetify.breakpoint.smAndDown"
                    >
                    <v-carousel-item
                        v-for="(item, i) in items"
                        :key="i"
                        cover
                        class="bg-gray-200"
                    >
                    <!-- <img 
                        :src="item.image" 
                        class="carousel-image w-[990px] sm:h-[320px] h-[210px]" 
                        alt="Carousel Image"
                    /> -->
  
                    <div class="flex justify-center items-center">
                        <video controls autoplay muted playsinline class="max-w-full h-auto">
                            <source src="/videos/itcdance.mp4" type="video/mp4">
                        </video>
                    </div>
                    
                    </v-carousel-item>
                    </v-carousel>
  
                    <div>
                        <div class="flex items-center ml-2">
                            <h2 class="text-gray-700 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                                Department Post
                            </h2>
                        </div>
                        <table class="w-full text-sm sm:text-lg text-left rtl:text-right text-gray-500 dark:text-gray-400 ml-2 mb-8">
                        <tbody>
                            <tr
                            v-for="(post, index) in posts"
                            :key="index"
                            class="border-b"
                            >
                            <td class="py-2 font-medium text-gray-600">
                                <a :href="post.url" class="font-normal text-gray-600 hover:text-slate-900 hover:underline">{{ post.text }}</a>
                            </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                  <!-- End Info -->
              </section>
    
                <aside class="w-full md:w-1/4 sticky top-0">
                <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12 text-sm sm:text-lg">
                  <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-xs px-8 pb-8 pt-28 h-[70%]  max-w-md mx-auto mb-8">
                      <img :src="offices.image" alt="Office Image" class="absolute inset-0 h-[100%] w-full object-cover">
                      <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                      <h3 class="z-10 mt-3 text-2xl font-bold text-white">Office Image</h3>
                  </article>
                    <div class="mb-8">
                        <h2 class="text-purple-900 font-medium mb-4">Location</h2>
                        <hr class="mb-4 border-1 border-purple-800">
                        <ul class="list-inside list-disc">
                        <li class="mb-2 font-normal text-gray-600 flex items-center ">
                            <span class="mdi mdi-map-marker text-purple-900 mr-2"></span>
                            {{offices.office_location}}
                        </li>
                        </ul>
                    </div>
                    <div class="mt-4 mb-8">
                    <h2 class="text-purple-900 font-medium mb-4">Contact Us</h2>
                    <hr class="mb-2 border-1 border-purple-800">
                    <div class="flex items-center">
                        <span class="mdi mdi-email text-purple-900 mr-2"></span>
                        <a :href="`mailto:${offices.office_email}`" class="text-mb font-normal text-gray-600 transition-colors hover:underline hover:text-purple-900">
                          {{ offices.office_email }}
                        </a>
                    </div>
                    <div class="flex items-center">
                      <span class="mdi mdi-phone text-purple-900 mr-2"></span>
                      <a class="text-mb font-normal text-gray-600 transition-colors hover:underline hover:text-purple-900">
                        {{ offices.office_contact }}
                      </a>
                    </div>
                    </div>
  
                    <div class="">
                        <h2 class="text-purple-900 font-medium mb-4">Other Offices</h2>
                        <hr class="mb-4 border-1 border-purple-800">
                        <ul class="list-inside list-disc">
                            <li v-for="(list, index) in officesList" :key="index" class="mb-2 font-semibold">
                            <a @click="navigateToDepartment(list.id)" class="font-normal text-gray-600 hover:text-slate-900 cursor-pointer">{{ list.office_name }}</a> 
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
    import { Inertia } from '@inertiajs/inertia';
    
    const props = defineProps({
      offices: { type: Array, required: true },
      officesList: { type: Array, required: true },
    });
  
    const posts = [
    { text: 'Sample Content', url: '#' },
    { text: 'Sample Content', url: '#' },
    { text: 'Sample Content', url: '#' },
    ];
  
    const items = [
    { image: 'https://via.placeholder.com/990x320.png?text=IT+Center+Image+1' },
    ];

    const navigateToDepartment = (id) => {
      Inertia.visit(route('administration.departments.show', { id }));
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