<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Review::factory(10)->create();

       Review::factory()->create([
           'book_id' => 11, 
           'user_id' => 1, 
           'review' => 'One of Us Is Lying is a thrilling, twist-filled mystery that keeps readers guessing until the very end, with its rich character development and suspenseful plot',
           'publisher_review' => 'Delacorte Press has delivered a gripping and well-paced thriller with One of Us Is Lying, skillfully presenting a story that hooks readers from start to finish.',
           'author_review' => 'Karen M. McManus One of Us Is Lying masterfully blends mystery, suspense, and teen drama, keeping readers on the edge of their seats with unexpected twists and compelling characters.',
       ]);
    }
}
