<?php

namespace App\Repositories\Classes;

use App\Models\Admin;
use App\Models\ChallengeCategory;
use App\Repositories\Interfaces\IAdminRepository;
use App\Repositories\Interfaces\IMainRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChallengeCategoryRepository extends BasicRepository implements IAdminRepository, IMainRepository
{
    /**
     * @var array
     */
    protected array $fieldSearchable = [
        'id', 'name_ar','name_en'
    ];

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return ChallengeCategory::class;
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

    public function findBy(Request $request): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->all(orderBy:$request->order);
    }

    /**
     * @param $data
     */
    public function store($data)
    {
        if (isset($data['icon'])) {
            $data['icon']  = storeImage('ChallengeCategories', $data['icon']);
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
        $challengeCategory = $this->find($id);
        if (isset($request['icon'])) {
            $request['icon'] =  storeImage('ChallengeCategories', $request['icon']);
            deleteImage('ChallengeCategories', $challengeCategory['icon']);
        }
        return $this->save($request, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $challengeCategory = $this->find($id);
        deleteImage('ChallengeCategories', $challengeCategory['icon']);
        return $this->delete($id);
    }
}
