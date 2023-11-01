<?php

namespace App\Services\Classes;

use App\Repositories\Classes\AgendaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgendaService
{
    protected $agendaRepository;

    public function __construct(AgendaRepository $agendaRepository)
    {
        $this->agendaRepository = $agendaRepository;
    }

    public function findBy(Request $request)
    {
        return $this->agendaRepository->findBy(['category' => ['id','name_ar','name_en']]);


    }

    public function store($request)
    {
        $this->agendaRepository->store($request);
    }


    public function show($id)
    {
        return $this->agendaRepository->show($id);
    }

    public function update($request, $id)
    {


        $agenda = $this->agendaRepository->update($request, $id);
        return $agenda;
    }

    public function destroy($id)
    {
        $this->agendaRepository->destroy($id);
    }
}

