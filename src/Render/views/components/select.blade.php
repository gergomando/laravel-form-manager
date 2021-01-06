<div class="form-group bmd-form-group">
    @include('form-manager-render::components.label')

    <select 
        @include('form-manager-render::components.field_attributes', ['attributes' => array_merge([
            'name' => $name,
            'value' => $value,
            'class' => 'form-control'
        ], $attributes)])
    >
        @foreach($field['list'] as $option => $optionLabel)
            <option 
                value="{{{ $option }}}"
                @if($value == $option)
                    selected="selected"
                @endif
            >
                {{{ $optionLabel }}}
            </option>
        @endforeach
    </select>
    @include('form-manager-render::components.validation')
</div>