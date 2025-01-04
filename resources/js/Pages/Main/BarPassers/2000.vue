<template>
    <div class="relative overflow-x-auto py-8">
      <!-- Background Image -->
      <div 
        class="absolute inset-0 z-0 flex items-center justify-center opacity-10"
      >
        <img 
          src="images/alflogo.png" 
          alt="Logo" 
          class="w-1/4 max-w-xs mx-auto"
        />
      </div>
  
      <!-- Table Content -->
      <div class="relative z-10">
        <table class="table-auto w-full max-w-7xl mx-auto border-collapse">
          <thead class="bg-official-purple-800 text-white">
            <tr>
              <th colspan="3" class="px-4 py-4 text-sm sm:text-sm md:text-lg lg:text-xl xl:text-2xl font-extrabold text-center uppercase">
                The 2000 Bar Examinations Passers
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <!-- Dynamically Render Rows -->
            <tr 
              v-for="(row, rowIndex) in maxRows" 
              :key="rowIndex" 
              class="flex flex-wrap md:table-row"
            >
              <td 
                v-for="(column, colIndex) in columns" 
                :key="colIndex" 
                class="w-full px-6 py-4 text-sm leading-6 text-gray-800 md:w-auto"
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
  import { ref } from "vue";
  
  // Full list of names
  const allNames = [
    "ADRICULA, Jr. Beltran D.",
    "ALCALA, Noemi B.",
    "ANGELES, Henry S.",
    "ANTONIO, Ellaine C.",
    "AREVALO, III Felipe A.",
    "ATIENZA, Mark Anthony A.",
    "BACORRO, Jean Marie A.",
    "BALDO, Floresinda G.",
    "BARENG, Cherrie Grace P.",
    "BAUTISTA, John Rio A.",
    "BENITEZ, Ermar U.",
    "BERBANO-CONCORDIA, Marie Therese C.",
    "BICOMONG, Voltaire C.",
    "BONOAN-DAVID, Ma. Theresa B.",
    "BROSOTO, Aline B.",
    "BUENVIAJE, Domingo R.",
    "CAABAY, Rigel L.",
    "CABOCHAN, Evangeline C.",
    "CACULITAN, Martin Leonardo G.",
    "CANTORIAS, Mary Jude V.",
    "CAPICOY, Jr. Elpidio M.",
    "CASTILLO, Triven P.",
    "CATURLA, Manelyn E.",
    "COLIFLORES, Aida D.",
    "COMIA, Amor L.",
    "CRUZ-CABATE, Elba S.",
    "CUEVAS, Joseph Hamilton M.",
    "DE GUZMAN, Raymond A.",
    "DE SAGUN, Reynaldo M.",
    "DEDUMO, Jinky P.",
    "DELA VEGA-MANUEL, Soledad",
    "DIZON, Melchor B.",
    "DURAN, Patrick F.",
    "ERA, Edgardo O.",
    "ESGUERRA, Bernadette O.",
    "EVANGELISTA, Billy C.",
    "FLAMIANO, JR. Francisco R.",
    "FONACIER, Michael C.",
    "FRIVALDO, Sannah B.",
    "GAN, Michael M.",
    "GATAPIA, Jo Paul B.",
    "GEMPIS, Jr., Luch R.",
    "GIMENEZ, Christopher N.",
    "GOMEZ, Ronaldo G.",
    "INES, Auresana B.",
    "JARAMILLA, Leah L.",
    "JIMENEZ, Joel S.",
    "LAGERA, Melanie M.",
    "LAGMAN, Edcel Greco Alexander B.",
    "LANGCAY, III, Tristan Armando F.",
    "LLAMZON, Marilyn L.",
    "LOZADA III, Benjamin P.",
    "LUCERO, Agnes Alexis A.",
    "MALLARI, Catherine Joy R.",
    "MANUEL, Erwin T.",
    "MARFIL, Cyril D.",
    "MELLIZA, Maria Rocelle M.",
    "PASION, Rumar D.",
    "PASION, Ruth S.",
    "PEREZ, Jonathan Q.",
    "PIMENTEL, Melanie P.",
    "PUNONGBAYAN, Ian Lee P.",
    "QUIETA, Resurreccion C.",
    "REYES, Darwin S.",
    "SALVADOR, Rogelio A.",
    "SANTOS, Eduardo P.",
    "SANTOS, Roberto Bernardo",
    "SEPARA, Victoria P.",
    "SERRANO, Basilia S.",
    "SORE-ROMANO, Maria Aurora P.",
    "SORREDA, Arnolfo P.",
    "SUYAO, Joffrey M.",
    "TEZON, Michael Victor C.",
    "TY, Allan U.",
    "UY, Florabelle U.",
    "VARGAS, Fara G.",
    "VILLAFLOR, Rolando D.",
    "ZARATE, Randy P."
  ];
  
  // Sort names alphabetically
  const sortedNames = allNames.sort((a, b) => a.localeCompare(b));
  
  // Divide the sorted names into three columns
  const divideIntoColumns = (list, columnCount) => {
    const columns = Array.from({ length: columnCount }, () => []);
    list.forEach((name, index) => {
      columns[index % columnCount].push(name);
    });
    return columns;
  };
  
  // Generate columns and calculate the maximum rows for rendering
  const columns = divideIntoColumns(sortedNames, 3);
  const maxRows = Math.max(...columns.map((col) => col.length));
  </script>
  