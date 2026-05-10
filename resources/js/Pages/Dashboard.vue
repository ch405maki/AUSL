<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
      <template #action>
        <div class="flex items-center justify-between flex-grow p-5">
          <h2 class="font-normal text-xl text-gray-800 leading-tight">Dashboard</h2>
          <div class="flex items-center gap-2">
            <button
              @click="pruneAnalytics"
              class="inline-flex items-center px-2 sm:px-3 py-1.5 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
              title="Clear Analytics"
            >
              <svg class="w-4 h-4 sm:mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
              <span class="hidden sm:inline">Clear Analytics</span>
            </button>
            <button
              @click="refreshAnalytics"
              :disabled="refreshing"
              class="inline-flex items-center px-2 sm:px-3 py-1.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50"
              title="Refresh Analytics"
            >
              <svg
                :class="{ 'animate-spin': refreshing }"
                class="w-4 h-4 sm:mr-1.5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
              </svg>
              <span class="hidden sm:inline">{{ refreshing ? 'Refreshing...' : 'Refresh Analytics' }}</span>
            </button>
          </div>
        </div>
      </template>

      <div class="grid grid-cols-1 gap-4 px-4 mt-8 sm:grid-cols-2 lg:grid-cols-4 sm:px-8">
        <div class="flex items-center bg-white border rounded-lg overflow-hidden hover:shadow">
          <div class="p-4 bg-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
              </path>
            </svg>
          </div>
          <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Active Posts</h3>
            <p class="text-3xl">{{ post.length }}</p>
          </div>
        </div>
        <div class="flex items-center bg-white border rounded-lg overflow-hidden hover:shadow">
          <div class="p-4 bg-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div>
          <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Visitors Today</h3>
            <p class="text-3xl">{{ uniqueVisitorsToday }}</p>
          </div>
        </div>
        <div class="flex items-center bg-white border rounded-lg overflow-hidden hover:shadow">
          <div class="p-4 bg-indigo-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
          </div>
          <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Page Visits</h3>
            <p class="text-3xl">{{ totalVisitsToday }}</p>
          </div>
        </div>
        <div class="flex items-center bg-white border rounded-lg overflow-hidden hover:shadow">
          <div class="p-4 bg-red-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4.5c-.77-.833-2.694-.833-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z" />
            </svg>
          </div>
          <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Bots Today</h3>
            <p class="text-3xl">{{ botVisitsFiltered }}</p>
          </div>
        </div>
      </div>

      <div class="px-4 mt-8 sm:px-8">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Quick Access</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <a :href="route('announcement')" class="flex items-center bg-white border rounded-lg overflow-hidden hover:shadow-md hover:border-indigo-200 transition-all">
            <div class="p-4 bg-purple-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38a.875.875 0 01-1.23-.84 17.8 17.8 0 01-.424-3.204m0-9.18A17.8 17.8 0 019 6.43M18.75 12a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
              </svg>
            </div>
            <div class="px-4 text-gray-700">
              <p class="text-sm font-medium">Announcement</p>
            </div>
          </a>
          <a :href="route('carousell')" class="flex items-center bg-white border rounded-lg overflow-hidden hover:shadow-md hover:border-indigo-200 transition-all">
            <div class="p-4 bg-pink-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A1.5 1.5 0 0021.75 19.5V4.5A1.5 1.5 0 0020.25 3H3.75A1.5 1.5 0 002.25 4.5v15A1.5 1.5 0 003.75 21z" />
              </svg>
            </div>
            <div class="px-4 text-gray-700">
              <p class="text-sm font-medium">Carousel</p>
            </div>
          </a>
          <a :href="route('countdown.index')" class="flex items-center bg-white border rounded-lg overflow-hidden hover:shadow-md hover:border-indigo-200 transition-all">
            <div class="p-4 bg-amber-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div class="px-4 text-gray-700">
              <p class="text-sm font-medium">Counter</p>
            </div>
          </a>
          <a :href="route('posts')" class="flex items-center bg-white border rounded-lg overflow-hidden hover:shadow-md hover:border-indigo-200 transition-all">
            <div class="p-4 bg-cyan-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
              </svg>
            </div>
            <div class="px-4 text-gray-700">
              <p class="text-sm font-medium">News Posting</p>
            </div>
          </a>
        </div>
      </div>

      <div class="grid grid-cols-1 gap-4 px-4 mt-8 lg:grid-cols-3 sm:px-8">
        <div class="lg:col-span-2 bg-white p-4 border rounded-lg">
          <h3 class="text-lg font-semibold text-gray-800 mb-4">Visitors (Last 7 Days)</h3>
          <canvas id="pageVisitsChart"></canvas>
        </div>

        <div class="bg-white p-4 border rounded-lg">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Top Pages (7 Days)</h3>
            <button
              @click="clearTopPages"
              class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-red-500"
              title="Clear Top Pages"
            >
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
            </button>
          </div>
          <div v-if="topPages.length" class="space-y-3">
            <div v-for="page in topPages" :key="page.route_path" class="flex items-center justify-between border-b pb-2">
              <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">{{ page.route_name || page.route_path }}</p>
                <p class="text-xs text-gray-500 truncate">/{{ page.route_path }}</p>
              </div>
              <div class="text-right ml-2">
                <p class="text-sm font-semibold text-indigo-600">{{ page.unique_visitors }}</p>
                <p class="text-xs text-gray-400"></p>
              </div>
            </div>
          </div>
          <div v-else class="text-center text-gray-400 py-8">
            <p>No page data yet</p>
          </div>
        </div>
      </div>

      <div class="px-4 mt-8 sm:px-8">
        <div class="bg-white p-4 border rounded-lg">
          <h1>Server Dashboard</h1>
          <ServerStatus />
        </div>
      </div>
    </AuthenticatedLayout>
  </template>

  <script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import ServerStatus from '@/Components/ServerStatus.vue';
  import { Head, router } from '@inertiajs/vue3';
  import { ref, onMounted } from 'vue';
  import Chart from 'chart.js/auto';
  import Swal from 'sweetalert2';

  const refreshing = ref(false);

  const props = defineProps({
    post: { type: Array, required: true },
    uniqueVisitorsToday: { type: Number, required: true },
    totalVisitsToday: { type: Number, required: true },
    visitsPerDay: { type: Array, required: true },
    topPages: { type: Array, required: true },
    botVisitsFiltered: { type: Number, required: true },
  });

  const refreshAnalytics = () => {
    refreshing.value = true;
    router.reload({
      only: ['uniqueVisitorsToday', 'totalVisitsToday', 'visitsPerDay', 'topPages', 'botVisitsFiltered'],
      onSuccess: () => {
        refreshing.value = false;
        renderChart();
      },
      onError: () => {
        refreshing.value = false;
      },
    });
  };

  const clearTopPages = () => {
    Swal.fire({
      title: 'Clear top pages data?',
      text: 'This will reset the top pages list. Visitor counts and other analytics will not be affected.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#dc2626',
      cancelButtonColor: '#6b7280',
      confirmButtonText: 'Yes, clear top pages',
      cancelButtonText: 'Cancel',
    }).then((result) => {
      if (result.isConfirmed) {
        router.post(route('dashboard.clear-top-pages'));
      }
    });
  };

  const pruneAnalytics = () => {
    Swal.fire({
      title: 'Clear analytics data?',
      text: 'This will permanently delete analytics records older than 5 days. The most recent 5 days of data will be preserved.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#dc2626',
      cancelButtonColor: '#6b7280',
      confirmButtonText: 'Yes, prune old data',
      cancelButtonText: 'Cancel',
    }).then((result) => {
      if (result.isConfirmed) {
        router.post(route('dashboard.prune-analytics'));
      }
    });
  };

  const renderChart = () => {
    const canvas = document.getElementById('pageVisitsChart');
    if (!canvas) return;

    const existing = Chart.getChart(canvas);
    if (existing) existing.destroy();

    const labels = props.visitsPerDay.map((d) => d.date);
    const counts = props.visitsPerDay.map((d) => d.count);

    new Chart(canvas, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [
          {
            label: 'Visitors',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            data: counts,
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: { position: 'top' },
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: { precision: 0 },
          },
        },
      },
    });
  };

  onMounted(() => {
    renderChart();
  });
  </script>
