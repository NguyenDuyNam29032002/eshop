<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:255|min:10',
            'price' => 'bail|required|',
            'category' => 'bail|required',
            'content' => 'bail|required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'name.max' => 'Tên sản phẩm không hợp lệ(Quá dài)',
            'name.min' => 'Tên sản phẩm không hợp lệ(Quá ngắn)',
            'price.required' => 'Giá sản phẩm không được để trống',
            'category.required' => 'Danh mục không được để trống',
            'content.required' => 'Mô tả sản phẩm không được để trống',
        ];
    }
}
