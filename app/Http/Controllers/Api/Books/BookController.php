<?php 
namespace App\Http\Controllers\Api\Books;
 
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Books;
 
class BookController extends Controller
{
    public function index()
    {
        return BookResource::collection(Books::all());
    }
 
    public function store(BookRequest $request)
    {
        $book = Books::create($request->validated());
 
        return new BookResource($book);
    }
 
    public function show(Books $book)
    {
        return new BookResource($book);
    }
 
    public function update(BookRequest $request, Books $book)
    {
        $book->update($request->validated());
 
        return new BookResource($book);
    }
 
    public function destroy(Books $book)
    {
        $book->delete();
 
        return response()->noContent();
    }
}