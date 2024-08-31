    <template>
    <MainLayout>
        <Head title="Board of Trustees" />
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
            <div class="flex flex-col md:flex-row justify-between gap-8">
                <!-- Main content section -->
                <section class="w-full md:w-3/4 relative">
                <div>
                    <div class="flex items-center  ml-2">
                        <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                            Board of Trustees
                        </h2>
                    </div>
                    <div class="text-slate-600 leading-relaxed mb-8">
                        <div v-for="(member, index) in boardMembers" :key="index" class="flex flex-col sm:flex-row items-center mb-8">
                        <!-- Image -->
                        <div class="flex-shrink-0 sm:mb-0 sm:mr-6 mb-2">
                            <Link class="flex items-center">
                            <img :src="member.image" :alt="member.alt"
                                class="max-w-full h-full max-h-28 transition-transform duration-300 transform hover:scale-105">
                            </Link>
                        </div>
                        <!-- Text -->
                        <div>
                            <div class="uppercase font-bold text-xl tracking-wide leading-tight">{{ member.name }}</div>
                            <div class="font-normal text-gray-600 italic text-slate-700 text-lg hover:text-slate-900 custom-text-align hover:text-blue-900 cursor-pointer">
                                {{ member.position }}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                </section>

                <aside class="w-full md:w-1/4 sticky top-0">
                <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                    <div class="ml-4">
                        <h2 class="mb-4 text-lg leading-6 font-medium text-purple-900 capitalize">On this page</h2>
                        <hr class="mb-4 border-1 border-purple-800">
                        <h3 class="text-lg font-normal text-gray-800 mb-8">Board of Trustees</h3>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-purple-900 text-lg font-medium mb-4">Related Links</h2>
                        <hr class="mb-4 border-1 border-purple-800">
                        <ul class="list-inside list-disc">
                            <li v-for="(item, index) in links" :key="index" class="mb-2 font-semibold">
                            <a :href="item.url" class="text-lg font-normal text-gray-600 hover:text-slate-900">{{ item.text }}</a> 
                            </li>
                        </ul>
                    </div>
                </div>
                </aside>
            </div>
        </div>
        </main>
    </MainLayout>
    </template>

    <script setup>
    import { ref, computed } from 'vue';
    import { reactive, onMounted, onBeforeUnmount } from 'vue';
    import { Head } from '@inertiajs/vue3';
    import MainLayout from '@/Layouts/MainLayout.vue';

    // Dynamic data for board members
    const boardMembers = ref([
    {
        name: 'Justice Jose C. Reyes',
        position: 'Chairman',
        image: '/images/administration/board/justiceReyes.jpg',
        alt: 'Chairman Image',
    },
    {
        name: 'Francisco P.V Cayco',
        position: 'Vice Chairman & President',
        image: '/images/administration/board/franciscoCayco.jpg',
        alt: 'Vice Chairman Image',
    },
    {
        name: 'Atty. Gabriel P. Dela Peña',
        position: 'Executive Director & Trustee',
        image: '/images/administration/board/delaPena.jpg',
        alt: 'Atty. Gabriel P. Dela Peña',
    },
    {
        name: 'Atty. Agnes B. Santos',
        position: 'Treasurer & Trustee',
        image: '/images/administration/board/agnes.jpg',
        alt: 'Atty. Agnes B. Santos',
    },
    {
        name: 'Dean Domingo M. Navaro',
        position: 'Trustee',
        image: '/images/administration/board/deanNavarro.jpg',
        alt: 'Dean Domingo M. Navaro',
    },
    {
        name: 'Alma C. Curato',
        position: 'Trustee',
        image: '/images/administration/board/almaCurato.jpg',
        alt: 'Alma C. Curato',
    },
    {
        name: 'Atty. Manuel B. Curato',
        position: 'Trustee',
        image: '/images/administration/board/mCurato.jpg',
        alt: 'Atty. Manuel B. Curato',
    },
    {
        name: 'Atty. Frederick G. Dedace',
        position: 'Trustee',
        image: '/images/administration/board/dedace.jpg',
        alt: 'Atty. Frederick G. Dedace',
    },
    {
        name: 'Valente V. Cayco',
        position: 'Trustee',
        image: '/images/administration/board/vCayco.jpg',
        alt: 'Valente V. Cayco',
    },
    {
        name: 'Judge Caridad N. Grecia-Cuerdo',
        position: 'Trustee',
        image: '/images/administration/board/cCuerdo.jpg',
        alt: 'Judge Caridad N. Grecia-Cuerdo',
    },
    {
        name: 'Judge Armando C. Velasco',
        position: 'Trustee',
        image: '/images/administration/board/aVelasco.jpg',
        alt: 'Judge Armando C. Velasco',
    },
    {
        name: 'Judge Joselito D. Vibandor',
        position: 'Trustee',
        image: '/images/administration/board/jVibandor.jpg',
        alt: 'Judge Joselito D. Vibandor',
    },
    {
        name: 'Atty. Eric C. Lazo',
        position: 'Trustee',
        image: '/images/administration/board/eLazo.jpg',
        alt: 'Atty. Eric C. Lazo',
    },
    {
        name: 'Atty. Arnaldo M. Espinas',
        position: 'Trustee',
        image: '/images/administration/board/aEspinas.jpg',
        alt: 'Atty. Arnaldo M. Espinas',
    },
    {
        name: 'Atty. Victor Carlo Antonio V. Cayco',
        position: 'Trustee',
        image: '/images/administration/board/aCayco.jpg',
        alt: 'Atty. Victor Carlo Antonio V. Cayco',
    },
    {
        name: 'Atty. Maureen Kay E. Patajo',
        position: 'Corporate Secretary',
        image: '/images/administration/board/mPatajo.jpg',
        alt: 'Atty. Maureen Kay E. Patajo',
    }
    ]);

    // Variable to toggle layout between image on top and side-by-side
    const isImageOnTop = ref(false);

    const layoutClass = computed(() => 
    isImageOnTop.value ? 'flex flex-col sm:flex-col items-center' : 'flex items-center'
    );

    const links = ref([
      { text: 'Arellano Law Foundation', url: '/administration/alf' },
      { text: 'Board of Trustees', url: '/administration/board_trustees' },
      { text: 'Administration Officers', url: '/administration/admin_staff' },
      { text: 'Departments', url: '/administration/departments' }, 
    ]);

    const isMobile = reactive({ value: window.innerWidth <= 768 });

    const checkIfMobile = () => {
    isMobile.value = window.innerWidth <= 768;
    };

    onMounted(() => {
    window.addEventListener('resize', checkIfMobile);
    });

    onBeforeUnmount(() => {
    window.removeEventListener('resize', checkIfMobile);
    });
    </script>

    <style scoped>
    .container {
    max-width: 1200px;
    }

    .sticky {
    position: sticky;
    top: 0;
    }

    .overflow-y-auto {
    overflow-y: auto;
    }

    .h-screen {
    height: 100vh;
    }

    .fixed {
    position: fixed;
    }

    .bottom-4 {
    bottom: 1rem;
    }

    .right-4 {
    right: 1rem;
    }

    .flex {
    display: flex;
    }

    .space-x-2 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(0.5rem * var(--tw-space-x-reverse));
    margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
    }

    .v-btn {
    margin-top: 16px;
    margin-right: 8px;
    }

    @media (max-width: 639px) { /* Mobile screens */
        .custom-text-align {
            text-align: center;
        }
    }
    @media (min-width: 640px) { /* Screens larger than 'sm' */
    .custom-text-align {
        text-align: left;
    }
    }
    </style>