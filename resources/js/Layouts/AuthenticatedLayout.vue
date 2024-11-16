<template>
  <div class=" min-h-screen bg-gray-100">
    <div class="h-full">
      <div class="min-h-full">
        <!-- When the mobile menu is open, add `overflow-hidden` to the `body` element to prevent double scrollbars -->
        <header class="bg-white shadow-sm lg:static lg:overflow-y-visible" :class="{ 'fixed inset-0 z-40 overflow-y-auto': isMenuOpen }">
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative flex justify-between lg:gap-8 xl:grid xl:grid-cols-12">
              <!-- Logo Section -->
              <div class="flex md:absolute md:inset-y-0 md:left-0 lg:static xl:col-span-2">
                <div class="flex flex-shrink-0 items-center">
                  <div class="p-2.5 mt-1 flex items-center">
                  <Link :href="route('main')" class="flex items-center">
                    <img src="/images/ausllogo2.png" alt="Image Logo" class="max-w-full h-full max-h-8 mr-2 transition-transform duration-300 transform hover:scale-105">
                  </Link>
                  <div>
                    <div class="text-invicta uppercase font-bold text-[11px] tracking-wide leading-tight">ARELLANO UNIVERSITY</div>
                    <div class="text-invicta uppercase font-bold text-[11px] tracking-wide leading-tight">SCHOOL OF LAW</div>
                  </div>
                </div>
                </div>
              </div>
              
              <!-- Search Section -->
              <div class="min-w-0 flex-1 md:px-8 lg:py-2 xl:col-span-6">
                <div class="flex items-center px-6 py-4 md:mx-auto md:max-w-3xl lg:mx-0 lg:max-w-none xl:px-0">
                  
                </div>
              </div>

              <!-- Mobile Menu Button -->
              <div class="flex items-center md:absolute md:inset-y-0 md:right-0 lg:hidden">
                <button type="button" class="-mx-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-rose-500" @click="toggleMenu">
                  <span class="sr-only">Open menu</span>
                  <svg class="h-6 w-6" v-if="!isMenuOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                  </svg>
                  <svg class="h-6 w-6" v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
                </button>
              </div>

              <!-- Desktop Actions -->
              <div class="hidden lg:flex lg:items-center lg:justify-end xl:col-span-4">
                <a href="#" class="ml-5 flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
                  <span class="sr-only">View notifications</span>
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"></path>
                  </svg>
                </a>
                <div class="relative ml-5 flex-shrink-0">
                  <button type="button" class="flex rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2" @click="toggleProfileMenu">
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full" src="/images/user.png" alt="user icon">
                  </button>
                  <!-- Profile dropdown -->
                  <div v-if="isProfileMenuOpen" @click.away="isProfileMenuOpen = false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <a href="#" class="block py-2 px-4 text-sm text-gray-700">Hi, {{ $page.props.auth.user.name }}</a>
                    <a :href="route('profile.edit')" class="block py-2 px-4 text-sm text-gray-700">Your Profile</a> 
                    <a :href="route('logout')"  as="button" class="block py-2 px-4 text-sm text-gray-700">Sign out</a>
                  </div>
                </div>
                <p class="ml-2 text-invicta  font-medium text-gray-700 text-sm tracking-wide leading-tight">Hi, {{ $page.props.auth.user.name }}</p>
              </div>
            </div>
          </div>

          <!-- Mobile Menu -->
          <nav v-if="isMenuOpen" class="lg:hidden" aria-label="Global" @click.away="isMenuOpen = false">
            <div class="border-t border-gray-200 pt-4">
              <div class="mx-auto max-w-3xl space-y-1 px-4">
                <a :href="route('dashboard')" class="bg-gray-200 text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md" aria-current="page" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;bg-gray-200 text-gray-900&quot;, Default: &quot;text-gray-700 hover:bg-gray-50&quot;">
                  <svg class="text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                  </svg>
                  <span class="truncate">Home</span>
                </a>
                
                <a :href="route('main')" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md" x-state-description="undefined: &quot;bg-gray-200 text-gray-900&quot;, undefined: &quot;text-gray-700 hover:bg-gray-50&quot;">
                  <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3.25C7.167 3.25 3.25 7.167 3.25 12S7.167 20.75 12 20.75 20.75 16.833 20.75 12 16.833 3.25 12 3.25zM12 18.75c-3.723 0-6.75-3.027-6.75-6.75S8.277 5.25 12 5.25s6.75 3.027 6.75 6.75-3.027 6.75-6.75 6.75z"></path>
                  </svg>
                  <span class="truncate">Web Preview</span>
                </a>

                <a :href="route('posts')" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md" x-state-description="undefined: &quot;bg-gray-200 text-gray-900&quot;, undefined: &quot;text-gray-700 hover:bg-gray-50&quot;">
                  <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 11.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v10.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25v-4.5M16.5 2.25l5.25 5.25M16.5 2.25v5.25H21.75"></path>
                  </svg>
                  <span class="truncate">News</span>
                </a>
                <a :href="route('announcement')" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md" x-state-description="undefined: &quot;bg-gray-200 text-gray-900&quot;, undefined: &quot;text-gray-700 hover:bg-gray-50&quot;">
                  <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 11.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v10.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25v-4.5M16.5 2.25l5.25 5.25M16.5 2.25v5.25H21.75"></path>
                  </svg>
                  <span class="truncate">Announcement</span>
                </a>
                <a :href="route('archive')" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md" x-state-description="undefined: &quot;bg-gray-200 text-gray-900&quot;, undefined: &quot;text-gray-700 hover:bg-gray-50&quot;">
                  <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 11.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v10.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25v-4.5M16.5 2.25l5.25 5.25M16.5 2.25v5.25H21.75"></path>
                  </svg>
                  <span class="truncate">Archives</span>
                </a>
                <a :href="route('gallery')" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md" x-state-description="undefined: &quot;bg-gray-200 text-gray-900&quot;, undefined: &quot;text-gray-700 hover:bg-gray-50&quot;">
                  <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.5h16.5A1.5 1.5 0 0121.75 6v12a1.5 1.5 0 01-1.5 1.5H3.75A1.5 1.5 0 012.25 18V6a1.5 1.5 0 011.5-1.5zM5.25 6a.75.75 0 100 1.5h.75a.75.75 0 100-1.5h-.75zM9 6a.75.75 0 100 1.5h9.75a.75.75 0 100-1.5H9zM12 9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zM3.75 18l4.5-5.25 3 3.75h9.75"></path>
                  </svg>
                  <span class="truncate">Gallery</span>
                </a>
              </div>
            </div>
          </nav>
        </header>
        <div class="py-10">
        <div class="mx-auto max-w-3xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-12 lg:gap-8 lg:px-8">
          <div class="hidden lg:col-span-3 lg:block xl:col-span-2">
            <nav aria-label="Sidebar" class="sticky top-4 divide-y divide-gray-300">
              <div class="space-y-1 pb-8">
                <a :href="route('dashboard')" class="bg-gray-200 text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md" aria-current="page" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;bg-gray-200 text-gray-900&quot;, Default: &quot;text-gray-700 hover:bg-gray-50&quot;">
                  <svg class="text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                  </svg>
                  <span class="truncate">Home</span>
                </a>
                
                <a :href="route('main')" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md" x-state-description="undefined: &quot;bg-gray-200 text-gray-900&quot;, undefined: &quot;text-gray-700 hover:bg-gray-50&quot;">
                  <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3.25C7.167 3.25 3.25 7.167 3.25 12S7.167 20.75 12 20.75 20.75 16.833 20.75 12 16.833 3.25 12 3.25zM12 18.75c-3.723 0-6.75-3.027-6.75-6.75S8.277 5.25 12 5.25s6.75 3.027 6.75 6.75-3.027 6.75-6.75 6.75z"></path>
                  </svg>
                  <span class="truncate">Web Preview</span>
                </a>
                
                <ul class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                  <li>
                      <details class="group">
                          <!-- Dropdown Trigger -->
                          <summary class="flex items-center justify-between font-medium marker:content-none hover:cursor-pointer">
                              <span class="flex">
                                  <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 11.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v10.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25v-4.5M16.5 2.25l5.25 5.25M16.5 2.25v5.25H21.75"></path>
                                  </svg>
                                  <span class="truncate">Posting</span>
                              </span>
                              <!-- Dropdown Indicator -->
                              <svg class="w-5 h-5 text-gray-500 transition-transform transform group-open:rotate-90 ml-9" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                              </svg>
                          </summary>

                          <!-- Dropdown Content -->
                          <article class="px-4 pb-4">
                              <ul class="flex flex-col gap-3 pl-4 mt-4">
                                  <li><a :href="route('posts')" class="hover:text-purple-800">News</a></li>
                                  <li><a :href="route('announcement')" class="hover:text-purple-800">Announcement</a></li>
                                  <li><a href="" class="hover:text-purple-800">Events</a></li>
                                  <hr>
                                  <li><a :href="route('archive')" class="hover:text-purple-800 ">Archives</a></li>
                              </ul>
                          </article>
                      </details>
                  </li>
                </ul>
                <a :href="route('gallery')" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md" x-state-description="undefined: &quot;bg-gray-200 text-gray-900&quot;, undefined: &quot;text-gray-700 hover:bg-gray-50&quot;">
                  <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.5h16.5A1.5 1.5 0 0121.75 6v12a1.5 1.5 0 01-1.5 1.5H3.75A1.5 1.5 0 012.25 18V6a1.5 1.5 0 011.5-1.5zM5.25 6a.75.75 0 100 1.5h.75a.75.75 0 100-1.5h-.75zM9 6a.75.75 0 100 1.5h9.75a.75.75 0 100-1.5H9zM12 9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zM3.75 18l4.5-5.25 3 3.75h9.75"></path>
                  </svg>
                  <span class="truncate">Gallery</span>
                </a>
              </div>

              <div class="pt-5 mb-5">
              <p class="px-3 text-sm font-medium text-gray-500" id="setup-page">Setup Page</p>
              <div v-for="link in links" :key="link.name" class="mt-3 space-y-2" aria-labelledby="setup-page">
                  <a :href="route(link.route)" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">
                    <span class="truncate">{{ link.name }}</span>
                  </a>
              </div>
            </div>

            <div v-if="$page.props.auth.user.role_id == 3" class="pt-5">
            <p class="px-3 text-sm font-medium text-gray-500" id="setup-page">Settings</p>
            <div v-for="setting in settings" :key="setting.name" class="mt-3 space-y-2" aria-labelledby="setup-page">
              <a :href="route(setting.route)" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">
                <span class="truncate">{{ setting.name }}</span>
              </a>
            </div>
            </div>
            </nav>
          </div>
          <main class="lg:col-span-9 xl:col-span-10">
            <action class="bg-white py-8" v-if="$slots.action">
            <div class="max-w-7xl mx-auto mb-6 px-4 sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                  <slot name="action" />
              </div>
            </div>
          </action>
          <!-- main Slot -->
          <slot />
          <!-- main Slot -->
        </main>
        </div>
      </div>
      </div>
    </div>
  </div>
</template>
  
<script setup>
  import { ref, computed, onMounted, onBeforeUnmount } from 'vue';
  import { usePage } from '@inertiajs/vue3';
  import { Inertia } from '@inertiajs/inertia';
  import { Link } from '@inertiajs/vue3';

  const links = [
    { name: 'Carousell', route: 'carousell'},
    { name: 'Offices', route: 'offices'},
    { name: 'Academic Guidelines', route:'academic_guidelines'},
    { name: 'Main Banner', route: 'banner'},
    { name: 'On Load Banner', route: 'onload'}
  ];

  const settings = [
    { name: 'Manage Users', route: 'users'},
    { name: 'Testimonial', route: 'alumni'}
  ];


// State management using ref for menu visibility
const isMenuOpen = ref(false);
const isProfileMenuOpen = ref(false);

const logout = () => {
  Inertia.post(route('logout'));
};

// Methods to toggle the menus
const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value;
};

const toggleProfileMenu = () => {
  isProfileMenuOpen.value = !isProfileMenuOpen.value;
};

// Ref to manage the visibility of the dropdown
const showingNavigationDropdown = ref(false);

// Ref to manage the header class
const headerClass = ref('bg-white shadow pt-16');

// Function to update the header class based on screen size
const updateHeaderClass = () => {
  if (window.innerWidth >= 640) {
    headerClass.value = 'bg-white shadow';
  } else {
    headerClass.value = 'bg-white shadow pt-16';
  }
};

// Add event listener on mount
onMounted(() => {
  updateHeaderClass();
  window.addEventListener('resize', updateHeaderClass);
});

// Remove event listener before unmount
onBeforeUnmount(() => {
  window.removeEventListener('resize', updateHeaderClass);
});

// Use Inertia's usePage hook to access the page props
const { props } = usePage();
const user = props.auth.user;

</script>
  