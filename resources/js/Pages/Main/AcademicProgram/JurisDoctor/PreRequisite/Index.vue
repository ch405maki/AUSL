<template>
    <MainLayout>
      <Head title="Juris Doctor Curriculum" />
      <div class="flex flex-col min-h-screen">
        <div class="relative mb-4">
          <img src="/images/headerbg.jpg" alt="Background Image" class="w-full h-auto object-cover" />
          <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-white text-lg sm:text-xl md:text-2xl lg:text-4xl font-bold text-center text-invicta">
              ARELLANO UNIVERSITY SCHOOL OF LAW
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
                      <p class="text-lg font-bold">New Curriculum</p>
                    </button>
                    <button
                      class="w-1/2 py-4 text-center font-medium focus:outline-none"
                      :class="{ 'active': activeTab === 'tab2', 'bg-gray-100 text-gray-600': activeTab !== 'tab2' }"
                      @click="setActiveTab('tab2')"
                    >
                      <p class="text-lg font-bold">Old Curriculum</p>
                    </button>
                  </div>
                  
                  <div v-show="activeTab === 'tab1'" class="tabcontent p-4">
                    <div v-for="semester in subjects" :key="semester.name" class="grid grid-flow-col text-center rounded-lg mt-8 mb-8">
                      <table class="w-full text-sm text-left text-gray-500 border-Collapse border border-green-900">
                        <thead class="bg-official-purple-100">
                          <tr>
                            <th scope="col" class="px-4 py-2 text-lg font-medium text-gray-600 hover:text-slate-900 border border-gray-600">
                              Subject
                            </th>
                            <th scope="col" class="px-4 py-2 text-lg font-medium text-gray-600 hover:text-slate-900 text-center border border-gray-600">
                              Pre-Requisite Subject(s)
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(subject, index) in subjects[0].subjects" class="border-b odd:bg-white even:bg-gray-50">
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
                  
                  <div v-show="activeTab === 'tab2'" class="tabcontent p-4">
                    <div v-for="semester in subjects_old" :key="semester.name" class="grid grid-flow-col text-center rounded-lg mt-8 mb-8">
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
                            <th scope="row" class="px-4 py-2 text-lg font-normal text-gray-600 whitespace-wrap" title="Click for subject description">
                              <details class="group">
                                <summary
                                    class="flex cursor-pointer list-none items-center justify-between text-lg font-medium text-secondary-900 group-open:text-primary-500">
                                    {{subject.name}}
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
                </div>
                
                <aside class="w-full md:w-1/3 sticky top-0">
                  <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                    <div class="ml-4">
                      <h2 class="mb-4 text-lg leading-6 font-medium text-official-purple-900 capitalize">On this page</h2>
                      <hr class="mb-4 border-1 border-official-purple-800">
                      <h3 class="text-lg font-normal text-gray-800 mb-8">Juris Doctor Curriculum</h3>
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
  import RelatedLinks from '../../Components/RelatedLinks.vue';
  
  // Reactive state for the active tab
  const activeTab = ref('tab1');
  
  // Method to change the active tab
  function setActiveTab(tabName) {
    activeTab.value = tabName;
  }

  const subjects = ref([
  {
    subjects: [
      { title: 'Administrative Law and Law on Public Officers', preRequisite: 'Constitutional Law I' },
      { title: 'Advance Taxation', preRequisite: 'Basic Taxation Law' },
      { title: 'Agency, Trust and Partnership Law', preRequisite: 'Obligations and Contracts' },
      { title: 'Basic Succession Law', preRequisite: 'Persons and Family Law' },
      { title: 'Basic Taxation Law', preRequisite: 'Constitutional Law I' },
      { title: 'Civil Law Review and Integration', preRequisite: 'Obligations and Contracts, Persons and Family Law, Basic Succession Law, Property and Land Law, Torts and Damages, and Private International Law' },
      { title: 'Civil Procedure II', preRequisite: 'Civil Procedure I' },
      { title: 'Commercial Law Review and Integration', preRequisite: 'Commercial Laws I, and II, Agency, Trust and Partnership, and Corporation and Basic Securities Law' },
      { title: 'Commercial Laws I', preRequisite: 'Obligations and Contracts, Corporation and Basic Securities Law' },
      { title: 'Commercial Laws II', preRequisite: 'Obligations and Contracts, Corporation and Basic Securities Law' },
      { title: 'Corporation and Basic Securities Law', preRequisite: 'Obligations and Contracts' },
      { title: 'Criminal Law II', preRequisite: 'Criminal Law I' },
      { title: 'Criminal Law Review and Integration', preRequisite: 'Criminal Law I, Criminal Law II' },
      { title: 'Election Laws', preRequisite: 'Constitutional Law I' },
      { title: 'Evidence', preRequisite: 'Criminal Procedure, Civil Procedure I and II' },
      { title: 'Labor Law and Social Legislation', preRequisite: 'Constitutional Law II' },
      { title: 'Labor Law Review and Integration', preRequisite: 'Labor Law and Social Legislation' },
      { title: 'Laws on Local Government', preRequisite: 'Constitutional Law II' },
      { title: 'Legal and Judicial Ethics and Practical Exercises Review and Integration', preRequisite: 'Basic Legal and Judicial Ethics, Legal Forms' },
      { title: 'Medical Jurisprudence', preRequisite: 'Evidence' },
      { title: 'Political and International Law Review and Integration', preRequisite: 'Constitutional Law I and II, Administrative Law and Law on Public Officers, Election Laws, Laws on Local Government, and Public International Law' },
      { title: 'Private International Law', preRequisite: 'Persons and Family Law, Obligations and Contracts, Property and Land Law, Basic Succession Law, Agency, Trust and Partnership Law, Corporation and Basic Securities Law, Commercial Laws I, Labor Law and Social Legislation, and Basic Taxation Law' },
      { title: 'Public International Law', preRequisite: 'Constitutional Law I' },
      { title: 'Remedial Law Review and Integration', preRequisite: 'Criminal Procedure, Civil Procedure I and II, Evidence, and Special Rules and Proceedings' },
      { title: 'Special Commercial Laws', preRequisite: 'Obligations and Contracts, Corporation and Basic Securities Law' },
      { title: 'Special Labor Laws (Jurisdiction and Jurisprudence)', preRequisite: 'Labor Law and Social Legislation' },
      { title: 'Special Penal Laws', preRequisite: 'Criminal Law I and II' },
      { title: 'Special Rules and Proceedings', preRequisite: 'Basic Succession Law' },
      { title: 'Taxation Law Review and Integration', preRequisite: 'Basic Taxation Law' },
      { title: 'Torts and Damages', preRequisite: 'Obligations and Contracts' },
    ],
  },
]);
  
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
  