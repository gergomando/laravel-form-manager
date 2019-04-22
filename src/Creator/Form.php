<?php namespace webmuscets\FormManager\Creator;
use webmuscets\FormManager\Creator\Models\Form as CreatorForm;

class Form {

  public static function getFields($type)
  {
    $form = CreatorForm::where('slug','=', $type)->first();

    $originalFields = $form ? $form->fields : [];
    $fields = [];

    foreach ($originalFields as $field) {
    	$fields[$field->name] = [
    		'type' => $field->type,
    		'label' => $field->label,
    		'attributes' => $field->attributes()->pluck('value','attribute')->all(),
    	];
    }

  	return $fields;
  }

  public function getFormAttributes($type) {
      return CreatorForm::where('slug','=', $type)->first()->attributes;

  }

  public static function getInputTypes() {
    return [
      'text' => 'text',
      'select' => 'select',
      'textarea' => 'textarea',
      'email' => 'email',
      'password' => 'password',
      'file' => 'file',
      'hidden' => 'hidden',
      'checkbox' => 'checkbox',
      'multiline' => 'multiline',
      'datepicker' => 'datepicker',
    ];
  }


}