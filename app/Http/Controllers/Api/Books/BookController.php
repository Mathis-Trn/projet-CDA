<?php

namespace App\Http\Controllers\Api\Books;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Books;
use Exception;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        try {

            $query = Books::query();
            $perPage = 10;
            $page = $request->input('page', 1);
            $search = $request->input('search');

            if ($search) {
                $query->whereRaw("name LIKE '%" . $search . "%'");
            }

            $total = $query->count();

            $result = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();

            $book = Books::all();
            
            return response()->json([
                'status_code' => 200,
                'status_message' => 'Les livres ont été récupérés avec succès',
                'current_page' => $page,
                'last_page' => ceil($total / $perPage),
                'items' => $result
            ]);
        } catch (Exception $e) {

            return response()->json([
                'status_code' => 500,
                'status_message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        try {

            $book = new Books;

            $book->editor_id = $request->editor_id;
            $book->author_id = $request->author_id;
            $book->name = $request->name;
            $book->cover = $request->cover;
            $book->description = $request->description;
            $book->published_at = $request->published_at;
            $book->stock = $request->stock;

            $book->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => "Livre ajouté"
            ]);
        } catch (Exception $e) {

            return response()->json([
                'status_code' => 500,
                'status_message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {

            $book = Books::find($id);

            if (!empty($book)) {

                return response()->json([
                    'status_code' => 200,
                    'status_message' => 'Livre affiché',
                    'item' => $book
                ]);
            } else {

                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'Livre non trouvé'
                ]);
            }
        } catch (Exception $e) {

            return response()->json([
                'status_code' => 500,
                'status_message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, $id)
    {
        try {

            if (Books::where('id', $id)->exists()) {

                $book = Books::find($id);

                $book->editor_id = is_null($request->editor_id) ? $book->editor_id : $request->editor_id;
                $book->author_id = is_null($request->author_id) ? $book->author_id : $request->author_id;
                $book->name = is_null($request->name) ? $book->name : $request->name;
                $book->cover = is_null($request->cover) ? $book->cover : $request->cover;
                $book->description = is_null($request->description) ? $book->description : $request->description;
                $book->published_at = is_null($request->published_at) ? $book->published_at : $request->published_at;
                $book->stock = is_null($request->stock) ? $book->stock : $request->stock;

                $book->save();

                return response()->json([
                    'status_code' => 201,
                    'status_message' => 'Livre modifié'
                ]);
            } else {

                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'Livre non trouvé'
                ]);
            }
        } catch (Exception $e) {

            return response()->json([
                'status_code' => 500,
                'status_message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            if (Books::where('id', $id)->exists()) {

                $book = Books::find($id);
                $book->delete();

                return response()->json([
                    'status_code' => 202,
                    'status_message' => 'Livre supprimé'
                ]);
            } else {

                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'Livre non trouvé'
                ]);
            }
        } catch (Exception $e) {

            return response()->json([
                'status_code' => 500,
                'status_message' => $e->getMessage()
            ]);
        }
    }
}
