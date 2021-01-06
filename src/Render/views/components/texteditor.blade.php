<div class="form-group">
    @include('form-manager-render::components.label')

    <textarea-component :default-value="{{{ json_encode($field['value']) }}}" :input-name="{{{ json_encode($field['name']) }}}"></textarea-component>
    @include('form-manager-render::components.validation')
</div>