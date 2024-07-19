<template>
    <nav class="bg-white w-full">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="w-full flex justify-center items-center md:order-1" id="navbar-sticky">
            <ul class="flex flex-col text-center p-4 md:p-0 font-medium rounded-lg bg-gray-50 md:space-x-2 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
            <li v-for="link in links" :key="link.text">
                <a :href="link.href" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-900 md:p-0 ">
                {{ link.text }}
                </a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
</template>

<script setup>
import { ref} from 'vue';

const links = ref([
  { text: 'Online Enrollment Guide', href: '/enrollment' },
  { text: 'Student ID Application', href: '/idApplication' },
  { text: 'AUSL Academic Calendar', href: 'acadCalendar' },
  { text: 'Student Medical Form', href: 'https://docs.google.com/forms/d/e/1FAIpQLScZXZAGt2BnVhXl35xgSxLnj8CLWlcL0FImY2jz90PzJofpPw/viewform' },
  { text: 'Guideline/Payment Procedure', href: '/office/accounting' },
  { text: 'Downloadable Registrar Form', href: '/office/registrar' },
]);
</script>