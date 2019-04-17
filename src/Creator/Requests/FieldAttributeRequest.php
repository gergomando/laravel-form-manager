<?php namespace App\Libraries\FormManager\Creator\Requests;

use App\Libraries\FormManager\Creator\Requests\Request;

class FieldAttributeRequest extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'crud.attributes.*.attribute' => 'required|string',
            'crud.attributes.*.value' => 'required|string',
        ];
    }
}