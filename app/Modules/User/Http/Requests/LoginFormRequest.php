<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'login' => 'required',
            'password' => 'required|min:4',
//            'g-recaptcha-response' => 'required|captcha'
        ];
    }


    public function messages()
    {
        return [

            'login.required' => 'Username or Password required.'
        ];
    }
}
