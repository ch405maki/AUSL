<template>
    <footer class="bg-official-purple-100">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <div class="mb-6 md:mb-0 flex items-center space-x-4">
                    <!-- AUSL Logo -->
                    <img src="/images/ausllogo2.png" class="h-16 w-auto" alt="AUSL Logo" />

                    <!-- Text Content -->
                    <div class="text-slate-700">
                        <span class="text-invicta self-center text-xl font-semibold whitespace-nowrap text-purple-900">
                            Arellano University School of Law
                        </span>
                        <p>Taft Avenue Corner Menlo Street, Pasay City, Metro Manila, Philippines</p>
                        <p>Tel. Nos. 8404-30 89 to 93</p>
                        <a href="mailto:onlinesupport@arellanolaw.edu" class="hover:underline text-slate-700 hover:text-slate-900">
                            onlinesupport@arellanolaw.edu
                        </a>
                    </div>
                </div>

                <div class="hidden sm:flex justify-center space-x-4 mt-6 items-center">
                    <!-- Increase image size and make responsive -->
                    <a :href="route('privacy_policy')" class="flex-shrink-0">
                        <img 
                            src="/images/privacy/registration.jpg" 
                            alt="Registration" 
                            class="h-32 md:h-40 lg:h-48 object-cover" 
                        />
                    </a>
                    <a :href="route('privacy_policy')" class="flex-shrink-0">
                        <img 
                            src="/images/privacy/corseal.png" 
                            alt="CorSeal" 
                            class="h-32 w-32 md:h-40 md:w-40 lg:h-48 lg:w-48 object-cover" 
                        />
                    </a>
                </div>

                </div>
                <div class="grid grid-cols-3 justify-items gap-8 sm:gap-6 sm:grid-cols-3 px-2">
                    <div>
                        <h2 class="mb-4 text-sm font-semibold text-purple-900 uppercase">Quick Links</h2>
                        <ul class="text-slate-700">
                            <li class="mb-4">
                                <a :href="route('history')" class="hover:underline cursor-pointer">About AUSL</a>
                            </li>
                            <li class="mb-4">
                                <a :href="route('admissions.process')" class="hover:underline cursor-pointer">Admission</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-4 text-sm font-semibold text-purple-900 uppercase">Follow us</h2>
                        <ul class="text-slate-700">
                            <li class="mb-4 flex items-center">
                                <a href="/contact/socials" class="hover:underline hover:text-blue-600 flex items-center">
                                    <i class="mdi mdi-facebook text-blue-600 mr-2"></i>
                                    <span>Facebook Pages</span>
                                </a>
                            </li>
                            <li class="mb-4 flex items-center">
                                <a href="https://www.youtube.com/@AUSLofficial" class="hover:underline hover:text-red-600 flex items-center">
                                    <i class="mdi mdi-youtube text-red-600 mr-2"></i>
                                    <span>YouTube Channel</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-4 text-sm font-semibold text-purple-900 uppercase">Legal</h2>
                        <ul class="text-slate-700">
                            <li class="mb-4">
                                <a :href="route('privacy_policy')" class="hover:underline">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <hr class="my-6 border-purple-800 sm:mx-auto dark:border-purple-900 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="#" class="hover:underline">AUSL</a>. All Rights Reserved.
                </span>
                <div class="flex mt-4 sm:justify-center sm:mt-0">
                    <!-- Social media links here -->
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
    import { ref } from 'vue';
</script>

<style scoped>
    @import url('https://db.onlinewebfonts.com/c/14ab77252fbc4bdca1dbdf8051cb7e96?family=BF+Invicta+W00+Bold');

    .text-invicta {
        font-family: 'BF Invicta W00 Bold', sans-serif;
    }
</style>
