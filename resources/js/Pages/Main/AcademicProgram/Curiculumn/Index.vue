<template>
    <MainLayout>
      <Head title="Show Post" />
      <div class="flex flex-col min-h-screen bg-green-100">
        <main class="flex-grow">
          <div class="bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="flex flex-col md:flex-row w-full justify-center">
                <div class="w-full md:w-2/2 p-2">
                  <h1 class="text-purple-900 font-bold mb-4 mt-8 text-xl sm:text-3xl text-pretty text-start p-2 border-l-4 border-purple-900">
                    Curriculum
                  </h1>
                  <div class="p-5 mb-8 text-center bg-white">
                    <h1 class="mt-1 text-xl sm:text-2xl lg:text-3xl font-bold text-purple-900">ARELLANO UNIVERSITY SCHOOL OF LAW</h1>
                    <p class="mt-1 text-lg sm:text-xl lg:text-2xl font-semibold text-purple-900">Juris Doctor (143 Units)</p>
                    <p class="text-lg sm:text-xl lg:text-2xl font-semibold text-purple-900">(School Year 2022-2023)</p>
                  </div>
                  <div v-for="semester in semesters" :key="semester.name" class="relative overflow-x-auto shadow-md rounded-lg mt-8 mb-8">
                    <table class="w-full text-sm text-left text-gray-500">
                      <thead class="bg-purple-100">
                        <tr>
                          <th colspan="2" class="px-4 py-3 text-left text-lg font-medium text-gray-800">
                            {{ semester.name }}
                          </th>
                        </tr>
                        <tr>
                          <th scope="col" class="px-4 py-3 text-lg font-medium text-gray-600 hover:text-slate-900">
                            Subject
                          </th>
                          <th scope="col" class="px-4 py-3 text-lg font-medium text-gray-600 hover:text-slate-900 text-center">
                            Units
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(subject, index) in semester.subjects" :key="index" class="border-b odd:bg-white even:bg-gray-50">
                          <th scope="row" class="px-4 py-4 text-lg font-normal text-gray-600 whitespace-nowrap">
                            {{ subject.name }}
                          </th>
                          <td class="px-4 py-4 text-lg font-normal text-gray-600 whitespace-nowrap text-center">
                            {{ subject.units }}
                          </td>
                        </tr>
                        <tr>
                          <td class="px-6 py-4 text-lg font-normal text-gray-600 whitespace-nowrap"></td>
                          <td class="px-6 py-4 text-lg font-normal text-gray-600 whitespace-nowrap text-center">
                            <b>{{ semester.totalUnits }}</b>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="w-full md:w-1/3 p-2 flex justify-start">
                  <div class="text-left">
                    <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                      <h1 class="text-purple-900 text-lg font-medium mb-4">See Also</h1>
                      <hr class="mb-4 border-1 border-purple-900">
                      <ul class="list-inside list-disc">
                        <li v-for="(item, index) in links" :key="index" class="mb-2">
                          <a :href="item.url" class="text-gray-700 text-lg font-normal hover:text-slate-900">{{ item.text }}</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
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

const links = ref([
  { text: 'Latest Announcement', url: 'https://aims.arellanolaw.edu/aims/students/' },
  { text: 'Upcoming Events', url: '#event2' },
  { text: 'Related Article', url: '#event3' },
  { text: 'Related Article', url: '#event4' },
  { text: 'Related Article', url: '#event5' }
]);

const semesters = ref([
  {
    name: 'First Year - First Semester',
    subjects: [
      { name: 'Philosophy of Law', units: 2 },
      { name: 'Statutory Construction', units: 2 },
      { name: 'Basic Legal and Judicial Ethics', units: 3 },
      { name: 'Constitutional Law I', units: 4 },
      { name: 'Criminal Law I', units: 4 },
      { name: 'Criminal Procedure', units: 3 }
    ],
    totalUnits: 18
  },
  {
    name: 'First Year - Second Semester',
    subjects: [
      { name: 'Legal Research and Writing', units: 2 },
      { name: 'Constitutional Law II', units: 3 },
      { name: 'Criminal Law II', units: 4 },
      { name: 'Obligations and Contracts', units: 5 },
      { name: 'Civil Procedure I', units: 3 }
    ],
    totalUnits: 17
  }
]);
</script>

<style scoped>
@import url('https://db.onlinewebfonts.com/c/14ab77252fbc4bdca1dbdf8051cb7e96?family=BF+Invicta+W00+Bold');

.text-invicta {
  font-family: 'BF Invicta W00 Bold', sans-serif;
}
</style>
