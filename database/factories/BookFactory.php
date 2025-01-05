<?php

namespace Database\Factories;

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
        return [
            'name' => $this->faker->sentence(3), 
            'author' => $this->faker->name(), 
            'publisher' => $this->faker->company(), 
            'published_date' => $this->faker->date(), 
            'genre' => $this->faker->randomElement(['Fiction', 'Non-Fiction', 'Fantasy', 'Mystery', 'Science', 'Biography']), 
           'photo' => 'photos/test.png', 
            'description' => $this->faker->paragraph(3), 
            'stock' => $this->faker->numberBetween(0, 100),
            'isbn' => $this->faker->isbn13(),
        ];
    }
}
