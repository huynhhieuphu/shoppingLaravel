<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandPost extends FormRequest
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
            'brandName' => 'required|min:3|max:100|unique:brands,name',
            'brandImg' => 'image|mimes:jpg,jpeg,png|max:2048',
            'brandStatus' => 'required|in:0,1'
        ];
    }

    public function messages()
    {
        return [
            'brandName.required' => 'Tên thương hiệu không được để trống',
            'brandName.min' => 'Tên thương hiệu tối thiếu :min kí tự',
            'brandName.max' => 'Tên thương hiệu đa :max kí tự',
            'brandName.unique' => 'Tên thương hiệu không được trùng',
            'brandImg.image' => 'Tập tin phải là hình ảnh',
            'brandImg.mimes' => 'Đuôi hình ảnh cho phép :mimes',
            'brandImg.max' => 'Dung lượng tối đa :max hình ảnh tải lên',
            'brandStatus.required' => 'Vui lòng chọn tình trạng thương hiệu',
            'brandStatus.in' => 'Các Tình trạng cho phép',
        ];
    }
}
