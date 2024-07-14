    <template>
        <div class="relative" @click.away="closeDropdown" @close.stop="closeDropdown">
        <button @click="toggleDropdown" class="rounded text-invicta tracking-wide text-white uppercase focus:outline-none">
            Programs
        </button>
        <div v-if="isOpen" class="absolute bg-white shadow-lg rounded mt-2 w-48">
            <ResponsiveNavLink :href="route('login')" :active="route().current('login')" class="block px-4 py-2 text-invicta tracking-wide text-black uppercase">
            Academic Programs
            </ResponsiveNavLink>
            <ResponsiveNavLink :href="route('login')" :active="route().current('login')" class="block px-4 py-2 text-invicta tracking-wide text-black uppercase">
            Bar Review Program
            </ResponsiveNavLink>
        </div>
        </div>
    </template>
    
    <script>
    export default {
        data() {
        return {
            isOpen: false,
        };
        },
        methods: {
        toggleDropdown() {
            this.isOpen = !this.isOpen;
        },
        closeDropdown() {
            this.isOpen = false;
        },
        },
    };
    </script>
    
    <style scoped>
    /* Add any additional styles if needed */
    </style>
    