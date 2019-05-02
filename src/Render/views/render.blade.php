@include('form-manager-render::components')

{{{ Form::open($form['config']) }}}

@foreach($form['fields'] as $name => $field)

    @if(!isset($field['type']) || $field['type'] == 'text')
        {{{ Form::fieldText($field['label'], $field['name'], $field['value'], $field['attributes']) }}}
    @else
        @if($field['type'] == 'datepicker')
            {{{ Form::fieldDatepicker($field['label'], $field['name'], $field['value'], $field['attributes']) }}}
        @endif

        @if($field['type'] == 'hidden')
            {{{ Form::hidden($field['name'], $field['value']) }}}
        @endif

        @if($field['type'] == 'email')
            {{{ Form::fieldEmail($field['label'], $field['name'], $field['value'], $field['attributes']) }}}
        @endif

        @if($field['type'] == 'select')
            {{{ Form::fieldSelect($field['label'], $field['name'],$field['value'], $field['list'], $field['attributes']) }}}
        @endif

        @if($field['type'] == 'password')
            {{{ Form::fieldPassword($field['label'], $field['name'], $field['attributes']) }}}
        @endif

        @if($field['type'] == 'textarea')
            {{{ Form::fieldTextarea($field['label'], $field['name'], $field['value'], $field['attributes']) }}}
        @endif

        @if($field['type'] == 'texteditor')
            {{{ Form::fieldTexteditor($field['label'], $field['name'], $field['value'], $field['attributes']) }}}
        @endif

        @if($field['type'] == 'multiline')
            {{{ Form::fieldMultiline(isset($field['label']) ? $field['label'] : false, $name, $field['fields'] , isset($field['rows']) ? $field['rows'] : [], isset($field['config']) ? $field['config'] : []) }}}
        @endif

        @if($field['type'] == 'checkbox')
            {{{ Form::fieldCheckbox($field['label'], $field['name'],$field['value'], $field['attributes']) }}}
        @endif

        @if($field['type'] == 'file')
            {{{ Form::fieldFile($field['label'], $field['name'], $field['attributes']) }}}
        @endif

    @endif
@endforeach

{{{ Form::button('Mentés', ['type' => 'submit', 'class' => 'btn btn-primary']) }}}

{{{ Form::close() }}}