<template>
    <MainLayout>
      <Head title="Juris Doctor Curiculum" />
      <div class="flex flex-col min-h-screen">
        <div class="relative mb-4">
          <img src="/images/headerbg.jpg" alt="Background Image" class="w-full h-auto object-cover" />
          <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-white text-sm sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold text-center">
                ARELLANO UNIVERSITY SCHOOL OF LAW
              <p class="text-sm sm:text-xl md:text-2xl lg:text-4xl mt-4">ONE YEAR PROGRAM</p>
              <p class="text-sm sm:text-xl md:text-2xl lg:text-4xl">BACHELOR OF LAWS (REFRESHER COURSE) ( LLB_REFRESHER )</p>
              <p class="text-sm sm:text-xl md:text-2xl lg:text-4xl">S.Y. 2013-2014**</p>
            </h1>
          </div>
        </div>
        <main class="flex-grow">
          <div class="bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="flex flex-col md:flex-row w-full justify-center">
                <div class="w-full md:w-2/2 p-2">
                  <h1 class="text-official-purple-800 font-bold text-xl sm:text-2xl text-pretty p-2">
                    Refresher Curriculum
                  </h1>
                  <div v-for="semester in subjects" :key="semester.name" class="grid grid-flow-col text-center rounded-lg mt-8 mb-8">
                    <table class="w-full text-sm text-left text-gray-500 border-Collapse border border-green-900">
                      <thead class="bg-official-purple-100">
                        <tr>
                          <th colspan="2" class="px-4 py-3 text-left text-lg font-medium text-gray-800">
                            {{ semester.name }}
                          </th>
                        </tr>
                        <tr>
                          <th scope="col" class="px-4 py-2 text-lg font-medium text-gray-600 hover:text-slate-900 border border-gray-600">
                            Subject
                          </th>
                          <th scope="col" class="px-4 py-2 text-lg font-medium text-gray-600 hover:text-slate-900 text-center border border-gray-600 w-24 ">
                            Units
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(subject, index) in semester.subjects" :key="index" class="border-b odd:bg-white even:bg-gray-50">
                          <th scope="row" class="px-4 py-2 text-lg font-normal text-gray-600 whitespace-wrap">
                            <details class="group">
                              <summary
                                  class="flex cursor-pointer list-none items-center justify-between text-lg font-medium text-secondary-900 group-open:text-primary-500">
                                  {{subject.name}}
                                  <div>
                                  </div>
                              </summary>
                              <div class="pb-4 mt-2 text-secondary-500"><p v-html="subject.description"></p></div>
                          </details>
                          </th>
                          <td class="px-4 text-lg font-normal text-gray-600 whitespace-nowrap text-center border border-gray-600">
                            {{ subject.units }}
                          </td>
                        </tr>
                        <tr>
                          <td class="px-6 py-2 text-lg font-normal text-gray-600 whitespace-nowrap"></td>
                          <td class="px-6 py-2 text-lg font-normal text-gray-600 whitespace-nowrap text-center border-1 border-slate-700">
                            <b>{{ semester.totalUnits }}</b>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <aside class="w-full md:w-1/3 sticky top-0">
                  <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                      <div class="ml-4">
                      <h2 class="mb-4 text-lg leading-6 font-medium text-official-purple-900 capitalize">On this page</h2>
                      <hr class="mb-4 border-1 border-official-purple-800">
                          <h3 class="text-lg font-normal text-gray-800 mb-8">Juris Doctor Curiculum</h3>
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
  import RelatedLinks from '../Components/RelatedLinks.vue';
  
  const subjects = ref([
  {
    name: 'First Semester',
    subjects: [
      { 
        name: 'Civil Law Review I (Refresher)',
        units: 4,
      },
      { 
        name: 'Criminal Law Review (Refresher)',
        units: 4,
      },
      { 
        name: 'Labor Law Review (Refresher)',
        units: 3,
      },
      { 
        name: 'Political Law Review (Refresher)',
        units: 4,
      },
      { 
        name: 'Remedial Law Review 1 (Refresher)',
        units: 4,
      },
    ],
    totalUnits: 19,
  },


  {
    name: 'Second Semester',
    subjects: [
      { 
        name: 'Civil Law Review II (Refresher)',
        units: 4,
      },
      { 
        name: 'Commercial Law Review (Refresher)',
        units: 4,
      },
      { 
        name: 'Remedial Law Review II (Refresher)',
        units: 4,
      },
      { 
        name: 'Taxation Law Review (Refresher)',
        units: 3,
      },
    ],
    totalUnits: 15,
  },
  ]);
  </script>
  
  <style scoped>
  @import url('https://db.onlinewebfonts.com/c/14ab77252fbc4bdca1dbdf8051cb7e96?family=BF+Invicta+W00+Bold');
  
  .text-invicta {
  font-family: 'BF Invicta W00 Bold', sans-serif;
  }
  </style>
  