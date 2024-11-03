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


        <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
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
const years = ref([2024, 2023, 2022, 2021, 2020]);
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
