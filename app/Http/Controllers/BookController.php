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
        $book =  $data::with('reviews')->take(3)->get();
        return $book;
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
}
