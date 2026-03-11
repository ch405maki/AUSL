<template>
    <h1 class="text-official-purple-900 font-bold my-8 text-xl sm:text-2xl text-pretty">
        Regular Program (2026-2027)
    </h1>
    <div>
    <!-- First Semester -->
    <div class="mb-12 bg-white overflow-hidden">
    <div class="bg-purple-100 px-6 py-3">
    <h3 class="text-sm sm:text-lg font-bold text-gray-800">ENROLLMENT (FIRST SEMESTER)</h3>
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
    <h3 class="text-sm sm:text-lg font-bold text-gray-800">ENROLLMENT (SECOND SEMESTER)</h3>
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
    <h3 class="text-sm sm:text-lg font-bold text-gray-800">SUMMER</h3>
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
    <h3 class="text-sm sm:text-lg font-bold text-gray-800">PHILIPPINE PUBLIC HOLIDAYS</h3>
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
  { activity: "Freshmen and Refresher", date: "May 15, 2026" },
  { activity: "Graduating Students (w/ remaining 27 units)", date: "June 23-25, 2026" },
  { activity: "Fourth Year (w/ remaining 48 units)", date: "June 25-27, 2026" },
  { activity: "Third Year", date: "June 27-29, 2026" },
  { activity: "Second Year", date: "June 29 - July 1, 2026" },
  { activity: "First Year (Old)", date: "July 1-3, 2026" },
  { activity: "FACULTY MEETING", date: "July 2, 2026", bold: true },
  { activity: "ORIENTATION FOR NEW STUDENTS", date: "July 3, 2026", bold: true },
  { activity: "CLASSES START", date: "July 4, 2026", bold: true },
  { activity: "LAST DAY FOR LATE ENROLLMENT", date: "July 17, 2026" },
  { activity: "LAST DAY FOR DROPPING (w/ retention)", date: "July 17, 2026" },
  { activity: "PRELIMINARY EXAMINATIONS (4 weeks)", date: "July 25-31, 2026" },
  { activity: "MID-TERM EXAMINATIONS (10 weeks)", date: "September 5-13, 2026" },
  { activity: "DEADLINE FOR SUBMISSION OF MID-TERM GRADES", date: "September 27, 2026" },
  { activity: "FINAL EXAMINATION (18 weeks)", date: "October 24 - Nov. 8, 2026", note: "Nov. 1 - All Saints Day"},
  { activity: "DEADLINE FOR SUBMISSION OF FINAL GRADES", date: "November 22, 2026" },
  { activity: "SEMESTRAL BREAK", date: "Nov. 9 - Dec 4, 2026" }
];

const secondSemester = [
  { activity: "New students and Refresher", date: "November 3, 2026" },
  { activity: "Graduating Students (w/ remaining 27 units)", date: "November 24-26, 2026" },
  { activity: "Fourth Year (w/ remaining 48 units and below)", date: "November 26-28, 2026" },
  { activity: "Third Year", date: "November 28-30, 2026", note: "Nov. 30 - Bonifacio Day" },
  { activity: "Second Year", date: "November 30 - Dec. 2, 2026", note: "Dec 2 - Pasay Day"},
  { activity: "First Year (old students)", date: "December 2-4, 2026", note: "Dec 2 - Pasay Day" },
  { activity: "FACULTY MEETING", date: "December 3, 2026", bold: true },
  { activity: "ORIENTATION FOR NEW STUDENTS", date: "December 4, 2026", bold: true },
  { activity: "CLASSES START", date: "December 5, 2026", bold: true },
  { activity: "HOLIDAY BREAK", date: "December 20, 2026 - January 3, 2027" },
  { activity: "CLASSES RESUME", date: "January 4, 2027" },
  { activity: "LAST DAY FOR LATE ENROLLMENT", date: "December 18, 2026" },
  { activity: "LAST DAY FOR DROPPING (w/ retention)", date: "December 18, 2026" },
  { activity: "PRELIMINARY EXAMINATIONS (4 weeks)", date: "January 4-10, 2027" },
  { activity: "MID-TERM EXAMINATIONS (10 weeks)", date: "February 13-21, 2027" },
  { activity: "DEADLINE FOR SUBMISSION OF MID-TERM GRADES", date: "March 8, 2027" },
  { activity: "GRADUATING RECOLLECTION/SEMINAR", date: "February 27-28, 2027" },
  { activity: "FINAL EXAMINATIONS (Graduating)", date: "April 3-11, 2027", note: "April 9 - Day of Valor" },
  { activity: "DEADLINE FOR SUBMISSION OF FINAL GRADES", date: "April 26, 2027" },
  { activity: "FINAL EXAMINATIONS (Non-Graduating) (18 weeks)", date: "April 10-18, 2027" },
  { activity: "DEADLINE FOR SUBMISSION OF FINAL GRADES", date: "May 2, 2027" },
  { activity: "DELIBERATION", date: "May 7, 2027" },
  { activity: "GRADUATION DAY", date: "May 13, 2027" }
];

const summer = [
  { activity: "ENROLLMENT", date: "April 23-25, 2027" },
  { activity: "LAST DAY FOR SUMMER ENROLLMENT", date: "April 25, 2027" },
  { activity: "CLASSES START", date: "April 26, 2027", bold: true },
  { activity: "FINAL EXAMINATIONS (6 weeks)", date: "June 3-5, 2027" },
  { activity: "SUMMER CLASSES END", date: "June 5, 2027" },
  { activity: "DEADLINE FOR SUBMISSION OF FINAL GRADES", date: "June 19, 2027" }
];

const holidays = [
  { holiday: "NINOY AQUINO DAY", date: "August 21, 2026 (Friday)" },
  { holiday: "NATIONAL HEROES DAY", date: "August 31, 2026 (Monday)" },
  { holiday: "ALL SAINTS' DAY", date: "November 1, 2025 (Saturday)" },
  { holiday: "BONIFACIO DAY", date: "November 30, 2025 (Sunday)" },
  { holiday: "PASAY DAY", date: "December 2, 2026 (Wednesday)" },
  { holiday: "FEAST OF IMMACULATE CONCEPCION", date: "December 8, 2026 (Tuesday)" },
  { holiday: "CHRISTMAS DAY", date: "December 25, 2026 (Friday)" },
  { holiday: "RIZAL DAY", date: "December 30, 2026 (Wednesday)" },
  { holiday: "NEW YEAR'S DAY", date: "January 1, 2027 (Friday)" },
  { holiday: "CHINESE NEW YEAR", date: "February 6, 2027 (Saturday)" },
  { holiday: "EDSA REVOLUTION ANNIVERSARY", date: "February 25, 2027 (Thursday)" },
  { holiday: "EID AL-FITR (End of Ramadan)", date: "March 9, 2027 (Tuesday)" },
  { holiday: "MAUNDY THURSDAY", date: "March 25, 2027 (Thursday)" },
  { holiday: "GOOD FRIDAY", date: "March 26, 2027 (Friday)" },
  { holiday: "BLACK SATURDAY", date: "March 27, 2027(Saturday)" },
  { holiday: "EASTER SUNDAY", date: "March 28, 2027 (Sunday)" },
  { holiday: "DAY OF VALOR", date: "April 9, 2027 (Friday)" },
  { holiday: "LABOR DAY", date: "May 1, 2027 (Saturday)" },
  { holiday: "EID AL-ADHA (Feast of the Sacrifice)", date: "May 16, 2027 (Sunday)" },
  { holiday: "INDEPENDENCE DAY", date: "June 12, 2027 (Saturday)" }
];
</script>

<style scoped>
/* Add any custom styles here if needed */
</style>  