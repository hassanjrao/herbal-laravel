<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<10; $i++) {
            \App\Models\Item::create([
                'name' => 'Item ' . ($i + 1),
                'image_path' => 'items/1.jpg',
                'description' => 'Description for item ' . ($i + 1),
                'category_id' => rand(1, 4), // Assuming you have 4 categories
            ]);
        }
    }
}
