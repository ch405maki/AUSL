<template>
  <MainLayout>
    <Head title="About" />

    <div class="flex flex-col min-h-screen">
      <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex flex-col md:flex-row w-full justify-center">
            <!-- Main content section -->
            <div class="w-full md:w-2/2">
              <v-card flat="true">
                <!-- <v-toolbar height="50" color="#ede9fe" class="text-3xl md:text-4xl font-bold text-left text-purple-900" :title="activeTabTitle">
                </v-toolbar> -->
                <div>
                  <v-tabs-window v-model="tab">
                    <v-tabs-window-item value="option-1">
                      <v-card flat>
                        <v-card-text>
                          <h2 class="text-2xl text-left text-purple-900 font-bold my-8">The evolution of Arellano University and its School of Law</h2>
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
                        </v-card-text>
                      </v-card>
                    </v-tabs-window-item>

                    <v-tabs-window-item value="option-2">
                      <v-card flat>
                        <v-card-text class="text-left my-8">
                          <p class="text-2xl sm:text-2xl text-purple-900 font-bold mb-4">
                            Mission Statement
                          </p>
                          <p class="text-lg font-normal text-gray-600 mb-8 ">
                            We are an institution dedicated to educate and produce in a sublime manner individuals as adept counsels of law.
                          <br>
                          <br>
                            We will advocate respect for the rule of law, human rights and dignity, defend the oppressed, protect our ecology, strive to be equal with others, serve God, our country and fellowmen.
                          </p>
                          <p class="text-2xl sm:text-2xl text-purple-900 font-bold mb-4">
                            Vision Statement
                          </p>
                          <p class="text-lg font-normal text-gray-600 mb-8">
                            We shall be the leading exponent of the Learner-Centered Method of teaching that integrates Ethics and Values in order to produce competent legal practitioners.
                          <br>
                          <br>
                            We shall advance the use of state-of-the-art technologies and methodologies to train our students to become effective partners in nation building and as future leaders of the country.
                          <br>
                          <br>
                            We shall utilize modern strategies and innovate policies in our goal to promote social justice, equality and the rule of law.
                          </p>
                        </v-card-text>
                      </v-card>
                    </v-tabs-window-item>

                    <v-tabs-window-item value="option-3">
                      <v-card flat>
                        <v-card-text class="text-left my-8">
                          <p class="text-2xl sm:text-2xl text-purple-900 font-bold mb-4">
                            Offices Directoty
                          </p>
                          <p class="text-lg font-normal text-gray-600 mb-8 ">
                            Offices Table Here ...
                          <br>
                          </p>
                        </v-card-text>
                      </v-card>
                    </v-tabs-window-item>

                      <v-tabs-window-item value="option-4">
                        <v-card flat>
                          <v-card-text class="text-center my-8">
                            <!-- Add the hymn video button and lightbox -->
                            <p class="text-2xl sm:text-2xl text-purple-900 font-bold mb-4">
                              Alma Mater Hymn
                            </p>
                            <div class="mt-4 flex justify-center items-center">
                              <video controls autoplay class="max-w-full h-auto">
                                <source src="images/about/auslHymn.mp4" type="video/mp4">
                              </video>
                            </div>
                            <!-- Lyrics of the hymn -->
                            <div class="mt-8 text-center">
                              <p class="text-2xl sm:text-2xl font-bold text-purple-900 mb-2">Hail to the Chief</p>
                              <p class="text-lg text-gray-600 mb-4">By Dean Mariano F. Magsalin, Jr.</p>
                              <div class="font-semibold tracking-wide">
                                <p class="text-xl text-gray-700 mb-2">Hail Alma Mater</p>
                                <p class="text-xl text-gray-700 mb-2">Hail to the Chief</p>
                                <p class="text-xl text-gray-700 mb-2">Hail Arellano Law</p>
                                <p class="text-xl text-gray-700 mb-2">Our loyalty we pledge to keep</p>
                                <p class="text-xl text-gray-700 mb-2">Our hearts and minds do commit</p>
                                <p class="text-xl text-gray-700 mb-2">To stand for what is just and right</p>
                                <p class="text-xl text-gray-700 mb-2">To always be the best</p>
                                <br>
                                <p class="text-xl text-gray-700 mb-2">Hail to the Chief</p>
                                <p class="text-xl text-gray-700 mb-2">Hail Alma Mater</p>
                                <p class="text-xl text-gray-700 mb-2">Hail Arellano Law</p>
                                <p class="text-xl text-gray-700 mb-2">Our voices will ring forever</p>
                                <p class="text-xl text-gray-700 mb-2">Arellano, Arellano</p>
                                <p class="text-xl text-gray-700 mb-2">O hail!</p>
                              </div>
                            </div>
                          </v-card-text>
                        </v-card>
                      </v-tabs-window-item>
                  </v-tabs-window>
                </div>
              </v-card>
            </div>
            <!-- End main content section -->
            <!-- Links -->
            <div class="w-full md:w-1/5 p-2 flex justify-start mt-9">
              <div class="text-left">
                <div class="mb-2">
                  <h2 class="mb-2 text-lg leading-6 font-bold text-purple-900 capitalize ">On this page</h2>
                  <hr class="mb-2 border-1 border-purple-800">
                  <v-tabs v-model="tab" color="#22c55e" direction="vertical">
                    <v-tab style="none" value="option-1">
                      <h1 :class="{'text-grey-800': tab !== 'option-1', 'capitalize text-base text-slate-600 hover:text-slate-900': true, 'text-purple-900': tab === 'option-1'}">History of AUSL</h1>
                    </v-tab>
                    <v-tab value="option-2">
                      <h1 :class="{'text-grey-800': tab !== 'option-2', 'capitalize text-base text-slate-600 hover:text-slate-900': true, 'text-purple-900': tab === 'option-2'}">Mission and Vision</h1>
                    </v-tab>
                    <v-tab value="option-3">
                      <h1 :class="{'text-grey-800': tab !== 'option-3', 'capitalize text-base text-slate-600 hover:text-slate-900': true, 'text-purple-900': tab === 'option-3'}">Offices Directory</h1>
                    </v-tab>
                    <v-tab value="option-4">
                      <h1 :class="{'text-grey-800': tab !== 'option-4', 'capitalize text-base text-slate-600 hover:text-slate-900': true, 'text-purple-900': tab === 'option-4'}">Alma Mater Hymn</h1>
                    </v-tab>
                  </v-tabs>
                </div>
              </div>
            </div>
            <!-- End Links -->
          </div>
        </div>
      </main>
    </div>
  </MainLayout>
</template>

<script setup>
import { Link, Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import { ref, computed, onMounted, onUnmounted } from 'vue';
import MainLayout from '@/Layouts/MainLayout.vue';

// Define props here
const props = defineProps({
  post: {
    type: Object,
    required: true,
  },
});

const tab = ref('option-1');

const screenWidth = ref(window.innerWidth);

const updateScreenSize = () => {
  screenWidth.value = window.innerWidth;
};

const isSmallScreen = computed(() => screenWidth.value < 640);
const isBigScreen = computed(() => screenWidth.value >= 640);
</script>

<style scoped>
@import url('https://db.onlinewebfonts.com/c/14ab77252fbc4bdca1dbdf8051cb7e96?family=BF+Invicta+W00+Bold');

.text-invicta {
  font-family: 'BF Invicta W00 Bold', sans-serif;
}

.soft-shadow {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

</style>