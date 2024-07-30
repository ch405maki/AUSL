<template>
    <section class="relative bg-purple-200 bg-blend-multiply">
      <div class="absolute inset-10 bg-center sm:bg-right bg-no-repeat bg-[url('/images/student/alflogo.png')] opacity-10 sm:opacity-30 bg-contain"></div>
      <div class="relative max-w-7xl mx-auto px-6 sm:px-6 lg:px-8 sm:py-6 py-8 reveal-text">
        <h1 class="py-4 text-2xl font-extrabold tracking-tight leading-none text-slate-700 md:text-2xl lg:text-2xl">
          Welcome to Arellano Law Community
        </h1>
        <p class="mb-8 text-left text-lg font-medium text-slate-800">
          Arellano University School of Law (AUSL) is one of the premier law schools in the Philippines. Established in 1938, AUSL has a long-standing tradition of excellence in legal education. The school is named after Cayetano Arellano, the first Chief Justice of the Supreme Court of the Philippines. AUSL is known for its rigorous academic programs, distinguished faculty, and a strong commitment to producing competent and ethical lawyers. The school offers a comprehensive curriculum that covers various areas of law, including constitutional law, civil law, criminal law, and international law. AUSL also provides students with practical training through its legal clinics and internship programs, ensuring that graduates are well-prepared for the challenges of legal practice.
        </p>
      </div>
    </section>
  
    <div class="container mx-auto py-4 lg:py-8">
      <!-- First Section -->
      <div class="flex flex-col md:flex-row justify-center bg-white rounded-lg p-1 reveal-text">
        <!-- Dean's information section -->
        <div class="w-full md:w-1/3 p-4 text-center order-1 md:order-1">
          <img src="images/deans/deannavarro.jpg" alt="Dean Navarro" class="w-48 h-auto mx-auto mb-4 rounded-full">
          <b class="block text-lg text-slate-900">Atty. Domingo M. Navarro</b>
          <i class="block text-slate-600">Dean</i>
        </div>
        <!-- Main content section -->
        <div class="w-full md:w-2/3 p-4 order-2 md:order-2 text-slate-700">
          <p class="text-justify mb-4 font-extrabold text-2xl md:text-2xl lg:text-2xl">Welcome to the Arellano University School of Law website!</p>
          <p class="text-justify mb-4 font-medium text-lg">
            The school administration has always striven to make you, our students, feel that you belong to a community, the Arellano Law Community, and this website is one way for you to know more about your law school. Here you'll find information on the academic programs and different offices of the AUSL, a gallery of school events, as well as helpful tabs that will lead you to Lawphil, one of the most searched online sources of legal information, the school's publications, and links to websites such as those of the senate and House of Representatives which may prove useful to students and legal researchers.
          </p>
          <p class="text-justify font-medium text-lg" v-if="showMore">
            Beyond learning more about the law school and updating you with school events, the resources available here can only be as relevant as the way you make use of them. Coupled with traditional values of studying hard and judicious time management, these resources will help make your study of the law convenient and even let you save on resources.
          </p>
          <a href="#" @click.prevent="toggleShowMore" class="text-purple-900 hover:underline mb-4">
            {{ showMore ? 'Read Less' : 'Read More' }}
          </a>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted, onUnmounted } from 'vue';
  
  const showMore = ref(false);
  
  function toggleShowMore() {
    showMore.value = !showMore.value;
  }
  
  const revealElements = ref([]);
  
  function revealOnScroll(entries, observer) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }
  
  onMounted(() => {
    revealElements.value = document.querySelectorAll('.reveal-text');
    const observer = new IntersectionObserver(revealOnScroll, {
      threshold: 0.1
    });
    revealElements.value.forEach(el => observer.observe(el));
  });
  
  onUnmounted(() => {
    if (revealElements.value.length) {
      revealElements.value.forEach(el => {
        el.classList.remove('visible');
      });
    }
  });
  </script>
  
  <style scoped>
  @import url('https://db.onlinewebfonts.com/c/14ab77252fbc4bdca1dbdf8051cb7e96?family=BF+Invicta+W00+Bold');
  
  .text-invicta {
    font-family: 'BF Invicta W00 Bold', sans-serif;
  }
  .bg-contain {
    background-size: contain;
  }
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
    transition: opacity 1s ease-out, transform 1s ease-out;
  }
  .reveal-text.visible {
    opacity: 1;
    transform: translateY(0);
  }
  </style>
  