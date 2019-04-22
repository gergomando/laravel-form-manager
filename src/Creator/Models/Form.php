<?php namespace webmuscets\FormManager\Creator\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model {
    protected $guarded = array('id','created_at','updated_at');
    protected $table = "form_manager_forms";

    public function fields()
    {
    	return $this->hasMany(__NAMESPACE__ .'\FormField');
    }

    public function attributes()
    {

        return $this->hasMany(__NAMESPACE__ .'\FormAttribute');
    }


}