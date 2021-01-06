<div class="form-group" 
@if(isset($attributes['hidden']) && $attributes['hidden'])
 style="display:none"
@endif
>
<fileupload-component
    :input-name="'{{{ $name }}}'"
    :show-preview="true"
></fileupload-component>
@include('form-manager-render::components.validation')
</div>
