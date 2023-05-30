<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $authorId = Author::pluck('id')->random();
        $userId = User::pluck('id')->random();

        return [
            'isbn' => $this->faker->isbn13,
            'title' => $this->faker->sentence,
            'author_id' => $authorId,
            'user_id' => $userId,
            'image_path' => $this->faker->imageUrl(),
            'publisher' => $this->faker->company,
            'category' => $this->faker->word,
            'pages' => $this->faker->numberBetween(50, 1000),
            'language' => $this->faker->languageCode,
            'publish_date' => $this->faker->date(),
            'subjects' => $this->faker->word,
            'description' => $this->faker->paragraph,
        ];
    }
}
