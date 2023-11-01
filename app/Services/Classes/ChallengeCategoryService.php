<?php

namespace App\Services\Classes;

use App\Repositories\Classes\ChallengeCategoryRepository;
use App\Services\Interfaces\ICategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChallengeCategoryService
{
    protected $challengeCategoryRepository;

    public function __construct(ChallengeCategoryRepository $challengeCategoryRepository)
    {
        $this->challengeCategoryRepository = $challengeCategoryRepository;
    }

    public function findBy(Request $request)
    {
        return $this->challengeCategoryRepository->findBy($request);
    }

    public function store($request)
    {
        $this->challengeCategoryRepository->store($request);
    }


    public function show($id)
    {
        return $this->challengeCategoryRepository->show($id);
    }

    public function update($request, $id)
    {


        $category = $this->challengeCategoryRepository->update($request, $id);
        return $category;
    }

    public function destroy($id)
    {
        $this->challengeCategoryRepository->destroy($id);
    }
}

