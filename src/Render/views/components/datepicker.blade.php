<div class="form-group">
    <label class="control-label" for="{{{ $field['name'] }}}">
        {{{ $field['label'] }}}
    </label>
    <input type="text" name="{{{ $field['name'] }}}" value="{{{ $field['value'] }}}" class="form-control date-picker-input">
    @include('form-manager-render::components.validation')
</div>