<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class CategoryFactory extends Factory
{
    public function definition(): array
    {
         $name = $this->faker->unique()->word; // Membuat satu kata unik sebagai nama kategori
        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
        ];
    }
}