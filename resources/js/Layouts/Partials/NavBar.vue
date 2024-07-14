<template>
  <div>
    <!-- First Navigation Bar -->
    <nav ref="firstNav" class="hidden lg:block bg-purple-900 z-40 border-b-2 transition-all duration-300">
      <!-- Primary Navigation Menu -->
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
          <div class="flex items-center">
            <!-- Logo -->
            <div class="shrink-0 flex items-center text-white">
              <Link :href="route('main')" class="flex items-center">
                <img src="/images/ausllogo2.png" alt="Image Logo" class="max-w-full h-full max-h-16 mr-2 transition-transform duration-300 transform hover:scale-105">
              </Link>
              <div>
                <div class="text-invicta uppercase font-bold text-2xl tracking-wide leading-tight">ARELLANO UNIVERSITY</div>
                <div class="text-invicta uppercase font-bold text-2xl tracking-wide leading-tight">SCHOOL OF LAW</div>
              </div>
            </div>
          </div>
          <!-- Search Icon and Input -->
          <div class="relative">
            <form class="flex items-center max-w-sm mx-auto">
              <label for="simple-search" class="sr-only">Search</label>
              <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                  </svg>
                </div>
                <input
                  type="text"
                  id="simple-search"
                  v-model="searchQuery"
                  @focus="showSuggestions = true"
                  @blur="hideSuggestions"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-blue-500"
                  placeholder="Search something..."
                  required
                />
                <!-- Suggestions Dropdown -->
                <ul v-if="showSuggestions && filteredSuggestions.length" class="absolute bg-white border border-gray-300 w-full mt-1 rounded-lg shadow-lg z-50">
                  <li v-for="suggestion in filteredSuggestions" :key="suggestion.text" class="p-2 hover:bg-gray-100">
                    <a :href="suggestion.link" class="block text-gray-700">{{ suggestion.text }}</a>
                  </li>
                </ul>
              </div>
              <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-purple-700 rounded-lg border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </nav>

    <!-- Second Navigation Bar -->
    <nav ref="navButtons" class="left-0 right-0 bg-purple-900 z-50 transition-all duration-300">
      <!-- Primary Navigation Menu -->
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-6">
        <div class="flex justify-between h-12 items-center">
          <div class="flex items-center mt-1">
            <div class="hidden lg:flex sm:items-center">
              <!-- Logo (hidden by default) -->
              <!-- <div ref="logo" class="shrink-0 flex items-center text-white mr-4 hidden">
                <Link :href="route('main')" class="flex items-center">
                  <img src="/images/ausllogo2.png" alt="Image Logo" class="max-w-full h-full max-h-10 mb-1">
                </Link>
              </div> -->
              <v-btn variant="plain" :href="route('main')" :class="{ 'text-green-500': route().current('main') }" class="inline-block text-invicta tracking-wide uppercase whitespace-nowrap nav-btn">
                Home
              </v-btn>
              <v-btn variant="plain" href="https://aims.arellanolaw.edu/aims/students/" class="text-invicta tracking-wide uppercase nav-btn" :class="{ 'active-tab': isActive('https://aims.arellanolaw.edu/aims/students/') }">
                Student
              </v-btn>
              <v-btn variant="plain" href="https://aims.arellanolaw.edu/aims/faculty/" class="text-invicta tracking-wide uppercase nav-btn" :class="{ 'active-tab': isActive('https://aims.arellanolaw.edu/aims/faculty/') }">
                Faculty
              </v-btn>
              <v-btn variant="plain" :href="route('alumni')" :class="{ 'text-green-500': route().current('alumni'), 'active-tab': isActive(route('login')) }" class="text-invicta tracking-wide uppercase nav-btn">
                Alumni
              </v-btn>
            </div>
          </div>

          <div class="flex items-center">
            <div class="hidden lg:flex sm:items-center mt-1">
              <v-btn variant="plain" :href="route('dean')" :class="{ 'text-green-500': route().current('dean'), 'active-tab': isActive(route('dean')) }" class="inline-block text-invicta tracking-wide uppercase whitespace-nowrap nav-btn">
                Dean's Message
              </v-btn>
              <!-- Dropdown Menu for Academic Programs -->
              <v-menu open-on-hover>
                <template v-slot:activator="{ props }">
                  <v-btn class="inline-block text-invicta tracking-wide uppercase whitespace-nowrap nav-btn" variant="plain" v-bind="props">
                    Academic Programs
                    <!-- Adding a dropdown indicator icon -->
                    <v-icon right>mdi-chevron-down</v-icon>
                  </v-btn>
                </template>
                <v-list>
                  <v-list-item v-for="(item, index) in academicLinks" :key="index">
                    <v-list-item-title>
                      <a :href="item.url" class="py-1 text-lg text-slate-600 font-medium hover:text-slate-900">{{ item.title }}</a>
                    </v-list-item-title>
                  </v-list-item>
                </v-list>
              </v-menu>

              <v-menu open-on-hover>
                <template v-slot:activator="{ props }">
                  <v-btn class="inline-block text-invicta tracking-wide uppercase whitespace-nowrap nav-btn" variant="plain" v-bind="props">
                    Bar Review Program
                    <!-- Adding a dropdown indicator icon -->
                    <v-icon right>mdi-chevron-down</v-icon>
                  </v-btn>
                </template>
                <v-list>
                  <!-- Loop through the barReviewLinks to create the dropdown items -->
                  <v-list-item v-for="(item, index) in barReviewLinks" :key="index">
                    <v-list-item-title>
                      <a :href="item.url" class="py-1 text-lg text-slate-600 font-medium hover:text-slate-900">
                        {{ item.title }}
                      </a>
                    </v-list-item-title>
                  </v-list-item>
                </v-list>
              </v-menu>

              <!-- dropdown -->
              <v-menu open-on-hover>
                <template v-slot:activator="{ props }">
                  <v-btn class="inline-block text-invicta tracking-wide uppercase whitespace-nowrap nav-btn" variant="plain" v-bind="props">
                    AUSL Offices
                    <!-- Adding a dropdown indicator icon -->
                    <v-icon right>mdi-chevron-down</v-icon>
                  </v-btn>
                </template>
                <v-list>
                  <v-list-item v-for="(item, index) in officeLinks" :key="index">
                    <v-list-item-title>
                      <a :href="item.url" class="py-1 text-lg text-slate-600 font-medium hover:text-slate-900">{{ item.title }}</a>
                    </v-list-item-title>
                  </v-list-item>
                </v-list>
              </v-menu>
              <!-- dropdown -->

              <v-btn variant="plain" :href="route('about')" :class="{ 'text-green-500': route().current('about'), 'active-tab': isActive(route('about')) }" class="inline-block text-invicta tracking-wide uppercase whitespace-nowrap nav-btn">
                About AUSL
              </v-btn>
            </div>
          </div>

          <!-- end of second nav -->

          <!-- Hamburger Menu for Smaller Screens -->
          <div class="flex ml-0 lg:hidden container mx-auto justify-between items-center h-16">
            <div class="shrink-0 flex items-center text-white">
              <Link :href="route('main')" class="flex">
                <img src="/images/ausllogo2.png" alt="Image Logo" class="max-w-full h-full max-h-10 mr-2">
              </Link>
              <div class="mt-2">
                <div class="text-invicta uppercase font-bold tracking-wide mb-[-6px]">ARELLANO UNIVERSITY</div>
                <div class="text-invicta uppercase font-bold tracking-wide">SCHOOL OF LAW</div>
              </div>
            </div>

            <!-- Hamburger Menu Button -->
            <div class="flex items-center">
              <v-menu v-model:show="menuVisible" transition="slide-x-transition" close-on-content-click="false" close-on-click="false" @click:outside="menuVisible = false">
                <template v-slot:activator="{ props }">
                  <v-icon v-bind="props" icon="mdi-menu" color="white" class="text-white"></v-icon>
                </template>
                <v-list @click.stop>
                  <!-- Loop through links to create menu items -->
                  <v-list-item v-for="(item, i) in links" :key="i">
                    <v-list-item-title @click="toggleDropdown(i)">
                      <a :href="item.url" class="hover:text-purple-800 flex justify-between w-full items-center">
                        <span>{{ item.title }}</span>
                        <!-- Show dropdown icon if the item has children -->
                        <v-icon v-if="item.children" :class="isDropdownOpen(i) ? 'mdi-chevron-up' : 'mdi-chevron-down'">mdi-chevron-down</v-icon>
                      </a>
                    </v-list-item-title>
                    <!-- Dropdown for children items -->
                    <v-list v-if="item.children && isDropdownOpen(i)" @click.stop>
                      <v-list-item v-for="(child, j) in item.children" :key="j">
                        <v-list-item-title>
                          <a :href="child.url" class="pl-4 hover:text-purple-800">{{ child.title }}</a>
                        </v-list-item-title>
                      </v-list-item>
                    </v-list>
                  </v-list-item>
                </v-list>
              </v-menu>
            </div>
          </div>
          <!-- End Hamburger -->
        </div>
      </div>
    </nav>
    <div ref="mainContent" class="main-content">
      <slot />
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, watch } from 'vue';
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const { props: { ziggy } } = usePage();
const route = window.route;

// Menu links with child items
const links = ref([
  { title: 'Home', url: '/' },
  { title: 'Student', url: 'https://aims.arellanolaw.edu/aims/students/' },
  { title: 'Faculty', url: 'https://aims.arellanolaw.edu/aims/faculty/' },
  { title: 'Alumni', url: '/alumni' },
  { title: "Dean's Message", url: '/dean' },
  { title: 'Academic Program', url: '/academic' },
  { title: 'BAR Review', url: '/bar' },
  {
    title: 'AUSL Offices',
    url: '#',
    children: [
      { title: 'Accounting', url: '/office/accounting' },
      { title: 'Admissions', url: '/office/admission' },
      { title: "Dean's", url: '/office/deans' },
      { title: 'Registrar', url: '/office/registrar' }
    ]
  },
  { title: 'About AUSL', url: '/about' },
]);

// Search Suggestion
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

// Manage menu visibility
const menuVisible = ref(false);

// Manage dropdown state
const dropdownState = ref({});

// Initialize dropdown state to false for all items
links.value.forEach((item, index) => {
  dropdownState.value[index] = false;
});

// Toggle dropdown function
const toggleDropdown = (index) => {
  // Initialize the state if it doesn't exist
  if (dropdownState.value[index] === undefined) {
    dropdownState.value[index] = false;
  }
  // Toggle the state
  dropdownState.value[index] = !dropdownState.value[index];
};

// Check if dropdown is open
const isDropdownOpen = (index) => {
  // Return the state, defaulting to false if undefined
  return !!dropdownState.value[index];
};

// this is the search area
const showInput = ref(false);

function toggleSearch() {
  showInput.value = !showInput.value;
}

const officeLinks = ref([
  { title: 'Accounting', url: '/office/accounting' },
  { title: 'Admissions', url: '/office/admission' },
  { title: "Dean's", url: '/office/deans' },
  { title: 'Registrar', url: '/office/registrar' }
]);

const academicLinks = ref([
  { title: 'Academic Guidelines', url: '/academic' },
  { title: 'Curriculum', url: '/academic' },
  { title: 'Sequence of Subjects', url: '/academic' },
  { title: 'Course Description', url: '/academic' },
]);

const barReviewLinks = ref([
  { title: 'Bar Review Program', url: '/bar' },
  { title: 'Roster of Lecturer', url: '/bar' },
  { title: 'Bar Review Schedule', url: '/bar' },
  { title: 'AUSL Bar Passers', url: '/bar' },
]);

const navButtons = ref(null);
const firstNav = ref(null);
const logo = ref(null);
const mainContent = ref(null);
let originalOffsetTop = 0;

const handleScroll = () => {
  const navButtonsElement = navButtons.value;
  const firstNavElement = firstNav.value;
  const logoElement = logo.value;
  const mainContentElement = mainContent.value;

  if (navButtonsElement && firstNavElement && mainContentElement) {
    const rect = navButtonsElement.getBoundingClientRect();
    if (window.scrollY >= originalOffsetTop) {
      navButtonsElement.classList.add('fixed', 'top-0', 'left-0', 'right-0', 'z-50');
      firstNavElement.classList.add('hidden');
      logoElement.classList.remove('hidden');
      mainContentElement.style.paddingTop = `${navButtonsElement.offsetHeight}px`;
    } else {
      navButtonsElement.classList.remove('fixed', 'top-0', 'left-0', 'right-0', 'z-50');
      firstNavElement.classList.remove('hidden');
      logoElement.classList.add('hidden');
      mainContentElement.style.paddingTop = '0';
    }
  }
};

const isActive = (url) => {
  return window.location.href.includes(url);
};

onMounted(() => {
  const navButtonsElement = navButtons.value;
  if (navButtonsElement) {
    originalOffsetTop = navButtonsElement.offsetTop;
  }
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});
</script>

<style scoped>
@import url('https://db.onlinewebfonts.com/c/14ab77252fbc4bdca1dbdf8051cb7e96?family=BF+Invicta+W00+Bold');

.text-invicta {
  font-family: 'BF Invicta W00 Bold', sans-serif;
}

/* Add smooth transition for the navButtons */
nav {
  transition: all 0.2s ease-in-out;
}

/* Increase font size for nav buttons and add hover effect */
.nav-btn {
  font-size: 0.875rem; /* Adjust the font size as needed */
  color: white;
  transition: color 0.3s ease-in-out, opacity 0.3s ease-in-out;
  box-shadow: none !important; /* Remove shadow */
  opacity: 1 !important; /* Ensure opacity is 1 */
  padding: 0.5rem 0.75rem; /* Adjust padding to reduce button size */
  margin-right: 0.25rem; /* Reduce space between buttons */
}

.nav-btn:hover {
  color: #e2e8f0; /* Change to desired hover color */
  box-shadow: none !important; /* Remove shadow on hover */
  opacity: 1 !important; /* Ensure opacity remains 1 on hover */
}

/* Active tab indicator */
.active-tab {
  color: whitesmoke;
  border-bottom: 2px solid whitesmoke;
  border-radius: 0;
}

/* Responsive adjustments */
@media (max-width: 1024px) {
  .nav-btn {
    font-size: 0.75rem; /* Adjust font size for tablets */
    padding: 0.375rem 0.5rem; /* Adjust padding for tablets */
    margin-right: 0.125rem; /* Further reduce space between buttons */
  }
}

@media (max-width: 768px) {
  .nav-btn {
    font-size: 0.625rem; /* Adjust font size for smaller tablets */
    padding: 0.25rem 0.375rem; /* Adjust padding for smaller tablets */
    margin-right: 0.0625rem; /* Further reduce space between buttons */
  }
}

/* Ensure main content has smooth transition for padding */
.main-content {
  transition: padding-top 0.2s ease-in-out;
}

/* Style for the search input */
input[type="text"] {
  background-color: white;
  border: 1px solid transparent;
  border-radius: 0.25rem;
  padding: 0.5rem;
  width: 0;
  transition: width 0.3s ease-in-out, padding 0.3s ease-in-out;
}

input[type="text"]:focus {
  width: 12rem; /* Adjust the width as needed */
  padding-left: 0.5rem;
  padding-right: 0.5rem;
  border-color: #d1d5db; /* Adjust the border color as needed */
}
</style>