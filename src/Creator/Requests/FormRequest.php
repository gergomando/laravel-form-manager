<?php namespace webmuscets\FormManager\Creator\Requests;

use webmuscets\FormManager\Creator\Requests\Request;

class FormRequest extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'crud.name'   => 'required',
            'crud.slug'   => 'required',
            'crud.fields.*.name' => 'required|string',
            'crud.fields.*.type' => 'required|string',
        ];
    }
}