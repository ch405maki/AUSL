<template>
  <div>
    <HeadBar :banners="banners" />
    <!-- First Navigation Bar -->
    <nav ref="firstNav" class="bg-official-purple-800 hidden lg:block z-50 border-b-[1px] fixed top-[26px] left-0 right-0 transition-all duration-300">
      <!-- Primary Navigation Menu -->
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">  
        
        <div class="flex justify-between h-18 items-center">
          <div class="flex items-center">
            <!-- Logo -->
            <div class="shrink-0 flex items-center text-white py-2">
              <Link :href="route('login')" class="flex items-center">
                <img src="/images/auLogo.png" alt="Image Logo" class="max-w-full h-full max-h-14 mr-4 hover:scale-105 transition-transform duration-300">
              </Link>
              <div>
                <div class="garamond uppercase font-bold text-xl tracking-wide leading-tight">ARELLANO UNIVERSITY</div>
                <hr class="border-t-2 border-white">
                <div class="garamond uppercase font-bold text-xl tracking-wide leading-tight text-center">SCHOOL OF LAW</div>
              </div>
              <Link :href="route('login')" class="flex items-center">
                <img src="/images/ausllogo2.png" alt="Image Logo" class="max-w-full h-full max-h-14 ml-4 hover:scale-105 transition-transform duration-300">
              </Link>
            </div>
          </div>
          <!-- Static Text and Search Bar -->
          <div class="relative inset-0 flex items-center justify-end z-10 space-x-4"> <!-- Added space-x-4 for spacing -->
            <button v-if="banners.length">
              <div>
                <a :href="banners[0].link" class="enroll-link font-sans text-purple-900 hover:text-purple-950 rounded relative hidden sm:block">
                  {{ banners[0].title }}
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                </a>
              </div>
              <div class="star-1">
                <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><defs></defs><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"></metadata><path d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z" class="fil0"></path></g></svg>
              </div>
              <div class="star-2">
                <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><defs></defs><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"></metadata><path d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z" class="fil0"></path></g></svg>
              </div>
              <div class="star-3">
                <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><defs></defs><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"></metadata><path d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z" class="fil0"></path></g></svg>
              </div>
              <div class="star-4">
                <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><defs></defs><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"></metadata><path d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z" class="fil0"></path></g></svg>
              </div>
              <div class="star-5">
                <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><defs></defs><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"></metadata><path d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z" class="fil0"></path></g></svg>
              </div>
              <div class="star-6">
                <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><defs></defs><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"></metadata><path d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z" class="fil0"></path></g></svg>
              </div>
            </button>
            <SearchBar />
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import SearchBar from './SearchBar.vue';
import HeadBar from './HeadBar.vue';

const banners = ref([]); // Store banners as an array

const fetchBanners = async () => {
  try {
    const response = await fetch('/banners');
    banners.value = await response.json(); // Fetch the data as an array
  } catch (error) {
    console.error('Error fetching banners:', error);
  }
};

onMounted(fetchBanners);
</script>

<style scoped>
@import url('https://db.onlinewebfonts.com/c/2bf40ab72ea4897a3fd9b6e48b233a19?family=Garamond');

.garamond {
  font-family: 'Garamond', serif;
}

.nav-btn {
  font-size: 0.875rem;
  color: white;
  transition: color 0.3s ease-in-out;
  padding: 0.5rem 0.75rem;
  margin-right: 0.25rem;
}

.nav-btn:hover {
  color: #e2e8f0;
}

.active-tab {
  color: whitesmoke;
  border-bottom: 2px solid whitesmoke;
}

.main-content {
  transition: padding-top 0.2s ease-in-out;
}

/* Responsive adjustments */
@media (max-width: 1024px) {
  .nav-btn {
    font-size: 0.75rem;
    padding: 0.375rem 0.5rem;
  }
}

@media (max-width: 768px) {
  .nav-btn {
    font-size: 0.625rem;
    padding: 0.25rem 0.375rem;
  }
}

/* Multi-level dropdown */
li > ul {
  transform: translateX(100%) scale(0);
}

li:hover > ul {
  transform: translateX(101%) scale(1);
}

li > button svg {
  transform: rotate(-90deg);
}

li:hover > button svg {
  transform: rotate(-270deg);
}

.group:hover .group-hover\:scale-100 {
  transform: scale(1);
}

.group:hover .group-hover\:-rotate-180 {
  transform: rotate(180deg);
}

.scale-0 {
  transform: scale(0);
}

.min-w-32 {
  min-width: 8rem;
}


/* start of the navbar */

.carousel-static-text {
    position: absolute;
    top: 10%; /* Adjust as needed */
    left: 10%; /* Adjust as needed */
    z-index: 10;
    color: white; /* Adjust text color */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Optional: add shadow for better visibility */
  }
  
  .carousel-item {
    position: relative;
    overflow: hidden;
  }
  
  .enroll-link {
    @apply font-extrabold italic text-xl sm:text-2xl lg:text-4xl;
    -webkit-text-stroke: 1px white;
    position: relative;
    overflow: hidden;
    }
    
    .enroll-link::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 50%;
    width: 20px;
    height: 20px;
    background-color: #f7fafc;
    border-radius: 50%;
    animation: confetti 0.5s ease-out;
    animation-fill-mode: forwards;
    z-index: -1;
    transform: translate(-50%, -50%);
    opacity: 0;
    }
    
    @keyframes confetti {
    0% {
      transform: translate(-50%, -50%) rotate(0deg);
      opacity: 1;
    }
    100% {
      transform: translate(-50%, -50%) rotate(360deg);
      opacity: 0;
    }
    }
    
    @media (max-width: 768px) {
    .enroll-link {
      -webkit-text-stroke: 1px white; /* Thinner stroke for mobile screens */
    }
    }
    
    /* Efect Stars */
    
    button {
    position: relative;
    padding: 12px 35px;
    background: var(--color);
    font-size: 20px;
    font-weight: 500;
    color: #181818;
    border: 3px solid var(--color);
    border-radius: 8px;
    box-shadow: 0 0 0 #fec1958c;
    transition: all .3s ease-in-out;
    cursor: pointer;
    }
    
    .star-1 {
    position: absolute;
    top: 20%;
    left: 20%;
    width: 25px;
    height: auto;
    filter: drop-shadow(0 0 0 #fffdef);
    z-index: -5;
    transition: all 1s cubic-bezier(0.05, 0.83, 0.43, 0.96);
    }
    
    .star-2 {
    position: absolute;
    top: 45%;
    left: 45%;
    width: 15px;
    height: auto;
    filter: drop-shadow(0 0 0 #fffdef);
    z-index: -5;
    transition: all 1s cubic-bezier(0, 0.4, 0, 1.01);
    }
    
    .star-3 {
    position: absolute;
    top: 40%;
    left: 40%;
    width: 5px;
    height: auto;
    filter: drop-shadow(0 0 0 #fffdef);
    z-index: -5;
    transition: all 1s cubic-bezier(0, 0.4, 0, 1.01);
    }
    
    .star-4 {
    position: absolute;
    top: 20%;
    left: 40%;
    width: 8px;
    height: auto;
    filter: drop-shadow(0 0 0 #fffdef);
    z-index: -5;
    transition: all .8s cubic-bezier(0, 0.4, 0, 1.01);
    }
    
    .star-5 {
    position: absolute;
    top: 25%;
    left: 45%;
    width: 15px;
    height: auto;
    filter: drop-shadow(0 0 0 #fffdef);
    z-index: -5;
    transition: all .6s cubic-bezier(0, 0.4, 0, 1.01);
    }
    
    .star-6 {
    position: absolute;
    top: 5%;
    left: 50%;
    width: 5px;
    height: auto;
    filter: drop-shadow(0 0 0 #fffdef);
    z-index: -5;
    transition: all .8s ease;
    }
    
    
    button:hover .star-1 {
    position: absolute;
    top: -80%;
    left: -30%;
    width: 25px;
    height: auto;
    filter: drop-shadow(0 0 10px #fffdef);
    z-index: 2;
    }
    
    button:hover .star-2 {
    position: absolute;
    top: -25%;
    left: 10%;
    width: 15px;
    height: auto;
    filter: drop-shadow(0 0 10px #fffdef);
    z-index: 2;
    }
    
    button:hover .star-3 {
    position: absolute;
    top: 55%;
    left: 25%;
    width: 5px;
    height: auto;
    filter: drop-shadow(0 0 10px #fffdef);
    z-index: 2;
    }
    
    button:hover .star-4 {
    position: absolute;
    top: 30%;
    left: 80%;
    width: 8px;
    height: auto;
    filter: drop-shadow(0 0 10px #fffdef);
    z-index: 2;
    }
    
    button:hover .star-5 {
    position: absolute;
    top: 25%;
    left: 115%;
    width: 15px;
    height: auto;
    filter: drop-shadow(0 0 10px #fffdef);
    z-index: 2;
    }
    
    button:hover .star-6 {
    position: absolute;
    top: 5%;
    left: 60%;
    width: 5px;
    height: auto;
    filter: drop-shadow(0 0 10px #fffdef);
    z-index: 2;
    }
    
    .fil0 {
    fill: #FFFDEF
    }
</style>
