<template>
  <MainLayout>
    <Head title="Departments" />
    <main class="flex-grow">
      <Header>AUSL Departments and Facilities</Header>
      <div class="max-w-7xl mx-auto px-6">
        <section class="w-full text-gray-600">
              <div class="flex flex-wrap mt-4 mb-8">
                <h1 class="text-official-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty">Departments</h1>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                  <div v-for="(office, index) in offices" :key="office.id" class="grid gap-4 relative">
                  <div class="overflow-hidden rounded-lg relative group">
                    <img
                      class="w-full h-full object-cover transform transition duration-300 ease-in-out group-hover:scale-110 max-w-full rounded-lg cursor-pointer"
                      v-if="office.image.length" 
                      :src="office.image[0]"
                      @click="showLightbox(index)"
                      alt="Gallery Image"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent bg-opacity-50 text-white text-sm flex items-end p-4">
                      <h1
                        @click="showLightbox(index)"
                        class="w-full p-2 cursor-pointer hover:underline opacity-100 group-hover:opacity-100 transition-opacity duration-300"
                      >
                        {{ office.office_name }}
                        <br/>
                        <span v-html="office.office_location"></span>
                      </h1>
                    </div>
                  </div>
                </div>
                </div>
            <!-- Facilities List -->
              <h1 class="text-official-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty">Facilities</h1>
              <div class="flex flex-wrap mt-4 -m-4 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                  <div v-for="(facility, index) in facilities" :key="facility.id" class="grid gap-4 relative">
                    <div class="overflow-hidden rounded-lg relative group">
                      <img
                        class="w-full h-full object-cover transform transition duration-300 ease-in-out group-hover:scale-110 max-w-full rounded-lg cursor-pointer"
                        v-if="facility.image.length" 
                        :src="facility.image[0]"
                        @click="showLightboxFacility(index)"
                        alt="Gallery Image"
                      />
                      <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent bg-opacity-50 text-white text-sm flex items-end p-4">
                        <h1
                          @click="showLightboxFacility(index)"
                          class="w-full p-2 cursor-pointer hover:underline opacity-100 group-hover:opacity-100 transition-opacity duration-300"
                        >
                          {{ facility.office_name }}
                          <br/>
                          <span v-html="facility.office_location"></span>
                        </h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>

      <!-- Lightbox for Offices -->
      <vue-easy-lightbox
        :visible="visible"
        :imgs="offices[index].image || []"
        :index="0"
        @hide="handleHide"
      />

      <!-- Lightbox for Facilities -->
      <vue-easy-lightbox
        :visible="visibleFacility"
        :imgs="facilities[facilityIndex]?.image || []"  
        :index="0"
        @hide="handleHideFacility"
      />
    </main>
  </MainLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import VueEasyLightbox from 'vue-easy-lightbox';
import Header from '@/Pages/Main/Components/Header.vue'

// Props for departments and facilities
const props = defineProps({
  offices: { type: Array, required: true },
  facilities: { type: Array, required: true },
});

// State for offices lightbox
const visible = ref(false);
const index = ref(0);

// State for facilities lightbox
const visibleFacility = ref(false);
const facilityIndex = ref(0);

// Show lightbox for offices
const showLightbox = (officeIndex) => {
  index.value = officeIndex; 
  visible.value = true; 
};

const handleHide = () => {
  visible.value = false;
};

// Show lightbox for facilities
const showLightboxFacility = (index) => {
  facilityIndex.value = index; // Set the facility index
  console.log('Selected Facility Index:', facilityIndex.value); // Debugging line
  visibleFacility.value = true; // Show the lightbox
};

// Hide lightbox for facilities
const handleHideFacility = () => {
  visibleFacility.value = false;
};
</script>

<style scoped>
.container {
  max-width: 1200px;
}

.overflow-y-auto {
  overflow-y: auto;
}

.flex {
  display: flex;
}
</style>
