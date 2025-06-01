<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            'id'=>1,
            'content' => 'We are a company dedicated to providing the best services to our customers. Our mission is to deliver quality and excellence in everything we do.',
        ]);
    }
}
