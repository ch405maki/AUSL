<template>
    <MainLayout>
      <Head title="AUSL Bar Passers" />
      <Header>AUSL Bar Passers</Header>
      <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
          <div class="flex justify-center">
            <!-- Centering Y1996 Component -->
            <div class="w-full">
              <Y2004 />
              <Y2003 />
              <Y2002 />
              <Y2001 />
              <Y2000 />
              <Y1999 />
              <Y1998 />
              <Y1997 />
              <Y1996 />
            </div>
          </div>
        </div>
      </main>
    </MainLayout>
  </template>
  

  <script setup>
  import { ref } from 'vue';
  import { reactive, onMounted, onBeforeUnmount } from 'vue';
  import { Head } from '@inertiajs/vue3';
  import MainLayout from '@/Layouts/MainLayout.vue';
  import Header from '../Components/Header.vue';
  import Y1996 from '@/Pages/Main/BarPassers/1996.vue';
  import Y1997 from '@/Pages/Main/BarPassers/1997.vue';
  import Y1998 from '@/Pages/Main/BarPassers/1998.vue';
  import Y1999 from '@/Pages/Main/BarPassers/1999.vue';
  import Y2000 from '@/Pages/Main/BarPassers/2000.vue';
  import Y2001 from '@/Pages/Main/BarPassers/2001.vue';
  import Y2002 from '@/Pages/Main/BarPassers/2002.vue';
  import Y2003 from '@/Pages/Main/BarPassers/2003.vue';
  import Y2004 from '@/Pages/Main/BarPassers/2004.vue';

  // Create a ref for the current step
  const step = ref(1); // Initially set to Step 1
  
  const isMobile = reactive({ value: window.innerWidth <= 768 });
  
  const checkIfMobile = () => {
  isMobile.value = window.innerWidth <= 768;
  };
  
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