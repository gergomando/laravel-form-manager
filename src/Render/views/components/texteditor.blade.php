<div class="form-group">
    {{ Form::label($column, $label ? $label : ' ', ['class' => 'control-label']) }}
    <textarea-component :default-value="'{{{ $value }}}'" :input-name="'{{{ $column }}}'"></textarea-component>
    @include('form-manager-render::components.validation')
</div>