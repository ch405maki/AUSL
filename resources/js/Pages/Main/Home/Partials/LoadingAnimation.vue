<template>
    <div class="flex justify-center items-center h-screen">
      <img src="/images/alflogo.png" alt="Loading" class="bounce-animation h-30 w-28"/>
    </div>
  </template>
  
  <script setup>
  </script>
  
  <style scoped>
  @keyframes bounce {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-15px);
    }
  }
  
  .bounce-animation {
    animation: bounce 1s infinite;
  }
  </style>
  