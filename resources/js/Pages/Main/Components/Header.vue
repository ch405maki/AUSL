<template>
    <div class="relative mb-4">
      <img src="/images/headerbg.jpg" alt="Background Image" class="w-full h-auto object-cover" />
      <div class="absolute inset-0 flex items-center justify-center">
        <h1 class="text-white text-2xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold text-center">
          <span ref="typewriterText"></span>
        </h1>
      </div>
    </div>
  </template>
  
  <script>
  import { ref, onMounted } from 'vue';
  
  export default {
    setup(_, { slots }) {
      const typewriterText = ref(null);
      const typingSpeed = 50; // Adjust typing speed in milliseconds
  
      onMounted(() => {
        if (slots.default && slots.default().length > 0) {
          const textContent = slots.default()[0].children;
          let index = 0;
          const typeText = () => {
            if (typewriterText.value && index < textContent.length) {
              typewriterText.value.innerHTML += textContent[index];
              index++;
              setTimeout(typeText, typingSpeed);
            }
          };
          typeText();
        }
      });
  
      return { typewriterText };
    },
  };
  </script>
  
  <style scoped>
  /* Additional styling can be added here if needed */
  </style>
  