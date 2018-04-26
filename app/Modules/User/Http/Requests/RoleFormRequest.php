<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleFormRequest extends FormRequest
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
        switch ($this->method()) {

            case 'POST':
                return [
                    'name' => 'required|unique:roles',
                    'sort_order' => 'required|numeric',
                ];
            case 'PUT':
                return [
                    'name' => 'required',
                    'sort_order' => 'required|numeric',
                ];
            default:
                break;
        }
    }
    public function messages()
    {
        return [
            'name.required'=>"Role name Required."
        ];
    }
}
