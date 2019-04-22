<?php namespace webmuscets\FormManager\Creator\Models;

use Illuminate\Database\Eloquent\Model;

class FormAttribute extends Model {
    protected $guarded = array('id','created_at','updated_at');
    protected $table = "form_manager_form_attributes";

}