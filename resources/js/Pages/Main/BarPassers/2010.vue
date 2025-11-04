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
              The 2010 Bar Examinations Passers
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- 3rd Placer - Full Width Centered Row -->
          <tr>
            <td colspan="3" class="px-6 py-8 text-center">
              <div class="space-y-2">
                <div class="text-3xl font-bold text-official-purple-800 tracking-wide">Paolo Carlo C. Tolentino</div>
                <div class="text-xl font-semibold text-official-purple-700 italic">3rd Placer</div>
              </div>
            </td>
          </tr>

          <!-- 10th Placer - Full Width Centered Row -->
          <tr>
            <td colspan="3" class="px-6 py-8 text-center">
              <div class="space-y-2">
                <div class="text-3xl font-bold text-official-purple-800 tracking-wide">Darren L. Salipsip</div>
                <div class="text-xl font-semibold text-official-purple-700 italic">10th Placer</div>
              </div>
            </td>
          </tr>

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

// Regular passers only (excluding placers)
const allNames = [
  "ABUZO, James M.",
  "ADRIATICO, Maria Clarissa N.",
  "ADVINCULA, Margaux A.",
  "AGNO, Regina Domini L.",
  "ALBARICO, Allesandra Fay V.",
  "ALBURO, Alvin L.",
  "ALCANTARA, Rina C.",
  "ANG, Noel C.",
  "AUSTRIA, Katherine M.",
  "BACSAL, Eric Allan E.",
  "BALAO, Edward Vincent P.",
  "BENITEZ, Lovelle B.",
  "BUEN-MERENCILLA, Paula Michelle O.",
  "BUSTONERA, Chito Noel D.",
  "CABUDOC, Edsel R.",
  "CAMPOS, Rosalinda G.",
  "CASPE, Ma. Jesusa D.",
  "CRUZ, Eric C.",
  "DE CASTRO-BAQUIRAN, Cristine A.",
  "DEL BARRIO-ALCANSE, Franchesca L.",
  "DEL CAMPO, Charisse Kay J.",
  "DEL ROSARIO, Richard M.",
  "DIONISIO, Emmylou M.",
  "EMATA, Sheila Marie P.",
  "ESTANISLAO, Jr. Rizalino C.",
  "GARCIA, Aristeo Franklin M.",
  "GONZALES-DARADAL, Abigail M.",
  "HUMANGIT, Maria Carmen Hazel N.",
  "ILO, Cecille Marie D.",
  "ISON, Jayson Jay P.",
  "JAVELOZA, Eric B.",
  "LANDICHO, Alvin B.",
  "LAYGO, Jr. Hospicio I.",
  "LIM, Ruth Katherine K.",
  "LIPAR, Mark Anthony H.",
  "LOPEZ, Lew Carlo C.",
  "LUCAS, Margie Joy F.",
  "MALIWAT, Anselma P.",
  "MALLARI, Ianne Joy R.",
  "MARASIGAN, Cyril G.",
  "MARIANO, Maria Antoniette V.",
  "NAPAY-LITUSQUEN, Jean S.",
  "OLA, Winnie Fred C.",
  "PADLAN, Jay Vincent S.",
  "PAGDANGANAN, Joeffrey G.",
  "PANELO, Jr. Salvador Paolo",
  "PLETE, Marianne P.",
  "PULA, Sahlee T.",
  "RAÑESES, Ben John B.",
  "REYES, Alex Miguel P.",
  "RODRIGUEZ, Christian Patrick S.",
  "SALISE, Rhys Hywel N.",
  "SAN BUENAVENTURA, Maidy S.",
  "SAN JUAN, Sara Jei L.",
  "SARAUM, Michelle Kristine D.",
  "SARIA, Eva Christine I.",
  "SARMIENTO, Jr. Conrado R.",
  "SEBIDO, John Paul L.",
  "SORIANO, Karl William Louise L.",
  "STA.ANA, Erwin D.",
  "TABIRARA, Glacy S.",
  "TADENA, II Reuben A.",
  "TAVERNER, Marianne S.",
  "VEHEMENTE, Paul R.",
  "VILLARIN, Erwin Glenn Q.",
  "VILLEGAS, Jan Freeman C.",
  "ZAMORA, Fatima Anne C."
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