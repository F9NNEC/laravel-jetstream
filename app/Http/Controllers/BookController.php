<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     */
    public function index()
    {
        // Retrieve all books from the database
        $books = Book::all();

        // Return the view with the books data
        return view('books.collections', compact('books'));
    }
}
