<template>
    <Head title="Post" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Archives</h2>
        </template>

        <template #action>
            <div class="flex items-center p-3">
                <!-- Search Input -->
                <div class="relative mr-4">
                    <input 
                        v-model="searchQuery" 
                        type="text" 
                        placeholder="Search Title Here..." 
                        class="search-input"
                    />
                    <svg class="search-icon" width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.753 15.852l-4.51-4.51a6.004 6.004 0 1 0-1.406 1.406l4.51 4.51a1 1 0 0 0 1.415-1.414zM9 13a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" fill="#9CA3AF"/>
                    </svg>
                </div>
                <div class="relative mr-4 w-32">
                    <select v-model="selectedYear" class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">All Years</option>
                        <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
                    </select>
                </div>
            </div>
        </template>

        <div class="flex flex-col min-h-screen bg-gray-100">
            <main class="flex-grow">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col md:flex-row w-full justify-center mb-6">
                        <!-- Main content section -->
                        <div class="w-full mx-4">
                            <v-table fixed-header class="shadow-sm rounded-lg">
                                <thead>
                                    <tr>
                                        <th class="text-left">Number</th>
                                        <th class="text-left">Title</th>
                                        <th class="text-left">State</th>
                                        <th class="text-left">Date Created</th>
                                        <th class="text-left">Date Updated</th>
                                        <th class="text-left">Preview</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(post, index) in filteredPosts" :key="post.id">
                                        <td class="text-center">{{ index + 1 }}</td>
                                        <td>{{ post.title }}</td>
                                        <td>{{ post.state }}</td>
                                        <td>{{ new Date(post.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}</td>
                                        <td>{{ new Date(post.updated_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}</td>
                                        <td>
                                            <div v-if="post.image && post.image.length > 0">
                                            <img :src="post.image[0]" alt="Image Logo" class="my-2 min-w-32 w-32 h-min max-h-100 mr-2 rounded-sm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="flex justify-center items-center gap-1">
                                                <!-- update btn -->
                                                <button @click="() => showPost(post.id)" class="p-2 rounded-full group transition-all duration-500 flex item-center" title="Pre-View">
                                                    <svg class="cursor-pointer" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path class="fill-indigo-500" d="M12 4.5C7.30558 4.5 3.15878 7.29124 1.5 12C3.15878 16.7088 7.30558 19.5 12 19.5C16.6944 19.5 20.8412 16.7088 22.5 12C20.8412 7.29124 16.6944 4.5 12 4.5ZM12 17.25C9.37665 17.25 7.25 15.1234 7.25 12.5C7.25 9.87665 9.37665 7.75 12 7.75C14.6234 7.75 16.75 9.87665 16.75 12.5C16.75 15.1234 14.6234 17.25 12 17.25ZM12 9.25C10.4812 9.25 9.25 10.4812 9.25 12C9.25 13.5188 10.4812 14.75 12 14.75C13.5188 14.75 14.75 13.5188 14.75 12C14.75 10.4812 13.5188 9.25 12 9.25Z" fill="#818CF8"></path>
                                                    </svg>
                                                </button>
                                                <button @click="openChangeStateModal(post.title, post.id)" class="p-2 rounded-full group transition-all duration-500 flex items-center" title="Re-Post">
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path class="stroke-green-500" d="M3 17V19C3 19.5523 3.44772 20 4 20H20C20.5523 20 21 19.5523 21 19V17H3ZM17 9L12 4L7 9H10V14H14V9H17Z" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </button>
                                                <button @click="deletePost(post.id, post.title)" class="p-2 rounded-full  group transition-all duration-500  flex item-center" title="Delete">
                                                    <svg class="" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path class="fill-red-600" d="M4.00031 5.49999V4.69999H3.20031V5.49999H4.00031ZM16.0003 5.49999H16.8003V4.69999H16.0003V5.49999ZM17.5003 5.49999L17.5003 6.29999C17.9421 6.29999 18.3003 5.94183 18.3003 5.5C18.3003 5.05817 17.9421 4.7 17.5003 4.69999L17.5003 5.49999ZM9.30029 9.24997C9.30029 8.80814 8.94212 8.44997 8.50029 8.44997C8.05847 8.44997 7.70029 8.80814 7.70029 9.24997H9.30029ZM7.70029 13.75C7.70029 14.1918 8.05847 14.55 8.50029 14.55C8.94212 14.55 9.30029 14.1918 9.30029 13.75H7.70029ZM12.3004 9.24997C12.3004 8.80814 11.9422 8.44997 11.5004 8.44997C11.0585 8.44997 10.7004 8.80814 10.7004 9.24997H12.3004ZM10.7004 13.75C10.7004 14.1918 11.0585 14.55 11.5004 14.55C11.9422 14.55 12.3004 14.1918 12.3004 13.75H10.7004ZM4.00031 6.29999H16.0003V4.69999H4.00031V6.29999ZM15.2003 5.49999V12.5H16.8003V5.49999H15.2003ZM11.0003 16.7H9.00031V18.3H11.0003V16.7ZM4.80031 12.5V5.49999H3.20031V12.5H4.80031ZM9.00031 16.7C7.79918 16.7 6.97882 16.6983 6.36373 16.6156C5.77165 16.536 5.49093 16.3948 5.29823 16.2021L4.16686 17.3334C4.70639 17.873 5.38104 18.0979 6.15053 18.2013C6.89702 18.3017 7.84442 18.3 9.00031 18.3V16.7ZM3.20031 12.5C3.20031 13.6559 3.19861 14.6033 3.29897 15.3498C3.40243 16.1193 3.62733 16.7939 4.16686 17.3334L5.29823 16.2021C5.10553 16.0094 4.96431 15.7286 4.88471 15.1366C4.80201 14.5215 4.80031 13.7011 4.80031 12.5H3.20031ZM15.2003 12.5C15.2003 13.7011 15.1986 14.5215 15.1159 15.1366C15.0363 15.7286 14.8951 16.0094 14.7024 16.2021L15.8338 17.3334C16.3733 16.7939 16.5982 16.1193 16.7016 15.3498C16.802 14.6033 16.8003 13.6559 16.8003 12.5H15.2003ZM11.0003 18.3C12.1562 18.3 13.1036 18.3017 13.8501 18.2013C14.6196 18.0979 15.2942 17.873 15.8338 17.3334L14.7024 16.2021C14.5097 16.3948 14.229 16.536 13.6369 16.6156C13.0218 16.6983 12.2014 16.7 11.0003 16.7V18.3ZM2.50031 4.69999C2.22572 4.7 2.04405 4.7 1.94475 4.7C1.89511 4.7 1.86604 4.7 1.85624 4.7C1.85471 4.7 1.85206 4.7 1.851 4.7C1.05253 5.50059 1.85233 6.3 1.85256 6.3C1.85273 6.3 1.85297 6.3 1.85327 6.3C1.85385 6.3 1.85472 6.3 1.85587 6.3C1.86047 6.3 1.86972 6.3 1.88345 6.3C1.99328 6.3 2.39045 6.3 2.9906 6.3C4.19091 6.3 6.2032 6.3 8.35279 6.3C10.5024 6.3 12.7893 6.3 14.5387 6.3C15.4135 6.3 16.1539 6.3 16.6756 6.3C16.9364 6.3 17.1426 6.29999 17.2836 6.29999C17.3541 6.29999 17.4083 6.29999 17.4448 6.29999C17.4631 6.29999 17.477 6.29999 17.4863 6.29999C17.4909 6.29999 17.4944 6.29999 17.4968 6.29999C17.498 6.29999 17.4988 6.29999 17.4994 6.29999C17.4997 6.29999 17.4999 6.29999 17.5001 6.29999C17.5002 6.29999 17.5003 6.29999 17.5003 5.49999C17.5003 4.69999 17.5002 4.69999 17.5001 4.69999C17.4999 4.69999 17.4997 4.69999 17.4994 4.69999C17.4988 4.69999 17.498 4.69999 17.4968 4.69999C17.4944 4.69999 17.4909 4.69999 17.4863 4.69999C17.477 4.69999 17.4631 4.69999 17.4448 4.69999C17.4083 4.69999 17.3541 4.69999 17.2836 4.69999C17.1426 4.7 16.9364 4.7 16.6756 4.7C16.1539 4.7 15.4135 4.7 14.5387 4.7C12.7893 4.7 10.5024 4.7 8.35279 4.7C6.2032 4.7 4.19091 4.7 2.9906 4.7C2.39044 4.7 1.99329 4.7 1.88347 4.7C1.86974 4.7 1.86051 4.7 1.85594 4.7C1.8548 4.7 1.85396 4.7 1.85342 4.7C1.85315 4.7 1.85298 4.7 1.85288 4.7C1.85284 4.7 2.65253 5.49941 1.85408 6.3C1.85314 6.3 1.85296 6.3 1.85632 6.3C1.86608 6.3 1.89511 6.3 1.94477 6.3C2.04406 6.3 2.22573 6.3 2.50031 6.29999L2.50031 4.69999ZM7.05028 5.49994V4.16661H5.45028V5.49994H7.05028ZM7.91695 3.29994H12.0836V1.69994H7.91695V3.29994ZM12.9503 4.16661V5.49994H14.5503V4.16661H12.9503ZM12.0836 3.29994C12.5623 3.29994 12.9503 3.68796 12.9503 4.16661H14.5503C14.5503 2.8043 13.4459 1.69994 12.0836 1.69994V3.29994ZM7.05028 4.16661C7.05028 3.68796 7.4383 3.29994 7.91695 3.29994V1.69994C6.55465 1.69994 5.45028 2.8043 5.45028 4.16661H7.05028ZM2.50031 6.29999C4.70481 6.29998 6.40335 6.29998 8.1253 6.29997C9.84725 6.29996 11.5458 6.29995 13.7503 6.29994L13.7503 4.69994C11.5458 4.69995 9.84724 4.69996 8.12529 4.69997C6.40335 4.69998 4.7048 4.69998 2.50031 4.69999L2.50031 6.29999ZM13.7503 6.29994L17.5003 6.29999L17.5003 4.69999L13.7503 4.69994L13.7503 6.29994ZM7.70029 9.24997V13.75H9.30029V9.24997H7.70029ZM10.7004 9.24997V13.75H12.3004V9.24997H10.7004Z" fill="#F87171"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td> 
                                    </tr>
                                </tbody>
                            </v-table>
                        </div>
                        <!-- End main content section -->
                    </div>
                </div>
            </main>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    posts: { type: Array, required: true },
});

const searchQuery = ref('');
const years = ref([2025, 2024, 2023, 2022, 2021, 2020]);
const selectedYear = ref('');

const filteredPosts = computed(() => {
    return props.posts.filter(post => {
        const matchesQuery = post.title.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            post.state.toLowerCase().includes(searchQuery.value.toLowerCase());
        
        const matchesYear = selectedYear.value ? new Date(post.created_at).getFullYear() === Number(selectedYear.value) : true;

        return matchesQuery && matchesYear;
    });
});

const showPost = (id) => {
    Inertia.visit(`/show/${id}`);
};

const openChangeStateModal = (title, id) => {
    Swal.fire({
        title: 'Change State',
        html: `Are you sure you want to repost <br><b>"${title}"</b>?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, repost it!',
        cancelButtonText: 'Cancel',
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            changeState(id);
        }
    });
};

const changeState = (id) => {
    Inertia.patch(route('archive.updateState', id), {
        onSuccess: () => {
            Swal.fire('Active!', 'The post has been posted.', 'success');
        },
        onError: () => {
            Swal.fire('Error!', 'There was an issue updating the post.', 'error');
        }
    });
};

const form = useForm({
  title: '',
  content: '',
  image: null,
});

const deletePost = (id, title) => {
  Swal.fire({
    title: `Are you sure you want to delete "${title}"?`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
  }).then((result) => {
    if (result.isConfirmed) {
      form.delete(route('announcement.destroy', id));
    }
  });
};
</script>

<style scoped>
.mx-auto.text-center {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.v-btn {
    width: 100%;
    transition: all 0.3s ease-in-out;
}

.v-btn:hover {
    transform: scale(1.05);
}

.v-icon {
    margin-left: 8px;
}

.p-4 {
    padding: 1px;
}

.search-input {
    width: 350px;
    padding: 0.5rem;
    padding-left: 2.5rem;
    border: 1px solid #ddd;
    border-radius: 0.375rem;
}

.search-icon {
    position: absolute;
    top: 50%;
    left: 0.5rem;
    transform: translateY(-50%);
    color: #9CA3AF;
}
</style>
