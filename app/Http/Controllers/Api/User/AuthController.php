<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function register(RegisterUserRequest $request)
  {
    try {

      $user = new User();

      $user->name = $request->name;
      $user->email = $request->email;

      $user->password = Hash::make($request->password, [
        'rounds' => 12,
      ]);

      $user->save();

      return response()->json([
        'status_code' => 200,
        'status_message' => 'Utilisateur ajouté avec succès',
        'user' => $user
      ]);
    } catch (Exception $e) {

      return response()->json($e);
    }
  }

  public function login(LoginUserRequest $request)
  {
    if (auth()->attempt($request->only('email', 'password'))) {

      $user = auth()->user();

      $token = $user->createToken('UNE_SALADE_DE_FRUIT_EST_TOUJOURS_MEILLEURE_AVEC_DES_KIWIS')->plainTextToken;

      return response()->json([
        'status_code' => 200,
        'status_message' => 'Utilisateur connecté avec succès',
        'user' => $user,
        'token' => $token
      ]);
    } else {

      return response()->json([
        'status_code' => 403,
        'status_message' => 'Adresse email ou mot de passe incorrect'
      ]);
    }
  }

  public function logout(Request $request)
  {
  }
}
