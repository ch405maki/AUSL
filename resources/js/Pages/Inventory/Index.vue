<script setup lang="ts">
import AppLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';

// Breadcrumb type definition (moved inline since import is removed)
type BreadcrumbItem = {
    title: string;
    href: string;
};

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
    {
        title: 'Inventory',
        href: '/inventory',
    },
];

// Toast functionality removed - will use console or alert for now
const showToast = (message: string, type: 'success' | 'error' | 'info' = 'info') => {
    // Simple alert for now - replace with your preferred notification method
    if (type === 'error') {
        alert(`Error: ${message}`);
    } else if (type === 'success') {
        alert(`Success: ${message}`);
    } else {
        console.log(message);
    }
};

// State
const items = ref<any[]>([]);
const loading = ref(true);
const searchQuery = ref('');
const selectedCategory = ref<string>('all');

// Computed - Unique categories for filter
const categories = computed(() => {
  const uniqueCategories = new Map();
  
  items.value.forEach(item => {
    if (item.category && item.category.id) {
      uniqueCategories.set(item.category.id, {
        id: item.category.id,
        name: item.category.name
      });
    }
  });
  
  return Array.from(uniqueCategories.values());
});

// Computed - Filtered items based on search and category
const filteredItems = computed(() => {
  let filtered = items.value;
  
  // Filter by category
  if (selectedCategory.value !== 'all') {
    filtered = filtered.filter(item => 
      item.category?.id?.toString() === selectedCategory.value
    );
  }
  
  // Filter by search query
  if (searchQuery.value) {
    const query = searchQuery.value.toLowerCase();
    filtered = filtered.filter(item => 
      item.name.toLowerCase().includes(query) ||
      item.product_code.toLowerCase().includes(query) ||
      item.category?.name.toLowerCase().includes(query) ||
      item.unit?.name.toLowerCase().includes(query)
    );
  }
  
  return filtered;
});

// Get stock status class
const getStockStatusClass = (quantity: number, minStock: number) => {
    if (quantity <= 0) return 'text-red-600 font-semibold';
    if (quantity <= minStock) return 'text-yellow-600 font-semibold';
    return 'text-green-600';
};

// Get stock status text
const getStockStatusText = (quantity: number, minStock: number) => {
    if (quantity <= 0) return 'Out of Stock';
    if (quantity <= minStock) return 'Low Stock';
    return 'In Stock';
};

// Get stock status color for badge
const getStockStatusBadgeClass = (quantity: number, minStock: number) => {
    if (quantity <= 0) return 'bg-red-100 text-red-800';
    if (quantity <= minStock) return 'bg-yellow-100 text-yellow-800';
    return 'bg-green-100 text-green-800';
};

// Fetch items from API
const fetchItems = async () => {
    loading.value = true;
    try {
        const response = await axios.get('http://192.168.0.145/api/items');
        items.value = response.data;
    } catch (error) {
        console.error('Error fetching items:', error);
        showToast('Failed to load inventory items', 'error');
    } finally {
        loading.value = false;
    }
};

// Refresh data
const refreshData = () => {
    fetchItems();
    showToast('Refreshing inventory data...', 'info');
};

// Clear all filters
const clearAllFilters = () => {
    searchQuery.value = '';
    selectedCategory.value = 'all';
};

// Clear search only
const clearSearch = () => {
    searchQuery.value = '';
};

// Format date
const formatDate = (dateString: string) => {
    if (!dateString) return 'N/A';
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    });
};

// Check if any filters are active
const hasActiveFilters = computed(() => {
    return searchQuery.value !== '' || selectedCategory.value !== 'all';
});

onMounted(() => {
    fetchItems();
});
</script>

<template>
    <Head title="Inventory" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Inventory Management</h1>
                    <p class="text-sm text-gray-500 mt-1">Manage and track your inventory items</p>
                </div>
                <button 
                    @click="refreshData" 
                    :disabled="loading"
                    class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    <!-- Refresh Icon - using SVG instead of lucide-vue-next -->
                    <svg class="h-4 w-4 mr-2" :class="{'animate-spin': loading}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Refresh
                </button>
            </div>

            <!-- Filters Section -->
            <div class="flex flex-col sm:flex-row gap-3">
                <!-- Search Input -->
                <div class="relative flex-1 max-w-md">
                    <!-- Search Icon -->
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input
                        v-model="searchQuery"
                        type="text"
                        placeholder="Search by name, code, category, or unit..."
                        class="w-full pl-9 pr-8 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    />
                    <button
                        v-if="searchQuery"
                        @click="clearSearch"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2"
                    >
                        <svg class="h-4 w-4 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Category Filter Dropdown -->
                <div class="w-full sm:w-64 relative">
                    <select 
                        v-model="selectedCategory"
                        class="w-full pl-9 pr-8 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none bg-white"
                    >
                        <option value="all">All Categories</option>
                        <option 
                            v-for="category in categories" 
                            :key="category.id" 
                            :value="category.id.toString()"
                        >
                            {{ category.name }}
                        </option>
                    </select>
                    <!-- Filter Icon -->
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    <!-- Dropdown Arrow -->
                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <!-- Clear Filters Button -->
                <button
                    v-if="hasActiveFilters"
                    @click="clearAllFilters"
                    class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                >
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Clear Filters
                </button>
            </div>

            <!-- Results Info -->
            <div class="flex justify-between items-center text-sm">
                <div class="text-gray-500">
                    Showing {{ filteredItems.length }} of {{ items.length }} items
                </div>
                <div v-if="selectedCategory !== 'all'" class="text-xs text-blue-600">
                    Filtered by: {{ categories.find(c => c.id.toString() === selectedCategory)?.name }}
                </div>
            </div>

            <!-- Loading Skeleton -->
            <div v-if="loading" class="bg-white rounded-lg border shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th v-for="i in 8" :key="i" class="px-4 py-3">
                                    <div class="h-4 bg-gray-200 rounded animate-pulse w-20"></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="i in 5" :key="i">
                                <td v-for="j in 8" :key="j" class="px-4 py-3">
                                    <div class="h-4 bg-gray-200 rounded animate-pulse"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table -->
            <div v-else class="bg-white rounded-lg border shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Product Code
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Item Name
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category
                                </th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Quantity
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Unit
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Min Stock
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Last Updated
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr 
                                v-for="item in filteredItems" 
                                :key="item.id"
                                class="hover:bg-gray-50 transition-colors"
                            >
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-mono text-gray-600">
                                    {{ item.product_code }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <!-- Package Icon -->
                                        <svg class="h-4 w-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                        <span class="text-sm font-medium text-gray-900">{{ item.name }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                                        {{ item.category?.name || 'Uncategorized' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-right font-medium">
                                    <span :class="getStockStatusClass(item.quantity, item.min_stock)">
                                        {{ item.quantity }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">
                                    {{ item.unit?.name || 'N/A' }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">
                                    {{ item.min_stock }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span :class="[
                                        'px-2 py-1 text-xs rounded-full font-medium',
                                        getStockStatusBadgeClass(item.quantity, item.min_stock)
                                    ]">
                                        {{ getStockStatusText(item.quantity, item.min_stock) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                    {{ formatDate(item.updated_at) }}
                                </td>
                            </tr>
                            
                            <!-- Empty State -->
                            <tr v-if="filteredItems.length === 0">
                                <td colspan="8" class="px-4 py-12 text-center text-gray-500">
                                    <!-- Package Icon -->
                                    <svg class="h-12 w-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                    <p class="text-sm">No items found</p>
                                    <p class="text-xs text-gray-400 mt-1">
                                        {{ hasActiveFilters ? 'Try adjusting your filters' : 'No inventory items available' }}
                                    </p>
                                    <button 
                                        v-if="hasActiveFilters"
                                        @click="clearAllFilters" 
                                        class="mt-3 inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                    >
                                        Clear All Filters
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Footer Stats -->
                <div class="bg-gray-50 px-4 py-3 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-2 text-sm">
                        <div class="text-gray-500">
                            Total Items: <span class="font-medium text-gray-900">{{ items.length }}</span>
                            <span v-if="hasActiveFilters" class="text-xs text-gray-400 ml-2">
                                (Filtered: {{ filteredItems.length }})
                            </span>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                <span class="text-xs text-gray-600">In Stock</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                <span class="text-xs text-gray-600">Low Stock</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                <span class="text-xs text-gray-600">Out of Stock</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>