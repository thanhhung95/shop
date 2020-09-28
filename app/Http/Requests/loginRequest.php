<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'email' => 'required|unique:users,email',
            //unique: kiem tra ko bi trung ten trong cldl 
            'name' => 'required|min:6|max:32|unique:users,full_name',
            'address' => 'required',
            'phone' => 'required|min:10|max:11',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
            
        ];
    }
    public function messages()
        {
            return [
                'email.required'        => 'Bạn chưa nhập email',
                'email.unique'          => 'Email này đã có người sử dụng',
                'name.required'         => 'Bạn chưa nhập tài khoản',
                'name.min'              => 'Tài khoản có ít nhất 6 kí tự',
                'name.max'              => 'Tài khoản dài tối đa 32 kí tự',
                'name.unique'           => 'Tài khoản da co nguoi su dung',  
                'address.required'      => 'Bạn chưa điền địa chỉ',
                'phone.required'        => 'Bạn chưa điền số điện thoại',
                'phone.max'             => 'Số điện thoại không đúng',
                'phone.min'             => 'Số điện thoại không đúng',
                'password.required'     => 'Vui lòng nhập mật khẩu',
                'password.min'          => 'Mật khẩu tối thiểu 3 kí tự',
                'password.max'          => 'Mật khẩu tối đa 32 kí tự',
                'passwordAgain.required' => 'Vui lòng nhập lại mật khẩu',
                'passwordAgain.same'    => 'Mật khẩu nhập lại không đúng',
                
            ];
        }
}
