<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginAdminPost extends FormRequest
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
            'username' => 'required|alpha_dash|min:4|max:60',
            'password' => 'required|alpha_num|min:8'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username không được để trống',
            'username.alpha_dash' => 'Username cho phép chứa chữ, số, dấu gạch ngang và dấu gạch dưới',
            'username.min' => 'Username nhập ít nhất :min ký tự',
            'username.max' => 'Username nhập nhiều nhất :max ký tự',
            'password.required' => 'Password không được để trống',
            'password.alpha_num' => 'Password cho phép chứa chữ và số',
            'password.min' => 'Password nhập ít nhất :min ký tự'
        ];
    }
}
