<template>
  <div class="server-status">
    <div class="p-6 rounded-lg  space-y-6">
      <h3 class="text-2xl font-bold text-gray-800 text-center">Server Status</h3>

      <!-- Real-Time CPU Load Chart -->
      <div class="chart-card">
        <h4 class="chart-title">CPU Load (Real-Time)</h4>
        <canvas id="cpuChart"></canvas>
      </div>

      <!-- Memory and Disk Usage Charts -->
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
import { ref, onMounted } from 'vue';
import Chart from 'chart.js/auto';

let cpuChart = null;
let memoryChart = null;
let diskChart = null;

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
  try {
    const response = await fetch(route('server.status'));
    const data = await response.json();
    updateCharts(data);
  } catch (error) {
    console.error("Failed to fetch server status:", error);
  }
};

onMounted(() => {
  initializeCharts();
  fetchServerStatus();
  setInterval(fetchServerStatus, 6000);
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
</style>

