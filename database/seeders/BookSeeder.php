<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = File::get(path: 'database/json/books.json');
        $books = collect(json_decode($data));
        foreach ($books as $book) {

            Book::create([
                'title' => $book->title,
                'author' => $book->author
            ]);
        }
    }
}
