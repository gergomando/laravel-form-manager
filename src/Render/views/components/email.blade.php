<div class="form-group">
    {{ Form::label($column, $label, ['class' => 'control-label']) }}
    {{ Form::email($column, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    @include('form::components.validation')
</div>