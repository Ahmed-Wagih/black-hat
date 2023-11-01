<?php

namespace App\Services\Classes;

use App\Repositories\Classes\InterestRepository;
use App\Services\Interfaces\IinterestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InterestService
{
    protected $interestRepository;

    public function __construct(InterestRepository $interestRepository)
    {
        $this->interestRepository = $interestRepository;
    }

    public function findBy(Request $request)
    {
        return $this->interestRepository->findBy($request);
    }

    public function store($request)
    {
        $this->interestRepository->store($request);
    }


    public function show($id)
    {
        return $this->interestRepository->show($id);
    }

    public function update($request, $id)
    {


        $interest = $this->interestRepository->update($request, $id);
        return $interest;
    }

    public function destroy($id)
    {
        $this->interestRepository->destroy($id);
    }
}

