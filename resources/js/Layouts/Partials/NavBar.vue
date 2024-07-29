<template>
  <div>
    <!-- First Navigation Bar -->
    <nav ref="firstNav" class="hidden lg:block bg-purple-900 z-50 border-b-2 transition-all duration-300 fixed top-0 left-0 right-0">
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
          <SearchBar />
        </div>
      </div>
    </nav>

    <!-- Second Navigation Bar -->
    <nav ref="navButtons" class="left-0 right-0 bg-purple-900 z-40 transition-all duration-300 fixed top-20 second-nav">
      <!-- Primary Navigation Menu -->
      <div class="max-w-7xl mx-auto">
        <div class="flex justify-between h-12 items-center">

          <div class="flex items-center">
            <div class="hidden lg:flex sm:items-center mt-1">
              <button class="outline-none focus:outline-none py-2 text-white rounded-md flex items-center min-w-24">
                <span class="font-semibold flex-1 text-invicta tracking-wide hover:text-gray-300 uppercase"><a :href="route('main')">Home</a></span>
              </button>
              <div class="group inline-block relative">
                <button class="outline-none focus:outline-none px-3 py-2 text-white rounded-md flex items-center min-w-32">
                  <span class="pr-1 font-semibold flex-1 text-invicta tracking-wide uppercase">Student Resources</span>
                  <span>
                    <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-300 ease-in-out"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                      <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                  </span>
                </button>
                <ul class="bg-white border rounded-md shadow-lg transform scale-0 group-hover:scale-100 absolute transition duration-300 ease-in-out origin-top min-w-52 mt-2">
                  <li class="rounded-md px-3 py-2 transition duration-150 ease-in-out">
                    <a href="https://aims.arellanolaw.edu/aims/students/" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">AIMS Portal</a>
                  </li>
                  <li class="rounded-md px-3 py-2 transition duration-150 ease-in-out">
                    <a href="https://lawphil.net/" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Lawphil.net</a>
                  </li>
                  <li class="rounded-md px-3 py-2 transition duration-150 ease-in-out">
                    <a href="https://lawphil.net/" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Library</a>
                  </li>
                  <li class="rounded-md relative px-3 py-2 transition duration-150 ease-in-out">
                    <button class="w-full text-left flex items-center outline-none focus:outline-none">
                      <span class="pr-1 flex-1 block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Socials</span>
                      <span class="mr-auto">
                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>  
                      </span>
                    </button>
                    <ul class="bg-white border rounded-md shadow-lg absolute top-0 right-0 transition duration-300 ease-in-out origin-top-left min-w-max mt-2">
                      <li class="px-3 py-2 transition duration-150 ease-in-out">
                        <a href="https://www.facebook.com/AUSLOfficeofStudentAffairs" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Office for Student Affairs Facebook Page</a>
                      </li>
                      <li class="px-3 py-2 transition duration-150 ease-in-out">
                        <a href="#" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">BarOps Facebook Page</a>
                      </li>
                      <li class="px-3 py-2 transition duration-150 ease-in-out">
                        <a href="https://www.facebook.com/profile.php?id=100063942916347" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Center for Legal Education and Research Facebook Page</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>

              <div class="group inline-block relative">
                <button class="outline-none focus:outline-none px-3 py-2 text-white rounded-md flex items-center min-w-32">
                  <span class="pr-1 font-semibold flex-1 text-invicta tracking-wide uppercase">Academics</span>
                  <span>
                    <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-300 ease-in-out"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                      <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                  </span>
                </button>
                <ul class="bg-white border rounded-md shadow-lg transform scale-0 group-hover:scale-100 absolute transition duration-300 ease-in-out origin-top min-w-52 mt-2">
                  <li class="rounded-md px-3 py-2 transition duration-150 ease-in-out">
                    <a @click="$inertia.visit(route('academic.curiculumn'))" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold cursor-pointer">Curriculumn</a>
                  </li>
                  <li class="rounded-md relative px-3 py-2 transition duration-150 ease-in-out">
                    <button class="w-full text-left flex items-center outline-none focus:outline-none">
                      <span class="pr-1 flex-1 block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Departments</span>
                      <span class="mr-auto">
                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                      </span>
                    </button>
                    <ul class="bg-white border rounded-md shadow-lg absolute top-0 right-0 transition duration-300 ease-in-out origin-top-left min-w-32 mt-2">
                      <li class="px-3 py-2 transition duration-150 ease-in-out">
                        <a href="/office/accounting" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Accounting</a>
                      </li>
                      <li class="px-3 py-2 transition duration-150 ease-in-out">
                        <a href="/office/admission" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Admissions</a>
                      </li>
                      <li class="px-3 py-2 transition duration-150 ease-in-out">
                        <a href="/office/deans" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Deans</a>
                      </li>
                      <li class="px-3 py-2 transition duration-150 ease-in-out">
                        <a href="/office/registrar" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Registrar</a>
                      </li>
                    </ul>
                  </li>
                  <li class="rounded-md relative px-3 py-2 transition duration-150 ease-in-out">
                    <button class="w-full text-left flex items-center outline-none focus:outline-none">
                      <span class="pr-1 flex-1 block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Academic Programs</span>
                      <span class="mr-auto">
                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                      </span>
                    </button>
                    <ul class="bg-white border rounded-md shadow-lg absolute top-0 right-0 transition duration-300 ease-in-out origin-top-left min-w-32 mt-2">
                      <li class="px-3 py-2 transition duration-150 ease-in-out">
                        <a @click="$inertia.visit(route('academic.juris-doctor'))" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold cursor-pointer">Juris Doctor</a>
                      </li>
                      <li class="px-3 py-2 transition duration-150 ease-in-out">
                        <a @click="$inertia.visit(route('academic.refresher'))" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold cursor-pointer">Refresher</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>

              <div class="group inline-block relative">
                <button class="outline-none focus:outline-none px-3 py-2 text-white rounded-md flex items-center min-w-32">
                  <span class="pr-1 font-semibold flex-1 text-invicta tracking-wide uppercase">Admissions</span>
                  <span>
                    <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-300 ease-in-out"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                      <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                  </span>
                </button>
                <ul class="bg-white border rounded-md shadow-lg transform scale-0 group-hover:scale-100 absolute transition duration-300 ease-in-out origin-top min-w-52 mt-2">
                  <li class="rounded-md px-3 py-2 transition duration-150 ease-in-out">
                    <a @click="$inertia.visit(route('admissions.process'))" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold cursor-pointer">Admission Process</a>
                  </li>
                  <li class="rounded-md px-3 py-2 transition duration-150 ease-in-out">
                    <a href="/office/curriculum" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Requirements</a>
                  </li>
                  <li class="rounded-md px-3 py-2 transition duration-150 ease-in-out">
                    <a href="/office/curriculum" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Application Forms</a>
                  </li>
                </ul>
              </div>

              <div class="group inline-block relative">
                <button class="outline-none focus:outline-none px-3 py-2 text-white rounded-md flex items-center min-w-32">
                  <span class="pr-1 font-semibold flex-1 text-invicta tracking-wide uppercase">Events Calendar</span>
                  <span>
                    <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-300 ease-in-out"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                      <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                  </span>
                </button>
                <ul class="bg-white border rounded-md shadow-lg transform scale-0 group-hover:scale-100 absolute transition duration-300 ease-in-out origin-top min-w-52 mt-2">
                  <li class="rounded-md px-3 py-2 transition duration-150 ease-in-out">
                    <a href="/office/curriculum" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Upcoming Events</a>
                  </li>
                  <li class="rounded-md px-3 py-2 transition duration-150 ease-in-out">
                    <a href="/office/curriculum" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Holidays</a>
                  </li>
                  <li class="rounded-md px-3 py-2 transition duration-150 ease-in-out">
                    <a href="/office/curriculum" class="block w-full text-left text-gray-600 hover:text-slate-900 font-semibold">Important Dates</a>
                  </li>
                </ul>
              </div>

              <div class="group inline-block relative">
                <button class="outline-none focus:outline-none px-3 py-2 text-white rounded-md flex items-center min-w-32">
                  <span class="pr-1 font-semibold flex-1 text-invicta tracking-wide hover:text-gray-300 uppercase"><a href="/about">About Us</a></span>
                </button>
              </div>

              <div class="group inline-block relative">
                <button class="outline-none focus:outline-none px-3 py-2 text-white rounded-md flex items-center min-w-32">
                  <span class="pr-1 font-semibold flex-1 text-invicta tracking-wide hover:text-gray-300 uppercase"><a href="/contact">Contact Us</a></span>
                </button>
              </div>
            </div>
          </div>

          <!-- end of second nav -->

          <!-- Hamburger Menu for Smaller Screens -->
          <div class="flex ml-0 lg:hidden container ml-2 mr-2 justify-between items-center h-16">
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
    <div ref="mainContent" :class="mainContentClass">
    <slot />
  </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, watch, computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/vue3';
import SearchBar from './SearchBar.vue';

const { props: { ziggy } } = usePage();
const route = window.route;

const mainContentClass = ref('');

// Function to update the class based on window width
const updateMainContentClass = () => {
  const width = window.innerWidth;
  mainContentClass.value = width >= 1024 ? 'main-content-desktop' : 'main-content-mobile';
};

// Update the class on mount and when the window is resized
onMounted(() => {
  updateMainContentClass();
  window.addEventListener('resize', updateMainContentClass);
});

// Menu links with child items
const links = ref([
  { title: 'Home', url: '/' },
  { title: 'Student', url: '/student' },
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

const isActive = (url) => {
  return window.location.href.includes(url);
};

onMounted(() => {
  // No need to add scroll event listener
});

onUnmounted(() => {
  // No need to remove scroll event listener
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

/* Ensure main content has smooth transition for padding */
.main-content {
  transition: padding-top 0.2s ease-in-out;
}

.main-content-desktop {
  padding-top: 8rem; /* Desktop */
}

.main-content-mobile {
  padding-top: 3rem; /* Mobile and tablet */
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
  padding-top: 8rem; /*computer*/
  padding-top: 3rem;/*mobile tablet*/
}

/* Media query to adjust the second nav on smaller screens */
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

/*-- working --*/

    li>ul                 { transform: translatex(100%) scale(0) }
    li:hover>ul           { transform: translatex(101%) scale(1) }
    li > button svg       { transform: rotate(-90deg) }
    li:hover > button svg { transform: rotate(-270deg) }

    /* Below styles fake what can be achieved with the tailwind config
      you need to add the group-hover variant to scale and define your custom
      min width style.
      See https://codesandbox.io/s/tailwindcss-multilevel-dropdown-y91j7?file=/index.html
      for implementation with config file
    */
    .group:hover .group-hover\:scale-100 { transform: scale(1) }
    .group:hover .group-hover\:-rotate-180 { transform: rotate(180deg) }
    .scale-0 { transform: scale(0) }
    .min-w-32 { min-width: 8rem }


</style>