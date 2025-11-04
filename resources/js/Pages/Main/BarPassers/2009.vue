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
              The 2009 Bar Examinations Passers
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

// Full list of names for 2009 Bar Passers
const allNames = [
  "ABIBICO, Mona Liza D.",
  "AGUINALDO-BALUYA, Ranelle R.",
  "ALAGAR-BERNARDO, Rowena E.",
  "ALBAN, Beethoven M.",
  "ALVAREZ, Riza Gloria V.",
  "AME, Valentino Alvin C.",
  "BACANI, Philip Jorge P.",
  "BALIÑA, Elsa T.",
  "BAÑARES, Marcus Aurellius M.",
  "BANDONG, Therese Lynn R.",
  "BARENG, Christian P.",
  "BARTOLOME, Ryan Philipp L.",
  "BAUTISTA, Gino Marco P.",
  "BAUTISTA-ALDAVE, Ma. Minerva T.",
  "BILGERA, Ma.Corazon B.",
  "BILLONES, Cherrie Lou H.",
  "BORROMEO, II, Noel T.",
  "BUENVIAJE, Rickson M.",
  "BUSLIG, Jenny Vi B.",
  "CARRASCO-AZUCENA, Maria Bernadette R.",
  "CASTILLO, Chrisgene A.",
  "CHUA, Joana Olivia L.",
  "CLAVERIA, Kathleen Karinina R.",
  "COLAGO, John Paul G.",
  "COLIAMCO, Cherry C.",
  "CONCEPCION, Rowena L.",
  "CORDERO, Antonette B.",
  "DAMASCO, Elmer P.",
  "DAYO, Jesus Frederick D.",
  "DE VILLA, Lezel E.",
  "DELA CRUZ, Lenielyn S.",
  "DELA ROSA, Arnel A.",
  "DIAZ, Ma.Hiyasmin N.",
  "DIAZ, Romano M.",
  "DILLA, Marlon A.",
  "DIMARUCUT, Ivy C.",
  "DIOKNO, Michael William T.",
  "DOBLE, Francis R.",
  "DOMINGO, Katrina Frances M.",
  "ENCINARES, Marife E.",
  "FARAON, Redeemer B.",
  "FAUNI, Peter Joseph L.",
  "FLORES, Erickson A.",
  "GABATO, Vien Lawrence S.",
  "GARCE-MEJIA, Racquel F.",
  "GATCHALIAN, Oliver R.",
  "GENERAL, Marianne C.",
  "GUIANG, Sandra Therese Christine C.",
  "GUZMAN, Carl Stephen A.",
  "HERNANDEZ, Mary Catherine T.",
  "HERNANDEZ, Michael Gerard S.",
  "HOLLERO, Valerie Anne H.",
  "JAVINAR, Donato B.",
  "LABANEN, Argyle Karen M.",
  "LIZASO, Marina Elenita S.",
  "LOBO, Allan C.",
  "LONTOK, Benito M.",
  "LUNA, Hans Roger S.",
  "MARTIN, Marilou C.",
  "MEER, Francis James E.",
  "MONTEZA, Evangeline C.",
  "MORALES, Rhea Joy M.",
  "NAVARRO, F.J. Edmund Jensen S.",
  "OANDASAN, Nelia O.",
  "OGOY-BERNARDO, Sherryl B.",
  "OLAN, Rodolfo M.",
  "PIJO, Jr., Reynaldo M.",
  "PITPIT, Froilan B.",
  "QUILAQUIGA, Sharina C.",
  "QUINTON, Larry M.",
  "RAMOS-TEJADA, Elsie Marie B.",
  "REDOBLE, Luisito D.",
  "REYES, Mary Khristine C.",
  "ROJO, Alejandro N.",
  "ROSALES, Rose Anne P.",
  "SAN DIEGO, Larina DG.",
  "SAN PEDRO, Fraulein B.",
  "SANCHEZ, Jr., Jacinto C.",
  "SANGALANG, Ela A.",
  "SANTOS, Darwin B.",
  "SANTOS, Ryan V.",
  "SARMIENTO, Frances Jeanne L.",
  "SORIANO, Al L.",
  "SUMAGIT, Michael B.",
  "SY, Sherwin S.",
  "TORRES, Maria Melissa G.",
  "TUGADO, Judie Rose P.",
  "VARGAS, Michael George Andrew R.",
  "VILLANUEVA, Elvin B.",
  "VILLANUEVA, Marc A.",
  "WARREN, Luis Anthony K."
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