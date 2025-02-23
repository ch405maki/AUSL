<template>
  <MainLayout>
    <Head title="Bar Review Program" />
    <Header>Bar Review Program</Header>
    <main class="flex-grow">
      <div class="max-w-7xl mx-auto px-4 py-4 lg:py-8">
        <div class="flex flex-col md:flex-row justify-between gap-8">
          <!-- Main content section -->
          <section class="w-full md:w-3/4 relative">
            <div class="ml-2">
              <h2 class="text-official-purple-600 font-bold mb-8 text-xl sm:text-2xl text-pretty text-start">
                Program
              </h2>
              <div class="mb-8 relative">
                <div class="flex justify-center gap-4">
                  <!-- First Image -->
                  <img
                    src="/images/academic/online_bar_review_program_2.jpg"
                    class="w-full md:w-1/3 object-cover cursor-pointer"
                    alt="Carousel Image 1"
                    @click="openLightbox(0)"
                  />
                  <!-- Second Image -->
                  <img
                    src="/images/academic/online_bar_review_program_1.jpg"
                    class="w-full md:w-1/3 object-cover cursor-pointer"
                    alt="Carousel Image 2"
                    @click="openLightbox(1)"
                  />
                  <!-- Third Image -->
                  <img
                    src="/images/academic/roster.png"
                    class="w-full md:w-1/3 object-cover cursor-pointer"
                    alt="Carousel Image 3"
                    @click="openLightbox(2)"
                  />
                </div>
              </div>

              <!-- 2025 ONLINE PREBAR REVIEW SCHEDULE -->
              <table class="w-full text-sm text-left text-gray-500 mb-8">
                  <tbody>
                    <tr>
                    <th scope="row" >
                      <details class="group">
                        <summary class="cursor-pointer list-none bg-official-purple-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto">
                          <svg viewBox="0 0 24 24" class="text-official-purple-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                            <path fill="currentColor"
                              d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm.25,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12.25,5ZM14.5,18.5h-4a1,1,0,0,1,0-2h.75a.25.25,0,0,0,.25-.25v-4.5a.25.25,0,0,0-.25-.25H10.5a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2v4.75a.25.25,0,0,0,.25.25h.75a1,1,0,1,1,0,2Z">
                            </path>
                          </svg>
                          <span class="text-official-purple-800">2025 ONLINE PREBAR REVIEW SCHEDULE</span>
                          <!-- Move this container to the end and apply ml-auto -->
                          <div class="ml-auto flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="block h-5 w-5 group-open:hidden">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden h-5 w-5 group-open:block">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                            </svg>
                          </div>
                        </summary>

                        <div class="pb-6 mt-8 text-gray-800 text-base font-normal leading-relaxed">
                          <div class="text-center mb-2 flex items-center justify-center">
                            <img src="/images/student/alflogo.png" alt="alf logo" class="w-20 h-24 mr-4">
                            <div>
                              <h1 class="text-xl font-bold garamond text-purple-950">ARELLANO LAW FOUNDATION</h1>
                              <h1 class="text-xl font-bold text-purple-950">BAR REVIEW PROGRAM</h1>
                            </div>
                            <img src="/images/contact/social/CLEAR.jpg" alt="clear logo" class="w-24 h-24 ml-4">
                          </div>
                          <div class="text-center mb-4">
                            <h1 class="text-xl font-bold">2025 ONLINE PREBAR REVIEW SCHEDULE</h1>
                            <h1 class="text-xl font-bold">(MARCH 01 - MAY 31)</h1>
                          </div>
                          <div class="grid grid-cols-[auto_auto_1fr_1fr] overflow-hidden">
                            <!-- Header Row -->
                            <div class="bg-blue-300 p-[4px] font-semibold text-center border border-gray-300">DATE</div>
                            <div class="bg-blue-300 p-[4px] font-semibold text-center border border-gray-300">DAY</div>
                            <div class="bg-blue-300 p-[4px] font-semibold text-center border border-gray-300">SUBJECTS</div>
                            <div class="bg-blue-300 p-[4px] font-semibold text-center border border-gray-300">LECTURER</div>

                            <!-- First Row -->
                            <div class="p-[4px] text-center border border-gray-300 whitespace-nowrap">March 1, 2025</div>
                            <div class="p-[4px] text-center border border-gray-300 whitespace-nowrap">Saturday</div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b">INTRODUCTION</div>
                              <div class="p-[4px] border-b">BAR TECHNIQUES AND METHODS</div>
                              <div class="p-[4px]">PSYCHOLOGICAL PREPARATION AND ENGLISH FOR LAWYERS</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">Dean Domingo M. Navarro</div>
                              <div class="p-[4px] border-b border-gray-300">Atty. Antony J. Pareño</div>
                              <div class="p-[4px]">Atty. Charles Aames M. Bautista</div>
                            </div>
                          </div>
                          <div class="grid grid-cols-1 border border-gray-300 overflow-hidden">
                            <!-- Header Row -->
                            <div class="bg-yellow-300 p-[4px] font-semibold text-center">REMEDIAL</div>
                          </div>
                          <div class="grid grid-cols-[auto_auto_1fr_1fr] overflow-hidden">
                            <!-- First Row -->
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">March 2, 2025</div>
                              <div class="p-[4px]">March 8, 2025</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white border-b border-gray-300">.</div>
                              <div class="p-[4px] ">March 9, 2025</div>
                              <div class="p-[4px] text-white border-b border-gray-300">.</div>
                              <div class="p-[4px] ">March 15, 2025</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">Sunday</div>
                              <div class="p-[4px] ">Saturday</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] border-t border-gray-300">Sunday</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] border-t border-gray-300">Saturday</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b">CIVIL PROCEDURE</div>
                              <div class="p-[4px] border-b">PROVISIONAL REMEDIES</div>
                              <div class="p-[4px] border-b">SPECIAL CIVIL ACTIONS</div>
                              <div class="p-[4px] border-b">SPECIAL PROCEEDINGS</div>
                              <div class="p-[4px] border-b">CRIMINAL PROCEDURE</div>
                              <div class="p-[4px] border-b">EVIDENCE</div>
                              <div class="p-[4px]">SPECIAL LECTURE IN REMEDIAL LAW</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px]">Atty. Henedino M. Brondial</div>
                              <div class="p-[4px] text-white border-b border-gray-300">.</div>
                              <div class="p-[4px] border-b border-gray-300">Justice Magdangal M. De Leon</div>
                              <div class="p-[4px] border-b border-gray-300">Justice Gener  M. Gito</div>
                              <div class="p-[4px] border-b border-gray-300">Judge Gayle Angeli M. Recto</div>
                              <div class="p-[4px] ">Judge Janice L. Andrade-Udarbe</div>
                            </div>
                          </div>
                          <div class="grid grid-cols-1 border border-gray-300 overflow-hidden">
                            <!-- Header Row -->
                            <div class="bg-yellow-300 p-[4px] font-semibold text-center">LEGAL & JUDICIAL ETHICS, AND PRACTICAL EXERCISES</div>
                          </div>
                          <div class="grid grid-cols-[auto_auto_1fr_1fr] overflow-hidden">
                            <!-- First Row -->
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">March 15, 2025</div>
                              <div class="p-[4px]">March 16, 2025</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">Saturday</div>
                              <div class="p-[4px] ">Sunday</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b">LEGAL & JUDICIAL ETHICS</div>
                              <div class="p-[4px] border-b">PRACTICAL EXERCISES</div>
                              <div class="p-[4px] border-b">SPECIAL LECTURE IN LEGAL ETHICS</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">Atty. Leah P. Laja</div>
                              <div class="p-[4px] border-b border-gray-300">Atty. Rickson M. Buenviaje</div>
                              <div class="p-[4px]">Justice Jose C. Reyes, Jr.</div>
                            </div>
                          </div>
                          <div class="grid grid-cols-1 border border-gray-300 overflow-hidden">
                            <!-- Header Row -->
                            <div class="bg-yellow-300 p-[4px] font-semibold text-center">CRIMINAL LAW</div>
                          </div>
                          <div class="grid grid-cols-[auto_auto_1fr_1fr] overflow-hidden">
                            <!-- First Row -->
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">March 22, 2025</div>
                              <div class="p-[4px] border-b border-gray-300">March 23, 2025</div>
                              <div class="p-[4px]">March 29, 2025</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">Saturday</div>
                              <div class="p-[4px] border-b border-gray-300">Sunday</div>
                              <div class="p-[4px] ">Saturday</div>
                              <div class="p-[4px] text-white">.</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b">CRIMINAL LAW BOOK I</div>
                              <div class="p-[4px] border-b">CRIMINAL LAW BOOK II</div>
                              <div class="p-[4px] border-b">SPECIAL PENAL LAWS</div>
                              <div class="p-[4px] border-b">SPECIAL LECTURE IN CRIMINAL LAW</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">Judge Marlo B. Campanilla</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] border-b border-gray-300">Atty. Modesto A. Ticman, Jr.</div>
                              <div class="p-[4px]">Dean Gemy Lito L. Festin</div>
                            </div>
                          </div>
                          <div class="grid grid-cols-1 border border-gray-300 overflow-hidden">
                            <!-- Header Row -->
                            <div class="bg-yellow-300 p-[4px] font-semibold text-center">CIVIL LAW</div>
                          </div>
                          <div class="grid grid-cols-[auto_auto_1fr_1fr] overflow-hidden">
                            <!-- First Row -->
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">March 30, 2025</div>
                              <div class="p-[4px]">April 5, 2025</div>
                              <div class="p-[4px] text-white border-b border-gray-300">.</div>
                              <div class="p-[4px]">April 6, 2025</div>
                              <div class="p-[4px] text-white border-b border-gray-300">.</div>
                              <div class="p-[4px]">April 19, 2025</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white">.</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">Sunday</div>
                              <div class="p-[4px]">Saturday</div>
                              <div class="p-[4px] text-white  border-b border-gray-300">.</div> 
                              <div class="p-[4px]">Sunday</div>
                              <div class="p-[4px] text-white  border-b border-gray-300">.</div> 
                              <div class="p-[4px] ">Saturday</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white">.</div> 
                              <div class="p-[4px] text-white">.</div> 
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b">PERSONS AND FAMILY RELATIONS</div>
                              <div class="p-[4px] border-b">PROPERTY</div>
                              <div class="p-[4px] border-b">LAND TITLES & DEEDS</div>
                              <div class="p-[4px] border-b">WILLS & SUCCESSION</div>
                              <div class="p-[4px] border-b">OBLIGATIONS AND CONTRACTS</div>
                              <div class="p-[4px] border-b">SPECIAL CONTRACTS</div>
                              <div class="p-[4px] border-b">TORTS & DAMAGES</div>
                              <div class="p-[4px] border-b">SPECIAL LECTURE IN CIVIL LAW I</div>
                              <div class="p-[4px] border-b">SPECIAL LECTURE IN CIVIL LAW II</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">Atty. Elmer T. Rabuya</div>
                              <div class="p-[4px] border-b border-gray-300">Dean Jord Jharoah B. Valenton</div>
                              <div class="p-[4px] border-b border-gray-300">Atty. Erwin L. Tiamson</div>
                              <div class="p-[4px] border-b border-gray-300">Dean Domingo M. Navarro</div>
                              <div class="p-[4px] border-b border-gray-300">Atty. Crisostomo A. Uribe</div>
                              <div class="p-[4px] border-b border-gray-300">Atty. Primo Antonio Ramos, III</div>
                              <div class="p-[4px] border-b border-gray-300">Atty. Nico B. Valderrama</div>
                              <div class="p-[4px] border-b border-gray-300">Dean Ma. Soledad Deriquito-Mawis</div>
                              <div class="p-[4px] border-b border-gray-300">Atty. Crisostomo A. Uribe</div>
                            </div>
                          </div>
                          <div class="grid grid-cols-1 border border-gray-300 overflow-hidden">
                            <!-- Header Row -->
                            <div class="bg-yellow-300 p-[4px] font-semibold text-center">LABOR LAW</div>
                          </div>
                          <div class="grid grid-cols-[auto_auto_1fr_1fr] overflow-hidden">
                            <!-- First Row -->
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">April 20, 2025</div>
                              <div class="p-[4px] border-b border-gray-300">April 26, 2025</div>
                              <div class="p-[4px]">April 27, 2025</div>
                              <div class="p-[4px] text-white">.</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">Sunday</div>
                              <div class="p-[4px] border-b border-gray-300">Saturday</div>
                              <div class="p-[4px] ">Saturday</div>
                              <div class="p-[4px] text-white">.</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b">LABOR STANDARDS</div>
                              <div class="p-[4px] border-b">LABOR RELATIONS & REMEDIES</div>
                              <div class="p-[4px] border-b">SOCIAL LEGISLATION</div>
                              <div class="p-[4px] border-b">SPECIAL LECTURE IN LABOR LAW</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">Dean Salvador A. Poquiz</div>
                              <div class="p-[4px] border-b border-gray-300">Dean Cecilio D. Duka</div>
                              <div class="p-[4px]">Atty. Kristy Jane M. Balino</div>
                              <div class="p-[4px] text-white">.</div>
                            </div>
                          </div>
                          <div class="grid grid-cols-1 border border-gray-300 overflow-hidden">
                            <!-- Header Row -->
                            <div class="bg-yellow-300 p-[4px] font-semibold text-center">COMMERCIAL LAW</div>
                          </div>
                          <div class="grid grid-cols-[auto_auto_1fr_1fr] overflow-hidden">
                            <!-- First Row -->
                            <div class="border border-gray-300">
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] ">May 3, 2025</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white border-b border-gray-300">.</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] ">May 4, 2025</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white border-b border-gray-300">.</div>
                              <div class="p-[4px]">May 10, 2025</div>
                              <div class="p-[4px] text-white">.</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px]">Saturday</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white border-b border-gray-300">.</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px]">Sunday</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white border-b border-gray-300">.</div>
                              <div class="p-[4px] ">Saturday</div>
                              <div class="p-[4px] text-white">.</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b">
                                CORPORATION LAW,<br> 
                                PARTNERSHIP,<br>
                                FOREIGN INVESTMENT ACT,<br> 
                                PUBLIC SERVICE ACT, <br>
                                SECURITIES REGULATION CODE, <br>
                                AND PHILIPPINE COMPETITION ACT,FRIA
                              </div>
                              <div class="p-[4px] border-b">
                                INTELLECTUAL PROPERTY, <br>
                                BANKING, <br>
                                E-COMMERCE, <br>
                                DATA PRIVACY AND ACCESS DEVICE REGISTRATION
                              </div>
                              <div class="p-[4px] border-b">INSURANCE LAW</div>
                              <div class="p-[4px] border-b">TRANSPORTATION LAW</div>
                              <div class="p-[4px] border-b">SPECIAL LECTURE ON COMMERCIAL LAW</div>
                              <div class="p-[4px]">SPECIAL LECTURE ON COMMERCIAL LAW </div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px]">Atty. Joanne L. Ranada</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white border-b border-gray-300">.</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] ">Atty. Mary Ann LL. Reyes</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white border-b border-gray-300">.</div>
                              <div class="p-[4px]">Dep. Comm. Erickson H. Balmes</div>
                              <div class="p-[4px] text-white border-b border-gray-300">.</div>
                              <div class="p-[4px] border-b border-gray-300">Dean Nilo T. Divina</div>
                              <div class="p-[4px]">Atty. Ma. Zarah Villanueva-Castro</div>
                            </div>
                          </div>
                          <div class="grid grid-cols-1 border border-gray-300 overflow-hidden">
                            <!-- Header Row -->
                            <div class="bg-yellow-300 p-[4px] font-semibold text-center">TAXATION LAW</div>
                          </div>
                          <div class="grid grid-cols-[auto_auto_1fr_1fr] overflow-hidden">
                            <!-- First Row -->
                            <div class="border border-gray-300">
                              <div class="p-[4px]">May 11, 2025</div>
                              <div class="p-[4px] border-b border-gray-300 text-white">.</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] ">May 17, 2025</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] ">Sunday</div>
                              <div class="p-[4px] border-b border-gray-300 text-white">.</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px]">Saturday</div>
                              
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b">GENERAL PRINCIPLES</div>
                              <div class="p-[4px] border-b">INCOME TAXATION</div>
                              <div class="p-[4px] border-b">VAT</div>
                              <div class="p-[4px] border-b">TAX REMEDIES</div>
                              <div class="p-[4px]">SPECIAL LECTURE ON TAXATION</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">Atty. Eufrocina M. Sacdalan-Casasola</div>
                              <div class="p-[4px] border-b border-gray-300">Dean Raquel R. Dujunco</div>
                              <div class="p-[4px] border-b border-gray-300">Atty. Agnes B. Santos</div>
                              <div class="p-[4px] mt-4">Atty. Roberto Belarmino M Lock</div>
                              <div class="p-[4px] text-white">.</div>
                            </div>
                          </div>
                          <div class="grid grid-cols-1 border border-gray-300 overflow-hidden">
                            <!-- Header Row -->
                            <div class="bg-yellow-300 p-[4px] font-semibold text-center">POLITICAL LAW</div>
                          </div>
                          <div class="grid grid-cols-[auto_auto_1fr_1fr] overflow-hidden">
                            <!-- First Row -->
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">May 18, 2025</div>
                              <div class="p-[4px]">May 24, 2025</div>
                              <div class="p-[4px] border-b border-gray-300 text-white">.</div>
                              <div class="p-[4px]">May 25, 2025</div>
                              <div class="p-[4px] border-b border-gray-300 text-white">.</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px]">May 31, 2025</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">Sunday</div>
                              <div class="p-[4px]">Saturday</div>
                              <div class="p-[4px] border-b border-gray-300 text-white">.</div>
                              <div class="p-[4px] ">Sunday</div>
                              <div class="p-[4px] text-white border-b border-gray-300">.</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] ">Sunday</div>
                              <div class="p-[4px] text-white">.</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b">POLITICAL LAW</div>
                              <div class="p-[4px] border-b">BILL OF RIGHTS</div>
                              <div class="p-[4px] border-b">PUBLIC INTERNATIONAL LAW</div>
                              <div class="p-[4px] border-b">ADMINSTRATIVE LAW</div>
                              <div class="p-[4px] border-b">ELECTION LAW</div>
                              <div class="p-[4px] border-b">LAW ON PUBLIC OFFICERS</div>
                              <div class="p-[4px] border-b">LOCAL GOVERNMENT & PUBLIC CORP.</div>
                              <div class="p-[4px] mt-">SPECIAL LECTURE IN POLITICAL LAW</div>
                            </div>
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b border-gray-300">TBA</div>
                              <div class="p-[4px] border-b border-gray-300">Dean Reynaldo G. Lopez</div>
                              <div class="p-[4px] border-b border-gray-300">Atty. Michael Vernon Guerrero </div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] ">Dean Reynaldo G. Lopez </div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white border-b border-gray-300">.</div>
                              <div class="p-[4px] border-b border-gray-300">Atty. Julius G. Matibag</div>
                              <div class="p-[4px] ">Atty. Vien Lawrence S. Gabato</div>
                            </div>
                          </div>
                          <div class="grid grid-cols-1 border border-gray-300 overflow-hidden">
                            <!-- Header Row -->
                            <div class="bg-lime-600 p-[4px] font-semibold text-center">MOCK BAR SCHEDULE</div>
                          </div>
                          <div class="grid grid-cols-[auto_1fr] overflow-hidden">
                            <!-- First Column (Smaller Width) -->
                            <div class="border border-gray-300 min-w-[120px] text-center">
                              <div class="p-[4px]">May 18, 2025</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] text-white">.</div>
                              <div class="p-[4px] border-b border-gray-300 text-white">.</div>
                              <div class="p-[4px]">May 24, 2025</div>
                            </div>

                            <!-- Second Column (Flexible Width) -->
                            <div class="border border-gray-300">
                              <div class="p-[4px] border-b">REMEDIAL LAW MOCK BAR</div>
                              <div class="p-[4px] border-b">CIVIL LAW MOCK BAR</div>
                              <div class="p-[4px] border-b">COMMERCIAL LAW & TAXATION LAW</div>
                              <div class="p-[4px] border-b">POLITICAL LAW MOCK BAR</div>
                              <div class="p-[4px]">Coaching Sessions</div>
                            </div>
                          </div>

                          <!-- End -->
                        </div>
                        <div>
                          <div class="bg-yellow-200 px-6 py-4 mb-4 mx-2 mt-6 rounded-md text-lg flex items-center mx-auto border">
                            <svg viewBox="0 0 24 24" class="text-yellow-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                              <path fill="currentColor"
                                d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm.25,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12.25,5ZM14.5,18.5h-4a1,1,0,0,1,0-2h.75a.25.25,0,0,0,.25-.25v-4.5a.25.25,0,0,0-.25-.25H10.5a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2v4.75a.25.25,0,0,0,.25.25h.75a1,1,0,1,1,0,2Z">
                              </path>
                            </svg>
                            <span class="text-yellow-900 text-sm">
                              Note: Pre-Week lecture will be uploaded starting 16 August 2025
                            </span>
                          </div>
                          <a 
                            class="hover:underline text-official-purple-600"
                            href="https://drive.google.com/file/d/1m4q4D8PTIjerdgVSCd73Al3-bB8OFVhr/view?usp=drive_link"
                            target="_blank"
                            >
                            <div class="bg-official-purple-200 px-6 py-4 mb-4 mx-2 mt-6 rounded-md text-lg flex items-center mx-auto border">
                              <svg class="w-6 h-6 text-official-purple-800 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
                              </svg>

                              <span class="text-official-purple-800 text-sm">
                                Download pdf: 2025 ONLINE PREBAR REVIEW SCHEDULE (MARCH 01 - MAY 31)
                              </span>
                            </div>
                          </a>
                            <h1 class="text-right text-official-purple-800 italic">Center for Legal Education and Research | 2</h1>
                          </div>
                      </details>
                    </th>
                  </tr>
                </tbody>
              </table>

              <div>
                <div class="mb-8">
                  <h1 class="text-official-purple-800 font-bold mb-2 text-xl sm:text-2xl text-pretty">How to Register and Enroll in Course on <span class="underline italic">clear.arellanolaw.org </span> Without an account</h1>
                  <p>
                    <blockquote>
                      <ol class="list-decimal text-lg font-normal text-gray-700  pl-6 ">
                        <li>Go to <a href="https://clear.arellanolaw.org" class="text-blue-500 underline">https://clear.arellanolaw.org</a></li>
                        <li>Click "Register"</li>
                        <li>Fill in all the details, then click submit.</li>
                        <li>You will receive an email confirming your registration.</li>
                        <li>Click "Click Here", You will be directed to the <a href="https://clear.arellanolaw.org" class="text-blue-500 underline">https://clear.arellanolaw.org</a></li>
                        <li>Click "My Account" then enter your username and password.</li>
                        <li>Click "Orders"</li>  
                        <li>Click "browser products"</li>
                        <li>
                          Click
                          <div class="flex flex-row sm:flex-row items-center justify-between my-6 ">
                            <a href="https://clear.arellanolaw.org/product/pre-bar-review-2025/" title="Click Here">
                              <img src="/images/academic/online_bar_review_2025.jpg" class="carousel-image object-fit sm:w-[88%] transform transition-transform duration-300 hover:scale-105" alt="Carousel Image" />
                            </a>
                          </div>
                        </li>
                        <li>Click "add to Cart"</li>
                        <li>Choose coupon code then click "Apply coupon".<br>(Note: Apply the coupon code, if any, you received in your email address)</li>
                        <li>Review your order then click "Proceed to checkout"</li>
                        <li>Fill in all the Billing details. Below the Billing details, at the bottom part of the page, you can see the mode and instructions for payment.<br>(Note: Please make sure to take a screenshot of the instructions for bank transfer, for your reference).</li>
                        <li>Click "place order"</li>
                        <li>Wait for the verification of your payment from the accounting department. Once verified, you are now officially enrolled.</li>
                      </ol>
                    </blockquote>
                  </p>
                </div>
                <div class="mb-8">
                  <h1 class="text-official-purple-800 font-bold mb-2 text-xl sm:text-2xl text-pretty">How to attend on my Enrolled Courses</h1>
                  <div class="pb-4 mt-2 text-secondary-500 text-lg font-normal text-gray-800">
                    <p>
                      1. Go to clear.arellanolaw.org Click on Login to LMS button Or go to <i class="underline text-official-purple-800"><a href="https://ichief.arellanolaw.org">https://ichief.arellanolaw.org</a></i>
                      <br>2. Log your username or email address and password
                      <br>3. Select MyCourse / Enrolled Courses.
                    </p>
                  </div>
                </div>
              </div>
              <table class="w-full text-sm text-left text-gray-500">
                  <tbody>
                    <tr>
                    <th scope="row" >
                      <details class="group">
                        <summary class="cursor-pointer list-none bg-official-purple-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto">
                          <svg viewBox="0 0 24 24" class="text-official-purple-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                            <path fill="currentColor"
                              d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm.25,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12.25,5ZM14.5,18.5h-4a1,1,0,0,1,0-2h.75a.25.25,0,0,0,.25-.25v-4.5a.25.25,0,0,0-.25-.25H10.5a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2v4.75a.25.25,0,0,0,.25.25h.75a1,1,0,1,1,0,2Z">
                            </path>
                          </svg>
                          <span class="text-official-purple-800">AUSL Privacy Policy</span>
                          <!-- Move this container to the end and apply ml-auto -->
                          <div class="ml-auto flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="block h-5 w-5 group-open:hidden">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden h-5 w-5 group-open:block">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                            </svg>
                          </div>
                        </summary>

                        <div class="pb-6 mt-8 space-y-4 text-gray-800 text-base font-normal leading-relaxed">
                          <p class="text-center font-bold text-lg">PRIVACY POLICY</p>
                          <hr class="border-t-2 border-official-purple-800">
                          <p class="text-center font-bold text-lg">ARELLANO LAW FOUNDATION PRIVACY POLICY FOR<br>BAR REVIEW PROGRAM and PROJECT PHOENIX</p>
                          <p>Please read these provisions on Arellano Law Foundation's Privacy Policy for the Online Bar Review Program and Project Phoenix.</p>
                          <p>To process your application and provide quality education, the Arellano Law Foundation needs to process personal and sensitive information. Arellano Law Foundation (ALF) is committed to protecting privacy. This policy explains the general terms and purpose of processing personal and sensitive personal information ALF collects from enrollees like you, the measures we take to protect your data, and the rights you may exercise in relation to the aforementioned acts.</p>
                          <p>The Data Privacy Act of 2012 provides that personal information may be processed with the data subject's consent; for the fulfillment of a contract, when it is necessary for compliance with a legal obligation of the ALF; to protect your vitally important interests, including life and health, in order to respond to a national emergency, public order and safety, or for the legitimate interest of the ALF, University, or a third party, except where such interests are overridden by your fundamental rights and freedoms.</p>
                          <p>Sensitive personal information may be processed for reasons such as the data subject's consent, for compliance with laws, protection of life and health, or legal proceedings. Processing for lawful and noncommercial objectives is also allowed under specific conditions.</p>
                          <p>The term "Arellano / ALF" refers to the Arellano University and Arellano Law Foundation.</p>
                          <p class="font-bold">Personal Information Collected and Purpose</p>
                          <p>The ALF may collect personal information through various means, including paper forms, online systems, or recorded images via CCTV or online sessions. This information is used to verify your eligibility for programs and protect the school’s legitimate interest as an educational institution.</p>
                          <p>By submitting information about third parties, you warrant that you have obtained their consent for processing.</p>
                          <p class="font-bold">Disclosure of Information</p>
                          <p>Your personal data is stored securely within the School's authorized systems and will only be accessed by authorized personnel. Data will only be shared with third parties in the following cases:</p>
                          <ul class="list-disc list-inside pl-4 space-y-2">
                            <li>As required by law;</li>
                            <li>As necessary to protect the interests of Arellano Law Foundation;</li>
                            <li>With accredited service providers operating the learning system under confidentiality agreements.</li>
                          </ul>
                          <p>Reasonable steps will be taken to ensure third parties protect your data privacy.</p>
                          <p class="font-bold">Rights of the Data Subject</p>
                          <p>You have the right to access your personal information, and ALF may require valid identification before disclosure. No third-party access will be granted without a special power of attorney.</p>
                          <p class="font-bold">Changes to Statement</p>
                          <p>Any future changes to this privacy policy will be posted here. Please check regularly for updates.</p>
                          <p>CONTACT US<br>The Data Protection Officer<br>Arellano University School of Law<br>Taft Avenue corner Menlo Street, Pasay City<br>(02) 8404-3089 local 15</p>
                          <p>dpo@arellanolaw.edu</p>
                        </div>
                      </details>
                    </th>
                  </tr>
                  </tbody>
                  </table>
            </div>
          </section>

          <aside class="w-full md:w-1/4 sticky top-0">
            <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
              <div class="ml-4">
                <h2 class="mb-4 text-lg leading-6 font-medium text-official-purple-900 capitalize">
                  On this page
                </h2>
                <hr class="mb-4 border-1 border-official-purple-800" />
                <h3 class="text-lg font-normal text-gray-800 mb-8">Bar Review Program</h3>
              </div>
              <div class="ml-4">
                <h2 class="text-official-purple-900 text-lg font-medium mb-4">Related Links</h2>
                <hr class="mb-4 border-1 border-official-purple-800" />
                <ul class="list-inside list-disc">
                  <RelatedLinks />
                </ul>
              </div>
            </div>
          </aside>
        </div>
      </div>

      <!-- Lightbox Component -->
      <VueEasyLightbox
        :visible="lightboxVisible"
        :imgs="images"
        :index="lightboxIndex"
        @hide="lightboxVisible = false"
      />
    </main>
  </MainLayout>
</template>

<script setup>
  import { ref } from "vue";
  import { reactive, onMounted, onBeforeUnmount } from "vue";
  import { Head } from "@inertiajs/vue3";
  import MainLayout from "@/Layouts/MainLayout.vue";
  import RelatedLinks from "../Components/RelatedLinks.vue";
  import Header from "../../Components/Header.vue";
  import VueEasyLightbox from "vue-easy-lightbox";

  // Lightbox state
  const lightboxVisible = ref(false);
  const lightboxIndex = ref(0);

  // Images array for the lightbox
  const images = [
    "/images/academic/online_bar_review_program_2.jpg",
    "/images/academic/online_bar_review_program_1.jpg",
    "/images/academic/roster.png",
  ];

  // Open lightbox function
  const openLightbox = (index) => {
    lightboxIndex.value = index;
    lightboxVisible.value = true;
  };

  // Responsive state for other functionalities
  const isMobile = reactive({ value: window.innerWidth <= 768 });

  const checkIfMobile = () => {
    isMobile.value = window.innerWidth <= 768;
  };

  onMounted(() => {
    window.addEventListener("resize", checkIfMobile);
  });

  onBeforeUnmount(() => {
    window.removeEventListener("resize", checkIfMobile);
  });
</script>
  
  <style scoped>

@import url('https://db.onlinewebfonts.com/c/2bf40ab72ea4897a3fd9b6e48b233a19?family=Garamond');

.garamond {
  font-family: 'Garamond', serif;
}

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