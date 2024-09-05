<template>
    <li v-for="(item, index) in links" :key="index" class="mb-2">
        <a :href="item.url" class="text-lg font-normal text-gray-600 hover:text-slate-900">{{ item.text }}</a>
    </li>
</template>

<script setup>
    import { ref } from 'vue';

    const links = ref([
    { text: 'JD/Curiculum', url: 'juris-doctor' },
    { text: 'Refresher/Curiculum', url: 'juris-doctor' },
    { text: 'Academic Guidelines', url: 'guidelines' },
    { text: 'Bar Review', url: '#' },
    { text: 'MCLE', url: 'https://clear.arellanolaw.org/' },
    ]);

</script>