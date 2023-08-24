<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @OA\Info(title="CRUD Despesas", version="0.1")
 * @OA\SecurityScheme (
 *      type="http",
 *      description="Access token authenticate",
 *      name="Authorization",
 *      in="header",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 *      securityScheme="bearerToken"
 *  )
 */
class AuthController extends Controller
{
    /**
     * @OA\Post (
     *     description="Rota para autenticar usuário",
     *     path="/api/login",
     *     @OA\RequestBody (
     *          @OA\Schema (
     *              required={"email", "password"}
     *          )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="The data"
     *     )
     * )
     */
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'email' => 'The provided credentials are incorrect'
            ])->setStatusCode(401);
        }

        $user->tokens()->delete();

        $token = $user->createToken($user->id)->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }
}
