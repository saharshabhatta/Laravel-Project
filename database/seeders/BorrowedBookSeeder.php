<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BorrowedBook;

class BorrowedBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BorrowedBook::factory(10)->create();

        BorrowedBook::factory()->create([
            'user_id' => 1, 
            'book_id' => 1,
            'borrowed_at' => now(),
            'return_by' => now()->addWeeks(3),
            'is_overdue' => false,
        ]);

        
        BorrowedBook::factory()->create([
            'user_id' => 12, 
            'book_id' => 11, 
            'borrowed_at' => now()->subMonths(2), 
            'return_by' => now()->subWeeks(1),
            'is_overdue' => true, 
        ]);
    }
}
