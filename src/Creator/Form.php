<?php namespace webmuscets\FormManager\Creator;
use webmuscets\FormManager\Creator\Models\Form as CreatorForm;

class Form {

  public static function getFields($type)
  {
    $form = config('form-manager.'.$type);
    $originalFields = $form ? $form['fields'] : [];
    $fields = [];

    foreach ($originalFields as $field) {
      $attributes = isset($field['attributes']) ? $field['attributes'] : [];

      $fields[$field['name']] = [
        'type' => $field['type'],
        'label' => $field['label'],
        'attributes' => $attributes,
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
      'multiselect' => 'multiselect',
      'textarea' => 'textarea',
      'texteditor' => 'texteditor',
      'email' => 'email',
      'password' => 'password',
      'file' => 'file',
      'hidden' => 'hidden',
      'checkbox' => 'checkbox',
      'multiline' => 'multiline',
      'maskedinput' => 'maskedinput',
      'datepicker' => 'datepicker',
    ];
  }


}