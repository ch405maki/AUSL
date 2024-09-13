<template>
    <li v-for="(item, index) in links" :key="index" class="mb-2">
        <a :href="item.url" class="text-lg font-normal text-gray-600 hover:text-slate-900">{{ item.text }}</a>
    </li>
</template>

<script setup>
    import { ref } from 'vue';

    const links = ref([
    { text: 'Addmission Process', url: '/admissions/process' },
    { text: 'Requirements', url: '/admissions/requirements' },
    { text: 'Application Forms', url: '/admissions/application-forms' },
    { text: 'ID Application', url: '/admissions/id' },
    { text: 'Medical Information Form', url: 'https://docs.google.com/forms/d/e/1FAIpQLScZXZAGt2BnVhXl35xgSxLnj8CLWlcL0FImY2jz90PzJofpPw/viewform'}
    ]);

</script>