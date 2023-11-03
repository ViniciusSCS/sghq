<?php

namespace App\Http\Controllers;

use App\Constants\Geral;
use App\Http\Requests\ComicRequest;
use App\Services\ComicService;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    protected $service;

    public function __construct(ComicService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Post(
     *      tags={"Comic"},
     *      path="/hq/cadastrar",
     *      @OA\Parameter(
     *          name="name",
     *          required=true,
     *      ),
     *      @OA\Parameter(
     *          name="publication_date",
     *          required=true,
     *      ),
     *      @OA\Parameter(
     *          name="type_comic_id",
     *          required=true,
     *      ),
     *      @OA\Parameter(
     *          name="user_id",
     *          required=true,
     *      ),
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(response="200", description="Cadastra as informações da HQ"),
     *      @OA\Response(response="401", description="Usuário não Autenticado"),
     *      @OA\Response(response="422", description="Erro em algum campo obrigatório"),
     * )
     */
    public function create(ComicRequest $request)
    {
        $comic = $this->service->create($request);

        return ['status' => true, 'message' => Geral::HQ_CADASTRO, 'comic' => $comic];
    }

    /**
     * @OA\Get(
     *     tags={"Comic"},
     *     path="/hq/",
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(response="200", description="Lista as HQ cadastradas por usuário"),
     *     @OA\Response(response="401", description="Usuário não Autenticado"),
     * )
     *
     * @param Request $request
     * @return App\Models\Comic
     */
    public function list(Request $request)
    {
        $comic = $this->service->list($request);

        return ['status' => true, 'message' => Geral::HQ_ENCONTRADAS, 'comic' => $comic];
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
     * @OA\Delete(
     *     tags={"Comic"},
     *     path="/hq/deletar/{uuid}",
     *      @OA\Parameter(
     *          name="uuid",
     *          description="Comic uuid",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(response="200", description="Apreseta informações da HQ deletada ou Retorno da HHQ não encontrada"),
     *     @OA\Response(response="401", description="Usuário não Autenticado"),
     * )
     *
     * @param Request $request, $uuid
     * @return App\Models\Comic
     */
    public function destroy(Request $request, $uuid)
    {
        $comic = $this->service->delete($request, $uuid);

        $info = ($comic == NULL ?
            ['status' => false, 'message' => Geral::HQ_NAO_ENCONTRADA] :
            ['status' => true, 'message' => Geral::HQ_DELETADA, "pet" => $comic]
        );

        return $info;
    }
}
