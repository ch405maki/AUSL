<template>
    <Head title="Dashboard" />
  
    <AuthenticatedLayout>
      <template #action>
        <div class="flex flex-grow p-5">
          <h2 class="font-normal text-xl text-gray-800 leading-tight">Dashboard</h2>
        </div>
      </template>
  
      <!-- Dashboard Stats -->
      <div class="grid grid-cols-1 gap-4 px-4 mt-8 sm:grid-cols-2 sm:px-8">
        <div class="flex items-center bg-white border rounded-lg overflow-hidden hover:shadow">
          <div class="p-4 bg-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
              </path>
            </svg>
          </div>
          <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Active Post</h3>
            <p class="text-3xl">{{ post.length }}</p>
          </div>
        </div>
        <div class="flex items-center bg-white border rounded-lg overflow-hidden hover:shadow">
          <div class="p-4 bg-red-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4">
              </path>
            </svg>
          </div>
          <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Todays Visitor(s)</h3>
            <p class="text-3xl">{{ currentDateVisitors }}</p>
          </div>
        </div>
      </div>
  
      <!-- Page Visits Chart -->
      <div class="px-4 mt-8 sm:px-8">
        <div class="bg-white p-4 border rounded-lg">
          <h3 class="text-lg font-semibold text-gray-800 mb-4">Page Visits Chart</h3>
          <canvas id="pageVisitsChart"></canvas>
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
  import { Head } from '@inertiajs/vue3';
  import { defineProps, onMounted } from 'vue';
  import Chart from 'chart.js/auto';
  
  // Define props
  const props = defineProps({
    post: { type: Array, required: true },
    logs: { type: Array, required: true }, 
    currentDateVisitors: { type: Number, required: true },
  });
  
  // Initialize chart on mount
  onMounted(() => {
    // Map logs data for the chart
    const labels = props.logs.map((log) => log.date);
    const counts = props.logs.map((log) => log.count);
  
    const data = {
      labels: labels,
      datasets: [
        {
          label: 'Page Visits',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1,
          data: counts,
        },
      ],
    };
  
    const config = {
      type: 'bar',
      data: data,
      options: {
        responsive: true,
        plugins: {
          legend: { position: 'top' },
          title: {
            display: true,
            text: 'Page Visits Per Date',
          },
        },
      },
    };
  
    // Render chart
    new Chart(document.getElementById('pageVisitsChart'), config);
  });
  </script>
  