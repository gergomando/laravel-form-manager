<div class="form-group">
    @include('form-manager-render::components.label')

    <input 
    @include('form-manager-render::components.field_attributes', ['attributes' => array_merge([
            'name' => $name,
            'value' => $value,
            'class' => 'form-control',
            'type' => 'password'
        ], $attributes)])
    >
    @include('form-manager-render::components.validation')
</div>