<template>
    <MainLayout>
      <Head title="Dean's Message" />
      <Header>Dean's Message</Header>
      <main class="flex-grow">
        <div class="container mx-auto px-4 py-4 lg:py-8">
          <!-- First Section -->
          <div class="flex flex-col md:flex-row justify-center mb-10">
            <!-- Main content section -->
            <div class="w-full md:w-2/3 p-4 order-2 md:order-1 text-slate-600 reveal-text">
              <p class="text-left mb-4 font-bold text-lg md:text-xl text-official-purple-800 lg:text-2xl">Welcome to the Arellano University School of Law website!</p>
              <p class="mb-4 font-normal text-md lg:text-lg text-slate-800 text-justify">
                The school administration has always striven to make you, our students, feel that you belong to a community, the Arellano Law Community, and this website is one way for you to know more about your law school. Here you'll find information on the academic programs and different offices of the AUSL, a gallery of school events, as well as helpful tabs that will lead you to Lawphil, one of the most searched online sources of legal information, the school's publications, and links to websites such as those of the senate and House of Representatives which may prove useful to students and legal researchers.
              </p>
              <p class="mb-4 font-normal text-md lg:text-lg text-slate-800 text-justify">
                Beyond learning more about the law school and updating you with school events, the resources available here can only be as relevant as the way you make use of them. Coupled with traditional values of studying hard and judicious time management, theses resources will help make your study the law convenient and even let you save on resources.
              </p>
            </div>
            <!-- Dean's information section -->
            <div class="w-full md:w-1/3 p-4 text-center order-1 md:order-2">
              <img src="/images/deans/deannavarro.png" alt="Dean Navarro" class="w-48 h-auto mx-auto mb-4">
              <b class="block text-lg text-slate-800">Atty. Domingo M. Navarro</b>
              <i class="block text-slate-700">Dean</i>
              <i class="block text-slate-700">(2016 - Present)</i>
            </div>
          </div>
  
          <!-- Second Section -->
          <div class="flex flex-col md:flex-row justify-center mb-10">
            <!-- Dean's information section -->
            <div class="w-full md:w-1/3 p-4 text-center order-1 md:order-1">
              <img src="images/deans/deansundiang.jpg" alt="Dean Sundiang" class="w-48 h-auto mx-auto mb-4">
              <b class="block text-lg text-slate-800">Atty. Jose R. Sundiang</b>
              <i class="block text-slate-700">Dean</i>
              <i class="block text-slate-700">(2007 - 2012)</i>
            </div>
            <!-- Main content section with scrollable area -->
            <div class="w-full md:w-2/3 p-4 order-2 md:order-2 text-slate-600 reveal-text">
              <div class="pr-4">
                <div class="mb-8">
                <p class="mb-4 font-normal text-md lg:text-lg text-slate-800 text-justify">
                  We have you in mind when we redesigned this site. Please take a few moments to browse through our offerings. We have something for everyone, whether you're a current member of the community, a potential student, part of our extensive alumni/network, and or an interested visitor.
                </p>
                <p class="mb-4 font-normal text-md lg:text-lg text-slate-800 text-justify">
                  Established in 1938, the law school formed the nucleus of Arellano University. Named after the first Filipino Chief Justice of the Supreme Court, Cayetano S. Arellano, the original school was located in historic Intramuros. In 1979, Arellano University turned over the management of the law school to the Arellano Law Foundation and in 1997, the agreement between Arellano University and the Arellano Law Foundation was amended to grant full fiscal autonomy to the Foundation.
                </p>
                <div v-if="showMore">
                  <p class="mb-4 font-normal text-md lg:text-lg text-slate-800 text-justify">
                    Arellano Law Foundation is a non-profit, non-stock organization established by alumni and faculty members of Arellano University for the purpose of contributing to the upgrading of the standards legal profession and to the efficient, fair, and honest administration of justice. Its major project in the attainment of this objective is the operation of the law school.
                  </p>
                  <p class="mb-4 font-normal text-md lg:text-lg text-slate-800 text-justify">
                    The law school aims to create global lawyers, practitioners who are deeply educated in the law, practice-ready, and devoted to service not only in the local but also the international community. Under its new mission and vision, the school gives comprehensive and enlightened training to prepare its graduates for law practice and public services, and for law teaching and legal scholarship.
                  </p>
                  <p class="mb-4 font-normal text-md lg:text-lg text-slate-800 text-justify">
                    The law school has always endeavored to be in step with the technological innovations and ease offered by the use of the Internet. In September 2000, we launched Lawphil.net, one of the Internet's top education references, serving the research needs of lawyers and law students, media practitioners, government offices, and foreign entities with an online law library at no cost. In January 2007 we partnered with the AsianLII (<a href="http://www.asianlii.org">www.asianlii.org</a>), a non-profit and free access website for legal information from 27 countries and territories in Asia. Soon the school will be subscribing to Westlaw, an online legal research service providing quick, easy access to a vast collection of US statutes, case law materials, public records and other legal resources, as well as current news articles and business information.
                  </p>
                  <p class="mb-4 font-normal text-md lg:text-lg text-slate-800 text-justify">
                    We have partnered with the Supreme Court e-Library to provide them with digital copies of Philippine laws. The law school's e-Law Center is also working on the Creative Commons-Philippine Project. Creative Commons is a non-profit organization that provides licenses offering a flexible range of protections and freedoms for authors, artist, and educators. These licenses are built upon the "all rights reserved" concept of traditional copyright to offer a voluntary "some rights reserved" approach.
                  </p>
                  <p class="mb-4 font-normal text-md lg:text-lg text-slate-800 text-justify">
                    We appreciate your interest in visiting our website, and we hope that we have been of help to you. Bookmarks us now!
                  </p>
                </div>
                </div>
                <a @click.prevent="toggleShowMore" class="text-purple-900 font-normal mb-4 border-[2px] border-official-purple-800 hover:bg-official-purple-800 hover:text-white rounded-xl px-4 py-2 transition-colors duration-300 cursor-pointer">
                  {{ showMore ? 'Read Less' : 'Read More' }}
                </a>
              </div>
            </div>
          </div>
  
          <!-- Third Section -->
          <div class="flex flex-col md:flex-row justify-center mb-4">
            <!-- Main content section -->
            <div class="w-full md:w-2/3 p-4 order-2 md:order-1 text-slate-600 reveal-text">
              <div class="pr-4 mb-8">
                <p class="mb-4 font-normal text-md lg:text-lg text-slate-800 text-justify">
                  This site has been redesigned to better enable you to benefit from our offerings, be you a current member of the community, a potential new student, part of our extensive alumni/network, or an interested visitor.
                </p>
                <p class="mb-4 font-normal text-md lg:text-lg text-slate-800 text-justify">
                  Established in 1938, Arellano boasts of more than six decades of providing quality legal education. Under its new mission and vision, the School gives comprehensive and enlightened training to prepare its graduates for law practice and public service, and for law teaching and legal scholarship.
                </p>
                <p class="mb-4 font-normal text-md lg:text-lg text-slate-800 text-justify">
                  Our objective is to create global lawyers, practitioners who are deeply educated in the law, practice-ready, and devoted to service not only in the local but also the international community. Our law students are the center of all our decisions. The curriculum, library, use of technology, student services and other facilities all focus on the welfare of the more than 800 individual students who choose to enter the legal profession through our doors.
                </p>
                <div v-if="ShowMoresecond">
                  <p class="mb-4 font-normal text-md lg:text-lg text-slate-800 text-justify">
                  Arellano Law School is also a community - a place where students will spend some of the most rewarding years of their lives working together in an environment that asks that students contribute to each others' learning and leave the law school a better place than it was when they arrived.
                  </p>
                  <p class="mb-4 font-normal text-md lg:text-lg text-slate-800 text-justify">
                    During their years here, our students develop the global vision, a moral compass and ultimately the values that will enable them to help shape the goals of the communities that they will be joining upon graduation. Arellano Law School embodies the finest values of legal education a deeply held respect for the beliefs, ideas and traditions of others; an unending search for the fullest understanding of the law; and a dedication to the pursuit of environmental, social, legal and global justice.
                  </p>
                </div>
              </div>
              <a @click.prevent="toggleShowMoresecond" class="text-purple-900 font-normal mb-4 border-[2px] border-official-purple-800 hover:bg-official-purple-800 hover:text-white rounded-xl px-4 py-2 transition-colors duration-300 cursor-pointer">
                  {{ ShowMoresecond ? 'Read Less' : 'Read More' }}
                </a>
            </div>
            <!-- Dean's information section -->
            <div class="w-full md:w-1/3 p-4 text-center order-1 md:order-2">
              <img src="images/deans/deanMagsalin.jpg" alt="Dean Magsalin" class="w-48 h-auto mx-auto mb-4">
              <b class="block text-lg text-slate-800">Atty. Mariano F. Magsalin, Jr.</b>
              <i class="block text-slate-700">Dean & Executive Director</i>
              <i class="block text-slate-700">(1994 - 2007)</i>
            </div>
          </div>
        </div>
      </main>
    </MainLayout>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { Head } from '@inertiajs/vue3';
  import { Inertia } from '@inertiajs/inertia';
  import MainLayout from '@/Layouts/MainLayout.vue';
  import Header from '../../Components/Header.vue';

  const showMore = ref(false);
  const ShowMoresecond = ref(false);
  
  function toggleShowMore() {
    showMore.value = !showMore.value;
  }

  function toggleShowMoresecond() {
    ShowMoresecond.value = !ShowMoresecond.value;
  }
  </script>
  
  <style scoped>
  @media (max-width: 767px) {
    .order-1 {
      order: 1 !important;
    }
    .order-2 {
      order: 2 !important;
    }
  }
  @media (min-width: 768px) {
    .md\:order-1 {
      order: 1 !important;
    }
    .md\:order-2 {
      order: 2 !important;
    }
  }
  
  /* Text reveal animation */
  .reveal-text {
    opacity: 0;
    transform: translateY(20px);
    animation: reveal 1s forwards;
  }
  
  @keyframes reveal {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  </style>