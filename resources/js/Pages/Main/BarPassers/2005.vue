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
                The 2005 Bar Examinations Passers
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
  
  // Full list of names for 2005 Bar Passers
  const allNames = [
    "ABADILLA, Darwin P.",
    "ABALOS-SAHAGUN, Ma. Christina V.",
    "ABELA, Walter L.",
    "ABRAHAM, Marie Glen A.",
    "AGUSTIN, Rowell G.",
    "ALMARIO, Abigail F.",
    "ANDRADE, Janice L.",
    "ARAO, Mayumi Mitzi L.",
    "ARNESTO, Salvador T.",
    "ATIENZA, Johween O.",
    "BADIOLA, Dorcas T.",
    "BALASBAS, Chelly P.",
    "BALDERAMA, Cherrie G.",
    "BALMES, Ruby Charina O.",
    "BAQUERFO, Regal A.",
    "BAQUIRAN, Vener S.",
    "BARRALES, Harley V.",
    "BARRERA Jr., Joselito L.",
    "BAUTISTA, Maricar T.",
    "BERIÑA, Antonette C.",
    "BIACORA, Marjorie G.",
    "BUENAVENTURA, Shalemar H.",
    "CABALSI, Brando C.",
    "CABANACAN, Juliene Raymond A.",
    "CACAO, Marileen A.",
    "CALDERON, Ma. Fionna S.",
    "CALE, Alona J.",
    "CALIBA, Erwin N.",
    "CALNEA, Jose Abraham O.",
    "CAPARAS-MAOG, Ma. Elena D.",
    "CAPARROS, Erwin M.",
    "CARANDANG, John Quincy D.",
    "CHAN-TE, Ma. Johoanna C.",
    "CHUA, Richard Neil S.",
    "CHUNPENG, Toni Teefanie",
    "CLAMOR, Joel M.",
    "CLOMA, Angelica B.",
    "CRISOSTOMO, Anna May H.",
    "CRUZAT, Jojo C.",
    "CUARESMA, Abigail Justine M.",
    "CUARTERO, Erwin D.",
    "DAGUISO, Alejandro C.",
    "DE CLARO, Noreli C.",
    "DE LEON, Arlyn S.",
    "DE LEON, Khrystynn Cyd Rhia G.",
    "DE LEON, Liezel C.",
    "DELANTAR Jr., Reynaldo C.",
    "DELOS SANTOS, Rovirica C.",
    "DY BUCO, Christopher S.",
    "ESCALONA, Mark Vincent Z.",
    "ESTOPIA, Maria Rovi D.",
    "ESTRELLA, Julius James C.",
    "EVANGELISTA, Michael J.",
    "FERNANDEZ, Erika Kathryn B.",
    "FERNANDEZ, Lina G.",
    "FERRER Jr., Emmanuel S.",
    "FRIVALDO, Florence D.",
    "FRONDOZO, Cherry V.",
    "GACHE, Mary Joy J.",
    "GARCES, Orbill B.",
    "GASCON Jr., Basilio D.",
    "GAYOS, Ana Marietta C.",
    "GIGANTE, Kathleen B.",
    "GONZALBO, Stephen D.",
    "GRAPILON, Karen Q.",
    "HERNANDEZ, Felipe C.",
    "HERNANDEZ, Rodel O.",
    "ITE, Analiza C.",
    "JAPOS, Leah C.",
    "JAVIER, Benedicto T.",
    "JIMENEZ, Maria Karla P.",
    "JOSON, Joseph Aber P.",
    "LABAO, Jesson G.",
    "LAYDA, William Victor L.",
    "LAZO-FAVIS, Roselle Antonette P.",
    "LIBIRAN, Christian Dave S.",
    "LILAGAN, Ma. Severina V.",
    "LINA, Janelyn A.",
    "LOCK, Jonathan Honorato D.",
    "LUCERO, Angelique S.",
    "LUNGAY-REYES, Ethelisa P.",
    "MADAMBA, Rogelio F.",
    "MADRONA Jr., Severo C.",
    "MALOLES, Raquel M.",
    "MANUEL, Rochelle S.",
    "MAOG, Duke Thaddeus R.",
    "MARALLAG-CAJUCOM, Ma. Elena T.",
    "MARANAN, Roy A.",
    "MARASIGAN, Allan Sly M.",
    "MARTINEZ, Rodolfo P.",
    "MATEO, Ricarco G.",
    "MENDIETA, Arnaldo C.",
    "MENDOZA, Hilda P.",
    "MISA-TAN, Maricar O.",
    "MOYA-MANUEL, Melody O.",
    "MUÑOZ, Marie Michelle D.",
    "OBCIANA, Portia A.",
    "OGSIMER, Chester P.",
    "ORQUIOLA, Desiree Gertude G.",
    "PALISOC, Janice V.",
    "PANGILINAN-CANLAPAN, Christine V.",
    "PAREDES III, Ceferino Dino D.",
    "PASILIAO, Nepthalie D.",
    "PELAYO, Marie Josephine Angeli P.",
    "PEREZ, Barbara E.",
    "PETATE, Cesar P.",
    "PIMENTEL III, Ceasar G.",
    "PRADO, Wilhelmina I.",
    "PUNZALAN, Paulo B.",
    "QUINTOS, Cheryll E.",
    "RAZON, Ma. Razelli M.",
    "REBATO, Maria Karen B.",
    "REY MATIAS, Aurora V.",
    "RIBAYA-GERONIMO, Filipina D.",
    "ROBLEDO, Roderick P.",
    "RODRIGUEZ, Josyli T.",
    "SERAZON, Maureen Zena O.",
    "SIERRA, Charles R.",
    "SORIANO, Andrew R.",
    "SY, Frederick Howard L.",
    "TAEZA, Mariefe S.",
    "TAJONERA, Ian C.",
    "TAN, Joel A.",
    "TAN, Ma. Pilar Concepcion G.",
    "TARO, Marianne A.",
    "TATEL, May T.",
    "TEJADA, Clarisa V.",
    "TEMPROSA, Erwin A.",
    "TOMELDEN, Victoria T.",
    "TRESVALLES, Anthony Noel C.",
    "TURLA, Aileen O.",
    "UTULO, Edelmar M.",
    "VALERO, Angel Chona Grace I.",
    "VELICARIA, Genevieve E.",
    "VERGARA, Maria Delia T.",
    "VILLASIS, Anthony E.",
    "ZIGA-GARCIA, Diane Valerie V."
  ];
  
  // Sort and divide into columns
  const sortedNames = allNames.sort((a, b) => a.localeCompare(b));
  const divideIntoColumns = (list, columnCount) => {
    const columns = Array.from({ length: columnCount }, () => []);
    list.forEach((name, index) => {
      columns[index % columnCount].push(name);
    });
    return columns;
  };
  const columns = divideIntoColumns(sortedNames, 3);
  const maxRows = Math.max(...columns.map((col) => col.length));
  </script>
  