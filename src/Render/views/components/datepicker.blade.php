<div class="form-group">
    @include('form-manager-render::components.label')
    <input 
        @include('form-manager-render::components.field_attributes', ['attributes' => array_merge([
            'name' => $name,
            'value' => $value,
            'class' => 'form-control date-picker-input',
            'type' => 'text'
        ], $attributes)])
    >
    @include('form-manager-render::components.validation')
</div>