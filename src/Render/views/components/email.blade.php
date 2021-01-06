<div class="form-group">
    <label class="control-label" for="{{{ $field['name'] }}}">
        {{{ $field['label'] }}}
    </label>
    <input type="email" name="{{{ $field['name'] }}}" value="{{{ $field['value'] }}}" class="form-control">
    @include('form-manager-render::components.validation')
</div>