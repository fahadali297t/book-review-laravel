<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = File::get(path: 'database/json/reviews.json');
        $reviews = collect(json_decode($data));
        foreach ($reviews as $review) {

            Review::create([
                'book_id' => $review->book_id,
                'review' => $review->review,
                'rating' => $review->rating
            ]);
        }
    }
}
