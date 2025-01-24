<template>
    <li v-for="(item, index) in links" :key="index" class="mb-2 text-official-purple-800">
        <a :href="item.url" class="text-base sm:text-base md:text-md lg:text-lg font-normal text-official-purple-800 hover:underline">{{ item.text }}</a>
    </li>
</template>

<script setup>
    import { ref } from 'vue';

    const links = ref([
    { text: 'Audio Visual', url: 'https://www.facebook.com/avausl' },
    { text: 'Bursar', url: 'office.bursar' },
    { text: 'Guidance', url: '#' },
    { text: 'Registrar', url: 'office.registrar' },
    { text: 'ITC', url: '#' },
    { text: 'Medical And Dental', url: '#' },
    { text: 'OSA', url: 'https://www.facebook.com/AUSLOfficeofStudentAffairs' },
    ]);

</script>