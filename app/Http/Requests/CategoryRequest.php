<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name_ar' => ['required', 'string', 'max:50', 'min:5'],
            'name_en'=>['required', 'string', 'max:50', 'min:5'],
            'icon' => ['required','mimes:jpeg,png,jpg,gif,svg','max:1024'],
            'background'=>['required'],

        ];
    }

    /**
     * @return \string[][]
     * Set rules validation on updating
     */
    protected function update(): array
    {

        return [
            'name_ar' => ['required', 'string', 'max:50', 'min:5'],
            'name_en'=>['required', 'string', 'max:50', 'min:5'],
            'icon' => ['sometimes','nullable','mimes:jpeg,png,jpg,gif,svg','max:1024'],
            'background'=>['required'],



        ];
    }

    /**
     * @return \string[][]
     */
    public function rules(): array
    {
        return $this->isMethod('PUT') || $this->isMethod('patch')
            ? $this->update()
            : $this->store();
    }
}
