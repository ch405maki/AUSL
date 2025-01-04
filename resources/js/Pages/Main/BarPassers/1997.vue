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
                The 1997 Bar Examinations Passers
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
  
  // Complete list of names
  const allNames = [
    "BRILLANTES, Dennis Nowell D.",
    "CAPULE, Renante R.",
    "CATRAL, Caesar Segundo R.",
    "CLAVERIA, Emily G.",
    "CUEVAS, Cecilia L.",
    "DE VERA, Charina B.",
    "DELA ROSA, Martin Vergel C.",
    "ENCALLADO, Winnie Rose H.",
    "ESPINA, Edmund T.",
    "GARCIA, Josephine C.",
    "LIWAG, Aristotle O.",
    "MACATANGAY, Ana Marita F.",
    "MARION, Robert Victor C.",
    "ORETA, Roy Anthony S.",
    "PERALTA, Sherwin W.",
    "PICAR, Lea Marie S.",
    "REBANAL, Neil George F.",
    "SANTIAGO, Dennis S.",
    "SANTIAGO, Lorna B.",
    "TANIO, Jose A.",
    "VELA, Mary Ann T.",
  ];
  
  // Sort names alphabetically
  const sortedNames = allNames.sort((a, b) => a.localeCompare(b));
  
  // Divide sorted names into three columns
  const divideIntoColumns = (list, columnCount) => {
    const columns = Array.from({ length: columnCount }, () => []);
    list.forEach((name, index) => {
      columns[index % columnCount].push(name);
    });
    return columns;
  };
  
  // Generate columns dynamically
  const columns = divideIntoColumns(sortedNames, 3);
  
  // Get the maximum number of rows for table rendering
  const maxRows = Math.max(...columns.map((col) => col.length));
  </script>
  