<div class="form-group bmd-form-group">
    @include('form-manager-render::components.label')
    
    @if(isset($field['attributes']['mask']))
    <maskedinput-component 
        :default-value="{{{ json_encode($value) }}}" 
        :mask="{{{ json_encode($field['attributes']['mask']) }}}" 
        :name="{{{ json_encode($name) }}}"
    ></maskedinput-component>
    @else
    <input type="text" name="{{{ $name }}}" value="{{{ $value }}}" class="form-control">
    @endif
    @include('form-manager-render::components.validation')
</div>

