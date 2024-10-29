              <!-- Step 2 -->
              <div v-show="step === 2">
                <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                  School Location
                </h2>
                <div class="bg-white border-none rounded-lg mb-6 relative">
                  <h2 class="text-lg sm:text-xl font-bold text-gray-700 mb-8">Address</h2>
                  <div class="text-slate-600 leading-relaxed mb-8">
                    <div class="flex items-center">
                    <div class="shrink-0 flex items-center text-slate-700">
                      <Link :href="route('main')" class="flex items-center">
                        <img src="/images/alflogo.png" alt="Image Logo" class="max-w-full h-full max-h-16 mr-2 transition-transform duration-300 transform hover:scale-105">
                      </Link>
                      <div class="ml-4">
                        <div class="uppercase font-bold text-lg tracking-wide leading-tight">ARELLANO LAW FOUNDATION</div>
                        <div class="text-lg font-normal text-gray-600 hover:text-slate-900 text-warp">
                          Taft Avenue Corner Menlo Street, Pasay City, Metro Manila, Philippines.
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  <h2 class="text-lg sm:text-xl font-bold text-gray-700 mb-8">Campus Map</h2>
                  <div class="text-slate-600 leading-relaxed mb-8">
                    <img src="/images/contact/campus.jpg" alt="Step 2 Image" class="mb-8 font-medium mx-auto rounded-lg" />
                  </div>
                  <h2 class="text-lg sm:text-xl font-bold text-gray-700 mb-8">Google Map</h2>
                  <div class="text-slate-600 leading-relaxed mb-4">
                    <!-- start google|facebook area -->
                    <div class="row px-2 py-2 mb-6">
                        <div class="google-maps shadow-xl rounded-lg">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.6906568880654!2d120.9925687736211!3d14.559674278080355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97bafba42c3%3A0x7859c5febabe4837!2sArellano%20University%20School%20of%20Law!5e0!3m2!1sen!2sph!4v1719103813103!5m2!1sen!2sph"
                            style="border:0;"
                            loading="lazy"
                        ></iframe>
                        </div>
                    </div>
                        <!-- end google|facebook area -->
                  </div>
                </div>
              </div>
  
              <!-- Step 3 -->
              <div v-show="step === 3">
                <h2 class="text-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty text-start">
                  Social Media Page
                </h2>
                <div class="bg-white border-none rounded-lg relative">
                  <!-- Social Media Links -->
                  <h2 class="text-slate-700 font-bold my-8 text-lg sm:text-xl text-pretty text-start">Follow us</h2>
                  <ul class="text-slate-700">
                  <li
                    v-for="link in socialMediaLinks"
                    :key="link.name"
                    class="mb-4 flex items-center"
                  >
                    <a
                      :href="link.url"
                      :class="link.hoverClass"
                      class="
                          text-slate-700
                          text-lg font-normal
                          text-gray-600 
                          hover:text-slate-900 
                          hover:underline cursor-pointer 
                          flex items-center 
                          transition-transform 
                          duration-300 
                          ease-in-out 
                          transform 
                          hover:scale-110"
                        >
                      <img
                        :src="link.logo"
                        alt=""
                        class="w-10 h-10 mr-2 transition-transform duration-300 ease-in-out transform hover:scale-110"
                      />
                      <span>{{ link.name }}</span>
                    </a>
                  </li>
                </ul>
                </div>
              </div>