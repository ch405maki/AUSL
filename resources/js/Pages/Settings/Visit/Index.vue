<template>
    <Head title="Gallery" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Visitors Logs</h2>
      </template>
  
      <template #action>
        <div class="flex justify-between items-center w-full p-3">
          <!-- Title -->
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">Visitors Logs</h2>
  
          <!-- Search Input -->
          <div class="flex items-center">
            <div class="relative hidden md:block">
              <input
                v-model="searchQuery"
                type="text"
                placeholder="Search Title Here..."
                class="search-input"
              />
              <svg
                class="search-icon absolute top-1/2 right-2 transform -translate-y-1/2"
                width="20"
                height="20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M17.753 15.852l-4.51-4.51a6.004 6.004 0 1 0-1.406 1.406l4.51 4.51a1 1 0 0 0 1.415-1.414zM9 13a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"
                  fill="#9CA3AF"
                />
              </svg>
            </div>
            <button @click="clearLogs" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg ml-4">
                Clear Logs
            </button>
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
                      <th class="text-left w-1/12">Number</th>
                      <th class="text-left w-1/12">Date</th>  
                      <th class="text-left">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(log, index) in logs.data" :key="log.id">
                        <td>{{ index }}</td>
                        <td>
                        {{ 
                            new Date(log.created_at).toLocaleDateString() + 
                            ' ' + 
                            new Date(log.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) 
                        }}
                        </td>
                      <td class="text-left whitespace-nowrap bg-red-100">{{ log.action }}</td>
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
    import { ref } from 'vue';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import Swal from 'sweetalert2';
    import { Inertia } from '@inertiajs/inertia';
    
    defineProps({
      logs: Object,
    });
    
    const clearLogs = async () => {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Inertia.get('/clear-logs').then(() => {   
            Swal.fire('Deleted!', 'Logs cleared successfully!', 'success');
          });
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