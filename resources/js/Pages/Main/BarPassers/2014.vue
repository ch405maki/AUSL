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
              The 2014 Bar Examination Passers
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

// Full list of names for 2014 Bar Passers
const allNames = [
  "ABELLAR, Mae Ann B.",
  "ABO, Marvi R.",
  "AMEN, Catherine S.",
  "AMIL, Jayric L.",
  "BATACAN-CAMACHO, Renizza Belle E.",
  "BAUTISTA, Diana Roselle V.",
  "BESAÑES, Niño G.",
  "BLANCO, Chiara Angela L.",
  "BUBAN, III, Mamerto N.",
  "CAFÉ, Ryan P.",
  "CASTRO, Bethel Edgar B.",
  "CAYCO, Patricia Gail V.",
  "CERVANTES, Dindo R.",
  "CHAGUILE, Michelle A.",
  "CHAN, Wharton R.",
  "CURAMMENG, Jr., Reynold B.",
  "DELA CRUZ, Jan Michael S.",
  "DELOS REYES, Angelico Zenon M.",
  "DIALOGO, Karlo M.",
  "ESTOLAS, Benjamin Jose S.",
  "GALAROSA, Michael Vincent C.",
  "GONZALES, Claudine Joy C.",
  "GRAGEDA-FLORES, Joanna Mayelle T.",
  "GUTIERREZ, Jr., Eduardo R.",
  "INFANTE, Seth M.",
  "LEAÑO, Czarina Janis Rhaetia G.",
  "LEYSON, Brian B.",
  "LIM, Gretchel N.",
  "MACALANDA, April Fleurenz Rose C.",
  "MANDIGMA-AGUILA, Jenny M.",
  "MANGELEN, Aljuhari U.",
  "MERCADO, Edwina A.",
  "NADAL, Jordan V.",
  "NEPOMUCENO, Tarcila B.",
  "OBEJAS, Kim David M.",
  "ONGSON, Chery Amor V.",
  "OZAKI, Kazuma B.",
  "PEDRAJAS, Christine T.",
  "PEÑA, Irene V.",
  "PENACHOS, Patrick I.",
  "REGONDOLA, Maria Cristina L.",
  "RELENTE, Ernest John G.",
  "REMULLA, Nikka Bianca A.",
  "RODRIGO, Renante C.",
  "ROMATAN, Rolynda Ezra B.",
  "ROSETE, Jennifer M.",
  "SALIMO, Karen M.",
  "SAMANIEGO, Diana B.",
  "SIGUA, Sheryl E.",
  "SINSON, Marcus A.",
  "TABAYAG, Ernalyn J.",
  "TANTOCO-BRIONES, Jecylene T.",
  "TAYCO, Clifford L.",
  "TULIAO, Paolo C.",
  "VALDEZ, Albert M.",
  "VEGA, Daniel C.",
  "ZABALA, Jr., Genie R."
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