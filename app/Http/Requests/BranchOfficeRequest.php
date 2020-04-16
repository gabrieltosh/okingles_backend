<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchOfficeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'=>'unique:branch_offices',
        ];
    }
    public function messages()
    {
        return [
            'name.unique' => 'El valor del campo nombre ya está en uso.',
        ];
    }
}
