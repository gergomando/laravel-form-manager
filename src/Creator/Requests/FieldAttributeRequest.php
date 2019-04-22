<?php namespace webmuscets\FormManager\Creator\Requests;

use webmuscets\FormManager\Creator\Requests\Request;

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