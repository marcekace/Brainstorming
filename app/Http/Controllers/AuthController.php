<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where("email", $request->email)->get()->first();

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(["message" => "Credenciales invalidas"], 401);
        }

        return response()
            ->json([
                "token" => $user->createToken("token", [$user->role->description])->plainTextToken,
                "role" => $user->role->description,
                "id" => $user->id], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(["message" => "Sesion cerrada"], 200);
    }
}
