<div class="form-group">
    {{ Form::label($column, $label, ['class' => 'control-label']) }}
    {{ Form::text($column, $value, array_merge(['class' => 'form-control date-picker-input'], $attributes)) }}
    @include('form::components.validation')
</div>