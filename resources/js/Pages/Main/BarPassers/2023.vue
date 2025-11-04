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
              The 2023 Bar Examinations Passers
            </th>
          </tr>
          <tr>
            <th
              colspan="3"
              class="px-4 py-4 text-lg sm:text-xl font-bold text-center bg-official-purple-700"
            >
              Hail to the 274 New Arellano Lawyers!
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- 19th Placer - Full Width Centered Row -->
          <tr class="bg-gradient-to-r from-blue-50 to-indigo-50">
            <td colspan="3" class="px-6 py-8 text-center border-b-2 border-blue-200">
              <div class="space-y-3">
                <div class="text-2xl md:text-3xl font-bold text-blue-800">Claudine De Luna-Panotes</div>
                <div class="text-lg font-semibold text-blue-600">19th Placer</div>
                <div class="text-sm text-blue-500 italic">(Examinees Who Obtained the Twenty Highest Ratings)</div>
              </div>
            </td>
          </tr>

          <!-- The 274 New Arellano Lawyers Header -->
          <tr class="bg-gradient-to-r from-purple-50 to-indigo-50">
            <td colspan="3" class="px-6 py-4 text-center">
              <div class="text-lg font-bold text-purple-800 uppercase tracking-wide">
                The 274 New Arellano Lawyers
              </div>
            </td>
          </tr>

          <!-- Regular Passers in 3 Columns -->
          <tr v-for="(row, rowIndex) in maxRows" :key="rowIndex" class="flex flex-wrap md:table-row">
            <td
              v-for="(column, colIndex) in columns"
              :key="colIndex"
              class="w-full px-6 py-3 text-sm leading-6 text-gray-800 md:w-auto text-left md:text-left hover:bg-gray-50 transition-colors"
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

// Full list of names for 2023 Bar Passers (excluding the placer)
const allNames = [
  "ABAJAR, Gille Rosa",
  "ABAYA, Joanna Loi Caceres",
  "ABAYON, Harlin Neil III Jagdon",
  "ABITRIA, Cresel Tatel",
  "ABQUINA, Kathrine Marie Castro",
  "ADALID, Sheryl Pascual",
  "AGUSTIN, Marie Nicole Cunanan",
  "ALARKON, Glicerio IV Santiago",
  "ALONZO, Patricia Marie Calayag",
  "ALQUIZA, Leslie Hennah Dayao",
  "ALTO, Ma. Aimee Marges",
  "ALTOMEA, Jhoemar Rey Orbe",
  "ALVARIO, Mark Anthony Masilang",
  "ALVARO, Jovan Keff Sancho",
  "AMANSEC, John Romano Mapile",
  "AMPER, Ryann Amora",
  "ANDAL, Rafael Ian Larioza",
  "ANGELES, Miguel Jose Tayao",
  "AÑONUEVO, Christ Edgardo Macatangay",
  "ANTAZO, Adrian Avilado",
  "AQUINO, Andrela Mendonis",
  "AQUINO, Mikhail Pacleb",
  "ARANAS, Jimboy Dorado",
  "ARELLANO, Charisse Cometa",
  "ARGUELLES, Miguel Luis Coquia",
  "ARICHETA, Donna Lynn Uy",
  "ARREOLA, Christian James Pontawe",
  "ASPIRAS, Alfred Bryan Aquino",
  "AUSTRIA, Jane Zahren Polo",
  "AVILA, Gio Riley Doroja",
  "AYSON, Manuel Vincent Tiong",
  "BACALANGCO, Precy Benigla",
  "BACUNGAN, Viro Giernald Encinares",
  "BADILLES, Kit Emmanuel Ruiz",
  "BALASABAS, Jeohnissi Capistrano",
  "BALAURO, Marco Domingo",
  "BALDEO, Francis Sales Orata",
  "BARTOLAZO, Ma. Dollie Valdecañas",
  "BASALLAJE, Marlon Venezuela",
  "BASTO, Matthew Joseph Serrano",
  "BAUTISTA, Al Felipe Punzalan",
  "BAUTISTA, Angelique Magdalene Andres",
  "BAUTISTA, Lenard Angelo Lubiano",
  "BAUTISTA, Ronoel Narc Mercado",
  "BELISARIO, Jorly Batalla",
  "BERGAVERA, Phamela Rhose Mosquesa",
  "BESA, Denard Kevin Conwi",
  "BORREO, Mark Jason Ramos",
  "BRIONES, Joseph Eric Pocholo Tanael",
  "BUAN, Severina Prado",
  "BULOTANO, Angelie Gacusan",
  "BUNDALIAN, Delfin III Halili",
  "CABALQUINTO, Miguel Recto",
  "CABANA, Dianne Kathrin Valdrez",
  "CABIGTING, Maria Queenie Lilirae De Castro",
  "CACATIAN, Amabelle Abarquez",
  "CAJURAO, Vic Lemuel Irinco",
  "CAMACHO, Christine Montealto",
  "CANANEA, Joventino Jr. Lobigan",
  "CANDA, Mary Grace Gutierrez",
  "CAÑAMAQUE, Reena Mae Quintana",
  "CAÑON, Ma. Katherine Valencia",
  "CAOCTOY, John Rey Marapoc",
  "CAPULONG-TENORIO, Kleurence Glydel Nicolas",
  "CAPULONG, Noel Montealto",
  "CARINAN, Novelyn Banawa",
  "CARINGAL, Jen Sharlene Castillo",
  "CARINGAL, Yvey Rose Sarique",
  "CARIÑO, Gregarius Joseph Martin",
  "CARO, Felix Baltazar Jude Picio",
  "CASASOLA, Indalecia Sacdalan",
  "CASTAÑEDA, Frein Jarane Peliglorio",
  "CASTILLO, Chola Eunice Arroyo",
  "CASTILLO, Donald Adrian Manalo",
  "CASTILLO, Jamaica Pago",
  "CASTRO, Bianca Chia Reyes",
  "CATAHAY, Renan Arce",
  "CENTI, Maher Edding",
  "CHAN, Shervit Ann Cruz",
  "CHANGCOCO, Jim Carlo Asuncion",
  "CHUA, John Kenneth Salazar",
  "CLAMOSA, Charisse Ayra Cuevas",
  "COMENDADOR, Jeffrey Cardones",
  "CONCEPCION, Anna Victoria Luistro",
  "CONCEPCION, Jester Gamboa",
  "CONCEPCION, Sheila Salibio",
  "CORDOVA, Louie Aeron Rico",
  "CORTES, Ohanna Jean Lim",
  "CRUZ-SARAJAN, Lourdes Erika Caday",
  "CUNANAN, Erika Mariz Sicat",
  "DALIDA, Raphael Anton Gabriel Sapi",
  "DANIPOG, Guillermo III Aricayos",
  "DAPITIN, Jen Kcin Pugal",
  "DE GUZMAN, John Alexis Cabucana",
  "DE GUZMAN, Joseph Noel Tolentino",
  "DE LEON, Jennrey Palmero",
  "DE VERA, Ramon Carlito Tolentino",
  "DEE, Joseph Ashley Salangsang",
  "DEL ROSARIO, Waldetrudes Santos",
  "DELA CRUZ, Adrian Gamboa",
  "DELA CRUZ, Karl Benzon Avendaño",
  "DELA PEÑA, Michaela Yadao",
  "DELA ROSA, Phyllis Gonzal",
  "DELIDELI, Shella Mae Magno",
  "DELLOVA, Jhonel Sis",
  "DESEO, Kate Marielle Guyamin",
  "DESERVA, Sydney Ellen Gorospe",
  "DIMAANO, Lois Danielle Pelo",
  "DIMANAHAN, Maria Del Otayde",
  "DIOQUINO, John Freko Balasbas",
  "DOON, Rustom John Bartolo",
  "DULCE, Joshua Felino Julian Franco",
  "DUTOSME, Berl Stephen Reeves Saavedra",
  "EDILLOR, Agatha Loren Santos",
  "EGALLA, Frederick Castillo",
  "ENCINAS, Jeffrey Lim",
  "ENDAYA, Angelica Maria Concepcion Aguilar",
  "ESIDERA-ABADILLA, Mary Angelyne Desales",
  "ESTRADA, William Cydrick Mooney",
  "EVANGELISTA, Aaron Talao",
  "FABIAN, Ryan Nicolas Datiles",
  "FABROS, Jane Kacy Mendoza",
  "FAJARDO, Karl Louie Bartolome",
  "FAUSTINO, Pia Laynes",
  "FEDERIZO, Cecile Francisco",
  "FERRER, Ionna May Ortiz",
  "FIGUEROA, Richelle Joy Ortega",
  "FLORES, Christian Manila",
  "FLORES, Winona Marie Tuddao",
  "FRUCTUOSO, Josyl Placiente",
  "GADIN, Jane Eunice Severo",
  "GADRINAB, Nico Avenido",
  "GALEDO, Abegail Pescozo",
  "GALVEZ, Sarah Mae Gonzales",
  "GAÑAS, Evangeline Pantua",
  "GARCIA, Benedick Corpuz",
  "GARCIA, Havenlynne Falcon",
  "GARCIA, Jeffrey Domingo",
  "GARCIA, Marc Alfred Ganitano",
  "GATDULA, Ewendel Reyes",
  "GAYAMAN, Kathleen Cabanilla",
  "GESMUNDO, Anne Frances Gulapa",
  "GONTIÑAS, Klarc Patrick Batincila",
  "GONZALES, Luis Duaso",
  "GUINTU, Alexa Marie Aurellano",
  "GUMBA, Tessa Anjelika Minsalan",
  "HEJE, Martin Christian Montealegre",
  "HERMOSURA, Rea May Gelacio",
  "IMPERIAL, Via Rhidda Guiawan",
  "INOCENTES, Carlo Luigi Belarmino",
  "ITABLE, Michelle Joy Mingming",
  "IWAYAMA, Minami Ocon",
  "JABINES, Ines Hasta",
  "JACA, Allen Jonas Domingo",
  "JANSEN, April Bioy",
  "JIMENEZ, Richard Jr. Kasilag",
  "JONIECA, Mary Joy Otico",
  "JOSE, Janine Rebugio",
  "KUA, John Matthew Gomez",
  "KUMAR, Agnes Rea Alanzalon",
  "LARA, Edgardo Cuenca",
  "LATOSA, Janine Rufino",
  "LAUIGAN, Keisha Mariah Catabay",
  "LEANDER, Randel Rainer Atienza",
  "LEHAYAN, Lyle Paul Pabuaya",
  "LEONES, Lorille Jumaquio",
  "LIBUNAO, Nica Cielo Bautista",
  "LOZANO, Marivic Zacarias",
  "LUKBAN, Arturo Lope Lagumen",
  "MACABAYA, Bryan Ray Opalla",
  "MACATANGAY, Jerome Carlos Macasaet",
  "MADRID, Reden Duruin",
  "MADRIGAL, Ferlie Anne Villar",
  "MAGNAYE, Michelle Anne Yabut",
  "MAGNO, Kimberly Mendoza",
  "MAGTIBAY, Charity Lasi",
  "MAKALINTAL, Katherine De La Cruz",
  "MALONZO, Patricia Kamil Paras",
  "MAMURI, Marc Lester Pañgan",
  "MANALO, Peter Janssen Perez",
  "MANARANG, Kim Bianca",
  "MANDAP, Jeffrey Buduan",
  "MANIKAD, Nicolo Paolo Manalo",
  "MANIMTIM, Cristina Flor Santiago",
  "MANLAPID, Nicolle Katrine Sioson",
  "MANTUANO, Dannah Francesca Basa",
  "MANUEL, Hazel Mitz Dumadag",
  "MANUEL, Jean Michael Francis Panlilio",
  "MARAHAY, Mary Janelle Ybiernas",
  "MARASIGAN, Ma. Angelica Bacani",
  "MARCELO, Kathleen Bosita",
  "MAULA, Kent Lloyd Esplanada",
  "MENDENILLA, Mark Norman Bonggo",
  "MENDOZA-BAGNES, Paula Tricia Gabiana",
  "MERZA, Karen Ann Mayor",
  "MESANA, Joje Constantino",
  "MIGALLON, Krystal Lavern Mendoza",
  "MIRANDA, Angelique Pearl Vercasion",
  "MOCTAR, Murshid Disomangcop",
  "MOLINA, Ma. Emiliana Allayban",
  "NG, Shannon Maye Dy",
  "NICOLAS, Caezar Morales",
  "OBENZA, Joseph Irvin Abarquez",
  "OGENA, Suellen Cataluña",
  "OPELANIO, Michael Jethro Gobenciong",
  "ORDA, Dominic Balgos",
  "PAGSUGUIRON, Xheena Mae Lacasandile",
  "PAJADAN, Jayce Miguel",
  "PAJARO, Earl John Gregore",
  "PALMOS, Miko Angelo Unciano",
  "PAMITTAN, Daewin Mamauag",
  "PAMITTAN, Karen Joy Tuliao",
  "PAÑARES, Sheila Mae Sinadjan",
  "PARDIÑAS, Ruby Ann Mariano",
  "PEÑOLBO, Marjorie Malabad",
  "PLANTILLA, Immaculate Mariel Cadelino",
  "POTOT, Vejes Primitiva Marasigan",
  "PRECILLA, Jun Burgos",
  "PULIDO, Jadelyn Espinosa",
  "QUIAMBAO-MANANSALA, April Bautista",
  "QUIOGUE, Kevin Mancera",
  "QUIRANTE-BERMUDA, Kriza Forte",
  "QUIZON, Ellaine Dominique Espinosa",
  "RAMORES, Kathrina Niña Turiano",
  "RAMOS, Diane Coryne Gueco",
  "REYES, Elijah Simon Go",
  "REYES, Mary Rose Cammayo",
  "REYES, Rogienel Legaspi",
  "REYNON, Eunesse Mari Retutal",
  "RIVERA, David Israel Feliciano",
  "RODAS, Blessie Domingo",
  "RODRIGO, Myla Leonelle Aves",
  "RODRIGUEZ, Jasmin Raceli Miranda",
  "ROMANO, Kenczar Castillo",
  "SABATER, Rhod Jeran Sabio",
  "SALAC, Vincent Lanz Gulle",
  "SALAZAR, Jen Yzabelle Requillas",
  "SAMSON, Charisma Romasoc",
  "SAN PASCUAL, Ellainemor Quibuyen",
  "SANCHEZ, Ed Desnacido",
  "SANTOS, Ellie Rose Sagum",
  "SANTOS, Valerio Paolo Nuque",
  "SEBOLLENA, Bianca Joy Salapare",
  "SI, Jayeline Dabbay",
  "SIGUAN, Justin Andre Aguila",
  "SILVA, Merlo Sebasthian Cornejo",
  "SOMBILON, Lalaine Michael Agustin",
  "STA. CRUZ, Gerard Santos",
  "SUALIBIO, Jezzryl Blas Pereyra",
  "SUAREZ, Miguel Carlos Pacifico Floresca",
  "SULTAN, Abdul Fahad Basmala",
  "SUYAN, Guillermo Jr. Sabilona",
  "SY, Rossana Santa Basiño",
  "TABACO, Legis Carl De Gracia",
  "TABUNDA, Hannah Leigh Mislang",
  "TAN, Ana Nicole Marasigan",
  "TAN, Anna Liezl Juco",
  "TAN, Juan Emmanuel Lacanilao",
  "TAN, Kent Limmuel Braña",
  "TANAKA-MONTEFRIO, Shann Jevi Villaflor",
  "TEE, Jon Wilson Jaucian",
  "TENDENILLA, Ava Ma. Dulce Sergio",
  "TIANGSON, Lomar Karlo Lorenzana",
  "TOLENTINO, Divina Angela Bueno",
  "TUAZON, Celito Jumao-as",
  "TULDANES, Maya Angela Puerto",
  "TUOZO, Lourdes Clouie Dulpina",
  "UDASAN, Sittie Shahani Miculob",
  "VALLE, Jose Jun Moserrat",
  "VELASQUEZ, Liane Rose Romero",
  "VERGARA, Donato IV Uy",
  "VILLAROSA, Alyssa Crizzel Ragasa",
  "YBUT, Christine Escote"
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