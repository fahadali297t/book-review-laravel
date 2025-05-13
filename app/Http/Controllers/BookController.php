<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class BookController extends Controller
{


    function list()
    {
        $data  = new Book;
        // =============================================================
        // use to get all data from books along with reviews
        // $book =  $data::with('reviews')->get();
        // ===============================================================
        // use to get data from both tables based on search in both tables
        // $book = Book::where('title', 'Lost in Cyan')->withWhereHas('reviews', function ($query) {
        //     $query->where('rating', 5);
        // })->get();
        // ================================================================
        // fetch data form both tables based on search from child
        $book = Book::withWhereHas('reviews', function ($query) {
            $query->where('rating', 5);
        })->get();
        return $book;
        // =================================================================
        // fetch data from parent only based on search on child
        // $book = Book::WhereHas('reviews', function ($query) {
        //     $query->where('rating', 5);
        // })->get();
        // return $book;
        // ===================================================================
    }
    function newReview()
    {
        $review = new Review;
        $response =   $review->create([
            'book_id' => 2,
            'review' => 'This is 1st review',
            'rating' => 5
        ]);
        if ($response) {
            return redirect()->route('book.list');
        } else {
            echo "Something Went Wrong";
        }
    }
    function inverse()
    {
        $data = Review::withWhereHas('book', function ($query) {
            $query->where('id', 1);
        })->get();
        return $data;
    }
    function newBook()
    {
        $book =   Book::create([
            'title' => "hello World",
            'author' => "Fahad Ali"
        ]);
        $book->reviews()->create([
            'review' => "Very Good",
            'rating' => 5
        ]);
    }
}
