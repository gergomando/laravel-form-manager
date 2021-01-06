@if($field['label'])
<div class="form-group">
    @include('form-manager-render::components.label')
</div>
@endif

<multiline-component
:column="{{{ json_encode($field['name']) }}}"
:new-rows="{{{ json_encode($field['rows']) }}}"
:new-fields="{{{ json_encode($field['fields']) }}}"
@if(isset($field['config']))
:config="{{{ json_encode($field['config']) }}}"
@endif>
</multiline-component>