<?php

namespace App\Http\Requests\Admin\ClientMenu;

use Illuminate\Foundation\Http\FormRequest;

class ClientMenuUpdateRequest extends FormRequest
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
        $rules =  [
            'name_en'=> "string|required|unique:client_menus,name_en,$id,id",
            'name_vi'=> "string|required|unique:client_menus,name_vi,$id,id",
            'is_active'=> 'integer',
            'parent_id'=> 'integer',
            'position'=> 'integer',
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
