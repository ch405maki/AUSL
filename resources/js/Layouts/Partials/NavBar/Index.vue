<template>
  <div>
    <!-- First Navigation Bar -->
    <TopNav />
    <!-- Second Navigation Bar -->
    <nav ref="navButtons" class="hidden lg:block border-b-[1px] bg-official-purple-800 left-0 right-0 z-40 transition-all duration-300 fixed top-[97px] second-nav">
      <!-- Primary Navigation Menu -->
      <div class="max-w-7xl mx-auto">
        <div class="flex justify-between h-10 items-center">
          <div class="flex items-center">
            <div class="lg:flex sm:items-center mt-1">
              <button class="outline-none focus:outline-none py-2 text-white rounded-md flex items-left min-w-24">
                <span class="font-normal flex-1 garamond hover:text-gray-300 uppercase">
                  <a :href="route('main')" class="">Home</a>
                </span>
              </button>
              <About />
              <Administration />
              <DeansCorner />
              <Academics />
              <Admission />
              <Events />
              <Student />
              <Contact />
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- End of Second Nav -->

    <!-- Second Navigation Bar for Smaller Screens -->
    <nav ref="navButtons" class="lg:hidden bg-official-purple-800 fixed fixed top-0 left-0 right-0 z-40 transition-all duration-300">
      <!-- Navigation Container -->
      <div class="max-w-7xl mx-auto flex justify-between items-center px-4 h-12">
        <!-- Logo Section -->
        <div class="flex items-center text-white flex-shrink-0">
          <Link :href="route('main')" class="flex">
            <img src="/images/auLogo.png" alt="Arellano University Logo" class="max-h-10 mr-2">
          </Link>
          <div class="text-center">
            <div class="garamond uppercase font-bold tracking-wide mb-[-4px]">ARELLANO UNIVERSITY</div>
            <hr class="border-t-1 border-white">
            <div class="garamond uppercase font-bold tracking-wide">SCHOOL OF LAW</div>
          </div>
          <Link :href="route('main')" class="flex ml-2">
            <img src="/images/ausllogo2.png" alt="School of Law Logo" class="max-h-10">
          </Link>
        </div>

        <!-- Hamburger Menu Button -->
        <div class="flex items-center">
          <v-menu v-model:show="menuVisible" transition="slide-x-transition" close-on-content-click="false" close-on-click="false" @click:outside="menuVisible = false">
            <template v-slot:activator="{ props }">
              <v-icon v-bind="props" icon="mdi-menu" color="white" class="text-white"></v-icon>
            </template>
            <v-list @click.stop minWidth="250px">
              <!-- Loop through links to create menu items -->
              <v-list-item v-for="(item, i) in links" :key="i">
                <v-list-item-title @click="toggleDropdown(i)">
                  <a :href="item.url" class="hover:text-purple-900 flex w-full items-left">
                    <v-icon
                      v-if="item.icon"
                      :icon="item.icon"
                      class="mr-2 rounded-full p-1"
                      :color="item.color || 'primary'"
                      :style="{ backgroundColor: item.bgColor || '#fff' }"
                    ></v-icon>
                    <span>{{ item.title }}</span>
                    <!-- Show dropdown icon if the item has children -->
                    <v-icon v-if="item.children" :class="isDropdownOpen(i) ? 'mdi-chevron-up' : 'mdi-chevron-down'">mdi-chevron-down</v-icon>
                  </a>
                </v-list-item-title>
                <!-- Dropdown for children items -->
                <v-list v-if="item.children && isDropdownOpen(i)" @click.stop>
                  <v-list-item v-for="(child, j) in item.children" :key="j">
                    <v-list-item-title>
                      <a :href="child.url" class="pl-4 hover:text-purple-800 flex items-center">
                        <v-icon
                          v-if="child.icon"
                          :icon="child.icon"
                          class="mr-2 rounded-full p-1"
                          :color="child.color || 'primary'"
                          :style="{ backgroundColor: child.bgColor || '#fff' }"
                        ></v-icon>
                        {{ child.title }}
                      </a>
                    </v-list-item-title>
                  </v-list-item>
                </v-list>
              </v-list-item>
            </v-list>
          </v-menu>
        </div>
      </div>
    </nav>
    <!-- End of Second Navigation Bar -->
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
import SearchBar from './Partials/SearchBar.vue';
import Academics from './Partials/Buttons/Academic.vue' 
import Administration from './Partials/Buttons/Administration.vue'
import Admission from './Partials/Buttons/Admission.vue'
import Events from './Partials/Buttons/Events.vue'
import Student from './Partials/Buttons/Student.vue'
import DeansCorner from './Partials/Buttons/DeansCorner.vue'
import About from './Partials/Buttons/About.vue'
import Contact from './Partials/Buttons/Contact.vue'
import SideDrawer from './Partials/SideDrawer.vue';
import TopNav from './Partials/TopNav.vue';


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

//Humberger Menu links with child items
const links = ref([
  { title: 'Home', url: '/', icon: 'mdi-home', color: 'blue', bgColor: '#e0f7fa' },
  {
    title: 'Administration',
    url: '#',
    icon: 'mdi-school',
    color: 'green',
    bgColor: '#e8f5e9',
    children: [
      { title: 'AUSL Foundation', url: '/administration/alf', icon: 'mdi-web', color: 'blue', bgColor: '#e0f7fa' },
      { title: 'Board of Trustees', url: '/administration/board_trustees', icon: 'mdi-book', color: 'brown', bgColor: '#efebe9' },
      { title: 'Administration Officers', url: '/administration/admin_staff', icon: 'mdi-library', color: 'purple', bgColor: '#f3e5f5' },
      { title: 'Departments', url: '/administration/departments', icon: 'mdi-library', color: 'purple', bgColor: '#f3e5f5' },
    ]
  },
  {
    title: 'Academic Programs',
    url: '#',
    icon: 'mdi-school-outline',
    color: 'red',
    bgColor: '#ffebee',
    children: [
      { title: 'Juris Doctor', url: '/academic/curiculumn', icon: 'mdi-book-open', color: 'brown', bgColor: '#efebe9' },
      { title: 'Refresher', url: '/academic/curiculumn', icon: 'mdi-book-open', color: 'brown', bgColor: '#efebe9' },
      { title: 'Bar Review', url: '/academic/barreview', icon: 'mdi-book-open', color: 'brown', bgColor: '#efebe9' },
      { title: 'MCLE', url: 'https://clear.arellanolaw.org/', icon: 'mdi-book-open', color: 'brown', bgColor: '#efebe9' },
    ]
  },
  {
    title: 'Admissions',
    url: '#',
    icon: 'mdi-file-edit',
    color: 'purple',
    bgColor: '#f3e5f5',
    children: [
      { title: 'Admission Process', url: '/admissions/process', icon: 'mdi-progress-check', color: 'green', bgColor: '#e8f5e9' },
      { title: 'Requirements', url: '/admissions/requirements', icon: 'mdi-file-edit', color: 'purple', bgColor: '#f3e5f5' },
      { title: 'Application Forms', url: '/admissions/application-forms', icon: 'mdi-file-edit', color: 'purple', bgColor: '#f3e5f5' },
      { title: 'ID Application', url: '/admissions/id', icon: 'mdi-file-edit', color: 'purple', bgColor: '#f3e5f5' },
    ]
  },
  {
    title: 'Events Calendar',
    url: '#',
    icon: 'mdi-calendar',
    color: 'deep-orange',
    bgColor: '#fbe9e7',
    children: [
      { title: 'Academic Calendar', url: '/events/academic', icon: 'mdi-calendar-month', color: 'red', bgColor: '#ffebee' },
      { title: 'Upcoming Events', url: '/events/upcomming', icon: 'mdi-calendar-month', color: 'red', bgColor: '#ffebee' },
      { title: 'Holidays', url: '/events/holidays', icon: 'mdi-calendar-range', color: 'blue', bgColor: '#e3f2fd' },
      { title: 'Important Dates', url: '/emptyState', icon: 'mdi-calendar-alert', color: 'yellow', bgColor: '#fff9c4' }
    ]
  },
  {
    title: 'Student Resources',
    url: '#',
    icon: 'mdi-school',
    color: 'green',
    bgColor: '#e8f5e9',
    children: [
      { title: 'Lawyers Oath', url: '/student/oath', icon: 'mdi-web', color: 'blue', bgColor: '#e0f7fa' },
      { title: 'AIMS Portal', url: 'https://aims.arellanolaw.edu/aims/students/', icon: 'mdi-web', color: 'blue', bgColor: '#e0f7fa' },
      { title: 'Lawphil.net', url: 'https://lawphil.net/', icon: 'mdi-book', color: 'brown', bgColor: '#efebe9' },
      { title: 'Library', url: '#', icon: 'mdi-library', color: 'purple', bgColor: '#f3e5f5' },
      { title: 'Social Media', url: '/contact/socials', icon: 'mdi-library', color: 'purple', bgColor: '#f3e5f5' },
      {
        title: 'Socials',
        url: '#',
        icon: 'mdi-account-group',
        color: 'teal',
        bgColor: '#e0f2f1',
        children: [
          { title: 'Title', url: '#', icon: 'mdi-account', color: 'orange', bgColor: '#ffe0b2' },
          { title: 'Title', url: '#', icon: 'mdi-account', color: 'orange', bgColor: '#ffe0b2' },
          { title: 'Title', url: '#', icon: 'mdi-account', color: 'orange', bgColor: '#ffe0b2' },
        ]
      }
    ]
  },
  { title: 'About AUSL', url: '/history', icon: 'mdi-information', color: 'indigo', bgColor: '#e8eaf6'},
  { title: 'Contact Us', url: '/contact', icon: 'mdi-phone', color: 'teal', bgColor: '#e0f2f1'}
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
@import url('https://db.onlinewebfonts.com/c/2bf40ab72ea4897a3fd9b6e48b233a19?family=Garamond');

.garamond {
  font-family: 'Garamond', serif;
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
  padding-top: 110px; /* Desktop */
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