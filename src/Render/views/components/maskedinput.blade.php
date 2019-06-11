<div class="form-group bmd-form-group">
    {{ Form::label($column, $label ? $label : ' ', ['class' => 'control-label bmd-label-static']) }}
    
    @if(isset($attributes['mask']))
    <maskedinput-component :default-value="{{{ json_encode($value) }}}" :mask="{{{ json_encode($attributes['mask']) }}}" :name="{{{ json_encode($column) }}}"></maskedinput-component>
    @else
    {{ Form::text($column, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    @endif

    @include('form-manager-render::components.validation')
</div>

