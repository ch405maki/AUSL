<template>
    <li v-for="(item, index) in links" :key="index" class="mb-2 text-official-purple-800">
        <a :href="item.url" class="text-lg font-normal text-official-purple-800 hover:underline">{{ item.text }}</a>
    </li>
</template>

<script setup>
    import { ref } from 'vue';

    const links = ref([
    { text: 'Admission Process', url: '/admissions/process' },
    { text: 'Requirements', url: '/admissions/requirements' },
    { text: 'Downloadable Forms', url: '/student/downloadable-forms' },
    { text: 'Manual Enlistment', url: 'https://docs.google.com/forms/d/e/1FAIpQLSc04tvc09-7wi9_mnK6rLliwQcCjfzNm7dGjkNRyySEpANorA/closedform' },
    { text: 'ID Application', url: '/admissions/id' },
    { text: 'Medical Information Form', url: 'https://docs.google.com/forms/d/e/1FAIpQLScZXZAGt2BnVhXl35xgSxLnj8CLWlcL0FImY2jz90PzJofpPw/viewform'}
    ]);

</script>