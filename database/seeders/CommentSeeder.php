<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       foreach (range(1, 10) as $i) {
            \App\Models\Comment::create([
                'item_id' => 1, // Assuming you have 10 items
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'comment' => 'This is a comment from user ' . $i,
                'is_approved' => true, // Set to true for testing purposes
            ]);
        }

    }
}
