<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category; // Import model
use App\Models\Project;
use App\Models\Certificate;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Admin User (jika belum ada)
         User::factory()->create([
             'name' => 'Admin User',
             'email' => 'admin@example.com', // Sesuaikan
              'password' => bcrypt('password'), // Sesuaikan
         ]);

         // Buat beberapa Kategori
        $categories = Category::factory(5)->create(); // Buat 5 kategori

        // Buat beberapa Project, kaitkan dengan kategori yang ada
        Project::factory(15)->recycle($categories)->create(); // Buat 15 project menggunakan 5 kategori tadi

         // Buat beberapa Sertifikat (pastikan file placeholder ada jika Anda menentukannya)
         // Jika tidak punya file, mungkin lewati seeder ini atau atur path ke null/kosong
         // Certificate::factory(3)->create();


        // Anda bisa menambahkan seeder lain di sini
        // $this->call([
        //     OtherSeeder::class,
        // ]);
    }
}