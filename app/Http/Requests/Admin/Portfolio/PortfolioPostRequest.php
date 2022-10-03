<?php

namespace App\Http\Requests\Admin\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioPostRequest extends FormRequest
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
        $id = $this->id;
        if($id){
            $unique = ",$id,id";
        }else{
            $unique = '';
        }
        $rules = [
            'title' => "required|unique:portfolios,title$unique|string",
            'desc' => "required|unique:portfolios,slug$unique|string",
            'category_portfolio' => 'required|integer',
            'feature_image' => 'required|string',
            'content_value' => 'required|string',
            'status' => 'required|integer',
            'language' => 'required|in:en,vi|string',
        ];

        return $rules;
    }
}
