<template>
      <h1 class="text-official-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty">
      Regular Program (2025-2026)
    </h1>
  <div>
    <!-- First Semester -->
    <div class="mb-12 bg-white overflow-hidden">
      <div class="bg-purple-100 px-6 py-3">
        <h3 class="text-lg font-bold text-gray-800">ENROLLMENT (FIRST SEMESTER)</h3>
      </div>
      <div class="divide-y divide-gray-200">
        <div v-for="(item, index) in firstSemester" :key="index" class="px-6 py-3 hover:bg-gray-50">
          <div class="grid grid-cols-2 gap-4 text-sm sm:text-lg">
            <div :class="{'font-bold': item.bold}" class="text-gray-800">{{ item.activity }}</div>
            <div class="text-gray-600">{{ item.date }}</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Second Semester -->
    <div class="mb-12 bg-white overflow-hidden">
      <div class="bg-purple-100 px-6 py-3">
        <h3 class="text-lg font-bold text-gray-800">ENROLLMENT (SECOND SEMESTER)</h3>
      </div>
      <div class="divide-y divide-gray-200">
        <div v-for="(item, index) in secondSemester" :key="index" class="px-6 py-3 hover:bg-gray-50">
          <div class="grid grid-cols-2 gap-4 flex items-center text-sm sm:text-lg">
            <div :class="{'font-bold': item.bold}" class="text-gray-800">{{ item.activity }}</div>
            <div class="text-gray-600">{{ item.date }}
              <div v-if="item.note" class="text-sm text-blue-600 mt-1">{{ item.note }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Summer -->
    <div class="mb-12 bg-white overflow-hidden">
      <div class="bg-purple-100 px-6 py-3">
        <h3 class="text-lg font-bold text-gray-800">SUMMER</h3>
      </div>
      <div class="divide-y divide-gray-200">
        <div v-for="(item, index) in summer" :key="index" class="px-6 py-3 hover:bg-gray-50">
          <div class="grid grid-cols-2 gap-4 flex items-center text-sm sm:text-lg">
            <div :class="{'font-bold': item.bold}" class="text-gray-800">{{ item.activity }}</div>
            <div class="text-gray-600">{{ item.date }}</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Holidays -->
    <div class="bg-white overflow-hidden">
      <div class="bg-yellow-100 px-6 py-3">
        <h3 class="text-lg font-bold text-gray-800">PHILIPPINE PUBLIC HOLIDAYS</h3>
      </div>
      <div class="divide-y divide-gray-200">
        <div v-for="(item, index) in holidays" :key="index" class="px-6 py-3 hover:bg-gray-50">
          <div class="grid grid-cols-2 gap-4 flex items-center text-sm sm:text-lg">
            <div class="text-gray-800">{{ item.holiday }}</div>
            <div class="text-gray-600">{{ item.date }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const firstSemester = [
  { activity: "Freshmen and Refresher", date: "June 15, 2025" },
  { activity: "Graduating Students (w/ remaining 27 units)", date: "July 1-3, 2025" },
  { activity: "Fourth Year (w/ remaining 48 units)", date: "July 3-5, 2025" },
  { activity: "Third Year", date: "July 5-7, 2025" },
  { activity: "Second Year", date: "July 7-9, 2025" },
  { activity: "First Year (Old)", date: "July 9-11, 2025" },
  { activity: "FACULTY MEETING", date: "July 08, 2025", bold: true },
  { activity: "ORIENTATION FOR NEW STUDENTS", date: "July 09, 2025", bold: true },
  { activity: "CLASSES START", date: "July 12, 2025", bold: true },
  { activity: "LAST DAY FOR LATE ENROLLMENT", date: "July 25, 2025" },
  { activity: "LAST DAY FOR DROPPING (w/ retention)", date: "July 25, 2025" },
  { activity: "PRELIMINARY EXAMINATIONS (4 weeks)", date: "August 09-15, 2025" },
  { activity: "MID-TERM EXAMINATIONS (10 weeks)", date: "September 20-28, 2025" },
  { activity: "DEADLINE FOR SUBMISSION OF MID-TERM GRADES", date: "October 12, 2025" },
  { activity: "FINAL EXAMINATION (18 weeks)", date: "November 08-16, 2025" },
  { activity: "DEADLINE FOR SUBMISSION OF FINAL GRADES", date: "November 30, 2025" },
  { activity: "SEMESTRAL BREAK", date: "Nov. 17 - Dec. 12, 2025" }
];

const secondSemester = [
  { activity: "New students and Refresher", date: "December 1, 2025" },
  { activity: "Graduating Students (w/ remaining 27 units)", date: "December 3-5, 2025" },
  { activity: "Fourth Year (w/ remaining 48 units and below)", date: "December 5-7, 2025" },
  { activity: "Third Year", date: "December 7-9, 2025", note: "December 8 - Holiday" },
  { activity: "Second Year", date: "December 9-11, 2025" },
  { activity: "First Year (old students)", date: "December 11-12, 2025" },
  { activity: "FACULTY MEETING", date: "December 10, 2025", bold: true },
  { activity: "ORIENTATION FOR NEW STUDENTS", date: "December 12, 2025", bold: true },
  { activity: "CLASSES START", date: "December 13, 2025", bold: true, note: "Online Classes Dec. 13 - 20" },
  { activity: "HOLIDAY BREAK", date: "Dec. 21, 2025 - Jan 2, 2026" },
  { activity: "CLASSES RESUME", date: "January 3, 2026" },
  { activity: "LAST DAY FOR LATE ENROLLMENT", date: "January 9, 2026" },
  { activity: "LAST DAY FOR DROPPING (w/ retention)", date: "January 9, 2026" },
  { activity: "PRELIMINARY EXAMINATIONS (4 weeks)", date: "January 24-30, 2026" },
  { activity: "MID-TERM EXAMINATIONS (10 weeks)", date: "March 7-15, 2026" },
  { activity: "DEADLINE FOR SUBMISSION OF MID-TERM GRADES", date: "March 29, 2026" },
  { activity: "GRADUATING RECOLLECTION/SEMINAR", date: "March 21-22, 2026" },
  { activity: "FINAL EXAMINATIONS (Graduating)", date: "April 18-26, 2026" },
  { activity: "DEADLINE FOR SUBMISSION OF FINAL GRADES", date: "May 10, 2026" },
  { activity: "FINAL EXAMINATIONS (Non-Graduating) (18 weeks)", date: "April 26 - May 3, 2026", note: "May 1 - Holiday" },
  { activity: "DEADLINE FOR SUBMISSION OF FINAL GRADES", date: "May 17, 2026" },
  { activity: "DELIBERATION", date: "May 22, 2026" },
  { activity: "GRADUATION DAY", date: "May 28, 2026" }
];

const summer = [
  { activity: "ENROLLMENT", date: "May 8-10, 2026" },
  { activity: "LAST DAY FOR SUMMER ENROLLMENT", date: "May 10, 2026" },
  { activity: "CLASSES START", date: "May 11, 2026", bold: true },
  { activity: "FINAL EXAMINATIONS (6 weeks)", date: "June 25-27, 2026" },
  { activity: "SUMMER CLASSES END", date: "June 27, 2026" },
  { activity: "DEADLINE FOR SUBMISSION OF FINAL GRADES", date: "July 11, 2026" }
];

const holidays = [
  { holiday: "NINOY AQUINO DAY", date: "August 21, 2025 (Thursday)" },
  { holiday: "NATIONAL HEROES DAY", date: "August 25, 2025 (Monday)" },
  { holiday: "All Saints Day Eve", date: "October 31, 2025 (Friday)" },
  { holiday: "ALL SAINTS' DAY", date: "November 1, 2025 (Saturday)" },
  { holiday: "BONIFACIO DAY", date: "November 30, 2025 (Sunday)" },
  { holiday: "PASAY DAY", date: "December 2, 2025 (Tuesday)" },
  { holiday: "FEAST OF IMMACULATE CONCEPCION", date: "December 8, 2025 (Monday)" },
  { holiday: "CHRISTMAS DAY", date: "December 25, 2025 (Thursday)" },
  { holiday: "RIZAL DAY", date: "December 30, 2025 (Tuesday)" },
  { holiday: "NEW YEAR'S DAY", date: "January 1, 2026 (Thursday)" },
  { holiday: "CHINESE NEW YEAR", date: "February 17, 2026 (Tuesday)" },
  { holiday: "EDSA REVOLUTION ANNIVERSARY", date: "February 25, 2026 (Wednesday)" },
  { holiday: "EID AL-FITR (End of Ramadan)", date: "March 20, 2026 (Friday)" },
  { holiday: "MAUNDY THURSDAY", date: "April 02, 2026 (Thursday)" },
  { holiday: "GOOD FRIDAY", date: "April 03, 2026 (Friday)" },
  { holiday: "BLACK SATURDAY", date: "April 04, 2026 (Saturday)" },
  { holiday: "EASTER SUNDAY", date: "April 05, 2026 (Sunday)" },
  { holiday: "DAY OF VALOR", date: "April 9, 2026 (Thursday)" },
  { holiday: "LABOR DAY", date: "May 1, 2026 (Friday)" },
  { holiday: "EID AL-ADHA (Feast of the Sacrifice)", date: "May 27, 2026 (Wednesday)" },
  { holiday: "INDEPENDENCE DAY", date: "June 12, 2026 (Friday)" }
];
</script>

<style scoped>
/* Add any custom styles here if needed */
</style>  