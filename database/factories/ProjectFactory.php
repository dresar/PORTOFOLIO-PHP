<?php

namespace Database\Factories;

use App\Models\Category; // Import Category
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(4); // Judul 4 kata
        return [
            'category_id' => Category::factory(), // Otomatis buat kategori baru atau gunakan yang sudah ada
            'title' => $title,
            'slug' => Str::slug($title) . '-' . uniqid(), // Tambah uniqid() untuk memastikan unik
            'description' => $this->faker->paragraph(5), // Deskripsi 5 paragraf
            'image_path' => null, // Atau gunakan $this->faker->imageUrl() tapi ini dari sumber luar
            'status' => $this->faker->randomElement(['published', 'draft']),
        ];
    }
}