<template>
  <MainLayout>
    <Head title="Show Post" />
    <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
      <main class="flex-grow">
        <div class="bg-white">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row w-full justify-center">
              <!-- Main content section -->
              <div class="w-full md:w-2/2 p-2">
                <h1 class="text-purple-900 font-bold mb-6 mt-8 text-xl sm:text-3xl text-pretty text-start">
                  {{ post.title }}
                </h1>
                <!-- Breadcrumb -->
                <nav class="bg-grey-light w-full rounded-md mb-6" aria-label="breadcrumb">
                  <ol class="list-reset flex">
                    <li><a href="#" class="text-neutral-500 hover:text-neutral-600 dark:text-neutral-200">Date Posted:</a></li>
                    <li><span class="mx-2 text-neutral-500 dark:text-neutral-200">{{ new Date(post.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}</span></li>
                  </ol>
                </nav>
                <div class="text-lg font-normal text-gray-600 mb-4 font-normal text-slate-700 mb-8">
                  <p v-html="post.content"></p>
                </div>
                <div v-if="post.link" class="relative mb-8 flex justify-center items-center bg-slate-100">
                  <div class="container">
                    <iframe frameborder="0" height="800" scrolling="no" :src="post.link + 'preview'" width="100%"></iframe>
                  </div>
                </div>

                <div v-if="post.image" class="relative mb-8 flex justify-center items-center bg-slate-100">
                  <img :src="post.image" alt="Image" class="object-center">
                </div>
                <!-- Breadcrumb -->
                <nav class="bg-grey-light w-full rounded-md mb-4" aria-label="breadcrumb" width="100%">
                  <ol class="list-reset flex">
                    <li><a href="#" class="text-neutral-500 hover:text-neutral-600 dark:text-neutral-200">Home</a></li>
                    <li><span class="mx-2 text-neutral-500 dark:text-neutral-200">/ {{post.title}}</span></li>
                  </ol>
                </nav>
                <!-- News and Announcement Section -->
                <div class="w-full">
                <h1 class="text-purple-900 font-bold mb-4 mt-8 text-md sm:text-xl text-pretty text-start">
                  Latest Announcement
                </h1>
                <hr class="mb-4 border-1 border-purple-800">
                <div v-for="post in allPost" :key="post.id" id="announcement">
                  <div class="text-left flex items-justify mb-4">
                    <div class="text-justify ml-2">
                      <h3 class="text-purple-800 font-semibold text-md tracking-wide leading-6">
                        <a :href="`/show/${post.id}`" class="text-lg font-medium text-purple-900 hover:underline">{{ post.title }}</a>
                      </h3>
                      <p class="text-slate-600 ">{{ formattedDate(post.created_at) }}</p>
                      <p >
                        <div class="text-slate-700 text-lg font-normal text-gray-600"></div>
                        <a :href="`/announcement/show/${post.id}`" class="text-lg font-normal text-gray-700 mb-4 hover:text-official-purple-600 hover:underline">Read more</a>
                      </p>
                    </div>
                  </div>
                  <hr class="mb-4 border-1 border-purple-200">
                </div>
                <!-- End Breadcrumb -->
              </div>
              <!-- End News and Announcement Section -->  
              </div>
              <!-- End main content section -->
              <!-- Links, Events & Seminars --> 
              <div class="w-full md:w-1/3 p-2 flex justify-start">
                <div class="text-left">
                  <div class="mb-2 mt-10">
                    <button @click="shareToFacebook" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded flex items-center mb-4">
                      <svg width="800px" height="800px" viewBox="0 0 16 16" class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"><path fill="#1877F2" d="M15 8a7 7 0 00-7-7 7 7 0 00-1.094 13.915v-4.892H5.13V8h1.777V6.458c0-1.754 1.045-2.724 2.644-2.724.766 0 1.567.137 1.567.137v1.723h-.883c-.87 0-1.14.54-1.14 1.093V8h1.941l-.31 2.023H9.094v4.892A7.001 7.001 0 0015 8z"/><path fill="#ffffff" d="M10.725 10.023L11.035 8H9.094V6.687c0-.553.27-1.093 1.14-1.093h.883V3.87s-.801-.137-1.567-.137c-1.6 0-2.644.97-2.644 2.724V8H5.13v2.023h1.777v4.892a7.037 7.037 0 002.188 0v-4.892h1.63z"/></svg>
                      Share on Facebook
                    </button>
                    <h1 class="text-purple-900 text-lg font-medium mb-4">See Also</h1>
                    <hr class="mb-4 border-1 border-purple-900">
                    <ul class="list-inside list-disc">
                      <li v-for="(item, index) in links" :key="index" class="mb-2">
                        <a :href="item.url" class="text-slate-700 text-lg font-normal text-gray-600 hover:text-slate-900">{{ item.text }}</a>   
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- End Links, Events & Seminars -->
            </div>
          </div>
        </div>
      </main>
    </div>
  </MainLayout>
</template>

<script setup>
  import { Link, Head } from '@inertiajs/vue3';
  import { defineProps } from 'vue';
  import { ref } from 'vue';
  import MainLayout from '@/Layouts/MainLayout.vue';

  const { post, allPost } = defineProps(['post', 'allPost']);

  const links = ref([
    { text: 'Latest Announcement', url: '#' },
    { text: 'Upcoming Events', url: '#event2' },
    { text: 'Related Article', url: '#event3' },
    { text: 'Related Article', url: '#event4' },
    { text: 'Related Article', url: '#event5' }
  ]);

  const formattedDate = (date) => {
  return new Date(date).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
};

  const shareToFacebook = () => {
    const url = encodeURIComponent(window.location.href);
    const fbShareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
    window.open(fbShareUrl, '_blank', 'width=600,height=400');
  };
</script>

<style scoped>
.container {
  width: 100%;
  height: 100vh;
  overflow: hidden;
}
</style>
