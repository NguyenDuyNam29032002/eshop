<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerAddRequest extends FormRequest
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
        return [
            'name' => 'required|unique:banners|max:255',
            'descriptions' => 'required',
            'image_path' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên banner không hợp lệ(Không được để trống)',
            'name.unique' => 'Tên banner đã tồn tại',
            'name.max' => 'Tên banner không hợp lệ(Không quá 255 ký tự )',
            'descriptions.required' => 'Mô tả không được để trống',
            'image_path.required' => 'Hình ảnh không được để trống'
        ];
    }
}
