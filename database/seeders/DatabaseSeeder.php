<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Generate authors
        Author::factory(10)->create();

        // Generate books for each author
        Author::all()->each(function ($author) {
            $author->books()->saveMany(Book::factory(5)->make());
        });

        // Generate users
        User::factory(10)->create();

        // Generate a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
    }
}
