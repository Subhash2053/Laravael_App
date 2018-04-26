<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendVerificationCodeFormRequst extends FormRequest
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
            'mobile' => 'required|regex:/[0-9]{10}/'
        ];
    }


    public function messages()
    {
        return [
            'mobile.regex' => "Mobile number must be at least 10 digit"
        ];
    }
}
