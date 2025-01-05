<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory(10)->create();

        Book::factory()->create([
            'name' => 'One of Us is Lying',
            'author' => 'Karen M. McManus',
            'publisher' => 'Delacorte Press',
            'published_date' => '2017-06-30',
            'genre' => 'Mystery',
           'photo' => 'photos/test.png',
            'description' => 'Five students, Bronwyn, Simon, Cooper, Addy, and Nate, are in detention together when Simon dies suddenly. The four remaining students become suspects after claims that the incident was not an accident. Each student has their own motives and secrets that they would do anything to protect.',
            'stock' => 10,
            'isbn' => '1234567890123',
        ]);
    }
}
