<template>
  <div class="relative overflow-x-auto py-8">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0 flex items-center justify-center opacity-10">
      <img src="images/alflogo.png" alt="Logo" class="w-1/4 max-w-xs mx-auto" />
    </div>

    <!-- Table Content -->
    <div class="relative z-10">
      <table class="table-auto w-full max-w-7xl mx-auto border-collapse">
        <thead class="bg-official-purple-800 text-white">
          <tr>
            <th
              colspan="3"
              class="px-4 py-4 text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold text-center uppercase tracking-wide"
            >
              The 2012 Bar Examination Passers
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Regular Passers in 3 Columns -->
          <tr v-for="(row, rowIndex) in maxRows" :key="rowIndex" class="flex flex-wrap md:table-row">
            <td
              v-for="(column, colIndex) in columns"
              :key="colIndex"
              class="w-full px-6 py-4 text-sm leading-6 text-gray-800 md:w-auto text-left md:text-left hover:bg-gray-50 transition-colors"
            >
              {{ column[rowIndex] || '' }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from "vue";

// Full list of names for 2012 Bar Passers
const allNames = [
  "ACOSTA, Gil Jr. A.",
  "ALBANO, Ranvylle O.",
  "ALIM, Nicolito Jesus M.",
  "ANDRION, Jofre Z.",
  "ARCEÑO, Jackielyn N.",
  "BALBA, Zack Hansel A.",
  "BERNARDO, Pallo Mert S.",
  "BONGHANOY, Al C.",
  "BRION, Eden C.",
  "BRIONES, Conrado M.",
  "CALDERON, Abegail Joan F.",
  "CALUAG, Edmond M.",
  "CAYCO, Victor Carlo Antonio V.",
  "CLAUDIO, Joanne Lucille Germaine Y.",
  "CONDE, Fiona E.",
  "DE VILLA, Rhodora S.",
  "ESTRELLA, Eric D.",
  "FOLLO, Dennis T.",
  "GABOR-TOLENTINO, Joy Marie R.",
  "GALANG, John Paul P.",
  "GALICIA, Gene Franco I.",
  "IMPERIAL, Ramil S.",
  "LEONG-ANUDIN, Leslie Ann S.",
  "MANUEL, Sheila Gene M.",
  "MARIÑAS, Maria Rosario D.",
  "MIRANDA-RIMONTE, Ana C.",
  "QUIAMBAO, Reinier S.",
  "RICAZA, Michelle Marie F.",
  "SABORNIDO, Noemi S.",
  "SALAZAR, Jerome G.",
  "SANTOS, Alexander B.",
  "SANTOS, Joel A.",
  "SARI, Jayson V.",
  "TAMONDONG, Eddie Jr., B.",
  "UBERITA, Joan N.",
  "VARGAS, Mona Angela E."
];

// Computed properties for reactive data
const sortedNames = computed(() => [...allNames].sort((a, b) => a.localeCompare(b)));

const divideIntoColumns = (list, columnCount) => {
  const columns = Array.from({ length: columnCount }, () => []);
  list.forEach((name, index) => {
    columns[index % columnCount].push(name);
  });
  return columns;
};

const columns = computed(() => divideIntoColumns(sortedNames.value, 3));
const maxRows = computed(() => Math.max(...columns.value.map(col => col.length)));
</script>