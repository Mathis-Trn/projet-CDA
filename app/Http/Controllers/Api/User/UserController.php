<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        try {

            $user = User::all();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Utilisateurs récupérés avec succès',
                'items' => $user
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
    public function store(UserRequest $request)
    {
        try {

            $user = new User;

            $user->name = $request->name;
            $user->adress = $request->adress;
            $user->description = $request->description;
            $user->email = $request->email;

            $user->save();

            return response()->json([
                'status_code' => '201',
                'status_message' => 'Utilisateur ajouté avec succès'
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

            $user = User::find($id);

            if (!empty($user)) {
                return response()->json([
                    'status_code' => '200',
                    'status_message' => 'Utilisateur affiché avec succès',
                    'item' => $user
                ]);
            } else {
                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'Utilisateur non trouvé'
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
    public function update(UserRequest $request, $id)
    {
        try {

            if (User::where('id', $id)->exists()) {
                $user = User::find($id);
                $user->name = is_null($request->name) ? $user->name : $request->name;
                $user->adress = is_null($request->adress) ? $user->adress : $request->adress;
                $user->description = is_null($request->description) ? $user->description : $request->description;
                $user->email = is_null($request->email) ? $user->email : $request->email;
                $user->save();

                return response()->json([
                    'status_code' => 201,
                    'status_message' => 'Utilisateur modifié avec succès'
                ]);
            } else {
                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'Utilisateur non trouvé'
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

            if (User::where('id', $id)->exists()) {
                $user = User::find($id);
                $user->delete();

                return response()->json([
                    'status_code' => 202,
                    'status_message' => 'Utilisateur supprimé avec succès'
                ]);
            } else {
                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'Utilisateur non trouvé'
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
