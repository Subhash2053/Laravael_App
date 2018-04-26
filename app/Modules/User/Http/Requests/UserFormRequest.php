<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserFormRequest extends FormRequest
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
/*
    public function __construct(Request $request)
    {
        if($request->has('status')) {
            $request->merge(['status' =>1]);
        } else {
            $request->merge(['status' =>0]);
        }


    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'username' => 'required|min:3|unique:users',
                    'email' => 'required|unique:users',
                    'password' => 'required|min:3|confirmed',
                    'password_confirmation' => 'required|min:3',
                    'name' => 'required',
                    'address' => 'required',
                    'phone' => 'required',
                   /* 'role' => 'required',*/
                ];
            case 'PUT':
                return [
                    'username' => 'min:3|unique:users',
                    'email' => 'unique:users',
                    'name' => 'required',
                    'address' => 'required',
                    'phone' => 'required',
                    /*'role' => 'required',*/
                ];
            default:
                break;
        }


    }

    public function messages()
    {
        return [
            'branch.required' => 'Please select branch.',
            'role.required' => 'Please select at least on role.'
        ];
    }
}
