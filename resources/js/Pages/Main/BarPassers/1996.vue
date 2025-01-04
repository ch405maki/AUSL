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
              The 1996 Bar Examinations Passers
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
  "ACOSTA, Rosemary U.",
  "AGABAS, Tyrona D.",
  "ALANO, Juan Gabriel H.",
  "ALFORTE, Seyerino V.",
  "ALMAZAN, Basilio JR., C.",
  "ALVAREZ, Marites D.",
  "ANDRESAN, Andrel A.",
  "ARAPON, Christhoper B.",
  "ARRIESGADO, Nancy C.",
  "ARRIESGADO, Galicano Jr., M.",
  "ASPIRAS, Augustus Caesar C.",
  "ASTILLERO, Lito B.",
  "ATANACIO, Anna Michelle C.",
  "ATIENZA, Noel Y.",
  "BACOLING, Estrella D.",
  "BAUSAS, Ramon I.",
  "BELARMINO, Jose Jobel V.",
  "BUNDAC, Lydia A.",
  "CABRERA, Roberto III P.",
  "CAPILI, Deborah R.",
  "CARAG, Jesusa L.",
  "CASINO, Amador Jr., P.",
  "CASTILLO, Manuel Jr., J.",
  "CHAN-LUGAY, Peter",
  "CONCEPCION, Benjamin L.",
  "CUNA, Juan Miguel T.",
  "DAYCO, Froilan S.",
  "DE GUZMAN, Edgardo R.",
  "DE VERA, Eloisa B.",
  "DE OCAMPO, Deo B.",
  "DUQUE, Zalibeth L.",
  "ESPA, Gonzalo S.",
  "GAITE, Clarence Fernando R.",
  "IMPERIAL, John Giseiher F.",
  "JAMSANI, Rohermia J.",
  "LEE, Richard C.",
  "LEONARDO, Oliver O.",
  "LOREZ, Cesar T.",
  "LUCERO Manuel T.",
  "LUSTERIO, Ramon C.",
  "MATABANG, Peter Paul A.",
  "MISLOS, Rosalyn D.",
  "OCO, Atehna S.",
  "OGENA, Yolanda U.",
  "OLIVAS, Maria Cecelia",
  "ONA, Ramoncito M.",
  "PARDINAS, Eric I.",
  "PE, Joel, U.",
  "PIEDAD, Ernesto A. Jr.",
  "PONCE, Tagumpay B.",
  "PRECLARO, Armando R.",
  "QUEBRAL, Maria Elena",
  "RABUYA, Elmer T.",
  "REYES, Arles Tristan A.",
  "RODRIGUEZ, Felix Jr., B.",
  "ROQUE, Carliot M.",
  "SAGUIL, Eleonor C.",
  "SALAZAR, Henry B.",
  "SALIDONG, Danilo F.",
  "SALLE, Karina R.",
  "SANDOVAL, Shy Marie C.",
  "TABILAS, Ederlino U.",
  "TALDE, Alwin C.",
  "TORALLO, Elias A Jr.",
  "TRISTE, Elmo Stephen P.",
  "VELOSO, Neil Anthony B.",
  "VILLALON, Vivian V.",
  "YBANEZ, Slegfred A."
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
