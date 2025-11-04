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
              The 2011 Bar Examination Passers
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- 3rd Placer - Full Width Centered Row -->
          <tr>
            <td colspan="3" class="px-6 py-8 text-center">
              <div class="space-y-2">
                <div class="text-3xl font-bold text-official-purple-800 tracking-wide">Cherry Liez O. Rafal-Roble</div>
                <div class="text-xl font-semibold text-official-purple-700 italic">3rd Placer</div>
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

// Regular passers only (excluding the placer)
const allNames = [
  "ABAD, Cernick S.",
  "ABAYON, II, Harlin Gleeperf J.",
  "ABIANG, Rio Nila L.",
  "ABRAGAN, Scarlette Rose C.",
  "AGUISANDA, Angelica Socorro A.",
  "AKOT, Shaun Cary M.",
  "ANG, Joseph Y.",
  "ANGULO, Belinda G.",
  "AURE, Gary C.",
  "AUSTRIA, Vienna Maria R.",
  "AZORES-LINA, Rhodora A.",
  "BANIQUED, Jr. Angel M.",
  "BERNARDO, Michelle G.",
  "BOADO, Romina E.",
  "BOLONG, Marie Diane O.",
  "CALIMAG, Erinne Ann B.",
  "CATRE, Joan Wren S.",
  "CAWILAN, Maria Cecilia A.",
  "CHENG, Roy E.",
  "COLLANTES, Anna Consuelo V.",
  "DACANAY, Jan Jacob Z.",
  "DAGDAGAN, Ma. Filipinas E.",
  "DE GUZMAN, Raul SJ.",
  "DE LEON, Jr. Bernardo V.",
  "DE VERA, Sue Ann, A.",
  "DELA CRUZ, Aimee Rose D.G.",
  "DELA CRUZ, Jr. Marcos. F.",
  "DELOS REYES, Voltaire Van L.",
  "DELOS SANTOS, Carlo Angelo O.",
  "DIMATATAC, Christopher S.",
  "DOMINGO, Mary Emilene T.",
  "DONES, Jenny Anne T.",
  "DURAN, Jensen Marie R.",
  "ENGO, Katrina E.",
  "ESCOBEDO, Revsee A.",
  "ESCUETA-BONGATO, Cherry Ann E.",
  "ESQUIVEL, Lady Lanie C.",
  "ESTRADA, Karen Mae B.",
  "FABIE, Carlisle Marie Anselyn M.",
  "FANDIALAN, Maria Adella L.",
  "FRANCISCO-SIMBILLO, Rebecca S.",
  "GACAYAN, Jason Roland P.",
  "GALAROSA, Gia Joy G.",
  "GALAS, Madonna G.",
  "GALLO, Arnie Joy G.",
  "GARCIA, Jane Hazel Marie S.",
  "GATUS, Norman P.",
  "GIANAN, Virgilio L.",
  "HELMUTH, Hazel L.",
  "HERNANDEZ, Ramon Gerard S.",
  "HERRERA, Joey V.",
  "HERRERA, Nicole L.",
  "ISABEDRA, Gilbert I.",
  "ISLA, Fatima Ann S.",
  "JAWARI-AGUSTIN, Liberty L.",
  "JOVELLANOS, Kevin Lee Z.",
  "LAJARA, Soliman B.",
  "LEGASTO, Vanessa G.",
  "LINA, Philip, M.",
  "LOPEZ, Minerva F.",
  "LUCIO, Ma. Rosanna C.",
  "LUGOD, Lorraine T.",
  "MADDARA, Robert R.",
  "MALONDA, Michael B.",
  "MANALILI, Jorge Vincent G.",
  "MARQUEZ, Emmanuel D.",
  "MATIGNAS, Jr. Ramon A.",
  "MENOR, Edward M.",
  "MONES, Johann Patrick C.",
  "NARVAEZ, Joanna Maries V.",
  "NAVALES, Kristopher A.",
  "NAVARROZA, Ghel C.",
  "NERI, May Clemence C.",
  "NICOLAS, Maylene M.",
  "ONIDA, Carmen Rosario I.",
  "OPULENCIA, Charissa Eloisa Julia R.",
  "PAMARAN, Dean Ace A.",
  "PARIS, Reynaldo F.",
  "PASAMBA, Roberto V.",
  "PATOC, Alex A.",
  "PATULOT, Juliet N.",
  "PELAGIO, Danilo P.",
  "PEÑA, Jr. Manuel P.",
  "PEREZ-VILLAGOMEZ, Jocelyn E.",
  "PINEDA, Billy Joel M.",
  "REBUELTA, Josef June Z.",
  "RECIO, James Andrew N.",
  "REGALADO, Julie Ann B.",
  "RELUNIA, Cirenne Mei M.",
  "REYES, Earl Alfred B.",
  "REYES, Robert Christopher F.",
  "RODULFO, Michael Ian F.",
  "RODULFO, Jr. Oliver S.",
  "ROMAN, Vernice Lauren S.",
  "ROMANO, Joseph G.",
  "RUIZ, Flerida G.",
  "RUIZ, Roviric M.",
  "SAN JOSE, Tiara Marie J.",
  "SOLIS-GARCIA, Maria Myren S.",
  "SUAREZ, Gilbert T.",
  "SY JUCO, Mary Angeline E.",
  "TALLADA, Jr. Cornelio R.",
  "TAMAYO, James Jules B.",
  "TEJADA, Gracielle M.",
  "TEJANO, Francis John L.",
  "TENORIO, Cris P.",
  "TESALONA, Michelle Anne C.",
  "TIANELA, Noel P.",
  "TINGCHUY, Azenith B.",
  "TORNO, Ricardo Luis M.",
  "TURGANO, Samuel Rufino J.",
  "TURLA, Zandra A.",
  "UMALI, Melvin Niño A.",
  "URRIQUIA, Joel C.",
  "VALDERRAMA, Nico B.",
  "VARGAS, Sheryl I.",
  "VICTA, John Paul Allen M.",
  "VILLA, Antoniña P.",
  "VILLANUEVA, Maria Margarita M.",
  "VILLAR, Benedicto C.",
  "ZAMORA, Maria Regina C.",
  "ZUÑIGA, Joseph Brian R."
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