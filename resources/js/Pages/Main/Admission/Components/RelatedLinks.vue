<template>
    <li v-for="(item, index) in links" :key="index" class="mb-2">
        <a :href="item.url" class="text-lg font-normal text-gray-600 hover:text-slate-900">{{ item.text }}</a>
    </li>
</template>

<script setup>
    import { ref } from 'vue';

    const links = ref([
    { text: 'Addmission Process', url: '#' },
    { text: 'Requirements', url: '#' },
    { text: 'Application Forms', url: '#' },
    { text: 'ID Application', url: '#' },
    { text: 'Guideline/Payment Procedure', url: '#' },
    ]);

</script>