<div class="form-group bmd-form-group">
    <label class="control-label" for="{{{ $field['name'] }}}">
        {{{ $field['label'] }}}
    </label>
    @if(isset($field['attributes']['mask']))
    <maskedinput-component 
        :default-value="{{{ json_encode($field['value']) }}}" 
        :mask="{{{ json_encode($field['attributes']['mask']) }}}" 
        :name="{{{ json_encode($field['name']) }}}"
    ></maskedinput-component>
    @else
    <input type="text" name="{{{ $field['name'] }}}" value="{{{ $field['value'] }}}" class="form-control">
    @endif
    @include('form-manager-render::components.validation')
</div>

