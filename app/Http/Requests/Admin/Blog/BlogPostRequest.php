<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
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
            'title' => "required|unique:blogs,title$unique|string",
            'desc' => "required|unique:blogs,slug$unique|string",
            'feature_image' => 'required|string',
            'content_value' => 'required|string',
            'status' => 'required|integer',
            'language' => 'required|in:en,vi|string',
        ];
        return $rules;
    }
}
