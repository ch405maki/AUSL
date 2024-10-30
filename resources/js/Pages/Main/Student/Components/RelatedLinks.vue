<template>
    <li v-for="(item, index) in links" :key="index" class="mb-2 text-official-purple-800">
        <a :href="item.url" class="text-lg font-normal text-official-purple-800 hover:underline">{{ item.text }}</a>
    </li>
</template>

<script setup>
    import { ref } from 'vue';

    const links = ref([
      { text: 'AIMS Portal', url: 'https://aims.arellanolaw.edu/aims/students/' },
      { text: 'LawPhil.net', url: 'https://lawphil.net/' },
      { text: 'ID Application', url: '/admissions/id' },
      { text: 'Library', url: '/student/library' }, 
      { text: 'Social Media', url: '/contact/socials' }, 
    ]);

</script>