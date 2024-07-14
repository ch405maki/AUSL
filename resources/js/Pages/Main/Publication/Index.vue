<template>
    <div class="mt-6">
      <div class="basis-full md:basis-1/2 flex flex-col justify-center items-center px-4 py-4">
        <h1 class="text-purple-900 font-bold mb-3 font-bold mt-2 text-xl sm:text-3xl text-center">Header Here...</h1>
        <p class="text-lg text-slate-700 text-center tracking-wide">
          Sub Header Here...
        </p>
      </div>
    </div>
  
    <!-- horizontal carousel area -->
    <div class="row px-2 py-2 mb-6">
      <div class="carousel-container">
        <div class="carousel">
          <div class="carousel-item" v-for="(item, index) in items" :key="index">
            <img :src="item.image" alt="Publication Image" class="carousel-image" />
            <p class="carousel-caption">{{ item.caption }}</p>
          </div>
        </div>
      </div>
    </div>
    <!--End horizontal carousel area -->
  </template>
  
  <script>
  import { ref } from 'vue';
  
  export default {
    setup() {
      const items = ref([

        { image: '/images/004.jpg', caption: 'Publication 4' },
        { image: '/images/004.jpg', caption: 'Publication 4' },
        { image: '/images/004.jpg', caption: 'Publication 4' },
        { image: '/images/004.jpg', caption: 'Publication 4' },
        { image: '/images/004.jpg', caption: 'Publication 4' },
      ]);
  
      return {
        items,
      };
    },
  };
  </script>
  
  <style scoped>
  .carousel-container {
    display: flex;
    justify-content: center;
    overflow-x: auto;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }
  
  .carousel {
    display: flex;
    flex-direction: row;
    justify-content: center;
  }
  
  .carousel-item {
    display: inline-block;
    width: 200px;
    margin-right: 16px;
    text-align: center;
  }
  
  .carousel-image {
    width: 100%;
    height: auto;
    border-radius: 8px;
  }
  
  .carousel-caption {
    margin-top: 8px;
    font-size: 1rem;
    color: #333;
  }
  </style>