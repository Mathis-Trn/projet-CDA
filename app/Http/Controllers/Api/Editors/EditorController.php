<?php

namespace App\Http\Controllers\Api\Editors;

use App\Http\Controllers\Controller;
use App\Models\Editors;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index()
    {
        $editor = Editors::all();
        return response()->json($editor, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $editor = new Editors;
        $editor->name =$request->name;
        $editor->adress =$request->adress;
        $editor->description =$request->description;
        $editor->email =$request->email;
        $editor->save();
        return response()->json(["message"=>"Editeur ajouté"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $editor = Editors::find($id);
        if (!empty($editor)) 
        {
            return response()->json($editor, 200);
        } 
        else 
        {
            return response()->json(['message' => 'Editeur non trouvé'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(Editors::where('id', $id)->exists()) 
        {
            $editor = Editors::find($id);
            $editor->name =is_null($request->name)? $editor->name : $request->name;
            $editor->adress =is_null($request->adress)? $editor->adress : $request->adress;
            $editor->description =is_null($request->description)? $editor->description : $request->description;
            $editor->email =is_null($request->email)? $editor->email : $request->email;
            $editor->save();

            return response()->json(["message" => "Editeur modifié"], 201);

        }
        else 
        {
            return response()->json(['message' => 'Editeur non trouvé'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Editors::where('id', $id)->exists()) {
            $editor = Editors::find($id);
            $editor->delete();
           
            return response()->json(["message" => "Editeur supprimé", 202]);
        } else {
            return response()->json(['message' => 'Editeur non trouvé'], 404);
        }
    }
}
