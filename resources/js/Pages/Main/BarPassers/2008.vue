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
              class="px-4 py-4 text-sm sm:text-sm md:text-lg lg:text-xl xl:text-2xl font-extrabold text-center uppercase"
            >
              The 2008 Bar Examinations Passers
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Dynamically Render Rows -->
          <tr v-for="(row, rowIndex) in maxRows" :key="rowIndex" class="flex flex-wrap md:table-row">
            <td
              v-for="(column, colIndex) in columns"
              :key="colIndex"
              class="w-full px-6 py-4 text-sm leading-6 text-gray-800 md:w-auto text-left md:text-left"
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

// Full list of names for 2008 Bar Passers
const allNames = [
  "AFRICA, Voltaire B.",
  "AGUILAR, Aileen R.",
  "ALANO, Joseph Rod Allan C.",
  "ALIBANIA, Jr. Eliseo C.",
  "ALMARIO, Shari-Christine SJ.",
  "AMOR, Aileen L.",
  "BACLAYO, Ruby T.",
  "BALTAZAR, Jay Francis P.",
  "BELARMINO-RUMA, Brenda R.",
  "BUBAN, Josephine M.",
  "CANDELARIA, Desiree G.",
  "CASTRO, Rohail R.",
  "CATRE, Jr. Noel Christian G.",
  "COLLANTES, King George Leandro Antonio V.",
  "DE LEON, Cyril F.",
  "DELA CRUZ, Allen S.",
  "DELA CRUZ, Donna Cher A.",
  "DERIGAY, Rachel F.",
  "FRANCISCO, Mariel L.",
  "FUENTES, Ruth C.",
  "GEBILAGUIN, Shiela D.",
  "GO, Ormil D.",
  "HERNANDEZ, Helen Grace S.",
  "LAJA, Leah Easter P.",
  "LARGOZA, Salvador Gregorio L.",
  "LUMASAC-TORREGOSA, Paz L.",
  "MAÑALAC, Maria Elizabeth S.",
  "MANANGHAYA, Maria Melinda S.",
  "MARAPAO, V Lord R.",
  "MARTIZANO, Leah T.",
  "MENDOZA, Claudie M.",
  "MENDOZA, Melinda Cielo C.",
  "MERCADO, Charade B.",
  "MISON, Rafael Jaime A.",
  "MOLDEZ, Mary Glenn T.",
  "MONTEALEGRE, Cheryll Grace H.",
  "MONTON, Jr. Higino A.",
  "PADILLA, Jennifer G.",
  "PAGULAYAN, Amorsito B.",
  "POLITICO, Jeicqpoi N.",
  "QUINTANA, Rizza R.",
  "RAMOS, III Primo A.",
  "REYES, Mark A.",
  "SALIENTE, Jacqueline Kate T.",
  "SANTOS, Phillip Charles G.",
  "SOMERA, Helen Grace J.",
  "SUMPO, Gilda A.",
  "TADEO, Ryan T.",
  "TAMAYO, Ray Jean D.",
  "TAMON, Bernard O.",
  "TAN, Francis Ambrosio S.",
  "TANGUANCO, Alvin B.",
  "TOLENTINO, Rommel T.",
  "VEHEMENTE, Renato R.",
  "VILLEGAS, Adelwiza S.",
  "VILLEROZ, Raymond C.",
  "VITAL, Menita J.",
  "YEBAN, Ryan John T.",
  "ZAMBRANO, Sheryl Jane C.",
  "ZAPANTA, Andrei J.",
  "ZOLETA, Tristan Ysaak M."
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