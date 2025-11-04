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
              class="px-4 py-2 text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold text-center uppercase tracking-wide"
            >
              The 2016 Bar Examination Passers
            </th>
          </tr>
          <tr>
            <th
              colspan="3"
              class="px-4 py-1 text-sm sm:text-base md:text-lg font-semibold text-center italic"
            >
              Hail to the 272 Arellano Lawyers!
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

// Full list of names for 2016 Bar Passers
const allNames = [
  "ABAO, Gennelyn M.",
  "ABAYARI, Maria Lourdes B.",
  "ABRERA, Jayson V.",
  "ABUCEJO, Vincent Tito B.",
  "ADOLFO-MADRID, Alphecca B.",
  "AGUIRRE, Nolaida",
  "ALANO, Erich Justine V.",
  "ALBA, Avvy Cristabelle Z.",
  "ALCAZAR, Jona May M.",
  "ALMADIN, Rachel G.",
  "ALMARIO, Edlyn T.",
  "ALMARIO, Rich L.",
  "ALMERO III, Glicerio S.",
  "AMANTE, Chino Daniel L.",
  "AMBOJIA, Reivin Jed M.",
  "AMORES, Kristtia P.",
  "ANDAYA, Dennis Karl L.",
  "ANDUEZA, Althea Mae A.",
  "APDIAN, Mark Julius P.",
  "APOLO, Peachy Anne C.",
  "APORDO, Mark Christian B.",
  "ARAGON, Leolaida M.",
  "ARAÑAS, Marlon Jerome V.",
  "ARICAYOS, Raiza P.",
  "ASILO, Margielyn Q.",
  "ASPERIN, Andrew E.",
  "ATON, Jonelyn Jan B.",
  "ATUTUBO III, Aedler Jo-lean A.",
  "BADILLO, Adone Bardioses M.",
  "BAGAOISAN, Joyce S.",
  "BALTAZAR, Estrella C.",
  "BAMBAO, Nicolette S.",
  "BANAAG, Maria Cristina M.",
  "BAÑARES, Augustus Caesar M.",
  "BANICO, Jose Mari Gerardo R.",
  "BARCENA, Kendrick H.",
  "BARRIOS-DE LEON, Noelle Ann E.",
  "BARZA, Bernard Roy C.",
  "BASILIO, Girlie Ann T.",
  "BATO, Randee Ceasar T.",
  "BAUTISTA, John M.",
  "BERCASIO, Sweetleen R.",
  "BOSE, Noel Allen R.",
  "CABANGON, Rem A.",
  "CABATINGAN, Paul Cayetano L.",
  "CABE III, Adam Anthony S.",
  "CAISIDO, Michael Ray R.",
  "CALAYAN-MEDINA, Sheryll Joy L.",
  "CALAYCAY, Jasmin Charo L.",
  "CAMBA, Denise Bernadine B.",
  "CARBONEL, Jeff Kevin C.",
  "CARLOS, Marie Rose C.",
  "CARRACEDO, Christopher V.",
  "CASTAÑEDA, Jocelyn P.",
  "CASTILLO, Margarita Anne P.",
  "CATIBAYAN, Eduard A.",
  "CATUDAN, Ma. Racquel S.",
  "CEMBRANO, Franco Aldo N.",
  "CHU, Christopher Jerome P.",
  "CIRCA, Dexter S.",
  "CLEDERA, Bethany Joy B.",
  "COLAGO, Faye Katherine T.",
  "COLIS, Kim Darriel P.",
  "COLLADO, Erika C.",
  "CONDEZ, Ferdino M.",
  "CORDEZ JR., Jaime I.",
  "CRUZ, Erika O.",
  "DALANGIN, Kristine Joyce A.",
  "DATUIN, Aimee Fay R.",
  "DAYAG, Delila L.",
  "DE CASTRO, Arlene C.",
  "DE LA ROSA, Vican Jess D.",
  "DECANGCHON, Charles Francis F.",
  "DELA CRUZ, Aardan Mikhail Kutch C.",
  "DIMALALUAN, Gerard B.",
  "DIONELA, Isagani M.",
  "DIZON, Edgar S.",
  "ELIZALDE, Salvalente Thaddeus B.",
  "ENCINAS, Nicy C.",
  "ESCARTIN, Lv Jo T.",
  "ESPEJO, Julius Glenn T.",
  "ESPINA, Kim G.",
  "ESTACIO, Israel Earl Laurente C.",
  "ESTACIO, Natalie Joyce P.",
  "ESTOYA-BAUTISTA, Gelanderwin C.",
  "FAMA, Maria Jamyka S.",
  "FAUSTINO, Melencio S.",
  "FEGI, Walter P.",
  "FERNANDO, John Daniel S.",
  "FERRER, Cassey E.",
  "FESTIN, Anna Carolina P.",
  "FLORES, Janine C.",
  "FLORES-PARADERO, Tricia Jane B.",
  "FRANCISCO, Raul Ricardo F.",
  "FUERTES, Emmanuel C.",
  "GALICIA, Leonida Marie P.",
  "GAMBON, Mark Jayson M.",
  "GARALDE-CHUA, Maria Margarita H.",
  "GARCIA, Hendrick Carlo D.",
  "GARILLO, Corinne Joie M.",
  "GELI, Justin Roman S.",
  "GERONGA, Arvi Adan V.",
  "GREGANA, Margrein Archenar M.",
  "GURO, Jamjoon A.",
  "GUTIERREZ, Andrea Jastine A.",
  "HERNANDEZ, Normida M.",
  "HOMBRADO-DURAN, Ana Liza P.",
  "ICALLA, Leo-mel Dennis B.",
  "IMBANG, David Jason T.",
  "IMPERIAL, Jm Sandino C.",
  "IMPERIO, Marc Aeron Paul DP.",
  "INSERTO, Ma. Sonia V.",
  "IRADER, Mereyll Kyla P.",
  "JAMONER, Winnie Claire L.",
  "JAMORA, Jose Manuel M.",
  "JAVIER, Brian M.",
  "JAVIER, Janelle Crystel J.",
  "JIMENO, Grace Marie E.",
  "JOYA, Danica Janine H.",
  "JUAN, Monika Veron R.",
  "JUANILLO, Jennifer U.",
  "JUICO, Ralph G.",
  "LADANGA, Wilfred Raphidim L.",
  "LAENO, Erose Marlo C.",
  "LAGON, Jesse Joe D.",
  "LAJARA, Servilla B.",
  "LAVIÑA, Robert T.",
  "LAZARO JR., Hermoso D.",
  "LIONG, Stacy Lyn Y.",
  "LONGBOY, Suzette M.",
  "LOPEZ, John Paul L.",
  "LOPEZ, Ramil D.",
  "LUMABAS, Fatima Leoan T.",
  "MACALANDA, Ronald O.",
  "MADRID, Melben Rey M.",
  "MANALANG, Alberto D.",
  "MANANSALA, Tessa Lonica A.",
  "MANIÑGAS, Marie Jean P.",
  "MARASIGAN, Mary Remie Jane T.",
  "MARCO, Giulia L.",
  "MARISTELA, Jezreel Kiel M.",
  "MARTINEZ, Czarina Cherizze C.",
  "MARTINEZ, Ruther N.",
  "MATANOG, Mahleyl B.",
  "MAYOR, Christina P.",
  "MELCHOR JR., Rodrigo E.",
  "MENDOZA, Alexandria Z.",
  "MENDOZA, Ma. Josefina E.",
  "MENDOZA, Rey Marco B.",
  "MERCADO, Generson Paul H.",
  "MESINA, Gerald P.",
  "MINA-REGINALDO, Marites E.",
  "MIRANDA, Rachelle Anne J.",
  "MORALES, Julia Marie S.",
  "MORAN-VIDAL, Rosalisa Liboria C.",
  "MORES, Kent Davies B.",
  "MULI, Donnie-Ray B.",
  "MUPAS, Jessica Lyn T.",
  "NANIT, John Paul Z.",
  "NAPIZA, Rootbeer Marie C.",
  "NAVIDAD, Carence Janelle C.",
  "NEM SINGH, Kyle Jorrel A.",
  "NG SY, Ma. Katrina Cassandra F.",
  "NOEL III, Federico Felipe G.",
  "OCAMPO, Alvin S.",
  "OLAYA JR., Isidro T.",
  "OLIVEROS, Alvan Stephenson G.",
  "OPLE, Lester Nazarene V.",
  "OROZCO, Mayda V.",
  "PAAT, Hazel-Anne U.",
  "PABLO-SANTOS, Cherry Lynn C.",
  "PADUADA, Darius Francis M.",
  "PAGDANGANANAN, Lemuel S.",
  "PAGUIO, Antonio Rafael U.",
  "PAGUIO, Kristine Joy B.",
  "PAHUTAN, Myron O.",
  "PALANCA, Feligene Rae A.",
  "PALCONIT, Jose Emmanuel",
  "PANDAPATAN, Haroun Al-Rashid A.",
  "PANOPIO, Aldrin Lincoln P.",
  "PARREÑO, Mary Frances H.",
  "PASANA, Maria Cecilia J.",
  "PASCUA, Jettner R.",
  "PASCUAL, Antoni Pauline P.",
  "PASION, Elen D.",
  "PATAJO, Maureen Kay E.",
  "PEREZ, Emelda J.",
  "PEREZ, Luz J.",
  "PORTUS-DEMATA, Irma Ruth B.",
  "PULIDO, Bernard Vincent C.",
  "PUNZALAN, Janice A.",
  "QUIJANO, Pfrancez C.",
  "QUINDARA-LIMOSO, Michelle Geils E.",
  "QUINTO, Ivy-Ron G.",
  "RAMIREZ, Nereo Julius A.",
  "RAMOS, Jayson A.",
  "RAMOS, Maria Perpetua Danisa D.",
  "REALEZA, Ma. Frances Joanna E.",
  "RECTO, Gayle Angeli M.",
  "REYES, Hazel S.",
  "REYES, Julian Roman J.",
  "RIBO JR., Ricardo M.",
  "RICASIO, Francis Nealle E.",
  "RIGUER, Mary Grace L.",
  "RIVAD, Sherine L.",
  "RIVERA, Clariza C.",
  "RIVERA, Maria Katrina D.",
  "RIZADA, Rochelle Andrea B.",
  "RODRIGO, Reynold Anthony Marc S.",
  "ROJANO, Queennie Anne F.",
  "ROSANES, Gee B.",
  "ROSETE-KING, Diana B.",
  "RUGAY, Ina Carmen T.",
  "SALA, Emily P.",
  "SALAUM, Janale A.",
  "SALENDREZ-PANGILINAN, Kares P.",
  "SALVADORA, Lovejoy R.",
  "SAMONTE, David Lawrenz Oliver J.",
  "SAMSON, Vyron B.",
  "SAN DIEGO, Dennis D.",
  "SANTIAGO, Edward C.",
  "SANTOS, Anna Marie L.",
  "SANTOS, Joedith B.",
  "SIAN, Shereen Olivia A.",
  "SILVERIO, Melvie E.",
  "SIMEON, Armie Lyn G.",
  "SINGSON, Ericka Raye B.",
  "SINGSON-DELA CRUZ, Noelle Joanna M.",
  "SIOCHI, Paul Vincent P.",
  "SOGUILON, Aaron C.",
  "SOLIMAN, Miguel Paolo DR.",
  "SOMERA, Diana Ann E.",
  "SONGCAL, Skylar L.",
  "SORIANO JR., Cesar Nickolai F.",
  "SORRETA, Lourdes A.",
  "SUCGANG IV, Reynaldo Ross D.",
  "SUCOR, Princess Roxanne L.",
  "SUNGA, John Mark F.",
  "SUNICO, Ma. Corazon S.",
  "TAGO, Armeroden Daudey B.",
  "TAN, Charmaine B.",
  "TAN, Idony A.",
  "TAN, Lawrence Oliver C.",
  "TAN, Monika S.",
  "TAN-MONTEMAYOR, Yiyi Khindini Z.",
  "TIBAYAN, Neil Bryan S.",
  "TIGARONITA, Karla Rachelle M.",
  "TOLEDO, Maryrose O.",
  "TRINIDAD, Marie Grace R.",
  "TUAZON, Julie Ann M.",
  "TUGADE, Rigel Kent V.",
  "TUSI-TORIO, Marie Joan T.",
  "UMEREZ, Karl Eugene A.",
  "VALENCIA, Erick Anthony J.",
  "VASQUEZ, Michelle G.",
  "VELA II, Domingo D.",
  "VELASCO, Charmagne L.",
  "VELASCO, Ma. Monina D.",
  "VENTURA, Gerandel S.",
  "VERGARA-HUERTA, Czarina Marta AJ.",
  "VERSOZA JR., Feliciano A.",
  "VIADO, Reeva Shayne P.",
  "VICEDO, Maria Vita Esper M.",
  "VILLAMIN, Dimple Lhee M.",
  "VILLANOZA, Caryl Jane P.",
  "VISDA, Mac Kerwin P.",
  "YLANAN, Yedah V.",
  "YUAYAN, Rachel L.",
  "YUMANG-PALMA, Ma. Jel Kristine P.",
  "ZARASPE, Gerard Michael O.",
  "ZUNIEGA, Allan S.",
  "ZUNIGA-GOLO, Eden Lousie P."
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