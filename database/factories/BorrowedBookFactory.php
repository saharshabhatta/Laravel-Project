<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon; 


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BorrowedBook>
 */
class BorrowedBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $borrowedAt = $this->faker->dateTimeThisYear();
        $returnBy = Carbon::parse($borrowedAt)->addWeeks(2); 

        return [
           'user_id' => User::inRandomOrder()->first()->id, 
            'book_id' => Book::inRandomOrder()->first()->id,
            'borrowed_at' => $borrowedAt,
            'return_by' => $returnBy,
            'is_overdue' => false,
        ];
    }
}
