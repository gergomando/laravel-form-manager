<div class="form-group">
    {{ Form::label($column, $label, ['class' => 'control-label']) }}
    {{ Form::select($column, array_replace($list), $default, array_merge(['class' => 'form-control', 'placeholder' => 'Válassz az alábbi opciók közül!'], $attributes))
    }}
    @include('form-manager-render::components.validation')
</div>