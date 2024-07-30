<template>
    <div class="mt-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="basis-full md:basis-1/2 flex flex-col justify-center items-center px-4 py-4">
        <h1 class="text-purple-900 font-bold mb-3 font-bold mt-2 text-xl sm:text-3xl text-center">Alumni Testimonials</h1>
        <p class="text-lg text-slate-700 text-center tracking-wide">
          Sub Header Here...
        </p>
      </div>
  
      <!-- Cards area -->
      <div class="row px-2 py-2 mb-6">
        <div class="cards-container pt-9">
          <div class="card" v-for="(item, index) in items" :key="index">
            <div class="card-avatar-container">
              <img :src="item.image" alt="Alumni Image" class="card-avatar" />
            </div>
            <div class="card-content">
                <h2 class="card-name">{{ item.name }}</h2>
                <p class="card-caption italic" v-html="item.content"></p>
            </div>
          </div>
        </div>
      </div>
      <!-- End cards area -->
    </div>
  </template>
  
  <script setup>
  import { defineProps, onMounted } from 'vue';
  
  const props = defineProps({
    items: { type: Array, required: true },
  });
  
  onMounted(() => {
    const container = document.querySelector('.cards-container');
    let isDown = false;
    let startX;
    let scrollLeft;
  
    container.addEventListener('mousedown', (e) => {
      isDown = true;
      container.classList.add('active');
      startX = e.pageX - container.offsetLeft;
      scrollLeft = container.scrollLeft;
    });
  
    container.addEventListener('mouseleave', () => {
      isDown = false;
      container.classList.remove('active');
    });
  
    container.addEventListener('mouseup', () => {
      isDown = false;
      container.classList.remove('active');
    });
  
    container.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - container.offsetLeft;
      const walk = (x - startX) * 2; // Scroll-fast
      container.scrollLeft = scrollLeft - walk;
    });
  });
  </script>
  
  <style scoped>
  .cards-container {
    display: flex;
    flex-wrap: nowrap; /* Ensure no wrapping to keep it horizontal */
    gap: 1rem;
    overflow-x: auto; /* Enable horizontal scrolling */
    padding-bottom: 1rem; /* Optional: Add padding for scrollbar space */
    -webkit-overflow-scrolling: touch; /* Smooth scrolling on mobile devices */
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* Internet Explorer 10+ */
  }
  
  .cards-container::-webkit-scrollbar {
    display: none; /* Safari and Chrome */
  }
  
  .card {
    background: linear-gradient(135deg, #f3e7e9 0%, #e3eeff 100%);
    border: 1px solid #ddd;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: visible; /* Allow overflow */
    min-width: 300px; /* Set minimum width to keep cards same size */
    margin: 1rem 0; /* Adjust margin to avoid top and bottom space */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    position: relative;
    padding-top: 60px; /* Adjusted to make space for the avatar */
  }
  
  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }
  
  .card-avatar-container {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: -40px; /* Adjusted to position the avatar half outside the card */
    left: 50%;
    transform: translateX(-50%);
  }
  
  .card-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    transition: transform 0.3s ease;
    border: 2px solid #fff; /* Optional: Add a border to the avatar */
  }
  
  .card:hover .card-avatar {
    transform: scale(1.05);
  }
  
  .card-content {
    padding: 1.5rem;
  }
  
  .card-name {
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
    margin-top: 0.5rem;
  }
  
  .card-caption {
    font-size: 1rem;
    color: #555;
    margin-top: 0.5rem;
  }
  </style>
  