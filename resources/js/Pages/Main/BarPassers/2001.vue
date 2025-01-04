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
                The 2001 Bar Examinations Passers
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
    "ABICHUELA, Rodel V.",
    "ACLAN, Marco Rodel G.",
    "AGATEP, Claudette L.",
    "ALMERO, Marlon Q.",
    "ALONZO, Janijay B.",
    "ARAGO, Franco Paulo R.",
    "ASTIVE, JR., Josue O.",
    "AVELINO, Christopher Edward R.",
    "BALLESTEROS, David L.",
    "BANATAO JR., Rodolfo M.",
    "BARTE, Jovito T.",
    "BEJER, Mario DC",
    "BELANDRES, Jesus Christopher PB.",
    "BELTRAN, Ma. Jozzenne Claire M.",
    "BELTRAN, Remous A.",
    "BERNAL, Karen T.",
    "BERNAL, Marissa S.",
    "BROTO, Marlonfritz B.",
    "BUTLER, Lucy L.",
    "CABAÑES, Cesar S.",
    "CABRERA, William V.",
    "CANLAPAN, Jeffrey Manuel G.",
    "CAPULE, Rodel V.",
    "CARREON, Kristine Jennifer E.",
    "CHAVEZ, Efren R.",
    "CHIPECO, Justin Marc SB.",
    "CORONADO, Manolito B.",
    "CORPUZ JR., Primitivo M.",
    "CORTEZ JR., Salvador R.",
    "DANGAZO, Benito V.",
    "DE GRANO JR., Romulo L.",
    "DE LEON, Ma. Rita Cecilia C.",
    "DOCTOR, Judy Anne E.",
    "DOMINGO, Jesus Gabriel C.",
    "EGAY, Emma C.",
    "ESPONILLA, Ritche I.",
    "ESTOLATAN, Joel S.",
    "GADDI, Carolina M.",
    "GADDI, Yvonne A.",
    "GANHINHIN, Carl Mark A.",
    "GO, Mitchel A.",
    "GOMEZ, Edwin B.",
    "GONZALES, Ma. Saniata Liwliwa V.",
    "GUTIERREZ, Roque Rommel R.",
    "HERNANDEZ-FONTILA, Maria Lisa A.",
    "HIGUIT, Ever-Rose Y.",
    "HIPONIA, Marie Jo C.",
    "INCIONG, Roy P.",
    "JANDOC, Cicero B.",
    "LADIOCAN, Glenn R.",
    "LAYGO, Dindo B.",
    "LAZO, Erik C.",
    "LIM, Giovanne T.",
    "LOPEZ, Jerwin J.",
    "LOZADA, Joan Rose F.",
    "LUCAS, Bernardine M.",
    "LUÑEZA, Rick Brian C.",
    "MACAM, Adonis Edgar Angelo A.",
    "MAGBANUA, Saudi A.",
    "MAGCASI, Araceli D.",
    "MAKALINTAL JR., Roberto S.",
    "MANGAHAS, Digna Paulita M.",
    "MANZANERO, Dennis R.",
    "MELLA, Michael J.",
    "MELLA, Ruth Laura A.",
    "MENDOZA, Glecy S.",
    "MIRAFLOR, Rori James Lawrence R.",
    "MORENO, Millicent Dorel A.",
    "NATAÑO, Genielyn S.",
    "NIETO, Marieta E.",
    "NIEVES, Dennis M.",
    "ORDA, Rosario Ester B.",
    "ONG, Daisy S.",
    "ORDEN, Edward Justine R.",
    "PATRIARCA, Marc Anthony C.",
    "PEIG, Robert D.",
    "REBANAL, Roy R.",
    "REYES, Lorna S.",
    "ROCHA, Girlie B.",
    "SANTOS-ORDEN, Madelaine R.",
    "SIQUIJOR, Ma. Jesusa Eleanor P.",
    "SISON, Sheryl E.",
    "TANG, Grace C.",
    "TARLENGCO, Ma. Geraldine K.",
    "TELPO, Romeo T.",
    "TEODORO, Enrile L.",
    "TINDUGAN, Louella L.",
    "TOBIAS, Caroline I.",
    "TUAZON, Nenita DC.",
    "VALDEZ, Juan Victor S.",
    "VALDEZ, Vernon P.",
    "VILLANUEVA, JR., Rodolfo F.",
    "VILLANUEVA, Arvin V.",
    "VILLANUEVA, Glory V.",
    "VILLENA, Vincent L.",
    "VISTA, Anthony Ludalvi A.",
    "VITALES, Cheryl Irene I.",
    "ZAMORA, Reinand V."
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
  