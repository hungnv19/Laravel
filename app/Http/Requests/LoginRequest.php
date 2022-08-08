<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        // key là name của các input, value là các đk
        return [
            'email' => 'required|email|min:6|max:32',
            'password' => 'required|min:6',
            // 'name' => 'required|min:6|max|16'
        ];
    }
    public function messages()
    {
        // key là key của rule . đk
        return [
            // 'name.required' => 'Name bắt buộc nhập',
            // 'name.min' => 'Name tối thiểu 6 ký tự',
            // 'name.max' => 'Name tối đa 32 ký tự',
            'email.required' => 'Email bắt buộc nhập',
            'email.email' => 'Email phải đúng định dạng',
            'email.min' => 'Email tối thiểu 6 ký tự',
            'email.max' => 'Email tối đa 32 ký tự',
            'password.required' => 'Mật khẩu bắt buộc nhập',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự'
        ];
    }
}
