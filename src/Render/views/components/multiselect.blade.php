<div class="form-group bmd-form-group">
    {{ Form::label($column, $label ? $label : ' ', ['class' => 'control-label bmd-label-static']) }}
	<multiselect-component :selected="{{{ json_encode($default) }}}" :name="{{{ json_encode($column) }}}" :options="{{{ json_encode($list) }}}"></multiselect-component>
    @include('form-manager-render::components.validation')
</div>

