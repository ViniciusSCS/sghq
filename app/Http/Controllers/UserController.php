<?php

namespace App\Http\Controllers;

use App\Constants\Geral;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Post(
     *      tags={"User"},
     *      path="/user/cadastro",
     *      @OA\Parameter(
     *          name="name",
     *          required=true,
     *      ),
     *      @OA\Parameter(
     *          name="email",
     *          required=true,
     *      ),
     *      @OA\Parameter(
     *          name="password",
     *          required=true,
     *      ),
     *      @OA\Response(response="200", description="Cadastra as informações do usuário"),
     *      @OA\Response(response="401", description="Usuário não Autenticado"),
     *      @OA\Response(response="422", description="Erro em algum campo obrigatório"),
     * )
     */
    public function create(UserRequest $request)
    {
        $user = $this->service->create($request);

        return ['status' => true, 'message' => Geral::USUARIO_CADASTRADO, "usuario" => $user];
    }

    /**
     * @OA\Get(
     *      tags={"User"},
     *      path="/user/",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(response="200", description="Apreseta informações do usuário logado"),
     *      @OA\Response(response="401", description="Usuário não Autenticado"),
     * )
     *
     * @return App\Models\User
     */
    public function user(Request $request)
    {
        $user = $this->service->user($request);

        return ['status' => true, 'message' => Geral::USUARIO_ME, "usuario" => $user];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
