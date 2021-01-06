<div class="form-group"
@if(isset($attributes['hidden']) && $attributes['hidden'])
style="display:none"
@endif>
    <label class="control-label" for="{{{ $field['name'] }}}">
        {{{ $field['label'] }}}
    </label>
    <textarea name="{{{ $field['name'] }}}" class="form-control" rows="3">
        {{{ $field['value'] }}}
    </textarea>
    @include('form-manager-render::components.validation')
</div>