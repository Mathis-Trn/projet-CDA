<?php

namespace App\Http\Controllers\Api\Authors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\CreateAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Models\Authors;
use Exception;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        try {

            $author = Authors::all();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Auteurs récupérés avec succès',
                'items' => $author
            ]);
        } catch (Exception $e) {

            return response()->json([
                'status_code' => '500',
                'status_message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAuthorRequest $request)
    {
        try {

            $author = new Authors;

            $author->name = $request->name;
            $author->adress = $request->adress;
            $author->description = $request->description;
            $author->email = $request->email;

            $author->save();

            return response()->json([
                'status_code' => '201',
                'status_message' => 'Auteur ajouté avec succès'
            ]);
        } catch (Exception $e) {

            return response()->json([
                'status_code' => '500',
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

            $author = Authors::find($id);

            if (!empty($author)) {
                return response()->json([
                    'status_code' => '200',
                    'status_message' => 'Auteur affiché avec succès',
                    'item' => $author
                ]);
            } else {
                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'Auteur non trouvé'
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
    public function update(UpdateAuthorRequest $request, $id)
    {
        try {

            if (Authors::where('id', $id)->exists()) {
                $author = Authors::find($id);
                $author->name = is_null($request->name) ? $author->name : $request->name;
                $author->adress = is_null($request->adress) ? $author->adress : $request->adress;
                $author->description = is_null($request->description) ? $author->description : $request->description;
                $author->email = is_null($request->email) ? $author->email : $request->email;
                $author->save();

                return response()->json([
                    'status_code' => 201,
                    'status_message' => 'Auteur modifié avec succès'
                ]);
            } else {
                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'Auteur non trouvé'
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

            if (Authors::where('id', $id)->exists()) {
                $author = Authors::find($id);
                $author->delete();

                return response()->json([
                    'status_code' => 202,
                    'status_message' => 'Auteur supprimé avec succès'
                ]);
            } else {
                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'Auteur non trouvé'
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
