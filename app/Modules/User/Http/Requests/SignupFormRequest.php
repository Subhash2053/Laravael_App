<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupFormRequest extends FormRequest
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
            'name' => 'required|min:4',
            'username' => 'required|min:4|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:4',
//            'g-recaptcha-response' => 'required|captcha'
        ];
    }


    public function messages()
    {
        return [

            'g-recaptcha-response.required' => 'Captcha field is required'
        ];
    }
}
