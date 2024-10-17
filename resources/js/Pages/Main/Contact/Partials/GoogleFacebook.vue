<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- start google|facebook area -->
    <div class="mt-6">
        <div class="basis-full md:basis-1/2 flex flex-col justify-center items-center px-4 py-8">
        <h1 class="text-slate-800 text-left mb-4 font-bold text-2xl md:text-xl lg:text-2xl">Stay connected with AUSL</h1>
        <p class="text-center font-normal text-slate-700 text-md md:text-lg lg:text-xl mb-8">
            Discover the latest updates, events, and announcements from Arellano University School of Law. Stay informed and engaged with our community through our Facebook page or visit us onsite.
        </p>
        </div>
    </div>

    <div class="row px-2 py-2 mb-6">
        <div class="google-maps shadow-xl">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.6906568880654!2d120.9925687736211!3d14.559674278080355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97bafba42c3%3A0x7859c5febabe4837!2sArellano%20University%20School%20of%20Law!5e0!3m2!1sen!2sph!4v1719103813103!5m2!1sen!2sph"
            style="border:0;"
            loading="lazy"
        ></iframe>
        </div>
        <div class="fb-bind hidden sm:block shadow-xl">
        <iframe
            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAUSLchiefs&tabs=timeline%2Cevents&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
            style="border:none;overflow:hidden"
            scrolling="no"
            frameborder="0"
            loading="lazy"
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
        ></iframe>
        </div>
    </div>
        <!-- end google|facebook area -->
    </div>
</template>


<style scoped>
    .row {
    display: grid;
    grid-template-columns: 1.5fr 1fr; /* Two columns with the first one being 1.5 times as wide */
    gap: 1rem; /* Adjust the gap as needed */
    margin: 0;
    padding: 0;
    }
    
    .google-maps {
    min-width: 300px; /* Ensure a minimum width */
    height: 0;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    position: relative;
    overflow: hidden;
    }
    
    .fb-bind {
    min-width: 300px; /* Ensure a minimum width */
    height: 0;
    padding-bottom: 84.25%; /* Adjusted aspect ratio */
    position: relative;
    overflow: hidden;
    }
    
    .google-maps iframe,
    .fb-bind iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
    .row {
        grid-template-columns: 1fr; /* Single column layout for mobile */
    }
    
    .google-maps,
    .fb-bind {
        padding-bottom: 56.25%; /* Maintain 16:9 aspect ratio for both */
    }
    }
</style>