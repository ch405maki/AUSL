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
              The 2013 Bar Examination Passers
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

// Full list of names for 2013 Bar Passers
const allNames = [
  "ABANDO, Laura Jean L.",
  "ADUNA, Fritzie Jane A.",
  "AMBATALI, Eliezer P.",
  "ARELLANO, Zoraida P.",
  "ASTURIAS, Jose Manuel V.",
  "AURE, Lelila G.",
  "BAGO, Horace J.",
  "BALINO, Kristy Jane M.",
  "BASCO, Shayne Anne R.",
  "CALABOCAL, Erickson L.",
  "CALDERON, Alex D.",
  "CASTILLO, David Anastacio G.",
  "CASTILLON, David F.",
  "CHUA, Antonio Francis G.",
  "CORTEZ, Ailyn L.",
  "CUREG, Ryan P.",
  "DICHOSO, Joseph M.",
  "ESPINO, Donato V.",
  "FERAREN, Fermin Maylene B.",
  "FOSTER, Kimberly D.",
  "GILDO, Casilda P.",
  "GUIAO, Abraham P.",
  "GUILING-MATANOG, Ayesha Hania B.",
  "ILAGAN, Cindy A.",
  "IPIO, Raymund L.",
  "JOSE, Jefferson D.",
  "LAZA, Bernadette B.",
  "MABBUN, Ma. Antonette M.",
  "MARISTELA, Melissa Fina U.",
  "MIGUEL, John Evan C.",
  "OSMEÑA, Ruhjen S.",
  "PABLICO, Christopher Jhundi D.",
  "PANONG, Hazel Joy P.",
  "PARAÑAL, Jonah Paul G.",
  "PARCIA, Teresa Rose D.",
  "RUBIN, Ronald Patrick T.",
  "SALVADOR, Julie Ann C.",
  "SANTOS, Gail Joseph S.",
  "SAPGUIAN, Vicky Louise G.",
  "SY, Alwyn U.",
  "TAÑUTE, Richelle R.",
  "TOLENTINO, Irish Tom T.",
  "UY, Jonathan B.",
  "VERDEJO, Jonathan N.",
  "VIOLA, Stephanie-Eden T.",
  "ZENAROSA, Anna Karenina A."
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