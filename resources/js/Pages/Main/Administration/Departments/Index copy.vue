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
            <div class="lg:w-1/3 sm:w-1/2 p-4" v-for="(card, index) in cards" :key="index">
            <v-card class="mx-auto" min-width="344">
              <!-- <v-img height="200px" :src="card.image" cover></v-img> -->
              <v-img height="200px" src="/images/administration/departments/test.jpg" cover></v-img>

              <v-card-title>{{ card.title }}</v-card-title>
              <v-card-subtitle>{{ card.subtitle }}</v-card-subtitle>

              <v-card-actions>
                <v-btn color="purple-lighten-2" text>Function</v-btn>
                <v-spacer></v-spacer>
                <v-btn :icon="show[index] ? 'mdi-chevron-up' : 'mdi-chevron-down'" @click="show[index] = !show[index]"></v-btn>
              </v-card-actions>

              <v-expand-transition>
                <div v-show="show[index]">
                  <v-divider></v-divider>
                  <v-card-text>{{ card.text }}</v-card-text>
                </div>
              </v-expand-transition>
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

// Function to set the current step
const setStep = (newStep) => {
step.value = newStep;
console.log(`Current step set to: ${newStep}`); // Debugging log
};

const links = ref([
{ text: 'Arellano Law Foundation', url: '#' },
{ text: 'Board of Trustees', url: '#' },
{ text: 'Administration and Staff', url: '#' },
]);

const isMobile = reactive({ value: window.innerWidth <= 768 });

const checkIfMobile = () => {
isMobile.value = window.innerWidth <= 768;
};

const departments = [
  {
    title: "Accounting Department",
    subtitle: "Managing Finances",
    text: "The Accounting department is responsible for managing the financial records of the institution, ensuring transparency and accuracy.",
    image: "/images/administration/departments/test.jpg"
  },
  {
    title: "Registrar's Office",
    subtitle: "Handling Academic Records",
    text: "The Registrar's Office manages student records, enrollment, and transcripts. It is the central hub for academic information.",
    image: "https://cdn.vuetifyjs.com/images/cards/road.jpg"
  },
  {
    title: "Records Department",
    subtitle: "Keeping Important Data",
    text: "The Records department ensures the safekeeping and organization of all important institutional documents.",
    image: "https://cdn.vuetifyjs.com/images/cards/docks.jpg"
  },
  {
    title: "Bursar's Office",
    subtitle: "Handling Payments",
    text: "The Bursar's Office is responsible for student billing, payment processing, and financial aid disbursement.",
    image: "https://cdn.vuetifyjs.com/images/cards/desert.jpg"
  },
  {
    title: "ITC Department",
    subtitle: "Supporting Technology",
    text: "The ITC (Information Technology and Communication) department handles all tech-related infrastructure, ensuring smooth operations.",
    image: "https://cdn.vuetifyjs.com/images/cards/plane.jpg"
  },
  {
    title: "Admissions Office",
    subtitle: "Welcoming New Students",
    text: "The Admissions Office manages the process of accepting new students, from applications to enrollment.",
    image: "https://cdn.vuetifyjs.com/images/cards/house.jpg"
  }
];

const show = ref(Array(departments.length).fill(false));
const cards = ref(departments);

onMounted(() => {
window.addEventListener('resize', checkIfMobile);
});

onBeforeUnmount(() => {
window.removeEventListener('resize', checkIfMobile);
});
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