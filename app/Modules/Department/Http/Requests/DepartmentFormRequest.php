<?php

namespace App\Modules\Department\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentFormRequest extends FormRequest
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
                    'title' => 'required',
                    'sort_order' => 'required|numeric|min:1',
                ];
            case 'PUT':
                return [
                    'title' => 'required' . $this->route('id'),
                    'sort_order' => 'required|numeric|min:1',
                ];
            default:
                break;
        }
    }
}
