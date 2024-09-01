<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'Welcome to Arellano University School of Law',
                'content' => 'Arellano University School of Law (AUSL) is one of the premier law schools in the Philippines. Established in 1938, AUSL has a long-standing tradition of excellence in legal education. The school is named after Cayetano Arellano, the first Chief Justice of the Supreme Court of the Philippines. AUSL is known for its rigorous academic programs, distinguished faculty, and a strong commitment to producing competent and ethical lawyers. The school offers a comprehensive curriculum that covers various areas of law, including constitutional law, civil law, criminal law, and international law. AUSL also provides students with practical training through its legal clinics and internship programs, ensuring that graduates are well-prepared for the challenges of legal practice.',
                'image' => 'https://via.placeholder.com/150',
                'category' => 'News',
                'state' => null,
                'link' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'AUSL’s Commitment to Excellence',
                'content' => 'At Arellano University School of Law, excellence is not just a goal but a tradition. The school is dedicated to providing a high-quality legal education that equips students with the knowledge, skills, and values necessary to excel in the legal profession. AUSL’s faculty members are experienced practitioners and scholars who bring a wealth of knowledge and expertise to the classroom. They are committed to mentoring students and fostering a learning environment that encourages critical thinking, ethical practice, and a deep understanding of the law. AUSL’s state-of-the-art facilities, extensive legal resources, and vibrant academic community provide students with the tools and support they need to succeed.',
                'image' => 'https://via.placeholder.com/150',
                'category' => 'Announcement',
                'state' => 'Active',
                'link' => 'https://ausl.edu.ph/commitment-to-excellence',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Join the AUSL Community',
                'content' => 'Arellano University School of Law invites aspiring lawyers to join its dynamic and diverse community. AUSL offers a range of programs and opportunities for students to engage in meaningful legal work, develop their professional skills, and make a positive impact on society. The school’s student organizations, moot court competitions, and community outreach programs provide students with valuable experiences and the chance to build lasting connections. AUSL’s alumni network is a testament to the school’s legacy of excellence, with graduates holding prominent positions in the judiciary, government, private practice, and academia. By choosing AUSL, students become part of a proud tradition of legal education and a community dedicated to justice, service, and leadership.',
                'image' => 'https://via.placeholder.com/150',
                'category' => 'News',
                'state' => 'Active',
                'link' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'AUSL Celebrates 80 Years of Legal Education',
                'content' => 'This year, Arellano University School of Law celebrates 80 years of excellence in legal education. Since its establishment in 1938, AUSL has been committed to nurturing the next generation of legal professionals. The school has produced numerous successful lawyers who have made significant contributions to the legal field and society. To mark this milestone, AUSL will be hosting a series of events, including seminars, alumni reunions, and community service activities. The celebration aims to honor the school’s rich history, recognize the achievements of its alumni, and inspire current and future students to uphold the values of justice, integrity, and service.',
                'image' => 'https://via.placeholder.com/150',
                'category' => 'Announcement',
                'state' => 'Active',
                'link' => 'https://ausl.edu.ph/80-years-celebration',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}