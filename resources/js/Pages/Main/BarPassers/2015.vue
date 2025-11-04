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
              The 2015 Bar Examination Passers
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

// Full list of names for 2015 Bar Passers
const allNames = [
  "ADAMI, Cherryl S.",
  "AGUSTIN, Rona Rikka Angel G.",
  "ALEJO, Jeffry A.",
  "ALIM, Mohammad Fyzee P.",
  "ANTONIO, Robinson G.",
  "ARIÑAS, Jr., Marianito B.",
  "ASCAÑO, Bon Gerard D.",
  "ATRILLANO, Ervin Shaun S.",
  "BALAIS, Ryan E.",
  "BALBERAN, Germarie I.",
  "BANTUG, Maria Teresa Margarita Beatriz D.",
  "BARONA, Hera Aiza Marie A.",
  "BELLEN, Erwin B.",
  "BERGANTIN, Kenneth Yves C.",
  "BODIONGAN, Glein Mark L.",
  "BOÑAGA, Juliet V.",
  "BUAN, Princess L.",
  "BUELA, Krisha Marie T.",
  "BUENAVENTURA, Aiza B.",
  "BUENCONSEJO, Lee Ann P.",
  "CADAG, Maria Donnabelle M.",
  "CHUA, Gladys Kaye L.",
  "COBARRUBIAS, Maria Graciela C.",
  "CONSIGNADO, Mailyn P.",
  "DAING, Paul Patrick D.",
  "DE LA CRUZ, Rhodalyn P.",
  "DE LUMEN, Ramonchito L.",
  "DELA CRUZ, Kevin Albert T.",
  "DELDIO, Manuel F.",
  "DEOCAMPO, Randeil D.",
  "ELAURIA, Erla Rhysa R.",
  "ESPIRITU, France Leonor R.",
  "ESPLANADA-LLANES, Maria Czarina T.",
  "ESTIPONA, Joshua Psalm R.",
  "FORTUNO, Marienell G.",
  "GLINDO, Aggy Christine F.",
  "GREGORIO, Barbie Jan V.",
  "GUARINO, Maria Victoria G.",
  "IBERA, Gerald T.",
  "ILAO, Jr., Moreno M.",
  "LABAJANAN, Michelle C.",
  "LASERNA, Lorielle R.",
  "LIMFUECO, Shiella Jane R.",
  "LORENZO, Frances Adelaide C.",
  "LUKBAN, Ma. Carmela L.",
  "MACAPAGAL-MANALO, Cheryl Mae A.",
  "MANDAP, Joanna Rizza B.",
  "MANUEL, Mark Anthony N.",
  "MASONGSONG, Christian Leonard V.",
  "MEÑEZ, Emmanuel Joseph F.",
  "MERIS, Madelaine Anne M.",
  "MORADA, Marlon D.",
  "NACU, Mary Grace M.",
  "NARTATES, Grace R.",
  "OPLE, Mildred F.",
  "PALACIO, Francis Bernard A.",
  "PASICOLAN, Alvin P.",
  "PRUDENCIADO, Jr., Reynaldo M.",
  "REYES, Joseph Michael C.",
  "REYES, Lorenzo Marvin S.",
  "ROMANO, Ryan Ceazar P.",
  "ROSALES, Richard M.",
  "SALIG, Hyacinth Marie T.",
  "SAMEDRA, Arvy Chris D.",
  "SESE, Rens Gener P.",
  "SOL, Jr., Rodolfo A.",
  "TATCO, Kevin Christopher C.",
  "TOVERA, Marilyn Sharina R.",
  "VELASCO, Paul Dominic R.",
  "VILCHES, Gian Frances Nicole C.",
  "VILLAROMAN, Gerald Tristan D.",
  "YULO, Judy Anne Y.",
  "ZAMORA-REY, Maria Fatima I."
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