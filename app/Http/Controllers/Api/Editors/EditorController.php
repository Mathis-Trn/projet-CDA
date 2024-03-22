<?php

namespace App\Http\Controllers\Api\Editors;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditorRequest;
use App\Http\Resources\EditorResource;
use App\Models\Editors;

class EditorController extends Controller
{
    public function index()
    {
        return EditorResource::collection(Editors::all());
    }
 
    public function store(EditorRequest $request)
    {
        $editor = Editors::create($request->validated());
 
        return new EditorResource($editor);
    }
 
    public function show(Editors $editor)
    {
        return new EditorResource($editor);
    }
 
    public function update(EditorRequest $request, Editors $editor)
    {
        $editor->update($request->validated());
 
        return new EditorResource($editor);
    }
 
    public function destroy(Editors $editor)
    {
        $editor->delete();
 
        return response()->noContent();
    }
}