<?php

namespace App\Http\Controllers;

use App\Constants\Geral;
use App\Http\Requests\TypeComicRequest;
use App\Services\TypeComicService;
use Illuminate\Http\Request;

class TypeComicController extends Controller
{
    protected $service;

    public function __construct(TypeComicService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @OA\Post(
     *      tags={"TypeComic"},
     *      path="/tipo_hq/cadastrar",
     *      @OA\Parameter(
     *          name="name",
     *          required=true,
     *      ),
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(response="200", description="Cadastra as informações do tipo de HQ"),
     *      @OA\Response(response="401", description="Usuário não Autenticado"),
     *      @OA\Response(response="422", description="Erro em algum campo obrigatório"),
     * )
     */
    public function create(TypeComicRequest $request)
    {
        $typeComic = $this->service->create($request);

        return ['status' => true, 'message' => Geral::TIPO_HQ_CADASTRO, "tipo_hq" => $typeComic];
    }

    /**
     * @OA\Get(
     *     tags={"TypeComic"},
     *     path="/tipo_hq/",
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(response="200", description="Lista os tipo de HQ cadastrados"),
     *     @OA\Response(response="401", description="Usuário não Autenticado"),
     * )
     *
     * @param Request $request
     * @return App\Models\TypeComic
     */
    public function list()
    {
        $typeComic = $this->service->list();

        return ['status' => true, 'message' => Geral::TIPO_HQ_CADASTRO, "tipo_hq" => $typeComic];
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
