<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => Book::inRandomOrder()->first()->id, 
            'user_id' => User::inRandomOrder()->first()->id, 
            'review' => $this->faker->paragraph(),
            'publisher_review' => $this->faker->paragraph(), 
            'author_review' => $this->faker->paragraph(), 
        ];
    }
}
