<div class="form-group">
    {{ Form::label($column, $label, ['class' => 'control-label']) }}
    {{ Form::password($column, array_merge(['class' => 'form-control'], $attributes)) }}
    @include('form::components.validation')
</div>