<?php

namespace App\Services\Classes;

use App\Repositories\Classes\ChallengeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChallengeService
{
    protected $challengeRepository;

    public function __construct(ChallengeRepository $challengeRepository)
    {
        $this->challengeRepository = $challengeRepository;
    }

    public function findBy(Request $request)
    {
        return $this->challengeRepository->findBy(['challengecategory' => ['id','name_ar','name_en']]);

    }

    public function store($request)
    {
        $this->challengeRepository->store($request);
    }


    public function show($id)
    {
        return $this->challengeRepository->show($id);
    }

    public function update($request, $id)
    {


        $challenge = $this->challengeRepository->update($request, $id);
        return $challenge;
    }

    public function destroy($id)
    {
        $this->challengeRepository->destroy($id);
    }
}

