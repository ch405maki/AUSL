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
                The 2002 Bar Examinations Passers
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
    "ANG, Ronald S.",
    "AQUINO, Raymundo R.",
    "ATENCIA, Arturo V.",
    "BALAYON, Joy C.",
    "BALINA, Jing Oliver A.",
    "BALMES, Erickson H.",
    "BELEY, Francisco M.",
    "BERTULFO, Catherine E.",
    "BRILLANTES, Jose Paulo I.",
    "BUENVIAJE, Egbert Fernand S.",
    "CAJUCOM, Raymond M.",
    "CASTILLO, Teresita Ivanessa M.",
    "CIUDADANO, Anelyn C.",
    "CORTES, Cenalyne F.",
    "CUETO, Rockefeller G.",
    "DASIG, Clifford B.",
    "DE CASTRO, John Ephraim L.",
    "DIAZ, Fernando M.",
    "DUQUE, Noel L.",
    "GARCIA, Christian M.",
    "GARCIA, Christopher S.",
    "GARCIA, Noelito L.",
    "GARDUQUE, Leonicia B.",
    "GERONIMO, Giselle Marie S.",
    "HILARIO, Dulce G.",
    "JUANENGO, Jeffrey P.",
    "LAO, Leonora P.",
    "LASERNA, Marko S.",
    "MACHACON, Zenamar Justicia L.",
    "MANONGSONG, Roy R.",
    "MASANGKAY, Mary Joyce A.",
    "NARCISE, Ma. Karen Concepcion S.",
    "PANLILIO, Bervelin S.",
    "PANSACOLA, Carmelino F.",
    "PARRA, Glenn B.",
    "PASAMONTE, Jasper T.",
    "PEÑA, Miguel Antonio C.",
    "POTATO, Albert Gregory Y.",
    "REAL, Michael F.",
    "ROCO, Robbie Pierre M.",
    "RODILLAS, Ronnie B.",
    "SACDALAN, Dalisay V.",
    "SAMULDE, Rosario V.",
    "SANCHEZ, Francis James M.",
    "SANTOS-DE LUMEN, Jennifer A.",
    "SUBIA, Sharleen P.",
    "TABLANG, Cynthia Marie R.",
    "TAN, Ronald August L.",
    "TORNO, Ma. Flordeliza R.",
    "TUAZON, Ma. Victoria R.",
    "VILLANUEVA, Garry S.",
    "YUSINGCO, Enrico LL.",
    "YUSINGCO, Michael Henry LL.",
    "ZARAGOSA, Zach L."
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
  