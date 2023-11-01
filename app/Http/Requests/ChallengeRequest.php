<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChallengeRequest extends FormRequest
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
            'description_ar' =>  ['required', 'string', 'max:100', 'min:5'],
            'description_en' => ['required', 'string', 'max:100', 'min:5'],
            'cover_image' =>['required','mimes:jpeg,png,jpg,gif,svg','max:1024'],
            'pointes' => ['required','numeric'],
            'player_number' => ['nullable','numeric'],
            'match_number' => ['nullable','numeric'],
            'number_top'=> ['nullable','numeric'],
            'challenge_category_id' =>  ['required','exists:challenge_categories,id'],
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
            'description_ar' =>  ['required', 'string', 'max:100', 'min:5'],
            'description_en' => ['required', 'string', 'max:100', 'min:5'],
            'cover_image' =>['nullable','mimes:jpeg,png,jpg,gif,svg','max:1024'],
            'pointes' => ['required','numeric'],
            'player_number' => ['nullable','numeric'],
            'match_number' => ['nullable','numeric'],
            'number_top'=> ['nullable','numeric'],
            'challenge_category_id' =>  ['required','exists:challenge_categories,id'],


        ];
    }

    /**
     * @return \string[][]
     */
    public function rules(): array
    {

        return request()->isMethod('put') || request()->isMethod('patch') ?
            $this->update() : $this->store();
    }
}
