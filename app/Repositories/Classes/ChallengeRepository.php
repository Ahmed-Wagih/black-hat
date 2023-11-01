<?php

namespace App\Repositories\Classes;

use App\Models\Challenge;
use App\Repositories\Interfaces\IAdminRepository;
use App\Repositories\Interfaces\IMainRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChallengeRepository extends BasicRepository implements IAdminRepository, IMainRepository
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
        return Challenge::class;
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
            $data['cover_image']  = storeImage('Challenges', $data['cover_image']);
        }

        $challenge = $this->create($data); // Save the record to get the ID

        // Generate the show route for the record
        $challenge->link = route('challenges.show', $challenge->id);

        // Save the show route in the database
        $challenge->save();

        return $challenge;
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
        $challenge = $this->find($id);
        if (isset($request['cover_image'])) {
            $request['cover_image'] =  storeImage('Challenges', $request['cover_image']);
            deleteImage('Challenges', $challenge['cover_image']);
        }
        $challenge->link=  route('challenges.show', $challenge->id);
        return $this->save($request, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $challenge = $this->find($id);
        deleteImage('Challenges', $challenge['cover_image']);
        deleteImage('Challenges', $challenge['profile_image']);

        return $this->delete($id);
    }
}
