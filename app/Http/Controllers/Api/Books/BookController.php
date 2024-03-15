<?php

namespace App\Http\Controllers\Api\Books;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Books::all();
        return response()->json($book, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Books;
        $book->editor_id =$request->editor_id;
        $book->author_id =$request->author_id;
        $book->name =$request->name;
        $book->cover =$request->cover;
        $book->description =$request->description;
        $book->published_at =$request->published_at;
        $book->stock =$request->stock; 
        $book->save();
        return response()->json(["message"=>"Livre ajouté"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Books::find($id);
        if (!empty($book)) 
        {
            return response()->json($book, 200);
        } 
        else 
        {
            return response()->json(['message' => 'Livre non trouvé'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(Books::where('id', $id)->exists()) 
        {
            $book = Books::find($id);
            $book->editor_id =is_null($request->editor_id) ? $book->editor_id : $request->editor_id;
            $book->author_id =is_null($request->author_id)? $book->author_id : $request->author_id;
            $book->name =is_null($request->name)? $book->name : $request->name;
            $book->cover =is_null($request->cover)? $book->cover : $request->cover;
            $book->description =is_null($request->description)? $book->description : $request->description;
            $book->published_at =is_null($request->published_at)? $book->published_at : $request->published_at;
            $book->stock = is_null($request->stock)? $book->stock : $request->stock;
            $book->save();

            return response()->json(["message" => "Livre modifié"], 201);

        }
        else 
        {
            return response()->json(['message' => 'Livre non trouvé'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Books::where('id', $id)->exists()) {
            $book = Books::find($id);
            $book->delete();
           
            return response()->json(["message" => "Livre supprimé", 202]);
        } else {
            return response()->json(['message' => 'Livre non trouvé'], 404);
        }
    }
}
