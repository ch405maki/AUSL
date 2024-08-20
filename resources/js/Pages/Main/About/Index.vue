<template>
  <MainLayout>
    <Head title="Enrollment Guide" />
    <main class="flex-grow">
      <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
        <div class="flex flex-col md:flex-row justify-between gap-8">
          <!-- Main content section -->
          <section class="w-full md:w-3/4 relative ml-2">
            <!-- Step 1 -->
            <div v-show="step === 1" class="mb-8">
              <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                The evolution of Arellano University and its School of Law
              </h2>
              <div class="flex flex-col space-y-6">
                <p class="text-lg font-normal text-gray-600 mb-4">
                  The history of Arellano University began in 1938 through the efforts of Florentino Cayco Sr. when its School of Law was first established and formed. It aimed to provide quality legal education to aspiring Filipino lawyers. It was named after the first Filipino Chief Justice of the Supreme Court, Cayetano S. Arellano. The original school was located in historic Intramuros where classes were held until the 1945 Battle of Manila.
                  <br><br>
                  A few months after the cessation of hostilities in Manila, classes resumed in an old Spanish-type building along Legarda Street in Sampaloc, Manila. It was the first law school which opened after World War II boasting of a strong faculty line-up, including Fred Ruiz Castro, who later became Supreme Court Chief Justice, and Ruperto G. Martin and Antonio P. Barredo, who became Associate Justices of the High Court. At that time, the law school had an active student population in the thick of every burning national issue involving the new Republic. Its strong and vibrant student activism continued through the decades.
                  <br><br>
                  The college quickly gained recognition for its excellent legal program and began to expand its academic offerings. On June 28, 1946, the founder left the government as Undersecretary of Public Instruction to head his school. In 1947, the Department of Education elevated the school to Arellano Colleges. In the same year, it was again elevated to a university.
                  <br><br>
                  In 1948, the university moved to Plaza Guipit. In 1955, it was relocated back to its old site in Legarda, but this time housed in a modern four-storey concrete building. Today, it has seven campuses in the National Capital Region in the cities of Manila, Pasay, Pasig, Mandaluyong, and Malabon. It currently offers various programs from basic education to graduate schools recognized by DepEd, CHED, LEB, and TESDA, and accredited by PACUCOA.
                  The first AUSL Dean was Vicente Sinco who served from 1938-1940 and later became the President of the University of the Philippines.
                  <br><br>
                  The first AUSL Dean was Vicente Sinco who served from 1938-1940 and later became the President of the University of the Philippines. Francisco Capistrano, a civil law expert who sat as member of the Civil Code Commission that revised the old Civil Code and later became Justice of the Court of Appeals, served as Dean from 1940-1956. He was followed by Enrique Voltaire Garcia who served as Dean from 1956-1963. Manila Councillor and bar placer Mariano M. Magsalin, Sr. then assumed the deanship in 1963, holding the position until 1979.
                  <br><br>
                  In 1978, the Arellano Law Foundation (ALF) was established by the alumni, faculty and employees of Arellano University. Its primary purpose is to upgrade the legal profession’s standards and the efficient, fair, and honest administration of justice. Its secondary purposes has been to establish and operate a law school. Thus, on April 22, 1979, Arellano University turned over the law school operation and management to the ALF under a Memorandum of Agreement (MOA) with financial support from the University. The School of Law will continue as an academic college of the University. In 1997, the MOA was amended to grant the ALF fiscal autonomy.
                  <br><br>
                  The first AUSL Dean under the ALF management was bar examination first-placer and Harvard Law School Master of Laws graduate Rodolfo O. Robles. Due to pressing business commitments, Dean Robles had to go on an indefinite leave of absence. In his place, Florentino Cayco Jr., then University Chairman and President, sat as Dean of the College of Law. He was later succeeded by Agriculture Undersecretary Dante Barbosa, who served until early 1986, to be followed by Mariano M. Magsalin, Sr., whose deanship was interrupted when he suffered an ailment that rendered him temporarily unable to continue with his work.
                  <br><br>
                  Jose C. Vitug, retired Associate Justice of the Supreme Court, took the helm as Acting Dean in his stead. Mariano M. Magsalin, Sr. later re-assumed the post and held it until his death in 1992. Bar topnotcher Antonio Eduardo B. Nachura was tapped to succeed Magsalin. In November 1994, Dean Nachura was appointed Undersecretary of the Department of Education, Culture and Sports (DECS), then elected as member of the House of Representatives and later appointed as Associate Justice of the Supreme Court. He was replaced by Assistant Dean Mariano F. Magsalin Jr., who was Dean until he was forced to give up the position for health reasons. He was replaced by Jose R. Sundiang Sr., a highly regarded civil and commercial law reviewer. He took over as Dean but due to illness had to be replaced by Virgilio B. Gesmundo, a bar topnotcher, up to the end of May 2016. Reynaldo G. Lopez was appointed Acting Dean during the hiatus. In August 2016, Domingo M. Navarro was designated as the new Dean and holds the position to date.
                  <br><br>
                  In 1944, Macario D. Nicolas, Augusto I. Iturralde and Mariano M. Magsalin of Arellano Law Colleges were bar-topnotchers. It was followed in 1946 by another bar topnocher Jose F. Zafra. Then in 1947, Augusto G. Syjuco and Francisco Sumulong were bar topnotchers. In 1993, Nelson S. Victorino landed fifth place in the bar examination. In 2010, Paolo Carlo C. Tolentino was No. 3 and Daren L. Salipsip was No. 10. In 2011, Cherry Liez O. Rafal-Roble was No. 3. Also in 2011, Arellano University School of Law was awarded recognition by the Legal Education Board as one of the Top Ten Law Schools in the Philippines.
                  <br><br>
                  In 2021, AUSL produced 722 new lawyers, the largest number in the country. In 2021, AUSL had one Excellent Performance Passer with at least 90% grade, Fernando Felix L. Imperial, and 39 Exemplary Performance Passers with at least 85% and above passing grades. In 2022, AUSL produced 378 new lawyers with Kyle Terence Arnilao Viloria in the 20th place.
                  <br><br>
                  With the current administration, faculty and staff, Arellano University School of Law continues its long history of academic excellence, boasting with faculty members who are experts in their particular field, producing dedicated and principled lawyers, and strong alumni holding key positions in the public and private sectors, and in the academe. Over the years, AUSL produce the most number of lawyers.
                </p>

              <div class="flex justify-center space-x-4 mt-6">
                <img src="images/about/rafal-roble.jpg" class="w-1/4" alt="Cherry Liez O. Rafal-Roble">
                <img src="images/about/tolentino.jpg" class="w-1/4" alt="Paolo Carlo C. Tolentino">
                <img src="images/about/salipsip.jpg" class="w-1/4" alt="Daren L. Salipsip">
              </div>
            </div>
            </div>

            <!-- Step 2 -->
            <div v-show="step === 2">
              <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                Vision and Mission
              </h2>
              <div class="bg-white border-none rounded-lg mb-6 relative">
                <h2 class="text-lg sm:text-xl font-bold text-gray-700 mb-8">Vision</h2>
                <p class="text-lg font-normal text-gray-600 mb-8">
                  We shall be the leading exponent of the Learner-Centered Method of teaching that integrates Ethics and Values in order to produce competent legal practitioners.
                <br>
                <br>
                  We shall advance the use of state-of-the-art technologies and methodologies to train our students to become effective partners in nation building and as future leaders of the country.
                <br>
                <br>
                  We shall utilize modern strategies and innovate policies in our goal to promote social justice, equality and the rule of law.
                </p>

                <h2 class="text-lg sm:text-xl font-bold text-gray-700 mb-8">Mission</h2>
                <p class="text-lg font-normal text-gray-600 mb-8 ">
                  We are an institution dedicated to educate and produce in a sublime manner individuals as adept counsels of law.
                <br>
                <br>
                  We will advocate respect for the rule of law, human rights and dignity, defend the oppressed, protect our ecology, strive to be equal with others, serve God, our country and fellowmen.
                </p>
                <!-- item here -->
              </div>
            </div>

            <!-- Step 3 -->
            <div v-show="step === 3" class="mb-8">
              <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                Alma Mater Hymn
              </h2>
              <div class="bg-white border-none rounded-lg relative">
                <div class="mt-4 flex justify-center items-center">
                  <video controls autoplay class="max-w-full h-auto">
                    <source src="/videos/auslHymn.mp4" type="video/mp4">
                  </video>
                </div>
                <!-- Lyrics of the hymn -->
                <div class="mt-8 text-center">
                  <p class="text-2xl sm:text-2xl font-bold text-purple-900 mb-2">Hail to the Chief</p>
                  <p class="text-lg text-gray-600 mb-8">By Dean Mariano F. Magsalin, Jr.</p>
                  
                  <div class="tracking-wide text-lg font-normal text-gray-600 space-y-4">
                    <p>Hail Alma Mater</p>
                    <p>Hail to the Chief</p>
                    <p>Hail Arellano Law</p>
                    <p>Our loyalty we pledge to keep</p>
                    <p>Our hearts and minds do commit</p>
                    <p>To stand for what is just and right</p>
                    <p>To always be the best</p>
                    <br>
                    <p>Hail to the Chief</p>
                    <p>Hail Alma Mater</p>
                    <p>Hail Arellano Law</p>
                    <p>Our voices will ring forever</p>
                    <p>Arellano, Arellano</p>
                    <p>O hail!</p>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <aside class="w-full md:w-1/4 sticky top-0">
          <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
              <div class="ml-4">
              <h2 class="mb-2 text-lg leading-6 font-medium text-purple-900 capitalize">On this page</h2>
              <hr class="mb-4 border-1 border-purple-800">
              </div>
              <ol class="relative ml-8 text-gray-500 border-s border-gray-200 dark:border-slate-600 dark:text-gray-400">
              <!-- Step 1: History -->
              <li 
                class="mb-10 ms-6 cursor-pointer transition-colors duration-300 hover:text-slate-900"
                :class="step === 1 && 'text-slate-900'"
                @click="setStep(1)"
              >
                <span
                  :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white', step === 1 ? 'bg-green-200 text-green-500' : 'bg-gray-100 text-gray-500']"
                >
                  <!-- Icon for History -->
                  <v-icon>mdi-book-open-variant</v-icon>
                </span>
                <h3 class="font-medium leading-tight">History</h3>
                <p class="text-sm">The evolution of Arellano University and its School of Law</p>
              </li>

              <!-- Step 2: Vision and Mission -->
              <li 
                class="mb-10 ms-6 cursor-pointer transition-colors duration-300 hover:text-slate-900"
                :class="step === 2 && 'text-slate-900'"
                @click="setStep(2)"
              >
                <span
                  :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white', step === 2 ? 'bg-green-200 text-green-500' : 'bg-gray-100 text-gray-500']"
                >
                  <!-- Icon for Vision and Mission -->
                  <v-icon>mdi-compass-outline</v-icon>
                </span>
                <h3 class="font-medium leading-tight">Vision and Mission</h3>
                <p class="text-sm">Guiding principles and purpose</p>
              </li>

              <!-- Step 3: Alma Mater Hymn -->
              <li 
                class="mb-10 ms-6 cursor-pointer transition-colors duration-300 hover:text-slate-900"
                :class="step === 3 && 'text-slate-900'"
                @click="setStep(3)"
              >
                <span
                  :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white', step === 3 ? 'bg-green-200 text-green-500' : 'bg-gray-100 text-gray-500']"
                >
                  <!-- Icon for Alma Mater Hymn -->
                  <v-icon>mdi-music-note</v-icon>
                </span>
                <h3 class="font-medium leading-tight">Alma Mater Hymn</h3>
                <p class="text-sm">The anthem of our university</p>
              </li>
            </ol>

              <div class="ml-4">
              <h2 class="text-purple-900 text-lg font-medium mb-4">Related Links</h2>
              <hr class="mb-4 border-1 border-purple-800">
              <ul class="list-inside list-disc">
                  <li v-for="(item, index) in links" :key="index" class="mb-2 font-semibold">
                  <a :href="item.url" class="text-lg font-normal text-gray-600 hover:text-slate-900">{{ item.text }}</a> 
                  </li>
              </ul>
              </div>
          </div>
          </aside>
      </div>
    </div>
  </main>
</MainLayout>
</template>

<script setup>
import { ref } from 'vue';
import { reactive, onMounted, onBeforeUnmount } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

// Create a ref for the current step
const step = ref(1); // Initially set to Step 1

// Function to set the current step
const setStep = (newStep) => {
step.value = newStep;
console.log(`Current step set to: ${newStep}`); // Debugging log
};

const links = ref([
{ text: 'Student ID Application', url: '/idApplication' },
{ text: 'AUSL Academic Calendar', url: 'acadCalendar' },
{ text: 'Medical Information Form', url: 'https://docs.google.com/forms/d/e/1FAIpQLScZXZAGt2BnVhXl35xgSxLnj8CLWlcL0FImY2jz90PzJofpPw/viewform' }, 
{ text: 'Downloadable Registrar Forms', url: '/office/registrar' }, 
{ text: 'Guideline/Payment Procedure', url: '/office/accounting' }
]);

const isMobile = reactive({ value: window.innerWidth <= 768 });

const checkIfMobile = () => {
isMobile.value = window.innerWidth <= 768;
};

onMounted(() => {
window.addEventListener('resize', checkIfMobile);
});

onBeforeUnmount(() => {
window.removeEventListener('resize', checkIfMobile);
});

</script>

<style scoped>
.container {
max-width: 1200px;
}

.sticky {
position: sticky;
top: 0;
}

.overflow-y-auto {
overflow-y: auto;
}

.h-screen {
height: 100vh;
}

.fixed {
position: fixed;
}

.bottom-4 {
bottom: 1rem;
}

.right-4 {
right: 1rem;
}

.flex {
display: flex;
}

.space-x-2 > :not([hidden]) ~ :not([hidden]) {
--tw-space-x-reverse: 0;
margin-right: calc(0.5rem * var(--tw-space-x-reverse));
margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
}

.v-btn {
margin-top: 16px;
margin-right: 8px;
}


  
.google-maps {
min-width: 100%; /* Ensure a minimum width */
height: 0;
padding-bottom: 56.25%; /* 16:9 aspect ratio */
position: relative;
overflow: hidden;
}


.google-maps iframe,
.fb-bind iframe {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
border: 0;
}

/* Responsive adjustments */
@media (max-width: 640px) {
.row {
    grid-template-columns: 1fr; /* Single column layout for mobile */
}

.google-maps,
.fb-bind {
    padding-bottom: 56.25%; /* Maintain 16:9 aspect ratio for both */
}
}

.iframe-container {
position: relative;
width: 100%;
padding-bottom: 56.25%; /* 16:9 aspect ratio (9 / 16 * 100) */
height: 0;
overflow: hidden;
}

.iframe-container iframe {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
border: 0;
}
</style>