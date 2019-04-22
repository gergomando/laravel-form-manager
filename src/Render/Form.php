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

  public function render() {
      $this->fields = $this->setFieldsProperties();

      $form = [
        'config' => $this->config,
        'lists' => $this->lists,
        'fields' => $this->fields,
      ];

      return view('form-manager-render::render', ['form' => $form])->render();
  }

  private function setFieldsProperties() {
    $fields = [];
    foreach ($this->fields as $name => $element) {
      $fields[$name] = $element;

      if(!isset($element['attributes']))
        $fields[$name]['attributes'] = [];
    
      if(isset($this->lists[$name]))
        $fields[$name]['list'] = $this->lists[$name];

      if(isset($this->values[$name]))
        $fields[$name]['value'] = $this->values[$name];
      else
        $fields[$name]['value'] = '';

      $fields[$name]['name'] = $this->setInputName($name);
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