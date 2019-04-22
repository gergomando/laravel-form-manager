<div class="form-group"
@if(isset($attributes['hidden']) && $attributes['hidden'])
style="display:none"; 
@endif
>
    {{ Form::label($column, $label, ['class' => 'control-label']) }}
    {{ Form::textarea($column, $value, array_merge(['class' => 'form-control', 'rows' => 3], $attributes)) }}
    @include('form-manager-render::components.validation')
</div>