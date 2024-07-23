    <template>
        <Head title="Alumni" />
    
        <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Alumni Testimonials</h2>
        </template>


        <div class="flex justify-between my-8 mr-8 items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
            <!-- Add button here for modal form -->
            <v-btn color="primary" @click="showModal = true">
                Add Testimonial
                <v-icon right>mdi-plus</v-icon>
            </v-btn>
        </div>

        <div class="flex flex-col min-h-screen mx-8 bg-gray-100 dark:bg-gray-900 lg:pt-2">
            <main class="flex-grow">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row w-full justify-center">
                <!-- Main content section -->
                <div class="w-full p-1">
                    <v-table fixed-header height="500px">
                    <thead>
                        <tr>
                        <th class="text-left">Number</th>
                        <th class="text-left">Name</th>
                        <th class="text-left">Testimonial</th>
                        <th class="text-left">Image</th>
                        <th class="text-left">Batch</th>
                        <th class="text-left">Status</th>
                        <th class="text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(alumnus, index) in alumni" :key="alumnus.id" :class="{'bg-red-100': !alumnus.status, 'bg-green-100': alumnus.status}">
                        <td>{{ index + 1 }}</td>
                        <td>{{ alumnus.name }}</td>
                        <td v-html="alumnus.content.substring(0, 200)"></td>
                        <td><img :src="alumnus.image" alt="Image Logo" class="min-w-32 w-32 h-min max-h-100 mr-2"></td>
                        <td>{{ alumnus.batch }}</td>
                        <td>{{ alumnus.status ? 'Posted' : 'Pending Approval' }}</td>
                        <td>
                            <v-menu anchor="bottom end" open-on-hover>
                            <template v-slot:activator="{ props }">
                                <v-btn color="primary" v-bind="props">
                                Action
                                <v-icon end>mdi-wrench</v-icon>
                                </v-btn>
                            </template>
                            <v-list>
                                <v-list-item>
                                <div class="mx-auto text-center p-4">
                                    <v-btn color="red" @click="deletePost(alumnus.id, alumnus.name)" class="my-2" block>
                                    Delete
                                    <v-icon right>mdi-delete</v-icon>
                                    </v-btn>
                                    <v-btn color="primary" @click="approvePost(alumnus.id, alumnus.name)" class="my-2" block>
                                    Approve
                                    <v-icon right>mdi-check</v-icon>
                                    </v-btn>
                                    <v-btn color="primary" @click="declinePost(alumnus.id, alumnus.name)" class="my-2" block>
                                        For Approval
                                    <v-icon right>mdi-eye</v-icon>
                                </v-btn>
                                </div>
                                </v-list-item>
                            </v-list>
                            </v-menu>
                        </td>
                        </tr>
                    </tbody>
                    </v-table>
                </div>
                <!-- End main content section -->
    
                <!-- Modal for Testimonial Form -->
                <v-dialog v-model="showModal" max-width="600px">
                    <v-card>
                    <v-card-title>
                        <span class="headline">Add Testimonial</span>
                    </v-card-title>
                    <v-card-text>
                        <form @submit.prevent="submitForm" class="w-full">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12">
                            <!-- Name Input -->
                            <div class="sm:col-span-12">
                            <InputLabel for="name" value="Name" />
                            <TextInput
                                id="name"
                                v-model="form.name"
                                autofocus
                                required
                                type="text"
                                class="mt-1 block w-full"
                                placeholder="Your Name..."
                            />
                            </div>
    
                            <!-- Testimonial Input with CKEditor -->
                            <div class="sm:col-span-12">
                            <InputLabel for="content" value="Content" />
                            <ckeditor :editor="editor" v-model="form.content" :config="editorConfig"></ckeditor>
                            </div>
    
                            <!-- Profile Image Upload Section -->
                            <div class="col-span-full">
                            <label for="image-upload" class="block text-sm font-medium leading-6 text-gray-900">Profile photo</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div v-if="previewImage" class="mb-4">
                                <img :src="previewImage" alt="Selected Image Preview" class="w-full rounded-lg shadow-sm" />
                                </div>
                                <div v-else class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path
                                    fill-rule="evenodd"
                                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                    clip-rule="evenodd"
                                    />
                                </svg>
                                <div class="mt-2 flex text-sm leading-6 text-gray-600">
                                    <label
                                    for="image-upload"
                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500"
                                    >
                                    <span>Upload an image</span>
                                    <input id="image-upload" name="image-upload" type="file" class="sr-only" @change="handleFileChange" />
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                            </div>
    
                            <!-- Batch Input -->
                            <div class="sm:col-span-12">
                            <InputLabel for="batch" value="Batch" />
                            <TextInput
                                id="batch"
                                v-model="form.batch"
                                required
                                type="text"
                                class="mt-1 block w-full"
                                placeholder="Batch..."
                            />
                            </div>
    
                            <!-- Status Input -->
                            <div class="sm:col-span-12 hidden">
                            <InputLabel for="status" value="Status" />
                            <input
                                id="status"
                                v-model="form.status"
                                type="checkbox"
                                class="mt-1 block"
                            />
                            </div>
    
                            <!-- Submit Button -->
                            <div class="sm:col-span-12 flex justify-center space-x-4">
                            <PrimaryButton :disabled="form.processing" class="flex items-center space-x-2">
                                <v-icon class="mdi mdi-content-save-outline"></v-icon>
                                <span>Save</span>
                            </PrimaryButton>
                            <v-btn color="red darken-1" text @click="showModal = false">
                                <v-icon class="mdi mdi-close-circle-outline"></v-icon>
                                <span>Close</span>
                            </v-btn>
                            </div>
                        </div>
                        </form>
                    </v-card-text>
                    </v-card>
                </v-dialog>
                <!-- End Modal for Testimonial Form -->
                </div>
            </div>
            </main>
            <!-- Footer -->
            <Footer />
            <!-- Footer -->
        </div>
        </AuthenticatedLayout>
    </template>

    <script setup>
    import { ref } from 'vue';
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import Footer from '@/Layouts/Partials/Footer.vue';
    import Swal from 'sweetalert2';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { Inertia } from '@inertiajs/inertia';

    const props = defineProps({
    alumni: { type: Array, required: true },
    });

    const form = useForm({
    name: '',
    content: '',
    image: null,
    batch: '',
    status: false, // Default value set to false
    });

    const previewImage = ref(null);
    const showModal = ref(false);

    const handleFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
        previewImage.value = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        previewImage.value = null;
    }
    form.image = file;
    };

    const showPost = (id) => {
    Inertia.visit(`/show/${id}`);
    };

    const deletePost = (id, name) => {
    const alerta = Swal.mixin({
        buttonsStyling: true,
    });

    alerta.fire({
        title: 'Are you sure delete ' + name + ' ?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<i class="fa-solid fa-check"></i> Yes, delete',
        cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
        form.delete(route('alumni.destroy', id));
        }
    });
    };

    const approvePost = (id, name) => {
    Swal.fire({
        title: 'Are you sure you want to approve ' + name + '?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<i class="fa-solid fa-check"></i> Yes, approve',
        cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
        // Send a request to update the status to true
        Inertia.post(route('alumni.approve', id), {
            status: true,
        }, {
            onSuccess: () => {
            Swal.fire('Approved!', name + ' has been approved.', 'success');
            },
            onError: () => {
            Swal.fire('Error!', 'There was an error approving ' + name, 'error');
            }
        });
        }
    });
    };

    const declinePost = (id, name) => {
    Swal.fire({
        title: 'Are you sure you want to approve ' + name + '?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<i class="fa-solid fa-check"></i> Yes, approve',
        cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
        // Send a request to update the status to true
        Inertia.post(route('alumni.forApproval', id), {
            status: false,
        }, {
            onSuccess: () => {
            Swal.fire('Approved!', name + ' has been approved.', 'success');
            },
            onError: () => {
            Swal.fire('Error!', 'There was an error approving ' + name, 'error');
            }
        });
        }
    });
    };

    const submitForm = () => {
    const formData = new FormData();
    formData.append('name', form.name);
    formData.append('content', form.content);
    if (form.image) {
        formData.append('image', form.image);
    }
    formData.append('batch', form.batch);
    formData.append('status', form.status);

    form.post(route('alumni.store'), {
        data: formData,
        onSuccess: () => {
        // Clear the form after a successful submission
        form.reset();
        previewImage.value = null;
        },
        headers: {
        'Content-Type': 'multipart/form-data',
        },
    });
    };

    const editor = ClassicEditor;
    const editorConfig = {
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
    };
    </script>