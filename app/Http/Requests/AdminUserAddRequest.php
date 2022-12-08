<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserAddRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255|min:8'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.max' => 'Tên không được quá 255 ký tự',
            'email.required' => 'email không được để trống',
            'email.unique' => 'email đã tồn tại',
            'email.max' => 'email không được quá 255 ký tự',
            'password.required' => 'mật khẩu không được để trống',
            'password.max' => 'mật khẩu quá dài',
            'password.min' => 'mật khẩu quá ngắn',
        ];
    }
}
