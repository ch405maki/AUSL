<template>
    <Head title="User Management" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">User Management</h2>
        </template>
        <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900 lg:pt-10">
            <main class="flex-grow">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col md:flex-row w-full justify-center">
                        <!-- Main content section -->
                        <div class="w-full md:w-2/3 p-1">
                            <v-table fixed-header height="500px">
                                <thead>
                                    <tr>
                                        <th class="text-left">Number</th>
                                        <th class="text-left">Name</th>
                                        <th class="text-left">Email</th>
                                        <th class="text-left">Role</th>
                                        <th class="text-left">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(user, index) in users" :key="user.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ user.name }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>{{ getRoleName(user.role_id) }}</td>
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
                                                            <v-btn color="red" @click="deleteUser(user.id, user.name)" class="my-2" block>
                                                                Delete
                                                                <v-icon right>mdi-delete</v-icon>
                                                            </v-btn>
                                                            <v-btn color="primary" @click="() => openChangeRoleModal(user)" class="my-2" block>
                                                                Change Role
                                                                <v-icon right>mdi-account-edit</v-icon>
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

                        <!-- User Creation Form -->
                        <div class="w-full md:w-1/3 p-2 flex justify-start">
                            <form @submit.prevent="submitForm" class="w-full">
                                <!-- Title -->
                                <div class="text-left">
                                    <h2 class="text-xl font-bold">Create New User</h2>
                                </div>
                                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12">
                                    <!-- Name Input -->
                                    <div class="sm:col-span-12">
                                        <InputLabel for="name" value="Name" />
                                        <TextInput
                                            id="name"
                                            v-model="form.name"
                                            autofocus
                                            required
                                            type="text"
                                            class="mt-1 block w-full border border-gray-300 rounded-lg "
                                            placeholder="Name Here..."
                                        />
                                    </div>

                                    <!-- Email Input -->
                                    <div class="sm:col-span-12">
                                        <InputLabel for="email" value="Email" />
                                        <TextInput
                                            id="email"
                                            v-model="form.email"
                                            required
                                            type="email"
                                            class="mt-1 block w-full border border-gray-300 rounded-lg "
                                            placeholder="Email Here..."
                                        />
                                    </div>

                                    <!-- Password Input -->
                                    <div class="sm:col-span-12">
                                        <InputLabel for="password" value="Password" />
                                        <TextInput
                                            id="password"
                                            v-model="form.password"
                                            required
                                            type="password"
                                            class="mt-1 block w-full border border-gray-300 rounded-lg "
                                            placeholder="Password Here..."
                                        />
                                    </div>

                                    <!-- Role Dropdown -->
                                    <div class="sm:col-span-12">
                                        <InputLabel for="role_id" value="Role" />
                                        <select
                                            id="role_id"
                                            v-model="form.role_id"
                                            required
                                            class="mt-1 block w-full border border-gray-300 rounded-lg "
                                        >
                                            <option v-for="role in roles" :key="role.id" :value="role.id">
                                                {{ role.role_name }}
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="sm:col-span-12 flex justify-center">
                                        <PrimaryButton :disabled="form.processing">
                                            <i class="fa-solid fa-save"></i> Save
                                        </PrimaryButton>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End User Creation Form -->
                    </div>
                </div>
            </main>
            <!-- Footer -->
            <Footer />
            <!-- Footer -->
        </div>

        <!-- Change Role Modal -->
        <v-dialog v-model="changeRoleDialog" max-width="500px">
            <v-card>
                <v-card-title>
                    <span class="headline">Change Role</span>
                </v-card-title>
                <v-card-text>
                    <div>
                        <label for="role-select" class="text-slate-600 font-bold">Select Role</label>
                        <select id="role-select" v-model="selectedRole" class="mt-1 block w-full border border-gray-300 rounded-lg">
                            <option v-for="role in roles" :key="role.id" :value="role.id">
                                {{ role.role_name }}
                            </option>
                        </select>
                    </div>
                </v-card-text>
                <v-card-actions>
                    <v-btn color="primary" @click="confirmChangeRole">Save</v-btn>
                </v-card-actions>
                <v-card-actions>
                    <v-btn @click="changeRoleDialog = false">Cancel</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import Footer from '@/Layouts/Partials/Footer.vue';
import Swal from 'sweetalert2';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    users: { type: Array, required: true },
    roles: { type: Array, required: true }, // Add roles prop
});

const form = useForm({
    name: '',
    email: '',
    password: '',
    role_id: '',
});

const changeRoleDialog = ref(false);
const selectedUser = ref(null);
const selectedRole = ref(null);

const openChangeRoleModal = (user) => {
    selectedUser.value = user;
    selectedRole.value = user.role_id;
    changeRoleDialog.value = true;
};

const confirmChangeRole = () => {
    // Close the modal first
    changeRoleDialog.value = false;

    // Show the SweetAlert confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to change the user's role.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, change it!',
        cancelButtonText: 'No, cancel!',
    }).then((result) => {
        if (result.isConfirmed) {
            changeUserRole();
        }
    });
};

const changeUserRole = () => {
    if (selectedUser.value && selectedRole.value) {
        Inertia.put(`/users/${selectedUser.value.id}/role`, { role_id: selectedRole.value }, {
            onSuccess: () => {
                // Optionally, refresh the user list or update the user in the local state
            },
        });
    }
};

const showUser = (id) => {
    Inertia.visit(`/users/${id}`);
};

const deleteUser = (id, name) => {
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
            form.delete(route('users.destroy', id));
        }
    });
};

const submitForm = () => {
    form.post(route('users.store'), {
        onSuccess: () => {
            // Clear the form after a successful submission
            form.reset();
        },
    });
};

const getRoleName = (roleId) => {
    const role = props.roles.find(role => role.id === roleId);
    return role ? role.role_name : 'Unknown';
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
</style>