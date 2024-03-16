<?php

namespace App\Http\Controllers\Api\Editors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Editor\CreateEditorRequest;
use App\Http\Requests\Editor\UpdateEditorRequest;
use App\Models\Editors;
use Exception;

class EditorController extends Controller
{
    public function index()
    {
        try {

            $editor = Editors::all();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Les éditeurs ont été récupérées avec succès',
                'items' => $editor
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
    public function store(CreateEditorRequest $request)
    {
        try {

            $editor = new Editors;
            $editor->name = $request->name;
            $editor->adress = $request->adress;
            $editor->description = $request->description;
            $editor->email = $request->email;

            $editor->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => 'Editeur ajouté'
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

            $editor = Editors::find($id);

            if (!empty($editor)) {

                return response()->json([
                    'status_code' => 200,
                    'status_message' => 'Editeur affiché',
                    'items' => $editor
                ]);
            } else {

                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'Editeur non trouvé'
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
    public function update(UpdateEditorRequest $request, $id)
    {
        try {

            if (Editors::where('id', $id)->exists()) {

                $editor = Editors::find($id);

                $editor->name = is_null($request->name) ? $editor->name : $request->name;
                $editor->adress = is_null($request->adress) ? $editor->adress : $request->adress;
                $editor->description = is_null($request->description) ? $editor->description : $request->description;
                $editor->email = is_null($request->email) ? $editor->email : $request->email;

                $editor->save();

                return response()->json([
                    'status_code' => 201,
                    'status_message' => 'Editeur modifié'
                ]);
            } else {

                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'Editeur non trouvé'
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

            if (Editors::where('id', $id)->exists()) {

                $editor = Editors::find($id);
                $editor->delete();

                return response()->json([
                    'status_code' => 202,
                    'status_message' => 'Editeur supprimé'
                ]);
            } else {

                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'Editeur non trouvé'
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
