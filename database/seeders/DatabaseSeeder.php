<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories = ['entertainment', 'finance', 'sport', 'tech', 'beauty'];

        foreach ($categories as $category) {
            Blog::factory()->withCategory($category)->count(random_int(10, 25))->create();
        }
    }
}
