<template>
    <MainLayout>
      <Head title="Enrollment Guide" />
      <main class="flex-grow">
        <Header>Online Enrollment Process</Header>
        <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
          <div class="flex flex-col md:flex-row justify-between gap-8">
            <!-- Main content section -->
            <section class="w-full md:w-3/4 relative">
              <!-- Step 1 -->
              <div v-show="step === 1">
                <div class="bg-white border-none rounded-lg mb-6 pl-2 relative">
                  <h2 class="text-xl sm:text-2xl text-left text-purple-900 font-bold mb-6 border-left">Step One: Online Registration - New and Transferee Students</h2>
                  <div class="text-slate-600 leading-relaxed">
                    <p class="text-lg font-normal text-gray-700 mb-4 text-md">1. Go to <a href="https://aims.arellanolaw.edu/aims/applicants" target="_blank" class="text-blue-600 underline">https://aims.arellanolaw.edu/aims/applicants</a> <i>(For Old Students, proceed to No. 7)</i></p>
                    <p class="text-lg font-normal text-gray-700 mb-4 text-md">2. Click "APPLY!"</p>
                    <img src="/images/admission/image1.jpg" alt="Step 2 Image" class="text-lg font-normal text-gray-700 mb-4 mx-auto rounded-lg" />
                    <p class="text-lg font-normal text-gray-700 mb-4">3. Fill Up the necessary fields</p>
                    <ul class="list-disc list-inside text-lg font-normal text-gray-700 mb-4">
                      <li>For New and Transferee students, choose LAW as Department and click "Continue."</li>
                      <li>For Refresher, choose LAW-REFRESHER as Department and click "Continue."</li>
                    </ul>
                    <img src="/images/admission/image2.jpg" alt="Step 3 Image" class="text-lg font-normal text-gray-700 mb-4 mx-auto rounded-lg" />
                    <p class="text-lg font-normal text-gray-700 mb-4">4. Fill up ALL the required fields <i>(Do not leave any blank spaces)</i>. If done, click "Save Changes".</p>
                    <img src="/images/admission/image3.jpg" alt="Step 4 Image" class="text-lg font-normal text-gray-700 mb-4 mx-auto rounded-lg" />
                    <p class="text-lg font-normal text-gray-700 mb-4">5. A pop-up will appear for Data Privacy Policy.</p>
                    <ul class="list-disc list-inside text-lg font-normal text-gray-700 mb-4">
                      <li>Check all boxes and click "Submit".</li>
                    </ul>
                    <img src="/images/admission/image4.jpg" alt="Step 5 Image" class="text-lg font-normal text-gray-700 mb-4 mx-auto rounded-lg" />
                    <img src="/images/admission/image5.jpg" alt="Step 6 Image" class="text-lg font-normal text-gray-700 mb-4 mx-auto rounded-lg" />
                    <p class="text-lg font-normal text-gray-700 mb-4">6. Jot down Username and Password <i>(Note: Username will be changed once officially enrolled into your Student Number)</i> Default password is your lastname, birthmonth and day.</p>
                    <ul class="list-disc list-inside text-lg font-normal text-gray-700 mb-4">
                      <li>For Refresher: Disregard Examination Schedule and wait for your account to be accepted.</li>
                      <li>For New Students and Transferees, you will be contacted by the Admissions office for further instructions.</li>
                    </ul>
                    
                    <p class="text-lg font-normal text-gray-700 mb-4">7. Log in to <a href="https://aims.arellanolaw.edu/aims/students" target="_blank" class="text-blue-600 underline">https://aims.arellanolaw.edu/aims/students</a></p>
                    <img src="/images/admission/image6.jpg" alt="Step 7 Image" class="text-lg font-normal text-gray-700 mb-4 mx-auto rounded-lg" />
                  </div>
                  <div class="flex justify-end items-end bottom-4 right-4">
                    <v-btn color="primary" @click="nextStep">Next</v-btn>
                  </div>
                </div>
              </div>
  
              <!-- Step 2 -->
              <div v-show="step === 2">
                <div class="bg-white border-none rounded-lg pl-2 mb-6 relative">
                  <h2 class="text-xl sm:text-2xl font-bold text-purple-900 mb-4">Step Two: Enlist Subjects</h2>
                  <div class="text-slate-600 leading-relaxed mb-4">
                    <p class="text-lg font-normal text-gray-700 mb-4">8. To enlist your subjects and schedules: Click on the "Registration" tab and select your preferred subjects and schedule. (Note: One subject / schedule at a time.).</p>
                    <img src="/images/admission/image8.jpg" alt="Step 8 Image" class="text-lg font-normal text-gray-700 mb-4 mx-auto rounded-lg" />
                    <p class="text-lg font-normal text-gray-700 mb-4">For NEW, OLD & TRANSFEREE Students only.</p>
                    <img src="/images/admission/image7.jpg" alt="Step 8 Image" class="text-lg font-normal text-gray-700 mb-4 mx-auto rounded-lg" />
                  </div>
                  <div class="mt-8">
                    <div class="flex justify-end items-end bottom-4 right-4">
                    <v-btn color="secondary" @click="prevStep">Back</v-btn>
                    <v-btn color="primary" @click="nextStep">Next</v-btn>
                  </div>
                  </div>
                </div>
              </div>
  
              <!-- Step 3 -->
              <div v-show="step === 3">
                <div class="bg-white border-none rounded-lg pl-2 mb-6 relative">
                  <h2 class="text-xl sm:text-2xl font-bold text-purple-900 mb-4">Step Three: Payment Procedures</h2>
                  <div class="text-slate-600 leading-relaxed">
                    <p class="text-lg font-normal text-gray-700 mb-4">1. Choose a payment option:</p>
                    <ul class="list-disc list-inside text-lg font-normal text-gray-700 mb-4">
                      <li class="text-lg font-normal text-gray-700 mb-4">Over-the-counter deposit</li>
                      <ul class="list-none ml-4">
                        <li class="text-lg font-normal text-gray-700 mb-4">Name of Bank: BANCO DE ORO UNIBANK</li>
                        <li class="text-lg font-normal text-gray-700 mb-4">Account Name: ARELLANO LAW FOUNDATION INC.</li>
                        <li class="text-lg font-normal text-gray-700 mb-4">Account No.: 0045 8000 3872</li>
                      </ul>
                      <li class="text-lg font-normal text-gray-700 mb-4">Online Bank Transfer</li>
                      <ul class="list-none ml-4">
                        <li class="text-lg font-normal text-gray-700 mb-4">Name of Bank: BANCO DE ORO UNIBANK</li>
                        <li class="text-lg font-normal text-gray-700 mb-4">Account Name: ARELLANO LAW FOUNDATION INC.</li>
                        <li class="text-lg font-normal text-gray-700 mb-4">Account No.: 0045 8000 3872</li>
                      </ul>
                    </ul>
                    <p class="text-lg font-normal text-gray-700 mb-4">2. Email the copy/picture of the validated deposit slip (for over-the-counter deposit)/bank transfer confirmation (for online bank transfer) to jphorlina@arellanolaw.edu or accounting@arellanolaw.edu, using your FULL NAME as the email SUBJECT.</p>
                    <ul class="list-none ml-4">
                      <li class="text-lg font-normal text-gray-700 mb-4">For Payment verification, kindly indicate the following details:</li>
                      <li class="text-lg font-normal text-gray-700 mb-4">Full name: _______________________________</li>
                      <li class="text-lg font-normal text-gray-700 mb-4">Date and Time of Fund Transfer: _____________</li>
                      <li class="text-lg font-normal text-gray-700 mb-4">Amount: ________________________________</li>
                      <li class="text-lg font-normal text-gray-700 mb-4">Last 3 digits of the account number where the transfer came from: _________</li>
                    </ul>
                    <p class="text-lg font-normal text-gray-700 mb-4">3. Sending your proof of payment should be made within <b>five (5) days</b> from the date of enlistment, otherwise, <u><i><b>your enlisted subjects will be deleted,</b></i></u> and the slots will be made available to other students.</p>
                    <p class="text-lg font-normal text-gray-700 mb-4">4. An email will be sent to your registered email address containing your official Student Number which should be used in accessing your account in the AIMS portal (<a href="https://aims.arellanolaw.edu/aims/students" target="_blank" class="text-blue-600 underline">aims.arellanolaw.edu/aims/students</a>).</p>
                    <p class="text-lg font-normal text-gray-700 mb-4">For your information and guidance.</p>
                  </div>
                  <div class="flex justify-end items-end bottom-4 right-4">
                    <v-btn color="secondary" @click="prevStep">Back</v-btn>
                  </div>
                </div>
              </div>
            </section>
  
            <aside class="w-full md:w-1/4 sticky top-0">
              <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                <div class="ml-4">
                    <h2 class="text-purple-900 text-lg font-medium mb-4">On this page</h2>
                    <hr class="mb-4 border-1 border-purple-800">
                </div>
                <ol class="relative ml-8 text-gray-500 border-s border-gray-200 dark:border-slate-600 dark:text-gray-400">
                    <!-- Step 1 -->
                    <li class="mb-10 ms-6 cursor-pointer transition-colors duration-300 hover:text-slate-900" :class="step === 1 && 'text-slate-900'" @click="setStep(1)">
                    <span :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900', step === 1 ? 'bg-green-200 text-green-500 dark:bg-green-900 dark:text-green-400' : 'bg-gray-100 text-gray-500 dark:bg-slate-600 dark:text-gray-400']">
                        <v-icon>mdi-check</v-icon>
                    </span>
                    <h3 class="font-medium leading-tight">Step One</h3>
                    <p class="text-sm">Online Registration</p>
                    </li>
                    <!-- Step 2 -->
                    <li class="mb-10 ms-6 cursor-pointer transition-colors duration-300 hover:text-slate-900" :class="step === 2 && 'text-slate-900'" @click="setStep(2)">
                    <span :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900', step === 2 ? 'bg-green-200 text-green-500 dark:bg-green-900 dark:text-green-400' : 'bg-gray-100 text-gray-500 dark:bg-slate-600 dark:text-gray-400']">
                        <v-icon>mdi-book-open-page-variant</v-icon>
                    </span>
                    <h3 class="font-medium leading-tight">Step Two</h3>
                    <p class="text-sm">Enlist Subjects</p>
                    </li>
                    <!-- Step 3 -->
                    <li class="mb-10 ms-6 cursor-pointer transition-colors duration-300 hover:text-slate-900" :class="step === 3 && 'text-slate-900'" @click="setStep(3)">
                    <span :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900', step === 3 ? 'bg-green-200 text-green-500 dark:bg-green-900 dark:text-green-400' : 'bg-gray-100 text-gray-500 dark:bg-slate-600 dark:text-gray-400']">
                        <v-icon>mdi-cash</v-icon>
                    </span>
                    <h3 class="font-medium leading-tight">Step Three</h3>
                    <p class="text-sm">Payment Procedures</p>
                    </li>
                </ol>
                <div class="ml-4">
                    <h2 class="text-purple-900 text-lg font-medium mb-4">Related Links</h2>
                    <hr class="mb-4 border-1 border-purple-800">
                    <ul class="list-inside list-disc">
                      <RelatedLinks />
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
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import RelatedLinks from '../Components/RelatedLinks.vue';
import Header from '@/Pages/Main/Components/Header.vue'

// Create a ref for the current step
const step = ref(1); // Initially set to Step 1

// Function to set the current step
const setStep = (newStep) => {
  step.value = newStep;
  console.log(`Current step set to: ${newStep}`); // Debugging log
};

// Function to go to the next step
const nextStep = () => {
  if (step.value < 3) {
    step.value++;
  }
};

// Function to go to the previous step
const prevStep = () => {
  if (step.value > 1) {
    step.value--;
  }
};

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
</style>