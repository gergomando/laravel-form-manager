<div class="form-group">
    {{ Form::label($column, $label, ['class' => 'control-label']) }}
    {{ Form::textarea($column, $value, array_merge(['class' => 'form-control', 'rows' => 3], $attributes)) }}
    @include('form::components.validation')
</div>