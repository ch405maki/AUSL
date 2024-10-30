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
          class="bg-white border border-gray-300 dark:border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full pl-10 py-2.5 focus:outline-none"
          placeholder="Search something..."
          required
        />
        <ul v-if="showSuggestions && filteredSuggestions.length" class="absolute bg-white border border-gray-300 w-full mt-1 rounded-lg shadow-lg z-50">
          <li v-for="suggestion in filteredSuggestions" :key="suggestion.text" class="p-2 hover:bg-gray-100 rounded-lg shadow-lg">
            <a :href="suggestion.link" class="block text-gray-700" @click="navigateTo(suggestion.link)">{{ suggestion.text }}</a>
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
  { text: 'Home', link: '/' },
  { text: 'Gallery Browse', link: '/gallery/browse' },
  { text: 'Gallery Item', link: '/gallery/browse/{id}' },
  { text: 'Student Oath', link: '/student/oath' },
  { text: 'About History', link: '/history' },
  { text: 'Deans Message', link: '/deans_message' },
  { text: 'Deans Corner', link: '/deans corner' },
  { text: 'Administration', link: '/administration/alf' },
  { text: 'Board of Trustees', link: '/administration/board_trustees' },
  { text: 'Admin Staff', link: '/administration/admin_staff' },
  { text: 'Departments', link: '/administration/departments' },
  { text: 'Department Details', link: '/administration/departments/show/{id}' },
  { text: 'ITC Department', link: '/administration/departments/itc' },
  { text: 'Contact Us', link: '/contact' },
  { text: 'Social Media', link: '/contact/socials' },
  { text: 'Location', link: '/contact/location' },
  { text: 'Curriculum', link: '/academic/curiculumn' },
  { text: 'Course Description', link: '/academic/course_description' },
  { text: 'Juris Doctor Program', link: '/academic/juris-doctor' },
  { text: 'Guidelines', link: '/academic/guidelines' },
  { text: 'Refresher Course', link: '/academic/refresher' },
  { text: 'Bar Review', link: '/academic/barreview' },
  { text: 'Admissions Process', link: '/admissions/process' },
  { text: 'Admission Requirements', link: '/admissions/requirements' },
  { text: 'Application Forms', link: '/admissions/application-forms' },
  { text: 'Student ID Information', link: '/admissions/id' },
  { text: 'Academic Calendar', link: '/events/academic' },
  { text: 'Upcoming Events', link: '/events/upcomming' },
  { text: 'Holidays', link: '/events/holidays' },
  { text: 'Important Days', link: '/events/important' },
  { text: 'Lawyer Oath', link: '/student/oath' },
  { text: 'Library Resources', link: '/student/library' },
  { text: 'Dean Page', link: '/dean' },
  { text: 'Office Index', link: '/office' },
  { text: 'Accounting Office', link: '/office/accounting' },
  { text: 'Registrar Office', link: '/office/registrar' },
  { text: 'Admissions Office', link: '/office/admission' },
  { text: 'Deans Office', link: '/office/deans' },
  { text: 'Privacy Policy', link: '/privacy_policy' },
]);


const filteredSuggestions = ref([]);

const hideSuggestions = () => {
  setTimeout(() => {
    showSuggestions.value = false;
  }, 200);
};

const navigateTo = (link) => {
  // Optional: Close suggestions if you want
  showSuggestions.value = false;
  window.location.href = link; // Navigate to the link
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
