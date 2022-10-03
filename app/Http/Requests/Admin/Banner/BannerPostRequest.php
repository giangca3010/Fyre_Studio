<?php

namespace App\Http\Requests\Admin\Banner;

use Illuminate\Foundation\Http\FormRequest;

class BannerPostRequest extends FormRequest
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
            'title_en'=> 'nullable|unique:banners,title_en',
            'title_vi'=> 'nullable|unique:banners,title_vi',
            'desc_en'=> 'nullable|string',
            'desc_vi'=> 'nullable|string',
            'image'=> 'required|string',
            'is_featured'=> 'nullable|integer',
        ];
        return $rules;
    }

    //    public function attributes()
//    {
//        return [
//            'name_en' => 'tên menu EN',
//            'name_vn' => 'tên menu VI',
//            'link'=> 'đường dẫn',
//            'is_active'=> 'trạng thái hiển thị',
//            'icon'=> 'icon',
//            'parent_id'=> 'menu cha',
//            'position'=> 'thứ tự hiển thị',
//        ];
//    }
}
