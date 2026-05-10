<template>
  <div class="server-status">
    <div class="p-6 rounded-lg space-y-6">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <h3 class="text-2xl font-bold text-gray-800">Server Status</h3>
          <span
            class="inline-flex items-center gap-1 px-2 py-0.5 text-xs font-medium rounded-full"
            :class="pollingActive ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500'"
          >
            <span class="w-1.5 h-1.5 rounded-full" :class="pollingActive ? 'bg-green-500' : 'bg-gray-400'"></span>
            {{ pollingActive ? 'Live' : 'Paused' }}
          </span>
        </div>
        <div class="flex items-center gap-2">
          <button
            @click="togglePolling"
            class="inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-md border focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            :class="pollingActive
              ? 'text-yellow-700 bg-yellow-50 border-yellow-300 hover:bg-yellow-100'
              : 'text-green-700 bg-green-50 border-green-300 hover:bg-green-100'"
          >
            <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <template v-if="pollingActive">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6" />
              </template>
              <template v-else>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </template>
            </svg>
            {{ pollingActive ? 'Pause' : 'Resume' }}
          </button>
          <button
            @click="refresh"
            :disabled="loading"
            class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50"
          >
            <svg
              :class="{ 'animate-spin': loading }"
              class="w-4 h-4 mr-1.5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            {{ loading ? 'Refreshing...' : 'Refresh' }}
          </button>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
        <div class="bg-white border rounded-lg p-4">
          <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Uptime</p>
          <p class="mt-1 text-lg font-semibold text-gray-900">{{ formattedUptime }}</p>
        </div>
        <div class="bg-white border rounded-lg p-4">
          <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Response Time</p>
          <p class="mt-1 text-lg font-semibold text-gray-900">{{ statusData.response_time_ms || '—' }} ms</p>
        </div>
        <div class="bg-white border rounded-lg p-4">
          <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Throughput</p>
          <p class="mt-1 text-lg font-semibold text-gray-900">{{ statusData.throughput ?? '—' }} req/min</p>
        </div>
        <div class="bg-white border rounded-lg p-4">
          <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Database</p>
          <div class="mt-1 flex items-center gap-1.5">
            <span
              class="w-2 h-2 rounded-full"
              :class="statusData.db_connected ? 'bg-green-500' : 'bg-red-500'"
            ></span>
            <p class="text-lg font-semibold" :class="statusData.db_connected ? 'text-green-600' : 'text-red-600'">
              {{ statusData.db_connected ? 'Connected' : 'Disconnected' }}
            </p>
          </div>
        </div>
      </div>

      <div class="chart-card">
        <h4 class="chart-title">CPU Load</h4>
        <canvas id="cpuChart"></canvas>
      </div>

      <div class="flex flex-wrap gap-6">
        <div class="chart-card flex-1">
          <h4 class="chart-title">Memory Usage</h4>
          <canvas id="memoryChart"></canvas>
        </div>
        <div class="chart-card flex-1">
          <h4 class="chart-title">Disk Usage</h4>
          <canvas id="diskChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue';
import Chart from 'chart.js/auto';

const POLL_INTERVAL = 30000;

const loading = ref(false);
const pollingActive = ref(true);
const statusData = ref({});
let cpuChart = null;
let memoryChart = null;
let diskChart = null;
let pollTimer = null;

const formattedUptime = computed(() => {
  const secs = statusData.value.uptime_seconds;
  if (!secs && secs !== 0) return '—';
  const d = Math.floor(secs / 86400);
  const h = Math.floor((secs % 86400) / 3600);
  const m = Math.floor((secs % 3600) / 60);
  const s = secs % 60;
  const parts = [];
  if (d) parts.push(`${d}d`);
  if (h) parts.push(`${h}h`);
  if (m) parts.push(`${m}m`);
  parts.push(`${s}s`);
  return parts.join(' ');
});

const initializeCharts = () => {
  const ctxCpu = document.getElementById('cpuChart').getContext('2d');
  cpuChart = new Chart(ctxCpu, {
    type: 'line',
    data: {
      labels: [],
      datasets: [
        {
          label: 'CPU Load (1-Minute Average)',
          data: [],
          borderColor: '#6366F1',
          backgroundColor: 'rgba(99, 102, 241, 0.2)',
          tension: 0.4,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      animation: { duration: 400 },
      plugins: {
        legend: { display: true, position: 'top' },
        title: { display: true, text: 'Real-Time CPU Load', font: { size: 18 } },
      },
      scales: {
        x: { title: { display: true, text: 'Time' } },
        y: { title: { display: true, text: 'CPU Load (%)' }, beginAtZero: true },
      },
    },
  });

  const ctxMemory = document.getElementById('memoryChart').getContext('2d');
  memoryChart = new Chart(ctxMemory, {
    type: 'doughnut',
    data: {
      labels: ['Used Memory', 'Free Memory'],
      datasets: [
        {
          data: [0, 0],
          backgroundColor: ['#E11D48', '#10B981'],
          hoverOffset: 4,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      animation: { duration: 400 },
      plugins: {
        legend: { display: true, position: 'bottom' },
        title: { display: true, text: 'Memory Usage (MB)', font: { size: 18 } },
      },
    },
  });

  const ctxDisk = document.getElementById('diskChart').getContext('2d');
  diskChart = new Chart(ctxDisk, {
    type: 'pie',
    data: {
      labels: ['Used Space', 'Free Space'],
      datasets: [
        {
          data: [0, 0],
          backgroundColor: ['#F59E0B', '#3B82F6'],
          hoverOffset: 4,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      animation: { duration: 400 },
      plugins: {
        legend: { display: true, position: 'bottom' },
        title: { display: true, text: 'Disk Usage (%)', font: { size: 18 } },
      },
    },
  });
};

const updateCharts = (data) => {
  const { cpu, memory: mem, disk: dsk } = data;

  const timestamp = new Date().toLocaleTimeString();
  if (cpuChart.data.labels.length >= 10) {
    cpuChart.data.labels.shift();
    cpuChart.data.datasets[0].data.shift();
  }
  cpuChart.data.labels.push(timestamp);
  cpuChart.data.datasets[0].data.push(cpu['1_min']);
  cpuChart.update();

  const usedMemoryMB = (parseInt(mem.current) / 1024 / 1024).toFixed(2);
  const freeMemoryMB = ((parseInt(mem.peak) - parseInt(mem.current)) / 1024 / 1024).toFixed(2);
  memoryChart.data.datasets[0].data = [usedMemoryMB, freeMemoryMB];
  memoryChart.update();

  diskChart.data.datasets[0].data = [parseInt(dsk.used_percentage), 100 - parseInt(dsk.used_percentage)];
  diskChart.update();
};

const fetchServerStatus = async () => {
  loading.value = true;
  try {
    const response = await fetch(route('server.status'));
    const data = await response.json();
    statusData.value = data;
    if (cpuChart && memoryChart && diskChart) {
      updateCharts(data);
    }
  } catch (error) {
    console.error("Failed to fetch server status:", error);
  } finally {
    loading.value = false;
  }
};

const refresh = () => {
  fetchServerStatus();
};

const togglePolling = () => {
  pollingActive.value = !pollingActive.value;
  if (pollingActive.value) {
    startPolling();
    fetchServerStatus();
  } else {
    stopPolling();
  }
};

const startPolling = () => {
  stopPolling();
  pollTimer = setInterval(fetchServerStatus, POLL_INTERVAL);
};

const stopPolling = () => {
  if (pollTimer) {
    clearInterval(pollTimer);
    pollTimer = null;
  }
};

const handleVisibilityChange = () => {
  if (document.hidden) {
    stopPolling();
  } else if (pollingActive.value) {
    fetchServerStatus();
    startPolling();
  }
};

onMounted(() => {
  initializeCharts();
  fetchServerStatus();
  startPolling();
  document.addEventListener('visibilitychange', handleVisibilityChange);
});

onUnmounted(() => {
  stopPolling();
  document.removeEventListener('visibilitychange', handleVisibilityChange);
  if (cpuChart) cpuChart.destroy();
  if (memoryChart) memoryChart.destroy();
  if (diskChart) diskChart.destroy();
});
</script>

<style scoped>
.server-status {
  font-family: 'Inter', sans-serif;
  padding: 20px;
}

.chart-card {
  background-color: #fff;
  padding: 20px;
  border-radius: 12px;
}

.chart-title {
  font-size: 1.2rem;
  font-weight: 600;
  color: #4A5568;
  margin-bottom: 16px;
  text-align: center;
}

canvas {
  width: 100% !important;
  height: 250px !important;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}
.animate-spin {
  animation: spin 1s linear infinite;
}
</style>
