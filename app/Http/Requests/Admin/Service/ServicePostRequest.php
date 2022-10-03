<?php

namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;

class ServicePostRequest extends FormRequest
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
            'title_en'=> 'required|string',
            'title_vi'=> 'required|string',
            'service_en'=> 'required|string',
            'service_vi'=> 'required|string',
        ];
        return $rules;
    }
}
