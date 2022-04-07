<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginAdmin extends FormRequest
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
            'username.required' => 'Bắt buộc nhập trường username',
            'username.alpha_dash' => 'username phải chứa ký tự, số, gạch ngang và gạch dưới',
            'username.min' => 'Username nhập ít nhất :min ký tự',
            'username.max' => 'Username nhập nhiều nhất :max ký tự',
            'password.required' => 'Bắt buộc nhập trường password',
            'password.alpha_num' => 'Password phải chứa ký tự và số',
            'password.min' => 'Password nhập ít nhất :min ký tự'
        ];
    }
}
