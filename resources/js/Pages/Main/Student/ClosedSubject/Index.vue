<template>
  <MainLayout>
    <Head title="Closed Subjects" />
    <div class="relative mb-4">
      <img src="/images/headerbg.jpg" alt="Background Image" class="w-full h-auto object-cover" />
      <div class="absolute inset-0 flex items-center justify-center">
        <h1 class="text-white text-sm sm:text-lg md:text-2xl lg:text-3xl xl:text-4xl font-bold text-center">
          ARELLANO UNIVERSITY SCHOOL OF LAW
          <br />
          Subjects Offered Status as of {{ latestSubjectDate }}
        </h1>
      </div>
    </div>

    <main class="flex-grow">
      <div class="max-w-7xl mx-auto px-8 py-4 lg:py-8">
        <div class="flex flex-col lg:flex-row justify-between gap-8">
          <!-- Main content section -->
          <section class="w-full lg:w-3/4">
            <div class="relative overflow-x-auto mb-6">
              <div class="content" align="center" style="max-height: 100%">
                <iframe
                  src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQ47NVN7URV9-0nSYIYB7IECmT1__c0-YatkygbYo7CdChd3clxR8YgAuI-o8jgJW9TpbBPDAB-RHQc/pubhtml?gid=952579375&amp;single=true&amp;widget=true&amp;headers=false"
                  width="700"
                  height="400"
                ></iframe>
              </div>
            </div>
          </section>

          <!-- Sidebar -->
          <aside class="w-full lg:w-1/4">
            <div class="mb-8 sm:mt-4 lg:mt-8">
              <div class="ml-2 lg:ml-4">
                <h2 class="mb-4 text-base lg:text-lg leading-6 font-medium text-official-purple-900 capitalize">
                  On this page
                </h2>
                <hr class="mb-4 border-1 border-official-purple-800" />
                <h3 class="text-sm lg:text-lg font-normal text-gray-800 mb-8">
                  Subjects Offered Status
                </h3>
              </div>
              <div class="ml-2 lg:ml-4">
                <h2 class="text-official-purple-900 text-base lg:text-lg font-medium mb-4">
                  Related Links
                </h2>
                <hr class="mb-4 border-1 border-official-purple-800" />
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
import { computed } from 'vue'
import { Head, usePage } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import RelatedLinks from '../Components/RelatedLinks.vue'

const { subjects = [] } = usePage().props

const latestSubjectDate = computed(() => {
  if (subjects.length === 0) return 'Status Unavailable'
  return subjects[0].description 
})
</script>

<style scoped>
@media (max-width: 768px) {
  table th,
  table td {
    padding: 0.5rem;
    font-size: 0.875rem;
  }

  table {
    display: block;
    overflow-x: auto;
  }

  .whitespace-nowrap {
    white-space: nowrap;
  }

  .flex-col > section {
    margin-bottom: 2rem;
  }
}
</style>
