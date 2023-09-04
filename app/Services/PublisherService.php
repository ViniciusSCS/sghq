<?php

namespace App\Services;

use App\Repositories\PublisherRepository;

class PublisherService
{
    protected $repository;

    public function __construct(PublisherRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($request)
    {
        $data = $request->all();

        return $this->repository->create($data);
    }
}
