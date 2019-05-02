<div class="form-group">
    {{ Form::label($column, $label, ['class' => 'control-label']) }}
    <textarea-component :input-name="'{{{ $column }}}'"></textarea-component>
    @include('form-manager-render::components.validation')
</div>