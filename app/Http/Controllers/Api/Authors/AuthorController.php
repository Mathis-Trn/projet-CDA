<?php

namespace App\Http\Controllers\Api\Authors;

use App\Http\Controllers\Controller;
use App\Models\Authors;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $author = Authors::all();
        return response()->json($author, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $author = new Authors;
        $author->name =$request->name;
        $author->adress =$request->adress;
        $author->description =$request->description;
        $author->email =$request->email;
        $author->save();
        return response()->json(["message"=>"Auteur ajouté"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $author = Authors::find($id);
        if (!empty($author)) 
        {
            return response()->json($author, 200);
        } 
        else 
        {
            return response()->json(['message' => 'Auteur non trouvé'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(Authors::where('id', $id)->exists()) 
        {
            $author = Authors::find($id);
            $author->name =is_null($request->name)? $author->name : $request->name;
            $author->adress =is_null($request->adress)? $author->adress : $request->adress;
            $author->description =is_null($request->description)? $author->description : $request->description;
            $author->email =is_null($request->email)? $author->email : $request->email;
            $author->save();

            return response()->json(["message" => "Auteur modifié"], 201);

        }
        else 
        {
            return response()->json(['message' => 'Auteur non trouvé'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Authors::where('id', $id)->exists()) {
            $author = Authors::find($id);
            $author->delete();
           
            return response()->json(["message" => "Auteur supprimé", 202]);
        } else {
            return response()->json(['message' => 'Auteur non trouvé'], 404);
        }
    }
}
