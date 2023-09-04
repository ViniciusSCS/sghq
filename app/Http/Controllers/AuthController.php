<?php

namespace App\Http\Controllers;

use App\Constants\Geral;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\TokenRepository;

class AuthController extends Controller
{
    protected $tokenRepository;

    public function __construct(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
    }

    /**
     * @OA\Post(
     *     tags={"Auth"},
     *     path="/login",
     *     @OA\Parameter(
     *         name="email",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         required=true,
     *     ),
     *     @OA\Response(response="200", description="Usuário loga com email e senha"),
     *     @OA\Response(response="422", description="Erro em algum campo obrigatório"),
     * )
     */
    public function login(LoginRequest $request)
    {
        $data = $request->all();

        if (Auth::attempt(['email' => strtolower($data['email']), 'password' => $data['password']])) {
            $user = Auth::user();

            $user = User::find($user->id);
            $token = $user->createToken('JWT')->plainTextToken;

            return ['status' => true, 'message' => Geral::USUARIO_LOGADO, "usuario" => $user, "token" => $token];
        } else {
            return ['status' => false, 'message' => Geral::USUARIO_INCORRETO];
        }
    }

    /**
     * @OA\Post(
     *     tags={"Auth"},
     *     path="/logout",
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(response="200", description="Rota para deslogar usuário e revogar token"),
     *     @OA\Response(response="401", description="Usuário não Autenticado"),
     *     @OA\Response(response="422", description="Erro em algum campo obrigatório"),
     * )
     */
    public function logout(Request $request)
    {
        $user = Auth::user();

        $user->tokens()->delete();

        return ['status' => true, 'message' => Geral::USUARIO_DESLOGADO];
    }
}
