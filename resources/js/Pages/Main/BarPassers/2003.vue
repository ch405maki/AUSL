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
                The 2003 Bar Examinations Passers
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <!-- Dynamically Render Rows -->
            <tr v-for="(row, rowIndex) in maxRows" :key="rowIndex" class="flex flex-wrap md:table-row">
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
    "AGACITA, Jr. Romeo E.",
    "AGBAYANI, Rommel Chrisante F.",
    "AGUILAR, Jr. Jose P.",
    "AGUIRRE, Ma. Luisa L.",
    "ALAMADA-MAGAYANES, Sharon M.",
    "ALONDAY, Pearl Joly A.",
    "APARICIO, Romel A.",
    "AQUINO, Robertson R.",
    "BABANO, Wilfred S.",
    "BARRION, Zennia C.",
    "CABASUG, Elegio D.",
    "CADER, Sittie Phamy G.",
    "CALINGASAN, Karlo L.",
    "CASTRO, Joselito C.",
    "CAYABYAB, Odgie C.",
    "CHUN, Ian Steven C.",
    "CLEMENTE, Clemente M.",
    "COTAY, Cathleen Elizabeth L.",
    "DELA CRUZ, Remelito M.",
    "DE LEON, Sheila B.",
    "DELMORO, Joebil B.",
    "DEOCAMPO, Leo B.",
    "DIZON, Clarence S.",
    "DUMBRIQUE-VILLAVICENCIO, Rose Anne B.",
    "DY, Dennis L.",
    "FAJARDO, Jr. Agapito F.",
    "FAJARDO, Leilani R.",
    "FAJARDO, Rey Christopher D.",
    "FALCOTELO, Rochelle Ann L.",
    "FULTON, Kenneth P.",
    "GALICIA, Noel M.",
    "GAMBOL, Jessica A.",
    "GAYAPA, Kristine Marie Therese O.",
    "GENESELA, Cliff Richard E.",
    "GIANAN JR. Fredeswindo A.",
    "GOLEZ, Norman T.",
    "GRIMALDO, Rodel R.",
    "GUERZON, Elmer Joseph R.",
    "GUILLERMO, Adela S.",
    "GUILLERMO, Maria Vida M.",
    "HERNANDEZ, JR. Arsenio M.",
    "IROG, Arnel C.",
    "JACOB, Louella C.",
    "JAMORA, Alfred Joseph T.",
    "JIMENO, Jennifer A.",
    "KATIGBAK, George S.",
    "LABO, JR. Eduardo L.",
    "LAVARIAS, JR. Lope A.",
    "LILAGAN, Freddie V.",
    "LIWANAG, Geraldine C.",
    "MACALDO JR. Felipe E.",
    "MACARAIG, Allan Dexter P.",
    "MACARAYA, JR. Alan Felix J.",
    "MACARINE, Ingemar P.",
    "MADELAR, Ma. Ramona P.",
    "MANAIG, Michelle C.",
    "MARASIGAN, Arth Jhun A.",
    "MARIANO, Rizaldy C.",
    "MARTINEZ, Michelle D.",
    "MELLA, Danny J.",
    "MIRABUENO, Marion Gay C.",
    "MONTEFALCO, JR. Romeo M.",
    "NAIG, Franklin A.",
    "NATIVIDAD, Ma. Teresita A.",
    "NAVARRO, Dexter L.",
    "OCAMPO, John Vincent P.",
    "PASCUA, Edward S.",
    "PUNCIA, Maria Alma Corazon H.",
    "RAMA, Lorelee Anne Y.",
    "RAMOS, Regina Paz A.",
    "RAMOSO, Ian P.",
    "REYES, Maria Rehgeis C.",
    "RIVERA, Neil Randy P.",
    "SACRO, Roderick P.",
    "SALGADO, Alwin N.",
    "SALVADOR, Barry Boy A.",
    "SANTILLAN-VISTO, Sta. Cecilia M.",
    "SAYAGO, Felix S.",
    "SIAYNGCO, Jeremy C.",
    "SINGZON, Loralaine S.",
    "SOLIS, Ronald L.",
    "SOMERA, JR. Dencio G.",
    "SUBIERA, Cielita S.",
    "TAGALICUD, Nonilon L.",
    "TALON, Mae Antonnette F.",
    "TAN, Dante E.",
    "TENORIO, Grachielle E.",
    "TOBIAS, JR. Ludovino Joseph Augusto L.",
    "TORRES, JR. Francisco E.",
    "TUAZON-ALBERTO, Cristina T.",
    "ZAPANTA, Jason J."
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
  