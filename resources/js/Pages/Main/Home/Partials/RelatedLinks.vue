<template>
    <li v-for="(item, index) in links" :key="index" class="mb-2 text-official-purple-800">
        <a :href="item.url" class="text-lg font-normal text-official-purple-800 hover:underline">{{ item.text }}</a>
    </li>
</template>

<script setup>
    import { ref } from 'vue';

    const links = ref([
      { text: 'Latest News', url: '/news' },
      { text: 'Latest Announcement', url: '/announcements' },
      { text: 'Deans Corner', url: '/deans corner' },
      { text: 'Latest Events', url: '/events/upcomming' },
    ]);

</script>