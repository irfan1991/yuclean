<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CheckoutLoginRequest extends Request
{
    
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
            'username'          => 'required',
            'is_guest'          => 'required|in:0,1',
           'checkout_password' => 'required_if:is_guest,0',
        ];
    }

    public function messages()
    {
        return [
            'username.required'             => 'No Telpon harus diisi',
            'checkout_password.required_if' => 'Password harus diisi jika Anda adalah pelanggan tetap',
        ];
    }
}
