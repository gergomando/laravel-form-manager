<div class="form-group bmd-form-group">
    {{ Form::label($column, $label ? $label : ' ', ['class' => 'control-label bmd-label-static']) }}
    {{ Form::select($column.'[]', array_replace($list), $default, array_merge(['class' => 'form-control', 'multiple'], $attributes))
    }}
    @include('form-manager-render::components.validation')
</div>