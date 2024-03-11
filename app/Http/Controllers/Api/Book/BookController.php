<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Book::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'editor_id' => 'required|string|max:255',
            'author_id' => 'required|string|max:255',
            'name' => 'required|string|max:255', 
            'cover' => 'required|url',
            'description' =>'required|string',
            'published_at' =>'required|date',
        ]);

        $book = Book::create($validatedData);


        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);

        if ($book) {
            return response()->json($book, 200);
        } else {
       return response()->json(['message' => 'Livre non trouvé'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'editor_id' => 'required|string|max:255',
            'author_id' => 'required|string|max:255',
            'name' =>'required|string|max:255', 
            'cover' =>'required|url',
            'description' =>'required|string',
            'published_at' =>'required|date',
        ]);

        if ($book) {
            $book->update($validatedData);
            return response()->json($book, 200);
        } else {
            return response()->json(['message' => 'Livre non trouvé'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book) {
            $book->delete();
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Livre non trouvé'], 404);
        }
    }
}
