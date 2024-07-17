<template>
    <div class="relative">
      <form class="flex items-center max-w-sm mx-auto">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="grey" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
          </div>
          <input
            type="text"
            id="simple-search"
            v-model="searchQuery"
            @focus="showSuggestions = true"
            @blur="hideSuggestions"
            class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full pl-10 py-2.5 focus:outline-none"
            placeholder="Search something..."
            required
          />
          <ul v-if="showSuggestions && filteredSuggestions.length" class="absolute bg-white dark:bg-gray-800 border border-gray-300 w-full mt-1 rounded-lg shadow-lg z-50">
            <li v-for="suggestion in filteredSuggestions" :key="suggestion.text" class="p-2 hover:bg-gray-100">
              <a :href="suggestion.link" class="block text-gray-700 dark:text-white">{{ suggestion.text }}</a>
            </li>
          </ul>
        </div>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref, watch } from 'vue';
  
  const searchQuery = ref('');
  const showSuggestions = ref(false);
  const suggestions = ref([
    { text: 'Alumni Directory', link: '#alumni-directory' },
    { text: 'Course Offerings', link: '#course-offerings' },
    { text: 'Faculty List', link: '#faculty-list' },
  ]);
  
  const filteredSuggestions = ref([]);
  
  const hideSuggestions = () => {
    setTimeout(() => {
      showSuggestions.value = false;
    }, 200);
  };
  
  watch(searchQuery, (newValue) => {
    if (newValue) {
      filteredSuggestions.value = suggestions.value.filter(suggestion =>
        suggestion.text.toLowerCase().includes(newValue.toLowerCase())
      );
    } else {
      filteredSuggestions.value = [];
    }
  });
  </script>
  
  <style scoped>
  /* Styles for the search input */
  input[type="text"] {
    background-color: white;
    border: 1px solid transparent;
    border-radius: 0.25rem;
    padding: 0.5rem;
    width: 0;
    transition: width 0.3s ease-in-out, padding 0.3s ease-in-out;
  }
  
  input[type="text"]:focus {
    width: 18rem; /* Adjust the width as needed */
    padding-left: 0.5rem;
    padding-right: 0.5rem;
    border-color: #d1d5db; /* Adjust the border color as needed */
  }
  
  /* Suggestions dropdown */
  ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  
  li {
    cursor: pointer;
  }
  
  li:hover {
    background-color: #edf2f7;
  }
  
  @media (max-width: 1024px) {
    .second-nav {
      top: 0 !important; /* Remove the top-20 class effect on tablets */
    }
  }
  
  @media (max-width: 768px) {
    .second-nav {
      top: 0 !important; /* Remove the top-20 class effect on mobile */
    }
  }
  </style>
  