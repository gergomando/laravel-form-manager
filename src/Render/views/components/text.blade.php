<div class="form-group ">
    {{ Form::label($column, $label ? $label : ' ', ['class' => 'control-label']) }}
    {{ Form::text($column, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    @include('form-manager-render::components.validation')
</div>