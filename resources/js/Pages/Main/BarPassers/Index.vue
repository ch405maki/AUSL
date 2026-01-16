<template>
  <MainLayout>
    <Head title="AUSL Bar Passers" />
    <Header>AUSL Bar Passers</Header>
    <main class="flex-grow">
      <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
        <!-- Tabs Navigation -->
        <div class="border-b border-gray-200 mb-8">
          <nav class="-mb-px flex space-x-8 overflow-x-auto">
            <button
              v-for="(tab, index) in tabs"
              :key="tab.id"
              @click="activeTab = tab.id"
              :class="[
                'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm',
                activeTab === tab.id
                  ? 'border-official-purple-500 text-official-purple-600'
                  : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
              ]"
            >
              {{ tab.label }}
            </button>
          </nav>
        </div>

        <!-- Tab Content -->
        <div class="tab-content">
          <!-- 2020s -->
          <div v-show="activeTab === '2020s'" class="space-y-8">
            <Y2025 />
            <Y2024 />
            <Y2023 />
            <Y2022 />
            <Y2020 />
          </div>

          <!-- 2010s -->
          <div v-show="activeTab === '2010s'" class="space-y-8">
            <Y2019 />
            <Y2018 />
            <Y2017 />
            <Y2016 />
            <Y2015 />
            <Y2014 />
            <Y2013 />
            <Y2012 />
            <Y2011 />
            <Y2010 />
          </div>

          <!-- 2000s -->
          <div v-show="activeTab === '2000s'" class="space-y-8">
            <Y2009 />
            <Y2008 />
            <Y2007 />
            <Y2006 />
            <Y2005 />
            <Y2004 />
            <Y2003 />
            <Y2002 />
            <Y2001 />
            <Y2000 />
          </div>

          <!-- 1990s -->
          <div v-show="activeTab === '1990s'" class="space-y-8">
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
import { ref, reactive, onMounted, onBeforeUnmount } from 'vue';
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
import Y2005 from '@/Pages/Main/BarPassers/2005.vue';
import Y2006 from '@/Pages/Main/BarPassers/2006.vue';
import Y2007 from '@/Pages/Main/BarPassers/2007.vue';
import Y2008 from '@/Pages/Main/BarPassers/2008.vue';
import Y2009 from '@/Pages/Main/BarPassers/2009.vue';
import Y2010 from '@/Pages/Main/BarPassers/2010.vue';
import Y2011 from '@/Pages/Main/BarPassers/2011.vue';
import Y2012 from '@/Pages/Main/BarPassers/2012.vue';
import Y2013 from '@/Pages/Main/BarPassers/2013.vue';
import Y2014 from '@/Pages/Main/BarPassers/2014.vue';
import Y2015 from '@/Pages/Main/BarPassers/2015.vue';
import Y2016 from '@/Pages/Main/BarPassers/2016.vue';
import Y2017 from '@/Pages/Main/BarPassers/2017.vue';
import Y2018 from '@/Pages/Main/BarPassers/2018.vue';
import Y2019 from '@/Pages/Main/BarPassers/2019.vue';
import Y2020 from '@/Pages/Main/BarPassers/2020.vue';
import Y2022 from '@/Pages/Main/BarPassers/2022.vue';
import Y2023 from '@/Pages/Main/BarPassers/2023.vue';
import Y2024 from '@/Pages/Main/BarPassers/2024.vue';
import Y2025 from '@/Pages/Main/BarPassers/2025.vue';

// Tabs configuration
const tabs = [
  { id: '2020s', label: '2020s' },
  { id: '2010s', label: '2010s' },
  { id: '2000s', label: '2000s' },
  { id: '1990s', label: '1990s' },
];

const activeTab = ref('2020s');

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
.tab-content {
  min-height: 400px;
}

/* Smooth transitions for tab content */
.tab-content > div {
  transition: opacity 0.3s ease-in-out;
}

/* Scrollable tabs for mobile */
@media (max-width: 768px) {
  .overflow-x-auto {
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
    -ms-overflow-style: none;
  }
  
  .overflow-x-auto::-webkit-scrollbar {
    display: none;
  }
}

/* Custom scrollbar for better UX */
.tab-content {
  scrollbar-width: thin;
  scrollbar-color: #cbd5e0 #f7fafc;
}

.tab-content::-webkit-scrollbar {
  width: 6px;
}

.tab-content::-webkit-scrollbar-track {
  background: #f7fafc;
}

.tab-content::-webkit-scrollbar-thumb {
  background-color: #cbd5e0;
  border-radius: 3px;
}
</style>