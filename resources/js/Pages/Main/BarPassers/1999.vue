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
                The 1999 Bar Examinations Passers
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
    "ABERGAS, Mayumi M.",
    "ADORA, Marie Elaine C.",
    "AGUIRRE, Edwin M.",
    "ANDAYA, Esmeralda G.",
    "APOSTOL, John Dennis S.",
    "ARANJUEZ, Jr., Bonifacio F.",
    "AZARES, Benthom Paul C.",
    "BEATO, Jr., Jose Bautista",
    "BEDUYA, Gines C.",
    "BONCOLMO, Donabel F.",
    "BUENCONSEJO, Gina A.",
    "BUFFE, Edwin B.",
    "CALAYAG, Stella Marie Sheila G.",
    "CALLUENG, Amelia T.",
    "CALUCAG, Eluisa B.",
    "CANULLAS, Darius M.",
    "CASIN, Ma. Victoria C.",
    "COLOMA, Collins L.",
    "CORDOVA, Manuel Domingo A.",
    "DAYAG, Desiree V.",
    "DOLOR, Annalyn S.",
    "DUCUSIN, Noel C.",
    "ESTACIO-MONTESA, Rainelda H.",
    "FUNELAS, Karen E.",
    "HOSILLOS, Michael Bon C.",
    "JAO, Allan S.",
    "JOCSON, Allan",
    "JUSTO, Karl Barth D.",
    "LAFIGUERA, Josephine C.",
    "LOVERIA, Jennifer S.",
    "MALANA, Lea T.",
    "MANGAOANG, Jonathan P.",
    "MENDOZA, Amelia Lourdes U.",
    "MILLENDEZ, Jr., Macario F.",
    "MONTESA, IV, Camilo M.",
    "MORAÑA, Alvin S.",
    "ONTALAN, Orven K.",
    "PANGANIBAN, Emerita M.",
    "PASCUAL, Eleuterio A.",
    "PEREZ, Jude John F.",
    "PEÑARANDA-SALLAN, Carmen Dee M.",
    "PULMA, Dennis E.",
    "RODRIGUEZ, Von F.",
    "SAN PEDRO, Voltaire G.",
    "SANTOS, Ma. Julieta C.",
    "SEGUNDO, Dino Martin W.",
    "SUBONG, Jr., Gregorio P.",
    "TALBAN, Paulo A.",
    "TAN, Jasmin U.",
    "TIERRA, Jr., Florenio E.",
    "TURCAL, Cherry Ann C.",
    "VILLAFLOR, Dale Michael T."
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
  