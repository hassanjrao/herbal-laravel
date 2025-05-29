<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create([
            'name' => 'Herbal',
            'image_path' => 'categories/1.jpg',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        ]);

        \App\Models\Category::create([
            'name' => 'Homeopathic',
            'image_path' => 'categories/2.jpg',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        ]);

        \App\Models\Category::create([
            'name' => 'Vitamins',
            'image_path' => 'categories/1.jpg',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        ]);

        \App\Models\Category::create([
            'name' => 'Minerals',
            'image_path' => 'categories/2.jpg',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        ]);
    }
}
