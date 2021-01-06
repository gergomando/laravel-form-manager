@php
    $columnName = str_replace(']', '', str_replace('[', '.', $field['name']));
@endphp

@if($errors->has($columnName))
    <div class="error-field">
    	{{{ $errors->first($columnName) }}}
    </div>
@endif
