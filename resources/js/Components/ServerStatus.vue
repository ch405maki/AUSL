<template>
  <div class="server-status">
    <div class="bg-white p-4 rounded-lg">
      <h3 class="text-lg font-semibold">Server Status</h3>
      
      <div class="mt-4">
        <div class="bg-white">
          <p><strong>CPU Load (Linear Representation):</strong></p>
        <canvas id="cpuChart"></canvas>
        </div>
      </div>

      <!-- Memory and Disk Usage Charts side by side -->
      <div class="flex mt-6 space-x-4">
        <!-- Memory Usage Chart -->
        <div class="flex-1">
          <p><strong>Memory Usage:</strong></p>
          <canvas id="memoryChart"></canvas>
        </div>

        <!-- Disk Usage Chart -->
        <div class="flex-1">
          <p><strong>Disk Usage:</strong></p>
          <canvas id="diskChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Chart from 'chart.js/auto'; // Import Chart.js

const cpu = ref({});
const memory = ref({});
const disk = ref({});

const fetchServerStatus = async () => {
  try {
    const response = await fetch(route('server.status')); // Using Ziggy's route helper
    const data = await response.json();
    cpu.value = data.cpu;
    memory.value = data.memory;
    disk.value = data.disk;

    // Update the charts with the new data
    updateCharts();
  } catch (error) {
    console.error("Failed to fetch server status:", error);
  }
};

const updateCharts = () => {
  // Update CPU chart as a linear line chart
  const cpuChart = new Chart(document.getElementById('cpuChart'), {
    type: 'line',
    data: {
        labels: ['1', '2', '3', '4', '5'],
        datasets: [{
            label: 'CPU Load',
            data: [10, 20, 30, 40, 50],
            fill: false,
            borderColor: 'rgba(75, 192, 192, 1)',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false, // Allow chart to resize freely
        plugins: {
            title: {
                display: true,
                text: 'CPU Load'
            }
        }
    }
});

// Optionally, resize the chart when the window is resized
window.addEventListener('resize', () => {
    cpuChart.resize();
});


  // Update Memory chart
  new Chart(document.getElementById('memoryChart'), {
    type: 'doughnut',
    data: {
      labels: ['Used', 'Free'],
      datasets: [
        {
          data: [parseInt(memory.value.current), parseInt(memory.value.peak) - parseInt(memory.value.current)],
          backgroundColor: ['#FF5733', '#4CAF50'],
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
      },
      maintainAspectRatio: false,
    }
  });

  // Update Disk Usage chart
  new Chart(document.getElementById('diskChart'), {
    type: 'pie',
    data: {
      labels: ['Used', 'Free'],
      datasets: [
        {
          data: [parseInt(disk.value.used_percentage), 100 - parseInt(disk.value.used_percentage)],
          backgroundColor: ['#FF5733', '#4CAF50'],
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
      },
      maintainAspectRatio: false,
    }
  });
};

onMounted(() => {
  fetchServerStatus();
  
  // Optionally, refresh stats every 10 seconds
  setInterval(fetchServerStatus, 10000);
});
</script>

<style scoped>
.server-status {
  font-family: Arial, sans-serif;
}

canvas {
  width: 100% !important;
  height: 200px !important; /* Set smaller height for charts */
  max-width: 100%;
  margin-top: 16px;
}
</style>
