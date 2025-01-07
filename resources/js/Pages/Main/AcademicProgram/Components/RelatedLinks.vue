<template>
    <li v-for="(item, index) in links" :key="index" class="mb-2 text-official-purple-800">
        <a :href="item.url" class="text-lg font-normal text-official-purple-800 hover:underline">{{ item.text }}</a>
    </li>
</template>

<script setup>
    import { ref } from 'vue';

    const links = ref([
    { text: 'JD/Curriculum', url: 'juris-doctor' },
    { text: 'Refresher/Curriculum', url: 'refresher-curriculum' },
    { text: 'Academic Guidelines', url: 'guidelines' },
    { text: 'Bar Review', url: 'barreview' },
    { text: 'MCLE Website', url: 'https://clear.arellanolaw.org/' },
    ]);

</script>