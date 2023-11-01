<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return \string[][]
     * Set rules validation on creating
     */
    protected function store(): array
    {
        return [
            'name_ar' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
            'description_ar' =>  ['required', 'string', 'max:255'],
            'description_en' => ['required', 'string', 'max:255'],
            'cover_image' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],
            'profile_image' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
            'address' =>  ['required', 'max:250'],
            'category_id' =>  ['required', 'exists:categories,id'],
            'city' => ['required', 'string', 'max:255'],

        ];
    }

    /**
     * @return \string[][]
     * Set rules validation on updating
     */
    protected function update(): array
    {

        return [
            'name_ar' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
            'description_ar' =>  ['required', 'string', 'max:255'],
            'description_en' => ['required', 'string', 'max:255'],
            'cover_image' => ['nullable', 'mimes:jpeg,png,jpg,gif,svg'],
            'profile_image' => ['nullable', 'mimes:jpeg,png,jpg,gif,svg'],
            'date' => ['required', 'date'],
            'time' => ['required'],
            'address' =>  ['required', 'max:250'],
            'category_id' =>  ['required', 'exists:categories,id'],
            'city' => ['required', 'string', 'max:255'],

        ];
    }

    /**
     * @return \string[][]
     */
    public function rules(): array
    {
        // dd(request()->method());
        // return [];
        $rules = (request()->isMethod('PUT') || request()->isMethod('patch')) ? $this->update() : $this->store();
        // dd($rules);
        return $rules;
    }
}
