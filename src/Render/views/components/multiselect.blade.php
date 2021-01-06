<div class="form-group bmd-form-group">
    @include('form-manager-render::components.label')

	<multiselect-component 
        :selected="{{{ json_encode($field['value']) }}}" 
        :name="{{{ json_encode($field['name']) }}}" 
        :options="{{{ json_encode($field['list']) }}}"></multiselect-component>
    @include('form-manager-render::components.validation')
</div>

