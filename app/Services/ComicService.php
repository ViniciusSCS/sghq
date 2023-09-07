<?php

namespace App\Services;

use App\Repositories\ComicRepository;

class ComicService
{
    protected $repository;

    public function __construct(ComicRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($request)
    {
        $data = $request->all();
        $userUuid = $request->user()->uuid;

        return $this->repository->create($data, $userUuid);
    }

    public function list($request)
    {
        $userUuid = $request->user()->uuid;

        return $this->repository->list($userUuid);
    }
}
