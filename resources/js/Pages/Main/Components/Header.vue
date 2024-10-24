<template>
    <div class="relative mb-4">
    <img src="/images/headerbg.jpg" alt="Background Image" class="w-full h-auto object-cover ">
    <div class="absolute inset-0 flex items-center justify-center">
        <h1 class="text-white text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-center">
            <slot />
        </h1>
    </div>
    </div>
    <!-- <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
        <slot />
    </h2> -->
</template>
