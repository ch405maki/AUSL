<template>
  <div class="min-h-full bg-gray-100">
    <header class="bg-white shadow-sm lg:static lg:overflow-y-visible" x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'fixed inset-0 z-40 overflow-y-auto': open }" x-data="Components.popover({ open: false, focus: false })" x-init="init()" @keydown.escape="onEscape" @close-popover-group.window="onClosePopoverGroup">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="relative flex justify-between lg:gap-8 xl:grid xl:grid-cols-12">
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
          <div class="min-w-0 flex-1 md:px-8 lg:px-0 xl:col-span-6 ">
            <div class="flex items-center px-6 py-4 md:mx-auto md:max-w-3xl lg:mx-0 lg:max-w-none xl:px-0">
            </div>
          </div>
          <div class="hidden lg:flex lg:items-center lg:justify-end xl:col-span-4">
            <a href="#" class="text-sm font-medium text-gray-900 hover:underline"></a>
            <a href="#" class="ml-5 flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" x-description="Heroicon name: outline/bell" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"></path>
              </svg>
            </a>

            <!-- Profile dropdown -->
            <div x-data="Components.menu({ open: false })" x-init="init()" @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)" class="relative ml-5 flex-shrink-0">
              <div>
                <button type="button" class="flex rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2" id="user-menu-button" x-ref="button" @click="onButtonClick()" @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()" aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
                  <span class="sr-only">Open user menu</span>
                  <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                </button>
              </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="relative">
                  <Dropdown align="right" width="48">
                    <template #trigger>
                      <span class="inline-flex rounded-md">
                        <button
                          type="button"
                          class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                        >
                          {{ $page.props.auth.user.name }}
  
                          <svg
                            class="ml-2 -mr-0.5 h-4 w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"
                            />
                          </svg>
                        </button>
                      </span>
                    </template>
  
                    <template #content>
                      <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                      <DropdownLink :href="route('logout')" method="post" as="button">
                        Log Out
                      </DropdownLink>
                    </template>
                  </Dropdown>
                </div>
              </div>
          </div>
        </div>
      </div>
    </header>

    <div class="py-6">
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

        <main class="lg:col-span-10 xl:col-span-10">
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
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { Link } from '@inertiajs/vue3';
  import Dropdown from '@/Components/Dropdown.vue';
  import DropdownLink from '@/Components/DropdownLink.vue';

  const links = [
    { name: 'Carousell', route: 'carousell'},
    { name: 'Offices', route: 'offices'},
    { name: 'Main Banner', route: 'banner'},
    { name: 'On Load Banner', route: 'onload'}
  ];

  const settings = [
    { name: 'Manage Users', route: 'users'},
    { name: 'Testimonial', route: 'alumni'}
  ];

  </script>
  