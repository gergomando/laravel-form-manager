<div class="form-group bmd-form-group">
    <label class="control-label" for="{{{ $field['name'] }}}">
        {{{ $field['label'] }}}
    </label>
    <select class="form-control" name="{{{ $field['name'] }}}">
        @foreach($field['list'] as $option => $optionLabel)
            <option 
                value="{{{ option }}}"
                @if($field['value'] === $option)
                    selected="selected"
                @endif
            >
                {{{ $optionLabel }}}
            </option>
        @endforeach
    </select>
    @include('form-manager-render::components.validation')
</div>