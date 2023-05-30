<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookPostRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        if ($searchTerm) {
            $books = Book::where('title', 'LIKE', '%'.$searchTerm.'%')
                ->paginate(8);
        } else {
            $books = Book::paginate(8);
        }

        return view('index', ['books' => $books, 'searchTerm' => $searchTerm]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookPostRequest $request)
    {   
        $data = $request->validated();
    
        // Retrieve the authenticated user's ID
        $data['user_id'] = Auth::id();
    
        // Retrieve the author's ID based on the provided author name
        $author = Author::firstOrCreate(['name' => $data['author']]);
        $data['author_id'] = $author->id;
    
        Book::create($data);

        return Redirect::route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('detail', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('book-edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookPostRequest $request, Book $book)
    {
        $data = $request->validated();
        $book->update($data);
        
        return Redirect::route('books.show', $book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return Redirect::route('books.show', $book);
    }

    
}
