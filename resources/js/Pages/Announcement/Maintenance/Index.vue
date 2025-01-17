<template>
    <Head title="Settings" />
  
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Maintenance</h2>
      </template>
      <div class="flex flex-col min-h-screen">
        <main class="flex-grow">
          <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row w-full justify-center">
              <!-- Main content section -->
                <div class="w-full md:w-2/3 p-1 relative">
                  <div id="image-section" class="relative max-w-full mx-auto">
                    <div class="relative">
                      <img src="/images/announcement/maintenance.jpg" alt="Maintenance" class="w-full" />
                      <!-- Text overlay box -->
                      <div
                        class="absolute top-20 left-10 text-gray-700 font-bold text-2xl p-4"
                        style="max-width: 600px; word-wrap: break-word;"
                      >
                        <div v-html="form.content"></div>
                      </div>
                    </div>
                  </div>
              </div>
  
              <!-- User Creation Form -->
              <div class="w-full md:w-1/3 p-3 flex justify-start bg-white rounded-lg mt-1">
                <form @submit.prevent="createBanner" class="w-full">
                  <div class="text-left mb-4">
                    <h2 class="text-xl font-bold">Maintenance</h2>
                  </div>

                  <div class="col-span-12 mt-4">
                      <InputLabel for="content" value="Content" />
                      <ckeditor :editor="editor" v-model="form.content" :config="editorConfig"></ckeditor>
                  </div>

                  <div class="flex justify-center">
                    <button 
                      @click="exportImage"
                      class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 mt-8"
                      aria-label="Create a new banner" 
                    >
                      Post
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </main>
      </div>
    </AuthenticatedLayout>
  </template>
  
  
  <script setup>
    import { ref } from 'vue';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import html2canvas from 'html2canvas';

    // Reactive form data
    const form = ref({
    content: '', // Bind this to the CKEditor
    });

    const exportImage = () => {
    const targetElement = document.querySelector('#image-section'); // The part you want to export

    html2canvas(targetElement, {
      scale: 2, // Higher scale for better resolution
      useCORS: true, // Enable cross-origin handling for images
    })
      .then((canvas) => {
        const imgURL = canvas.toDataURL('image/png'); // Convert to image format

        // Trigger download
        const link = document.createElement('a');
        link.href = imgURL;
        link.download = 'exported-image.png';
        link.click();
      })
      .catch((error) => {
        console.error('Error generating image:', error);
      });
  };

    const editor = ClassicEditor;
    const editorConfig = {
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote','insertTable', 'mediaEmbed', ],
    };
  </script>

  <style scoped>
  </style>