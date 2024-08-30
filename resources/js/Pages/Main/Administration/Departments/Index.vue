<template>
  <MainLayout>
    <Head title="Departments" />
    <main class="flex-grow">
      <div class="max-w-7xl mx-auto px-4 ">
        <section class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto">
          <div class="flex flex-col  w-full mb-20 sm:text-center">
            <h1 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty">Welcome to AUSL Departments Page</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base sm:text-xl">Discover various aspects of AUSL Departments and stay up-to-date with our latest announcements.</p>
          </div>

          <div class="flex flex-wrap -m-4 mb-8">
            <div class="lg:w-1/3 sm:w-1/2 p-4" v-for="(office, index) in offices" :key="office.id">
            <v-card class="mx-auto pb-4" min-width="344">
              <!-- <v-img height="200px" :src="card.image" cover></v-img> -->
              <v-img height="200px" :src="office.image" cover></v-img>
              <v-card-title>
                  {{ office.office_name}}
              </v-card-title>
              <v-card-subtitle>{{ office.office_location}}</v-card-subtitle>
            </v-card>
          </div>
          </div>
        </div>
      </section>
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
});


const navigateToDepartment = (id) => {
  Inertia.visit(route('administration.departments.show', { id }));
};
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