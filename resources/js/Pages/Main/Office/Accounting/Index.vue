<template>
    <MainLayout>
      <Head title="Juris Doctor Curriculum" />
      <div class="flex flex-col min-h-screen">
        <div class="relative mb-4">
          <img src="/images/headerbg.jpg" alt="Background Image" class="w-full h-auto object-cover" />
          <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-white text-lg sm:text-xl md:text-2xl lg:text-4xl font-bold text-center">
              Accounting Department
            </h1>
          </div>
        </div>
        <main class="flex-grow">
          <div class="bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="flex flex-col md:flex-row w-full justify-center">
                <div class="w-full md:w-2/2 p-2">
                  <div class="flex border-b border-official-purple-800">
                    <button
                      class="w-1/2 py-4 text-center font-medium focus:outline-none"
                      :class="{ 'active': activeTab === 'tab1', 'bg-gray-100 text-gray-600': activeTab !== 'tab1' }"
                      @click="setActiveTab('tab1')"
                    >
                      <p class="text-lg font-bold">Latest Announcement(s)</p>
                    </button>
                    <button
                      class="w-1/2 py-4 text-center font-medium focus:outline-none"
                      :class="{ 'active': activeTab === 'tab2', 'bg-gray-100 text-gray-600': activeTab !== 'tab2' }"
                      @click="setActiveTab('tab2')"
                    >
                      <p class="text-lg font-bold">Archives</p>
                    </button>
                  </div>
                  
                  <div v-show="activeTab === 'tab1'" class="tabcontent">
                    <div class="grid grid-flow-col text-center rounded-lg mt-8 mb-8">
                      <div>
                        <div class="bg-white border-none rounded-lg mb-6 pl-2 relative">
                          <h2 class="text-xl sm:text-2xl text-left text-official-purple-900 font-bold mb-6 border-left">Notice Regarding Unpaid Enlishment</h2>
                          <div class="text-slate-600 leading-relaxed">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div v-show="activeTab === 'tab2'" class="tabcontent p-4">
                    <div class="bg-official-purple-200 px-6 py-4 mb-4 mx-2 mt-6 rounded-md text-lg flex items-center mx-auto border">
                      <span class="text-official-purple-800 text-sm">
                        Note: In accordance with Section 4 of LEB Memorandum Order No. 2. Series of 2013 and the existing academic policies of Arellano University School of Law, the following revised guidelines on pre-requisite subjects are hereby implemented.
                      </span>
                    </div>
                    <div v-for="semester in oldSubjects" :key="semester.name" class="grid grid-flow-col text-center rounded-lg mt-8 mb-8">
                      <table class="w-full text-sm text-left text-gray-500 border-Collapse border border-green-900">
                        <thead class="bg-official-purple-100">
                          <tr>
                            <th scope="col" class="px-4 py-2 text-lg font-medium text-gray-600 hover:text-slate-900 border border-gray-600">
                              Latest Announcement(s)
                            </th>
                            <th scope="col" class="px-4 py-2 text-lg font-medium text-gray-600 hover:text-slate-900 text-center border border-gray-600">
                              Archives
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(subject, index) in oldSubjects[0].subjects" class="border-b odd:bg-white even:bg-gray-50">
                            <th scope="row" class="px-4 py-2 text-lg font-normal text-gray-600 whitespace-wrap" title="Click for subject description">
                              <details class="group">
                                <summary
                                    class="flex cursor-pointer list-none items-center justify-between text-lg font-medium text-secondary-900 group-open:text-primary-500">
                                    {{subject.title}}
                                </summary>
                              </details>
                            </th>
                            <th scope="row" class="px-4 py-2 text-lg font-normal text-gray-600 whitespace-wrap border" title="Click for subject description">
                              <details class="group">
                                <summary
                                    class="flex cursor-pointer list-none items-center justify-between text-lg font-medium text-secondary-900 group-open:text-primary-500">
                                    {{ subject.preRequisite }}
                                </summary>
                              </details>
                            </th>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
                <aside class="w-full md:w-1/3 sticky top-0">
                  <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                    <div class="ml-4">
                      <h2 class="mb-4 text-lg leading-6 font-medium text-official-purple-900 capitalize">On this page</h2>
                      <hr class="mb-4 border-1 border-official-purple-800">
                      <h3 class="text-lg font-normal text-gray-800 mb-8">Accounting</h3>
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
          </div>
        </main>
      </div>
    </MainLayout>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { Head } from '@inertiajs/vue3';
  import MainLayout from '@/Layouts/MainLayout.vue';
  import RelatedLinks from '.././Components/RelatedLinks.vue';
  
  // Reactive state for the active tab
  const activeTab = ref('tab1');
  
  // Method to change the active tab
  function setActiveTab(tabName) {
    activeTab.value = tabName;
  }
  
  </script>
  
  <style scoped>
  @import url('https://db.onlinewebfonts.com/c/14ab77252fbc4bdca1dbdf8051cb7e96?family=BF+Invicta+W00+Bold');
  
  .text-invicta {
    font-family: 'BF Invicta W00 Bold', sans-serif;
  }
  
  .active {
    background-color: #004ea8; 
    color: #fff;
  }
  
  .tabcontent {
    transition: opacity 0.3s ease-in-out;
  }
  
  
  .active {
    background-color: #004ea8; /* official purple */
    color: #fff;
  }
  
  .text-gray-600 {
    color: #333;
  }
  </style>
  