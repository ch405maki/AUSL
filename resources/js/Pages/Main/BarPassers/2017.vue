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
              The 2017 Bar Examinations Passers
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
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

// Full list of names for 2017 Bar Passers
const allNames = [
  "AFRICA, Alyssa M.",
  "AGARIN, Conbelyn I.",
  "ALFEROS, John Willie U.",
  "ARNALDO, Fergie L.",
  "ARTURO, Albert S.",
  "ASUNCION, Bobby Ismael T.",
  "BAGUL, Johanna B.",
  "BALBERIA, Benedict C.",
  "BAÑARES, Paul Christian T.",
  "BAUTISTA, Agustin Aristeo F.",
  "BENEDICTO, Miguel Antonio A.",
  "BERNALDEZ, Ruel Benjamin M.",
  "BILLONES, Zandalee R.",
  "BODOTA, Ralph B.",
  "BOLIVAR, May Anne D.",
  "BOTOR, Dominick Adan R.",
  "BUENAVENTURA, Miguel Martin A.",
  "CALUBAYAN, Exzie G.",
  "CALUSA, Peter Paul O.",
  "CAPPAL, Dhanette Jaise S.",
  "CAWAGDAN, Herlene C.",
  "CELES, Ma. Andreah D.",
  "CELESTINO, Luis Z.",
  "CELIS, Jonel Carlo D.",
  "CELON, Chester Aldwin P.",
  "CHUA, Kenwy Jupiter L.",
  "CORDERO, Maria Nastassja G.",
  "CRISOSTOMO, Khiel L.",
  "CURIMAO, V, Paul Vicente E.",
  "DACLES, Deogracios A.",
  "DE BELEN, Joanne Marie G.",
  "DE JESUS-SANCHEZ, Ria Camille M.",
  "DELATADO, Darwin A.",
  "DOMINGO, Mareca F.",
  "ELAURIA, Maria Carlota R.",
  "ESPIRITU, Danica P.",
  "FELICIANO, Luigi Marvic G.",
  "FORMENTO, Sheila Grace A.",
  "FORONDA, Katrine R.",
  "GAYADOS, Steven Mark N.",
  "GIANAN, Sonny, Ii C.",
  "HADJI OMAR, Mubarak D.",
  "HUBAHIB, Michael Francis L.",
  "LILAGAN, Llorente V.",
  "LORETO, Sharlene Paula D.",
  "MALON, Jr., Salip Yang A.",
  "MANACOP, Stephanie Q.",
  "MAPUE, Bernadette A.",
  "MARCO, Jeperson F.",
  "MATEO, Raemond Edward A.",
  "MENDOZA, Jason Rainer M.",
  "MIQUE-SUNIEGA, Gladys Anne V.",
  "OCAMPO, Jenee Monique R.",
  "ORTEGA, Karla Katrina S.",
  "PABILONA, Jocet Consisa R.",
  "PARADO, Joan Ayr O.",
  "PARAGAS, Lean M.",
  "PARREÑO, Antony J.",
  "PAULINO-DAYO, Junevieve M.",
  "PEDREALBA, Cara Krystle B.",
  "PERLAS, Van Regine L.",
  "PIGAO, II, John Socrates G.",
  "POBAR, Aprilyn T.",
  "PRIETOS, Jim Alvien T.",
  "PUYOT, Arjay V.",
  "QUINTO, Vinilla Germina N.",
  "RAMOS, Gabriel Justine T.",
  "RAMOS, Roman Chino A.",
  "REYES, Mikaelo Jaime C.",
  "RUIZ, Jose III R.",
  "SALES-MASANGKAY, Jocelyn R.",
  "SALVADOR, Jessie A.",
  "SAN JUAN, Marjorie A.",
  "SARMIENTO, Madelyn D.",
  "SARMIENTO, Monica M.",
  "SAVELLANO, Jillene C.",
  "SEMBRANO, Hyugi Nicolae C.",
  "SERRANO, Yvette P.",
  "SOLLER, Miguel Sebastian C.",
  "SOTELO-GESELL, Erby Jennifer D.",
  "TORITA, Mar D.",
  "UNCIANO, Jenny Flor C.",
  "VALDEZ, Basill Owen D.",
  "VALONES, Genald M.",
  "VERANO, Marbien L.",
  "VILLANUEVA, Rigel A.",
  "VITO, Jeanette O.",
  "WU, Sandia O.",
  "YU, Frances Ivy D."
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