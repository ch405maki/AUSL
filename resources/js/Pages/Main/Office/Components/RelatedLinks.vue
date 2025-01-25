<template>
    <li v-for="(item, index) in links" :key="index" class="mb-2 text-official-purple-800">
        <a :href="item.url" class="text-base sm:text-base md:text-md lg:text-lg font-normal text-official-purple-800 hover:underline">{{ item.text }}</a>
    </li>
</template>

<script setup>
    import { ref } from 'vue';

    const links = ref([
        { text: 'Audio Visual', url: 'https://www.facebook.com/avausl' },
        { text: "Bursar's Office", url: '/office/bursar' }, 
        { text: "Dean's Office", url: '/deans corner' },
        { text: 'Guidance and Counseling Center', url: '/office/guidance' }, 
        { text: 'IT Center', url: '/office/itc' },
        { text: 'Library', url: '/office/library' },
        { text: "Office of Student Affairs", url: 'https://www.facebook.com/AUSLOfficeofStudentAffairs' }, 
        { text: "Registrar's Office", url: '/office/registrar' },
    ]);

</script>