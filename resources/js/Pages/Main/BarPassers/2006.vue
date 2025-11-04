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
              The 2006 Bar Examinations Passers
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Dynamically Render Rows -->
          <tr v-for="(row, rowIndex) in maxRows" :key="rowIndex" class="flex flex-wrap md:table-row">
            <td
              v-for="(column, colIndex) in columns"
              :key="colIndex"
              class="w-full px-6 py-4 text-sm leading-6 text-gray-800 md:w-auto text-left md:text-left"
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

// Full list of names for 2006 Bar Passers
const allNames = [
  "ADVIENTO, Lorna Chloe E.",
  "ALBANO III, Ed Vincent A.",
  "AQUINO, Dianne Ruth B.",
  "ARCIAGA, Carol R.",
  "ASUNCION, Maricel Lilled R.",
  "BALISI, Abigail F.",
  "BARREDO, Marianne Evangeline C.",
  "BARRUN, Jessica A.",
  "BASILIO, Noreen T.",
  "BATUA, Asnaira M.",
  "BAUTISTA, Dean Voltaire A.",
  "BAUTISTA, Gladys G.",
  "CAPARAL-LLENA, Ritchel B.",
  "CASTAÑEDA, Sherwin Prose C.",
  "CASTILLO, Randolf C.",
  "CAYANAN, Maria Amalia T.",
  "CHAVEZ, Ma. Eloiza T.",
  "CRUZ, Peachy T.",
  "CURA, Rubin G.",
  "DE ASA, Napoleon A.",
  "DE VERA, Fernando M.",
  "DELA CRUZ, Percyveranda A.",
  "ENAJE, Patrick E.",
  "ESTRADA, Jhonelle S.",
  "FACTORAN, Twinkle C.",
  "FAJARDO, Jr. Danilo B.",
  "FOLLOSCO, Virgilio R.",
  "GACES, Indira Diosa L.",
  "GADIT, Jr. David T.",
  "GARZON, Khaddafy Ferdinand C.",
  "GASPAN, Donna Villa M.",
  "GERONIMO, Dorothy M.",
  "GIOLAGON, Alvin G.",
  "GRACILLA, Noel Carlo G.",
  "GUERRERO, Michael Vernon M.",
  "GUZMAN, Nadine A.",
  "HERNANDEZ, Jennifer P.",
  "JAVIER, Jane T.",
  "JAVIER, Sir Jonas Matias L.",
  "LAYSON, Weomark Ryan G.",
  "LEVARDO, Frederick S.",
  "LIM II, Kirin DP.",
  "LOCK, Roberto Belarmino M.",
  "LUDOVICE, Ian Vincent S.",
  "MADARANG, Jasmine A.",
  "MAJAROCON, Jeanette P.",
  "MALAGA, Elben Marlon L.",
  "MAMAUAG, Jenny Beth T.",
  "MANALO, Aileen SJ.",
  "MANAUIS, Charisma Reyda Y.",
  "MANCOL, Gefer R.",
  "MANGUBAT, Alvin C.",
  "MANN-ALCAIDE, Rowena B.",
  "MANUEL, Romulo F.",
  "MARCO, Deo L.",
  "MARIANO, Ronaldo C.",
  "MONTES, Sonia Maria C.",
  "NAZAL, Monina Jane S.",
  "ORTEGA, Emelyn C.",
  "PABELLAR, Arnel F.",
  "PALILEO, Niña Paola O.",
  "PALMA-LABAY, Maria Aurora E.",
  "PEREZ, Erick J.",
  "PINPIN, Sherilyn V.",
  "POTOT, Vinalyn M.",
  "PULIDO, Larliza B.",
  "PUNO, Dennis B.",
  "QUITALIG-CABANGUNAY, Luithe Lovella C.",
  "QUIÑO, Mary Melanie H.",
  "RAMOS, Ma. Cristina A.",
  "REGADIO, Ethel B.",
  "REMUDARO, Florencio B.",
  "ROA, Myra Fiera F.",
  "ROBLES, Rey Anthony M.",
  "RODRIGUEZ, Charito F.",
  "ROSALES, Nizer C.",
  "RUIZ, Charmaine C.",
  "SAMSON, Jer B.",
  "SANTAYANA Jr., Sesinando S.",
  "SANTIAGO, John Mark C.",
  "SANTOS IV, Glicerio P.",
  "SEPARA, Fredrick G.",
  "SOBREVIGA-RETANAL, Minerva A.",
  "SONGCUAN, Sarrah Jane S.",
  "SORIANO Jr., Carlito C.",
  "SORIANO, Christine A.",
  "SOTTO, Gerald P.",
  "STO. DOMINGO, Ramon Luis C.",
  "TABLIZO, John Ivan B.",
  "TALENS, Jennifer C.",
  "TAPLAC, Shealtiel Gay T.",
  "TATAD Jr., Reynulfo C.",
  "TORRES, Kristoffer John A.",
  "TRIA TIRONA, Agustin Tomas C.",
  "TUQUERO, Sherwin N.",
  "VALLEDOR, Marietta M.",
  "VILLA, Reina M.",
  "VILLANUEVA Jr., Antonio C.",
  "VILLOSTAS, Roderick M.",
  "YANGO, Michelle Anne F.",
  "YAO, Anne Marie U."
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