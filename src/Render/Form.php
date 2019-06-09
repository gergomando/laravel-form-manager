<?php namespace webmuscets\FormManager\Render;

class Form {
  public $values = [];
  public $lists = [];
  public $disabledFields = [];
  public $namePrefix = 'crud';
  public $config = [
    'url' => '',
    'method' => 'POST',
  ];

  public $fields = [];

  private function getForm() {
    return [
      'config' => $this->config,
      'fields' => $this->setFieldsProperties(),
    ];
  }

  public function render() {
      return view('form-manager-render::form', ['form' => $this->getForm()])->render();
  }

  public function renderElements() {
      $form = $this->getForm();
      $formObject = (object) [];
      
      $formObject->open = view('form-manager-render::open',['form' => $form])->render();
      $formObject->close = view('form-manager-render::close')->render();
      $formObject->fields = [];

      foreach ($form['fields'] as $fieldName => $field) {
        $formObject->fields[$fieldName] = view('form-manager-render::field', ['field' => $field])->render() ;
      }

      return $formObject;
  }

  private function setFieldsProperties() {
    $fields = [];
    foreach ($this->fields as $name => $element) {
      $fields[$name] = $element;

      if(!isset($element['attributes']))
        $fields[$name]['attributes'] = [];
    
      if(isset($fields[$name]['type']) && in_array($fields[$name]['type'], ['select','multiselect'])) {
        $fields[$name]['list'] = [];
      }

      if(isset($this->lists[$name]))
        $fields[$name]['list'] = $this->lists[$name];

      if(isset($this->values[$name]))
        $fields[$name]['value'] = $this->values[$name];
      else
        $fields[$name]['value'] = '';

      $fields[$name]['name'] = $this->setInputName($name);
      
      if(isset($fields[$name]['type']) && $fields[$name]['type'] == 'multiline')
        $fields[$name]['name'] = $name;

    }

    $fields = $this->removeDisabledFields($fields);
    return $fields;
  }

  private function removeDisabledFields($fields) {
    foreach ($this->disabledFields as $key => $name) {
      unset($fields[$name]);
    }
    return $fields;
  }

  private function setInputName($name) {
    $hasDot = strpos($name, '.');
    
    if($hasDot) {
      $name = explode('.', $name);
      $implodedName = $this->namePrefix; 
      
      foreach ($name as $key => $namePart) {
          if($namePart && strlen($namePart) > 0)
            $implodedName .= '['.$namePart.']';
      }

      return $implodedName;
    }

    else
      return $this->namePrefix.'['.$name.']';
  }


}