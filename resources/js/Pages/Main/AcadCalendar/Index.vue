<template>
  <MainLayout>
    <Head title="Academic Calendar" />
    <main class="flex-grow">
      <div class="container mx-auto px-4 py-4 lg:py-8">
        <div class="flex flex-col md:flex-row justify-between gap-8">
          <!-- Main content section -->
          <section class="w-full md:w-3/4 overflow-y-auto h-screen relative">
            <!-- Step 1 -->
            <div v-show="step === 1">
              <div class="bg-white border-none shadow-lg rounded-lg mb-6 relative p-6">
                <div class="text-gray-700 pl-2 sm:pl-4">
                  <p class="text-center text-lg font-semibold bg-purple-200 rounded-sm py-4">
                    Arellano University School Of Law<br><b>Regular Program</b><br>Amended Academic Year 2024-2025
                  </p>
                  <table class="w-full text-left mt-4">
                    <thead>
                      <tr>
                        <td colspan="3"><b class="text-slate-700">First Semester</b></td>
                      </tr>
                    </thead>
                    <tbody class="bg-white text-slate-600">
                      <!-- First Semester Enrollment -->
                      <tr>
                        <td rowspan="7" class="border-t text-slate-700 font-bold text-slate-700 py-1">Enrollment</td>
                        <td class="border-t text-slate-700 py-1">Freshmen</td>
                        <td class="border-t text-slate-700 py-1">July 1, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t text-slate-700 py-1">Refresher</td>
                        <td class="border-t text-slate-700 py-1">July 1, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t text-slate-700 py-1">Graduating Students (w/ remaining 27 units)</td>
                        <td class="border-t text-slate-700 py-1">July 10-11, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t text-slate-700 py-1">Fourth Year (w/ remaining 48 units)</td>
                        <td class="border-t text-slate-700 py-1">July 12-13, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t text-slate-700 py-1">Third Year</td>
                        <td class="border-t text-slate-700 py-1">July 14-15, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t text-slate-700 py-1">Second Year</td>
                        <td class="border-t text-slate-700 py-1">July 16-17, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t text-slate-700 py-1">First Year (Old)</td>
                        <td class="border-t text-slate-700 py-1">July 18-19, 2024</td>
                      </tr>

                      <!-- First Semester Events -->
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Faculty Meeting</td>
                        <td class="border-t text-slate-700 py-1">July 16, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Orientation For New Students</td>
                        <td class="border-t text-slate-700 py-1">July 17, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 font-bold italic py-1 text-slate-700">Classes Start</td>
                        <td class="border-t border-gray-400 font-bold italic py-1">July 20, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Last Day For Late Enrollment</td>
                        <td class="border-t text-slate-700 py-1">August 2, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Last Day For Dropping (w/ retention)</td>
                        <td class="border-t text-slate-700 py-1">August 2, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Preliminary Examinations (4 weeks)</td>
                        <td class="border-t text-slate-700 py-1">August 17-23, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Mid-Term Examinations (10 weeks)</td>
                        <td class="border-t text-slate-700 py-1">September 28 - October 6, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Deadline For Submission Of Mid-Term Grades</td>
                        <td class="border-t text-slate-700 py-1">October 20, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Final Examinations (18 weeks)</td>
                        <td class="border-t text-slate-700 py-1">November 16-24, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Deadline For Submission Of Final Grades</td>
                        <td class="border-t text-slate-700 py-1">December 9, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Holiday Break</td>
                        <td class="border-t text-slate-700 py-1">Dec. 20, 2024 - Jan 2, 2025</td>
                      </tr>

                      <!-- Second Semester -->
                      <tr class="pt-6">
                        <td colspan="3" class="py-1"><hr class="border-t border-gray-400"><b class="text-slate-700">Second Semester</b><hr class="border-t border-gray-400"></td>
                      </tr>
                      <tr>
                        <td rowspan="6" class="border-t text-slate-700 font-bold text-slate-700 py-1">Enrollment</td>
                        <td class="border-t text-slate-700 py-1">New Students & Transferees</td>
                        <td class="border-t text-slate-700 py-1">December 3, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t text-slate-700 py-1">Graduating (w/ remaining 27 units)</td>
                        <td class="border-t text-slate-700 py-1">December 10-11, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t text-slate-700 py-1">Fourth Year (w/ remaining 48 units and below)</td>
                        <td class="border-t text-slate-700 py-1">December 12-13, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t text-slate-700 py-1">Third Year</td>
                        <td class="border-t text-slate-700 py-1">December 14-15, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t text-slate-700 py-1">Second Year</td>
                        <td class="border-t text-slate-700 py-1">December 16-17, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t text-slate-700 py-1">First Year (Old Students)</td>
                        <td class="border-t text-slate-700 py-1">December 18-19, 2024</td>
                      </tr>

                      <!-- Second Semester Events -->
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Faculty Meeting</td>
                        <td class="border-t text-slate-700 py-1">December 17, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Orientation For New Students</td>
                        <td class="border-t text-slate-700 py-1">January 3, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 font-bold italic py-1 text-slate-700">Classes Start</td>
                        <td class="border-t border-gray-400 font-bold italic py-1">January 4, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Last Day For Late Enrollment</td>
                        <td class="border-t text-slate-700 py-1">January 17, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Last Day For Dropping (w/ retention)</td>
                        <td class="border-t text-slate-700 py-1">January 17, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Preliminary Examinations (4 weeks)</td>
                        <td class="border-t text-slate-700 py-1">February 1-7, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Mid-Term Examinations (10 weeks)</td>
                        <td class="border-t text-slate-700 py-1">March 15-23, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Deadline For Submission Of Mid-Term Grades</td>
                        <td class="border-t text-slate-700 py-1">April 6, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Graduating Fellowship/Seminar</td>
                        <td class="border-t text-slate-700 py-1">April 5-6, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Final Examinations (Graduating)</td>
                        <td class="border-t text-slate-700 py-1">April 26 - May 4, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Deadline For Submission Of Final Grades</td>
                        <td class="border-t text-slate-700 py-1">May 18, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Final Examinations (Non-Graduating) (18 weeks)</td>
                        <td class="border-t text-slate-700 py-1">May 5-11, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Deadline For Submission Of Final Grades</td>
                        <td class="border-t text-slate-700 py-1">May 25, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Deliberation</td>
                        <td class="border-t text-slate-700 py-1">May 30, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-700 py-1">Graduation Day</td>
                        <td class="border-t text-slate-700 py-1">June 5, 2025</td>
                      </tr>

                      <!-- Summer -->
                      <tr class="pt-6">
                        <td colspan="3" class="py-1"><hr class="border-t border-gray-400"><b class="text-slate-700">Summer</b><hr class="border-t border-gray-400"></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t py-1 font-bold text-slate-700">Enrollment</td>
                        <td class="border-t py-1">May 17-18, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t font-bold italic py-1 text-slate-700">Classes Start</td>
                        <td class="border-t py-1 font-bold italic">May 19, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t py-1 text-slate-700">Final Examinations (6 weeks)</td>
                        <td class="border-t py-1">June 26-28, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t py-1 text-slate-700">Summer Classes End</td>
                        <td class="border-t py-1">June 28, 2025</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t py-1 text-slate-700">Deadline For Submission Of Final Grades</td>
                        <td class="border-t py-1">July 12, 2025</td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="mt-6 text-center">
                    <v-alert
                      v-model="alert"
                      border="start"
                      color="deep-purple-accent-4"
                      variant="tonal"
                    >
                      <a href="pdfs/acadcal24-25.pdf" class="flex items-center justify-center text-purple-900 hover:text-purple-700">
                        <v-icon class="mr-2">mdi-download</v-icon>See the original copy of the document.
                      </a>
                    </v-alert>
                  </div>
                </div>
              </div>
            </div>

            <!-- Step 2 -->
            <div v-show="step === 2">
              <div class="bg-white border-none shadow-lg rounded-lg mb-6 relative p-6">
                <div class="text-slate-700 pl-2 sm:pl-4">
                  <!-- Header with strong emphasis -->
                  <p class="text-center text-lg font-semibold bg-purple-200 rounded-sm py-4">
                    Arellano University School Of Law<br>
                    <b>Regular Program</b><br>
                    Amended Academic Year 2023-2024
                  </p>
                  <!-- Table content -->
                  <table class="w-full text-left mt-4">
                    <thead>
                      <tr>
                        <!-- First Semester heading in dark slate color -->
                        <td colspan="3"><b class="text-slate-900">First Semester</b></td>
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                      <!-- First Semester Enrollment -->
                      <tr>
                        <!-- Category title in dark slate color -->
                        <td rowspan="7" class="border-t border-gray-400 py-1 font-bold text-slate-900">Enrollment</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">Freshmen</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">July 1, 2023</td>
                      </tr>
                      <tr>
                        <td class="border-t border-gray-400 text-slate-700 py-1">Refresher</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">July 1, 2023</td>
                      </tr>
                      <tr>
                        <td class="border-t border-gray-400 text-slate-700 py-1">Graduating Students (w/ remaining 27 units)</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">August 9-10, 2023</td>
                      </tr>
                      <tr>
                        <td class="border-t border-gray-400 text-slate-700 py-1">Fourth Year (w/ remaining 48 units)</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">August 11-12, 2023</td>
                      </tr>
                      <tr>
                        <td class="border-t border-gray-400 text-slate-700 py-1">Third Year</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">August 13-14, 2023</td>
                      </tr>
                      <tr>
                        <td class="border-t border-gray-400 text-slate-700 py-1">Second Year</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">August 15-16, 2023</td>
                      </tr>
                      <tr>
                        <td class="border-t border-gray-400 text-slate-700 py-1">First Year (Old)</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">August 17-18, 2023</td>
                      </tr>

                      <!-- First Semester Events -->
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-700 py-1">Faculty Meeting</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">August 16, 2023</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-700 py-1">Orientation For New Students</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">August 16, 2023</td>
                      </tr>
                      <tr>
                        <!-- Classes Start emphasized in bold and italic -->
                        <td colspan="2" class="border-t border-gray-400 font-bold italic text-slate-700 py-1">Classes Start</td>
                        <td class="border-t border-gray-400 font-bold italic text-slate-700 py-1">August 19, 2023</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-700 py-1">Last Day For Late Enrollment</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">September 1, 2023</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-700 py-1">Last Day For Dropping (w/ retention)</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">September 1, 2023</td>
                      </tr>
                      <tr>
                        <!-- Preliminary Examinations in dark slate color -->
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Preliminary Examinations</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">September 16-22, 2023</td>
                      </tr>
                      <tr>
                        <!-- Mid-Term Examinations in dark slate color -->
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Mid-Term Examinations</td>
                        <td class="border-t border-gray-400 py-1">Oct. 21 - Nov. 5, 2023<br/>Holiday (Nov. 1, 2023)</td>
                      </tr>
                      <tr>
                        <!-- Deadline For Submission Of Mid-Term Grades in dark slate color -->
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Deadline For Submission Of Mid-Term Grades</td>
                        <td class="border-t border-gray-400 py-1">November 19, 2023</td>
                      </tr>
                      <tr>
                        <!-- Final Examinations in dark slate color -->
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Final Examinations</td>
                        <td class="border-t border-gray-400 py-1">December 9-19, 2023</td>
                      </tr>
                      <tr>
                        <!-- Deadline For Submission Of Final Grades in dark slate color -->
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Deadline For Submission Of Final Grades</td>
                        <td class="border-t border-gray-400 py-1">January 2, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Holiday Break</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">Dec. 20, 2023 - Jan 2, 2024</td>
                      </tr>

                      <!-- Second Semester -->
                      <tr class="pt-6">
                        <td colspan="3"><hr class="border-t border-gray-400"><b class="text-slate-900">Second Semester</b><hr class="border-t border-gray-400"></td>
                      </tr>
                      <tr>
                        <!-- Enrollment category title in dark slate color -->
                        <td rowspan="6" class="border-t border-gray-400 py-1 font-bold text-slate-900">Enrollment</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">New Students & Transferees</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">December 4, 2023</td>
                      </tr>
                      <tr>
                        <td class="border-t border-gray-400 text-slate-700 py-1">Graduating (w/ remaining 27 units)</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">January 3-4, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t border-gray-400 text-slate-700 py-1">Fourth Year (w/ remaining 48 units and below)</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">January 5-6, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t border-gray-400 text-slate-700 py-1">Third Year</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">January 7-8, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t border-gray-400 text-slate-700 py-1">Second Year</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">January 9-10, 2024</td>
                      </tr>
                      <tr>
                        <td class="border-t border-gray-400 text-slate-700 py-1">First Year (Old Students)</td>
                        <td class="border-t border-gray-400 text-slate-700 py-1">January 11-12, 2024</td>
                      </tr>

                      <!-- Second Semester Events -->
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Faculty Meeting</td>
                        <td class="border-t border-gray-400 py-1">January 10, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 font-bold italic text-slate-900 py-1">Classes Start</td>
                        <td class="border-t border-gray-400 font-bold italic py-1">January 13, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Last Day For Late Enrollment</td>
                        <td class="border-t border-gray-400 py-1">January 26, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Last Day For Dropping (w/ retention)</td>
                        <td class="border-t border-gray-400 py-1">January 26, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Preliminary Examinations</td>
                        <td class="border-t border-gray-400 py-1">February 11-17, 2024<br/>Holiday (Feb. 10, 2024)</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Mid-Term Examinations</td>
                        <td class="border-t border-gray-400 py-1">March 16-26, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Deadline For Submission Of Mid-Term Grades</td>
                        <td class="border-t border-gray-400 py-1">April 8, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Final Examinations (Graduating)</td>
                        <td class="border-t border-gray-400 py-1">May 4-10, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Deadline For Submission Of Final Grades</td>
                        <td class="border-t border-gray-400 py-1">May 24, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Final Examinations (Non-Graduating)</td>
                        <td class="border-t border-gray-400 py-1">May 11-19, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Deadline For Submission Of Final Grades</td>
                        <td class="border-t border-gray-400 py-1">June 2, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t border-gray-400 text-slate-900 py-1">Graduation Day</td>
                        <td class="border-t border-gray-400 py-1">June 20, 2024</td>
                      </tr>

                      <!-- Summer -->
                      <tr class="pt-6">
                        <td colspan="3"><hr class="border-t border-gray-400"><b class="text-slate-900">Summer</b><hr class="border-t border-gray-400"></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-900 font-bold py-1">Enrollment</td>
                        <td class="border-t text-slate-700 py-1">May 25-26, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t font-bold italic text-slate-900 py-1">Classes Start</td>
                        <td class="border-t py-1 font-bold italic text-slate-700">May 27, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-900 py-1">Final Examinations</td>
                        <td class="border-t text-slate-700 py-1">July 4-6, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-900 py-1">Summer Classes End</td>
                        <td class="border-t text-slate-700 py-1">July 6, 2024</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="border-t text-slate-900 py-1">Deadline For Submission Of Final Grades</td>
                        <td class="border-t text-slate-700 py-1">July 20, 2024</td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- Link to original document -->
                  <div class="mt-6 text-center">
                    <v-alert
                      v-model="alert"
                      border="start"
                      color="deep-purple-accent-4"
                      variant="tonal"
                    >
                      <a href="pdfs/acadcal23-24.pdf" class="flex items-center justify-center text-purple-900 hover:text-purple-700">
                      <v-icon class="mr-2">mdi-download</v-icon>See the original copy of the document.
                    </a>
                    </v-alert>
                    
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Step 3 -->
            <div v-show="step === 3">
              <div class="bg-white border-none shadow-lg rounded-lg mb-6 relative p-6">
                <div class="text-slate-700 pl-2 sm:pl-4">
                  <!-- Header with strong emphasis -->
                  <p class="text-center text-lg font-semibold bg-purple-200 rounded-sm py-4">
                    Arellano University School Of Law<br>
                    <b class="tracking-widest">Holidays</b><br>
                     2023-2024
                  </p>
                    <table class="w-full text-left border-collapse">
                      <tbody>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Ninoy Aquino Day</td>
                            <td class="py-2 px-4 text-slate-700">August 21, 2024 (Wednesday)</td>
                        </tr>
                        <tr class="border-b"> 
                            <td class="py-2 px-4 text-slate-700">National Heroes Day</td>
                            <td class="py-2 px-4 text-slate-700">August 26, 2024 (Monday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">All Saints Day</td>
                            <td class="py-2 px-4 text-slate-700">November 1, 2024 (Friday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Bonifacio Day</td>
                            <td class="py-2 px-4 text-slate-700">November 30, 2024 (Saturday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Pasay Day</td>
                            <td class="py-2 px-4 text-slate-700">December 2, 2024 (Monday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Feast of Immaculate Conception</td>
                            <td class="py-2 px-4 text-slate-700">December 8, 2024 (Sunday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Christmas Day</td>
                            <td class="py-2 px-4 text-slate-700">December 25, 2024 (Wednesday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Rizal Day</td>
                            <td class="py-2 px-4 text-slate-700">December 30, 2024 (Monday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">New Year's Day</td>
                            <td class="py-2 px-4 text-slate-700">January 1, 2025 (Wednesday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Chinese New Year</td>
                            <td class="py-2 px-4 text-slate-700">January 29, 2025 (Wednesday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">EDSA Revolution Anniversary</td>
                            <td class="py-2 px-4 text-slate-700">February 25, 2025 (Tuesday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Araw ng Kagitingan</td>
                            <td class="py-2 px-4 text-slate-700">April 9, 2025 (Wednesday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Maundy Thursday</td>
                            <td class="py-2 px-4 text-slate-700">April 17, 2025 (Thursday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Good Friday</td>
                            <td class="py-2 px-4 text-slate-700">April 18, 2025 (Friday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Black Saturday</td>
                            <td class="py-2 px-4 text-slate-700">April 19, 2025 (Saturday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Easter Sunday</td>
                            <td class="py-2 px-4 text-slate-700">April 20, 2025 (Sunday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Labor Day</td>
                            <td class="py-2 px-4 text-slate-700">May 1, 2025 (Thursday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Eid'l Adha (Feast of the Sacrifice)</td>
                            <td class="py-2 px-4 text-slate-700">June 6, 2025 (Friday)</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4 text-slate-700">Independence Day</td>
                            <td class="py-2 px-4 text-slate-700">June 12, 2025 (Thursday)</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </section>

          <!-- asside -->
          <aside class="w-full md:w-1/4 sticky top-0 p-6">
            <div class="ml-4">
              <h2 class="mb-2 text-md leading-6 font-bold text-purple-900 capitalize leading-tight">Academic Calendar</h2>
              <hr class="mb-4 border-1 border-purple-800">
            </div>
            <ol class="relative ml-8 text-gray-500 border-s border-gray-200 dark:border-slate-600 dark:text-gray-400">
              <li 
                class="mb-6 ms-6 cursor-pointer transition-colors duration-300" 
                :class="step === 1 && 'text-slate-900'" 
                @click="setStep(1)">
                <span :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900', step === 1 ? 'bg-green-200 text-green-500 dark:bg-green-900 dark:text-green-400' : 'bg-gray-100 text-gray-500 dark:bg-slate-600 dark:text-gray-400']">
                  <v-icon>mdi-calendar</v-icon>
                </span>
                <h3 class="font-medium leading-tight">Academic Year</h3>
                <p class="text-sm">2024-2025</p>
              </li>
              <li 
                class="mb-6 ms-6 cursor-pointer transition-colors duration-300" 
                :class="step === 2 && 'text-slate-900'" 
                @click="setStep(2)">
                <span :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900', step === 2 ? 'bg-green-200 text-green-500 dark:bg-green-900 dark:text-green-400' : 'bg-gray-100 text-gray-500 dark:bg-slate-600 dark:text-gray-400']">
                  <v-icon>mdi-calendar</v-icon>
                </span>
                <h3 class="font-medium leading-tight">Academic Year</h3>
                <p class="text-sm">2023-2024</p>
              </li>
              <li 
                class="mb-6 ms-6 cursor-pointer transition-colors duration-300" 
                :class="step === 3 && 'text-slate-900'" 
                @click="setStep(3)">
                <span :class="['absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900', step === 3 ? 'bg-green-200 text-green-500 dark:bg-green-900 dark:text-green-400' : 'bg-gray-100 text-gray-500 dark:bg-slate-600 dark:text-gray-400']">
                  <v-icon>mdi-calendar</v-icon>
                </span>
                <h3 class="font-medium leading-tight">Holidays</h3>
                <p class="text-sm">2024-2025</p>
              </li>
            </ol>
            <div class="ml-4">
              <h2 class="mb-2 text-md leading-6 font-bold text-purple-900 capitalize leading-tight">Related Links</h2>
              <hr class="mb-4 border-1 border-purple-800">
              <ul class="list-inside list-disc">
                <li v-for="(item, index) in links" :key="index" class="mb-2 font-semibold">
                  <a :href="item.url" class="py-1 text-sm text-slate-600 hover:text-slate-900">{{ item.text }}</a>
                </li>
              </ul>
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

  const links = ref([
    { text: 'Online Enrollment Guide', url: '/enrollment' },
    { text: 'Student ID Application', url: '/idApplication' },
    { text: 'Medical Information Form', url: 'https://docs.google.com/forms/d/e/1FAIpQLScZXZAGt2BnVhXl35xgSxLnj8CLWlcL0FImY2jz90PzJofpPw/viewform' }, 
    { text: 'Downloadable Registrar Forms', url: '/office/registrar' }, 
    { text: 'Guideline/Payment Procedure', url: '/office/accounting' }
  ]);

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