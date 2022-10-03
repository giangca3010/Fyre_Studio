<?php

namespace App\Http\Requests\Admin\Banner;

use Illuminate\Foundation\Http\FormRequest;

class BannerUpdateRequest extends FormRequest
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

        $rules = [
            'title_en' => "string|unique:banners,title_en,$id,id",
            'title_vi' => "string|unique:banners,title_vi,$id,id",
            'desc_en' => 'nullable|string',
            'desc_vi' => 'nullable|string',
            'image' => 'string|required',
            'is_featured' => 'nullable|integer',
            'position' => 'nullable|integer',
        ];
        return $rules;
    }

//    public function attributes()
//    {
//        return [
//            'title_en' => 'test',
//
//        ];
//    }
}
