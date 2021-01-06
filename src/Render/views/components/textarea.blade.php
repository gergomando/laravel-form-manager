<div class="form-group"
@if(isset($attributes['hidden']) && $attributes['hidden'])
style="display:none"
@endif>
    @include('form-manager-render::components.label')

    <textarea
        @include('form-manager-render::components.field_attributes', ['attributes' => array_merge([
            'name' => $name,
            'value' => $value,
            'class' => 'form-control',
            'rows' => 3
        ], $attributes)])
    >
    </textarea>
    @include('form-manager-render::components.validation')
</div>