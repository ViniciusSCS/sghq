<?php

namespace App\Http\Controllers;

use App\Constants\Geral;
use App\Http\Requests\PublisherRequest;
use App\Services\PublisherService;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    protected $service;

    public function __construct(PublisherService $service)
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
     *      tags={"Publisher"},
     *      path="/editora/cadastro",
     *      @OA\Parameter(
     *          name="name",
     *          required=true,
     *      ),
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(response="200", description="Cadastra as informações do usuário"),
     *      @OA\Response(response="401", description="Usuário não Autenticado"),
     *      @OA\Response(response="422", description="Erro em algum campo obrigatório"),
     * )
     */
    public function create(PublisherRequest $request)
    {
        $publisher = $this->service->create($request);

        return ['status' => true, 'message' => Geral::EDITORA_CADASTRO, "editora" => $publisher];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
