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
              The 2018 Examination Passers
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

// Full list of names for 2018 Bar Passers
const allNames = [
  "ABAJON, Michael",
  "ABUAN, Maricel C.",
  "ACOSTA, Athena Nicolette C.",
  "ALBERTO, Ryan Maximin L.",
  "ALFAD, Nefertiti O.",
  "ALMIRANTE, Jose Emmanuel T.",
  "ALQUIROZ-AGUILAR, Niña Feren P.",
  "ALVARO, Divina L.",
  "ANTONIO, Ayries Grace M.",
  "ARBES, Marvyn Rose D.",
  "ARCIAGA, Ana Liza B.",
  "ARCOL, Voltere Edmark O.",
  "AVILA, Jess Stanley A.",
  "AZAÑA, Blessa Maruja R.",
  "AZAS, Kimberly D.",
  "BAGAMAN, Jessamine C.",
  "BAUTISTA, Kristina Carol A.",
  "BAUTISTA-MENDIORO, Florbeth O.",
  "BAWA, Ernil L.",
  "BERTUMEN, Yzabel Eden M.",
  "BOCO, Iryl B.",
  "CAMONIAS, Shirlee Mae V.",
  "CAS, Jose Mari V.",
  "CASTILLO, Christiaan Briccio L.",
  "CASTILLON, Medienne Isabelle M.",
  "CASTRO, April Jacob D.",
  "CASTRO, Maryland DH.",
  "CATIIS, Joliv B.",
  "CENTENO, Adonis J.",
  "CO, Patrick Xavier D.R.",
  "CORONA, Jose Mari C.",
  "DAGUNA-TELAN, Krizia Lauren N.",
  "DAMOCLES, Marieglo G.",
  "DE JUAN, Jan Angeli E.",
  "DE LEON, Rowel T.",
  "DE RIVERA, Ana Hendrika A.",
  "DEFENSOR, Kristine Lara G.",
  "DELA RAMA, Enrico Paolo L.",
  "DITOL, Francis C.",
  "DOTE, Jillian Jen T.",
  "DULA, II, Jose D.",
  "DULNUAN, Gina Mae C.",
  "EUGENIO, Richard Oliver H.",
  "FANDIALAN, Maria Almira L.",
  "FAVORITO, Bjone Carlo T.",
  "FERNANDEZ, Jefferson B.",
  "FLORES-FONTANILLA, Korrine Madeleine C.",
  "GALANO, Kathleen C.",
  "GALIZA, Paul Christian D.",
  "GARCIA, Louie A.",
  "GARCIA, Mclair D.",
  "GELARIO, Floreza Lara M.",
  "GENZOLA, Neil Marvin F.",
  "GO, Vincent Gregory S.",
  "GONZALES, Christian Mei P.",
  "GREGORIO, Karyl Mae S.",
  "GUEVARRA Jr., Alexander O.",
  "HERNANDEZ, Bryan B.",
  "IBAÑEZ, Emmanuel G.",
  "LAUS, Czarmaigne P.",
  "LIM, Alfredo Niccolo T.",
  "LU, Jossaine M.",
  "MABANSAG, Liezl Joy M.",
  "MACALINO, Daniel Luis P.",
  "MAKASIAR, Ma. Brimar T.",
  "MANESCA, Lyzanel R.",
  "MANTOS, Rufino Samuel III R.",
  "MARCELO, Emmanuel T.",
  "MARCELO, Vivien P.",
  "MATEO, Mary Joy V.",
  "MENDOZA, Krista Carmina B.",
  "MODIO, Kent Harold S.",
  "MONIS, Maria Cristina A.",
  "MONTERO, Carmela Kristine A.",
  "NOGALO, Sunny Rye M.",
  "OLARTE-CONGSON, Heide T.",
  "PEÑAFLOR, Angelique Kamille U.",
  "PEÑAS, Andrea Alexis U.",
  "PILOTIN, Maria Cecilia Lourdes R.",
  "PINEDA, Alexis Anne U.",
  "PINES, Philip J.",
  "POLIDO, Jean Joan D.",
  "PONAY, Zahra Mina A.",
  "PUNZALAN, Kathleen B.",
  "QUIAMBAO, Raymart John S.",
  "RABAT, Luisito Emmanuel G.",
  "REALES, Jomer C.",
  "REBUDAL, Nathaniel James C.",
  "REY, III, Salvador R.",
  "RIVERO, Jenina Angeliez C.",
  "SALGADO, Mary Antonnete M.",
  "SALIPOT, Magin P.",
  "SALVOSA, Paul Junic P.",
  "SAN JOSE, Clarice Joy D.J.",
  "SAN PEDRO-MOLINA, Medilyn N.",
  "SANTOS, Oliver A.",
  "SANTOS, Oliver I.",
  "SERRANO, Marianne M.",
  "SOLIMAN, Nelynne Analiza L.",
  "SORIANO, Christina U.",
  "SORIANO, Marie Paulene A.",
  "SY, Stephanie Ruth B.",
  "TAJAR, Fahima B.",
  "TAN, Lance Bryan L.",
  "TAN, Michael Elvin T.",
  "TAPALES, Charmaine Jill C.",
  "TAYAMORA, Sherwin E.",
  "TEYLAN, Annjeaneth V.",
  "TINGSON, Gregorio Ramon A.",
  "TOLENTINO, Lenin King F.",
  "TUAZON, Ivan Luigi A.",
  "TUD, Marianne C.",
  "UY, Ron Mikhail V.",
  "VALLEDOR, John Orion William D.",
  "VERGARA, III, Donato U.",
  "VILLALOBOS-PADUADA, Riza T.",
  "VILLAMOR, Jr., Alexis Ailex C.",
  "VILLANUEVA, Chezkania Eden C.",
  "VILLAREAL, Mark Arvill A.",
  "VIÑAS, Joyette A.",
  "VINO, Paulo I.",
  "VITO, Michael Allan Poe C.",
  "VITUG, Ruby Lucielle S.",
  "YARISANTOS, Jenivie G.",
  "YULO, Juan Bernardo Z.",
  "ZABALA, Benjie DC.",
  "ZAPATA, Joseph Samuel V."
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