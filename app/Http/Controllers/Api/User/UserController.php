<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }
 
    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());
 
        return new UserResource($user);
    }
 
    public function show(User $user)
    {
        return new UserResource($user);
    }
 
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());
 
        return new UserResource($user);
    }
 
    public function destroy(User $user)
    {
        $user->delete();
 
        return response()->noContent();
    }
}