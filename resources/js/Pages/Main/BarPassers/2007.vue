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
              The 2007 Bar Examinations Passers
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

// Full list of names for 2007 Bar Passers
const allNames = [
  "ACEDILLO, Noelle T.",
  "ACOSTA, Jr. Isagani S.",
  "ALADIN-VIDALLO, Rhia N.",
  "ALOJADO, Romero O.",
  "ALONZO, Angelita B.",
  "AQUINO-BUNO, Mimi L.",
  "ARIMBOYUTAN, Jr. William D.",
  "BALUYOT, Rosario R.",
  "BARRIOS, Manuel Isidro Rosauro V.",
  "BATAY, Rosalyn D.",
  "BATICULON, Blanchie T.",
  "BAYOT, Rocherrie S.",
  "BINALAY, Maria florinia B.",
  "BONIFACIO, Marie Eugene Grace M.",
  "BORJA, Ruel P.",
  "BRAGAS, Diane Karen B.",
  "CALLANTA, Eduardo G.",
  "CAMELON, III Renato M.",
  "CANONIGO-GAN, Katherine C.",
  "CARREON, III Cesar R.",
  "CARTAGENA, Benedict S.",
  "CHAN, Jordanne B.",
  "CHAVEZ, Marvin Gregory R.",
  "CONCHA, Diana Charlette G.",
  "CORRAL, Claire B.",
  "CRUZ, Anna Liza R.",
  "CRUZ, Consuelo L.",
  "CRUZ, Elbert S.",
  "CRUZ, Jaymark SJ.",
  "DE LEON, Dennis Carlos Rogaciano C.",
  "DELA CRUZ, Joan M.",
  "DELGADO, Jr. Enrico B.",
  "DOMINGO, Osana Theresa D.",
  "DUMLAO, Melchor B.",
  "EDILLOR, Kathleen T.",
  "EXCONDE, Caroline G.",
  "FANTONE, Ronald A.",
  "FERNANDEZ, Joselito D.",
  "FLORES, Milette Socorro S.",
  "FONTILLAS, Hyacinth T.",
  "GABALLO, Joyce B.",
  "GARCIA, Jorge M.",
  "GO, Jr. Lito A.",
  "GO, Madonna Santa D.",
  "GUILING, Hosni L.",
  "HERRERA, Georgia May L.",
  "LAGMAN, Mary Rosary D.",
  "LOBIANO, Maria Lourdes M.",
  "MABANSAG, Ivy L.",
  "MACARILAY, Florante C.",
  "MAESTRADO-APARICIO, Jonah T.",
  "MARQUEZ, Jal A.",
  "MATIBAG, Julius G.",
  "MAXILOM, Marvin S.",
  "MENDOZA, Perfecto Justino A.",
  "MITRA, Jr. Elmer R.",
  "MORALES, Cynthia Evangeline D.",
  "MUYCO, Mary Love P.",
  "NAVARRO, Tina B.",
  "NICOLAS, Arvil Philipp A.",
  "NOVERO, Brian DS.",
  "PAGAYATAN, Alfred T.",
  "PALINES, Erwin B.",
  "PANGILINAN, Beverly F.",
  "PARONG, Joel Joselito G.",
  "PASATIEMPO, Herlyn L.",
  "PASION, Paul Emerson M.",
  "PEREZ-FERRER, Ruby C.",
  "PORTUGAL, Russel P.",
  "PY, Ailyn S.",
  "QUANICO, Jr. Leonardo B.",
  "QUINSAYAS, Prima Jesusa B.",
  "RAMOS, Lesalie M.",
  "RAYA, Brando Ray P.",
  "REYES, Mary Ann L.",
  "RIVERA, Dante Y.",
  "RIVERA, Jonah P.",
  "RONQUILLO, Victor John Paul H.",
  "ROSALES, Rosario L.",
  "SABER, Raya Avariza V.",
  "SALVADOR, Noel N.",
  "SALVANERA, Christian Joyce P.",
  "SAMONTE, Erwin Jonas A.",
  "SAN JUAN, Ernesto C.",
  "SANTOS, Agnes B.",
  "SIAPNO-CAGUNGAO, Alma E.",
  "SILO, Jr. Benjamin H.",
  "SISON, Aireen D.",
  "SUAREZ, Juan Alfonso D.",
  "TAN, Ma. Cecilia S.",
  "TENG, Bavilyn C.",
  "TORREGOSA, Jonell M.",
  "TORRES-ELACION, Chares Marie R.",
  "TUMANENG, Felix Jasper DC.",
  "VALENZUELA, Cyrus Paul S.",
  "VILLANUEVA, Emily Kristine C.",
  "VILLASERAN, Joel N."
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