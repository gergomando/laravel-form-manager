@if($label)
<div class="form-group">
	{{ Form::label($column, $label ? $label : ' ', ['class' => 'control-label']) }}
</div>
@endif
	
<multiline-component
:column="{{{ json_encode($column) }}}"
:new-rows="{{{ json_encode($value) }}}"
:new-fields="{{{ json_encode($fields) }}}"
:config="{{{ json_encode($config) }}}"></multiline-component>

