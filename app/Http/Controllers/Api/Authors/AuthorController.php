<?php

namespace App\Http\Controllers\Api\Authors;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Authors;
use Exception;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return AuthorResource::collection(Authors::all());
    }
 
    public function store(AuthorRequest $request)
    {
        $author = Authors::create($request->validated());
 
        return new AuthorResource($author);
    }
 
    public function show(Authors $author)
    {
        return new AuthorResource($author);
    }
 
    public function update(AuthorRequest $request, Authors $author)
    {
        $author->update($request->validated());
 
        return new AuthorResource($author);
    }
 
    public function destroy(Authors $author)
    {
        $author->delete();
 
        return response()->noContent();
    }
}