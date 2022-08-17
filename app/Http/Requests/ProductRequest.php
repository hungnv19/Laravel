<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:50',
            'price'  => 'required',
            'quantity'  => 'required',
            'describe' => 'required',
            'avatar' => 'required',
            'promotion' => 'required',
            'size' => 'required',
        ];
    } 
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm bắt buộc nhập',
            'name.min' => 'Tên sản phẩm tối thiểu 6 ký tự',
            'name.max' => 'Tên sản phẩm tối đa 50 ký tự',
            'price.required' => 'Giá không được bỏ trống',
            'quantity.required' => 'Số lượng không được bỏ trống',
            'describe.required' => 'Mô tả không được bỏ trống',
            'avatar.required' => 'Ảnh không được bỏ trống',
            'describe.required' => 'Mo ta không được bỏ trống',
            'promotion.required' => 'Khuyen mai không được bỏ trống'
        ];
    }
}