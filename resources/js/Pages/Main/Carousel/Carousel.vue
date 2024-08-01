<template>

  <v-carousel
    :height="carouselHeight"
    show-arrows="hover"
    cycle
    hide-delimiter-background
  >
    <v-carousel-item
      v-for="(item, i) in items"
      :key="i"
      :src="item.image"
      class="relative max-h-full"
      cover
      >
    </v-carousel-item>
      <div class="absolute inset-0 flex items-center justify-end p-4">
      <button >
        <div v-for="(banner, index) in banners" :key="index">
        <a :href="banner.link" class="enroll-link font-sans text-purple-900 hover:text-purple-950 pr-16 py-2 rounded relative hidden sm:block">
          {{ banner.title }}
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
      </div>  
  </v-carousel>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';


const props = defineProps({
  items: {
  type: Array,
  required: true
  },
  banners: {
    type: Array,
    required: false
  }
});

const carouselHeight = ref('400px');

const updateCarouselHeight = () => {
if (window.innerWidth <= 768) {
  carouselHeight.value = '200px';
} else if (window.innerWidth <= 1024) {
  carouselHeight.value = '300px';
} else {
  carouselHeight.value = '400px';
}
};

onMounted(() => {
updateCarouselHeight();
window.addEventListener('resize', updateCarouselHeight);
});

onUnmounted(() => {
window.removeEventListener('resize', updateCarouselHeight);
});
</script>

<style scoped>
.enroll-link {
@apply font-extrabold italic text-4xl sm:text-6xl lg:text-8xl;
-webkit-text-stroke: 3px white;
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
