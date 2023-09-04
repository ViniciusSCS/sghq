<?php

namespace App\Services;

use App\Repositories\TypeComicRepository;

class TypeComicService
{
    protected $repository;

    public function __construct(TypeComicRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($request)
    {
        $data = $request->all();

        return $this->repository->create($data);
    }

    public function list()
    {
        return $this->repository->list();
    }
}
