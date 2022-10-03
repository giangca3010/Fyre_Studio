<?php

namespace App\Http\Requests\Admin\OurTeam;

use Illuminate\Foundation\Http\FormRequest;

class OurTeamPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'avatar'=> 'required|string',
            'name'=> "required|string",
            'service'=> 'required|string',
        ];
        return $rules;
    }
}
