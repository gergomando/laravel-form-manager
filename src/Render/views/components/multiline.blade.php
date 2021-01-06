@if($field['label'])
<div class="form-group">
    <label class="control-label" for="{{{ $field['name'] }}}">
        {{{ $field['label'] }}}
    </label>
</div>
@endif

<multiline-component
:column="{{{ json_encode($field['name']) }}}"
:new-rows="{{{ json_encode($field['rows']) }}}"
:new-fields="{{{ json_encode($field['fields']) }}}"
:config="{{{ json_encode($field['config']) }}}"></multiline-component>