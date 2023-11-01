<?php

namespace App\Repositories\Classes;

use App\Models\Admin;
use App\Models\Agenda;
use App\Models\Category;
use App\Repositories\Interfaces\IAdminRepository;
use App\Repositories\Interfaces\IMainRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgendaRepository extends BasicRepository implements IAdminRepository, IMainRepository
{
    /**
     * @var array
     */
    protected array $fieldSearchable = [
        'id', 'name_ar','name_en',
    ];

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Agenda::class;
    }
    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function getFieldsRelationShipSearchable()
    {
        return $this->model->searchRelationShip;
    }

    public function translationKey()
    {
        return $this->model->translationKey();
    }

    public function findBy($relations = [], $andsFilters = [])
    {
        return $this->all(relations: $relations, andsFilters: $andsFilters);
    }

    /**
     * @param $data
     */
    public function store($data)
    {
        if (isset($data['cover_image'])) {
            $data['cover_image']  = storeImage('Agendas', $data['cover_image']);
        }
        if (isset($data['profile_image'])) {
            $data['profile_image']  = storeImage('Agendas', $data['profile_image']);
        }


        return $this->create($data);
    }


    public function list()
    {
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function show($id)
    {
        return $this->find($id);
    }

    /**
     * @param      $request
     * @param null $id
     */
    public function update($request, $id = null)
    {
        $agenda = $this->find($id);
        if (isset($request['cover_image'])) {
            $request['cover_image'] =  storeImage('Agendas', $request['cover_image'])  ??  $agenda->cover_image ;
            deleteImage('Agendas', $agenda['cover_image']);
        }
        if (isset($request['profile_image'])) {
            $request['profile_image'] =  storeImage('Agendas', $request['profile_image']) ??  $agenda->profile_image;
            deleteImage('Agendas', $agenda['profile_image']);
        }
        return $this->save($request, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $agenda = $this->find($id);
        deleteImage('Agendas', $agenda['cover_image']);
        deleteImage('Agendas', $agenda['profile_image']);

        return $this->delete($id);
    }
}
