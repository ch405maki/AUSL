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
              The 2019 Bar Examinations Passers
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

// Full list of names for 2019 Bar Passers
const allNames = [
  "AGUILAR, Joses Niño G.",
  "AGUILAR-NOCEDA, Cherry Kerr P.",
  "AGUILON, Marie Gene D.",
  "ALARAS, Marichie B.",
  "ALBRECHT, Reinhard Dietrich A.",
  "ALDEZA, Daniel Francis C.",
  "AMBULO, Wenzel Kenn D.",
  "AMPUAN, Kevin John D.",
  "ANDAYA-BORJA, Catherine Mae B.",
  "APOSTOL, Jinny M.",
  "ARCE, Aya M.",
  "ARCE-MARCELINO, Arvie Joy O.",
  "ARCEO, Reginald M.",
  "ARCILLAS, Klarissa U.",
  "ARGUELLES, Anvari F.",
  "ARITCHETA, Mycel C.",
  "ARPIA, Kathleen V.",
  "ARREZA, Jerame A.",
  "AURE, Mark Lester L.",
  "BABALCON, Gee Colleen D.",
  "BAES, Kaye F.",
  "BAGUIOEN, Mark Jacob G.",
  "BALBIN, Veronica Grace S.",
  "BANGCOLA, Ashyanna Alexine Adia Amira-labi A.",
  "BASALLAJE, Jose Bernard V.",
  "BAUTISTA, Mark Joseph T.",
  "BAUTISTA, Roland Dave S.",
  "BERBERABE, Farah Fides T.",
  "BONDOC, Jan Michael A.",
  "BUAQUEN, Aleli C.",
  "BUENAVENTURA, Louben D.",
  "BUENVIAJE, Iñigo R.",
  "BULDA, Ma. Zillah G.",
  "BUTANTAN, Oberly Mae T.",
  "CABARDO, Joime Ann A.",
  "CALIWAN-GASPAY, Cherrylyn A.",
  "CANONIZADO, JR., Edwin M.",
  "CAPELLAN, Glecie Suzanne T.",
  "CASTILLO, Maria Victoria M.",
  "CASTILLO, Miguel M.",
  "CO, Anne Lorraine P.",
  "CREDO, Kenneth Louie R.",
  "CUANAN, Jodelle Chris G.",
  "DAVID, Maria Angelica D.",
  "DE GUZMAN, Joseph Martin A.",
  "DE GUZMAN, Maria Elisa C.",
  "DE GUZMAN, May DL.",
  "DE LEON, Anthony Nash O.",
  "DE LEON, Beatrice Mae C.",
  "DE LOS SANTOS, Katrina Q.",
  "DE TORRES, Rhodylyn B.",
  "DELA CRUZ, Adrian M.",
  "DEMDAM, Abigael S.",
  "DESALISA, Aybel Joice D.",
  "DIAZ, Karen Cadez P.",
  "DIAZ, Kirstie Mae Dianne V.",
  "DOLLESIN, Jouvani I.",
  "DOMASING, Jasreel A.",
  "DUEÑAS, Kevin Lester T.",
  "DULNUAN, Gloria Diana C.",
  "DUQUIATAN, Joel B.",
  "EBAJAN, Ma. Jennielyn Milagros F.",
  "ELUMBA, Fiona B.",
  "ENCARNACION, Rafael Enrico H.",
  "ENRIQUEZ, Flourence Kathrine S.",
  "ENRIQUEZ, Flourence Marie S.",
  "ESCOL, Hanzel Grace",
  "ESPIRITU, Mark Lee B.",
  "ESPIÑO, Rosanna E.",
  "FAJUTAG, Ardy F.",
  "FLORES, Ninna Beatrice S.",
  "FONACIER, Ronald Jay L.",
  "GACUTAN, Marifren C.",
  "GAGATE, Ross Werle Bryan P.",
  "GEMANIL, Sarah Marie S.",
  "GOLEA, Ma. Consorcia A.",
  "GONZALES, Van Angelo G.",
  "GUILING, Asnia G.",
  "INOCENCIO, Mary Frances D.",
  "INOVEJAS, Deurod Joe C.",
  "IRIBERRI, Cyril Ann Q.",
  "JABAL, Joel Malcolm D.",
  "JACOBO, Stephen Rey A.",
  "LASAC, Margarette G.",
  "LAYGO, Erick John Rae M.",
  "LIBRES, Miles M.",
  "LIM, Shalma Mariae M.",
  "LOPEZ, Mischelle A.",
  "LOZANO, Katrina S.",
  "MAGALONG, Jonelle Elline A.",
  "MAQUIRAN, Azalea Marie S.",
  "MARTIN, Angelique Ashley B.",
  "MAYORALGO-ACANTILADO, Maria Remedios C.",
  "MENGUITO, Leo Angelo S.",
  "MIGUEL, Jose Gabriel G.",
  "MOISES, Joseph Bar Paulo V.",
  "MONROYO, Mikael Edward M.",
  "MORALEJO, John Michael E.",
  "MORANO, Pamela Emilia E.",
  "NATIVIDAD, Kalipay Franchesca A.",
  "NEQUINTO, Catherine Jane E.",
  "NONATO, Peter Emil P.",
  "OCAMPO, Rhonald S.",
  "ONGOCO, Katrina Grace C.",
  "ORETA, Samantha Joy H.",
  "ORTIZ, Mirabel Sanchria K.",
  "PACHECO, Raychelle S.",
  "PADLAN, Camille S.",
  "PALABAY, Rana Alyssa M.",
  "PASCUA, Alice B.",
  "PASCUAL, Jennett Marie M.",
  "PEDOC, Enrique G.",
  "PELAGIO, Maria Cecilia M.",
  "QUEZON, Mark Lorenz C.",
  "RABINO, Stefanio Andrenicus A.",
  "RAGILES, John Paul A.",
  "RAMOS, Rexford P.",
  "RIVERA, Juan Rafael G.",
  "SALES, Daryl Matthew A.",
  "SANDOVAL, Anthony B.",
  "SAPON, Fritz G.",
  "SARABUSING, Jeffrey B.",
  "SARMIENTO, Arian Vina L.",
  "SARSOSA, Rochelle Marie S.",
  "SATURNINO, Anjelo D.",
  "SAYSAY, Erick John Paul P.",
  "SICAT, Maricel T.",
  "SIDNEY, Sherryl Wynne B.",
  "SILVA, Marben B.",
  "SILVA-KO, Kecealyn B.",
  "SOLON, Sheila Marie O.",
  "SORIANO, Veronica Regina C.",
  "SUACO, Rod Ryan S.",
  "TUAZON, Danilo A.",
  "VARDELEON, Crizedhen N.",
  "VERMAS, Angel P.",
  "VILLAFLOR, John Paul G.",
  "VILLANUEVA, Charlemae Z.",
  "VILLANUEVA, Jhoeben Bienvenido B.",
  "VILORIA, Hanna Joy S.",
  "YALONG, Eliza Louise G.",
  "YAMAT, Alineth S."
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