<?php

namespace App\Http\Requests\Admin\CategoryPortfolio;

use Illuminate\Foundation\Http\FormRequest;

class CategoryPortfolioPostRequest extends FormRequest
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
        $rules = [
            "name_en"=> 'required',
            "name_vi"=> 'required',
        ];

        return $rules;
    }
}
