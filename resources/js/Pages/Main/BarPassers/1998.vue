<template>
    <div class="relative overflow-x-auto py-8 ">
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
                The 1998 Bar Examinations Passers
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
    "ABAS, Jeffrey James C.",
    "AGBAYANI, Dolores B.",
    "AGUILAR, Jerry A.",
    "ALMONIDOVAR, Romulo F.",
    "ALMONTE, Raymund Oliver",
    "ALVOR, Gay Nadine P.",
    "ANCHETA Jr., Restituto M.",
    "ARABIT, Ferdinand C.",
    "ARIZALA Jr., Floresto P.",
    "ATIENZA, Mary Gale A.",
    "AUSTRIA, Rowena B.",
    "BARCELLANO, Vimar M.",
    "BARLONGAY, Joseph Randolph",
    "BENITO, Analyn S.",
    "BERNABE Jr., Victor F.",
    "BOTE, Maria Katrina C.",
    "BRINGAS, Jesus Maria James",
    "BUENA, Maria Rowena S.",
    "CARONAN Jr., Engelbert C.",
    "CASTRO, Oliver C.",
    "CERRADA, Jennifer E.",
    "CINCO, Chester Arturo D.",
    "CLOMA, James Francis O.",
    "CO, Dennis B.",
    "COBARRUBIAS-RABUYA, Melva",
    "CORTES JR., Pedro U.",
    "CUETO, Marcian Noby J.",
    "DADULLA, Marissa D.",
    "DAMOT JR., Generoso O.",
    "DANTES, Nenita A.",
    "DE GUZMAN, Susana T.",
    "DELA ROSA, Liza S.",
    "DE VERA, Wallen R.",
    "DEL VALLE, Farah H.",
    "DELA CRUZ, Golda Victorina A.",
    "DICCION, Mary Ann C.",
    "DULIG, Ma. Lorelei Andrea C.",
    "ESTRELLA, Joseph Theodore D.",
    "EVANGELISTA, Rennet D.",
    "GABRILLO, Roderick John P.",
    "GARCIA, Anna Maria Angela V.",
    "GATICALES, Venus T.",
    "GOROSPE, Gildo E.",
    "HERNANDEZ, Joanne G.",
    "IGNACIO, Ronald D.",
    "ILAS, Ronald Renitz V.",
    "LADIAO, Angeline T.",
    "LALIA, Ansharey S.",
    "LAT, Divina Gracia B.",
    "LAUCHENGCO, Maria Cecilia S.",
    "LERUM, Jenny F.",
    "LIBARIOS, Arcedel I.",
    "LIZARDO, Efren C.",
    "MACASAET, Donald M.",
    "MANALO, Neil J.",
    "MANGABAT, Alan A.",
    "MARTINEZ, Eleuper M.",
    "MATTI, Melvin A.",
    "MAYO, Philip A.",
    "MEDINACELLI, Nora B.",
    "MENDOZA, Ramon Chito R.",
    "MONTESA II, Jacob M.",
    "NATIVIDAD, Roberto Michael A.",
    "OCHAVILLO, Zomer A.",
    "OLALIA, Cherry Lyn G.",
    "ONG, Antonio A.",
    "ORCEO, Reynante B.",
    "ORPILLA, Marissa F.",
    "PACIS, Vimka Bernadette S.",
    "PANGANIBAN JR., Porfirio D.G.",
    "PASCUAL, Angelica G.",
    "PIMENTEL, Vener B.",
    "PLACIDES, Joselito L.",
    "PUTONG, Joel Angelo E.",
    "RABUCO III, Benjamin Irineo Jude F.",
    "RADAZA, Kenneth C.",
    "REYES, Juan Marcos O.",
    "RILLO, Elmer Cris I.",
    "RIVERAL, Ferdie Esperidion D.",
    "ROS, Jesus Antonio Z.",
    "SALANGA, Amilia A.",
    "SALLAN, Arlan L.",
    "SAN PEDRO, Byron G.",
    "SANCHEZ, Marichar B.",
    "SATO, Cecile A.",
    "SISON, Jorescel S.",
    "SORIANO, Marsabello Jose D.",
    "TACORDA, Jerome Norman M.",
    "TAN, Fidela M.",
    "TANJUATCO, Eduardo P.",
    "TANJUTCO, Ryan L.",
    "TOMAS, Anna Maria V.",
    "TUANO, Eric Joseph Laurence O.",
    "TUMALE, Duane Feliciano M.",
    "VALDEZ, Ramon Miguelito P.",
    "VALMONTE, Thomas M.",
    "VILLAR-LARGO, Ana Rhia D.",
    "YNGSON, Michael Yancy P.",
    "ZUNIGA, Luzviminda R."
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
  