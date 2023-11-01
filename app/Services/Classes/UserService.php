<?php

namespace App\Services\Classes;

use App\Repositories\Classes\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function findBy(Request $request)
    {
        return $this->userRepository->findBy($request);
    }
    public function store($request)
    {
        return $this->userRepository->store($request);
    }
    public function show($id)
    {
        return $this->userRepository->show($id);
    }

    public function find($id)
    {
        return $this->userRepository->find($id);
    }

    public function update($request, $id)
    {
        if (!isset($request['password'])) {
            unset($request['password']);
        }
        if (isset($request['password'])) {
            $request['password'] = Hash::make($request['password']);
        }
        $interests = $request['interests'];
        unset($request['interests']);
        $user =  $this->userRepository->update($request, $id);
        $user->interests()->sync($interests);
        return $user;
    }
    public function destroy($id)
    {
        $this->userRepository->destroy($id);
    }
}
