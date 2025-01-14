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
                                    class="flex cursor-pointer text-sm lg:text-lg font-normal list-none items-center justify-between text-lg font-medium text-secondary-900 group-open:text-primary-500">
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
                              Subject
                            </th>
                            <th scope="col" class="px-4 py-2 text-lg font-medium text-gray-600 hover:text-slate-900 text-center border border-gray-600">
                              Pre-Requisite Subject(s)
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
                      <h3 class="text-lg font-normal text-gray-800 mb-8">Sequence of Subjects</h3>
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
  
  const oldSubjects = ref([
  {
    subjects: [
      { title: 'Administrative Law, Law on Public Officers and Election Law', preRequisite: 'Constitutional Law I' },
      { title: 'Agency, Trust and Partnership', preRequisite: 'Obligations and Contracts' },
      { title: 'Civil Law Review I', preRequisite: 'Persons and Family Relations, Property, Succession, Obligations and Contracts, Agency Trust and Partnership, Sales, Land Title and Deeds, Credit Transactions, Conflicts of Law, Torts and Damages'},
      { title: 'Civil Law Review II', preRequisite: 'Civil Law Review I' },
      { title: 'Civil Procedure', preRequisite: 'Obligations and Contracts, Persons and Family Relations' },
      { title: 'Commercial Law Review', preRequisite: '	Agency, Trust and Partnership, Transportation, Credit Transaction, Corporation Law, Negotiable Instrument, Insurance, Intellectual Property'},
      { title: 'Constitutional Law Review', preRequisite: 'Constitutional Law I, Constitutional Law II, Public International Law, Administration Public Officers / Election Law, Public Corporations, Natural Resources & Environmental Law, Human Rights'},
      { title: 'Criminal Law Review', preRequisite: 'Criminal Law I, Criminal Law II'},
      { title: 'Credit Transaction', preRequisite: 'Obligations and Contracts'},
      { title: 'Criminal Law II', preRequisite: 'Criminal Law I'},
      { title: 'Criminal Procedure', preRequisite: 'Criminal Law I,Criminal Law II'},
      { title: 'Evidence', preRequisite: 'Criminal Procedure, Civil Procedure'},
      { title: 'Human Rights Law', preRequisite: 'Constitutional Law II'},
      { title: 'Insurance', preRequisite: 'Obligations and Contracts'},
      { title: 'Labor Law II', preRequisite: 'Labor Law I'},
      { title: 'Labor Law Review', preRequisite: 'Agrarian Law, Labor Law I, Labor Law II'},
      { title: 'Legal Forms', preRequisite: 'Obligations and Contracts, Property, Sales, Credit Transactions, Negotiable Instruments Law, Agency, Trust, and Partnership, Land, Titles, and Deeds, Criminal Procedure, Civil Procedure'},
      { title: 'Legal Counseling and Social Responsibility', preRequisite: '	Basic Legal Ethics, Problem Areas in Legal Ethics, Criminal Procedure, Civil Procedure, Evidence'},
      { title: 'Legal Medicine', preRequisite: 'Criminal Law II'},
      { title: 'Obligations and Contracts', preRequisite: 'Persons and Family Relations'},
      { title: 'Practice Court I', preRequisite: 'Criminal Procedure, Civil Procedure, Evidence, Special Proceedings, Legal Forms'},
      { title: 'Practice Court II', preRequisite: 'Practice Court I'},
      { title: 'Problem Areas in Legal Ethics', preRequisite: '	Basic Legal Ethics'},
      { title: 'Property', preRequisite: 'Obligations and Contracts'},
      { title: 'Remedial Law Review I', preRequisite: 'Criminal Procedure, Civil Procedure, Evidence, Special Proceedings'},
      { title: 'Remedial Law Review II', preRequisite: 'Remedial Law Review I'},
      { title: 'Sales', preRequisite: 'Obligations and Contracts'},
      { title: 'Special Proceedings', preRequisite: 'Succession'},
      { title: 'Taxation I', preRequisite: 'Constitutional Law I'},
      { title: 'Taxation II', preRequisite: 'Persons and Family Relations, Taxation I, Succession'},
      { title: 'Taxation Law Review', preRequisite: 'Taxation I, Taxation II'},
      { title: 'Torts and Damages', preRequisite: 'Obligations and Contracts'},
      { title: 'Transportation Law', preRequisite: 'Obligations and Contracts'},
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
  