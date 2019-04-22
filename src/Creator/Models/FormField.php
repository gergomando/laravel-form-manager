<?php namespace webmuscets\FormManager\Creator\Models;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model {
    protected $guarded = array('id','created_at','updated_at');
    protected $table = "form_manager_form_fields";

    public function attributes()
    {
    	return $this->hasMany(__NAMESPACE__ .'\FormFieldAttribute','field_id');
    }

}