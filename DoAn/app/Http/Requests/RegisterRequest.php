<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required','numeric'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập thông tin name',
            'email.required' => 'Chưa nhập thông tin email',
            'email.unique' => 'Email đã tồn tại...',
            'email.email' => 'Sai định dạng email',
            'phone.required' => 'Chưa nhập thông tin số điện thoại',
            'phone.numeric' => 'Sai định dạng số điện thoại',
            'password.required' => 'Chưa nhập password',
            'password.min' => 'Password tối thiểu 8 ký tự',
            'password.confirmed' => 'Mật khẩu nhập lại không trùng khớp',
        ];
    }
}
