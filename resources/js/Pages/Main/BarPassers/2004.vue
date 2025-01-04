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
                The 2004 Bar Examinations Passers
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
  
  // Full list of names for 2004 Bar Passers
  const allNames = [
    "ALARCON, Jr., Paterno B.",
    "ALDA, Ferdinand Allan U.",
    "ALDAVE, Mark Anthony C.",
    "ALISUAG, Maricel B.",
    "ALMALBIS, Jerson F.",
    "APITA, Raymond O.",
    "ARLES, Albert B.",
    "ATALIP, Arnel R.",
    "BACHILLER, Allen Brix L.",
    "BAGADIONG, Jonathan A.",
    "BALAD-ON, Joy I.",
    "BALDOVINO, Raycell D.",
    "BALINBIN, Remmel M.",
    "BALUBAR, George Ian T.",
    "BARRIENTOS, Lourdes Grace S.",
    "BAUTISTA, John Manuel B.",
    "BERMUDO, Cyril Victor N.",
    "BERNARDO, Odessa DC.",
    "BETONIO, Raquel J.",
    "BONDOC, Andrea Maria M.",
    "BONGOLAN, Stephen G.",
    "BORJA, Fay Angela B.",
    "BRAGA, Jacinto Blest A.",
    "BRILLANTES, Neil C.",
    "CALILUNG, Charlemagne T.",
    "CANEJA, Marisol S.",
    "CAÑETE, Nemeson B.",
    "CASTRO-CO, Arlene L.",
    "COLLADO, Jazon E.",
    "CONCEPCION-BRAZIL, Maureen S.",
    "CRUZ, Chelo Anne V.",
    "CUBANGBANG, Rita Marie B.",
    "DE GUZMAN, Zsae Carrie C.",
    "DE OCAMPO-VISTA, Helen D.",
    "DE TORRES, Irene P.",
    "DELA CRUZ, Cherry Anne G.",
    "DELA CRUZ, Constantino S.",
    "DELA CRUZ, Wendy H.",
    "DELA ROSA, Myrelle V.",
    "DELORIA-MANARANG, Lynette May D.",
    "DELOS SANTOS, Romeo A.",
    "DEVEZA, II, Edmundo R.",
    "DIÑO, Maria Cristina L.",
    "DIOKNO, Alvin B.",
    "DUCLAN, Eric S.",
    "DUNGAN-CLAUSTRO, Edelyn A.",
    "DUNUAN, Donna Lee S.",
    "ESPERANZA, Redentor E.",
    "FACTORA, Paolo Enrique P.",
    "FAROCHILEN, Faith M.",
    "FERRANCO, Sharon A.",
    "FIEL, Beulah Coeli C.",
    "FIGUERRES, Corazon G.",
    "FLORES, Louise Malaya O.",
    "FLORIDO, Joel Marciano A.",
    "FLORITA, Jeannette A.",
    "GABIOLA, Jr., PORFIRIO C.",
    "GAMBOA, Jocelyn P.",
    "GARCIA, Rowel G.",
    "GOMEZ, Alfred C.",
    "GORRICETA, Mark S.",
    "GUANZON, Abelardo Kris P.",
    "GUILLEN, Rebecca A.",
    "JACOBA, Jerik Roderick V.",
    "KADATUAN, Duque D.",
    "LANDICHO, Fredieric B.",
    "LAUREANO, Cynthia F.",
    "LEDDA, Jacqueline D.",
    "LERONA, Maria Donnah Guia C",
    "LICOS, Jr., Rogelio P.",
    "LIM, Maria Margarita T.",
    "LIM, Mary Anne P.",
    "LOBO, Ronald C.",
    "LUBATON, John Patrick P.",
    "LUNA III, Meneleo Jose A.",
    "MACALANDA, May Anthonette Q.",
    "MALLARI, Myra C.",
    "MANGANTULAO, Jinky Q.",
    "MARAVILLA, Arnel E.",
    "MARONILLA, Vincent Philip C.",
    "MARTINEZ, Ryan A.",
    "MERIOLES, Cyrille V.",
    "MERRERA, Jihan G.",
    "MOLDEZ II, Ricardo A.",
    "MONDIA, Remiebel U.",
    "MURO,Bernhard Ryan M.",
    "NATIVIDAD, Jr., Danilo L.",
    "NEPOMUCENO, Dynah Glady G.",
    "NICOLAS, Ferdinand S.",
    "NOFUENTE, Liza A.",
    "OPERIO, Alma B.",
    "ORTIZ, Christopher Nonatus B.",
    "PALMA, Ferdinand C.",
    "PAMITTAN, Tito Jonathan M.",
    "PARADO, Angelica A.",
    "PARAISO, Mel Maurice L.",
    "PAREDES, Antonio Luis G.",
    "PECSON, Michael D.",
    "PELAEZ, Josephine Mae B.",
    "PLACIDES, Ma. Antonieta A.",
    "PONCE JR., Miguel L.",
    "PROFETA, Arlan P.",
    "PUTONG, Majella E.",
    "RAMA, Rommel H.",
    "RANILLO, Geraldine C.",
    "REY, Florabelle Cherry I.",
    "RIBAYA, Lilian Elizabeth D.",
    "RIVAS-SANTOS,Maria Cristita A.",
    "SAAVEDRA, Vincent Paul L.",
    "SACMAR-BADIOLA, Ginalyn M.",
    "SAN PABLO, Maria Soledad C.",
    "SANGIL, Anne Grachelle N.",
    "SANTOS, Jose Theodoro Leonardo C.",
    "SEBASTIAN, Alexander V.",
    "SUAREZ, Joanne Virni E.",
    "TIBAYAN-DE QUILLA, Melinda A.",
    "TICZON, Niño Richard Evan B.",
    "TIONGSON, Anna Leah Y.",
    "TOBILLO, Cecilio N.",
    "TOLENTINO, Jenaida M.",
    "TORREDES, Rene A.",
    "VEHEMENTE, Stephen R.",
    "VILLAFRANCA, Michael S.",
    "VILLANUEVA, Elton S.",
    "WENCESLAO, Gina V."
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
  