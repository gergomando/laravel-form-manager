@php
    $value = isset($field['value']) ? $field['value'] : '';
    $name = $field['name'];
    $attributes = isset($field['attributes']) ? $field['attributes'] : '';
@endphp

@if(!isset($field['type']) || $field['type'] === 'text')
    @include('form-manager-render::components.text',['field' => $field])
@else 
    @if($field['type'] === 'datepicker')
        @include('form-manager-render::components.datepicker',['field' => $field])
    @endif

    @if($field['type'] === 'hidden')
        <input type="hidden" name="{{{ $name }}}" value="{{{ $value }}}">
    @endif

    @if($field['type'] === 'email')
        @include('form-manager-render::components.email',['field' => $field])
    @endif

    @if($field['type'] === 'select')
        @include('form-manager-render::components.select',['field' => $field])
    @endif

    @if($field['type'] === 'multiselect')
        @include('form-manager-render::components.multiselect',['field' => $field])
    @endif

    @if($field['type'] === 'maskedinput')
        @include('form-manager-render::components.maskedinput',['field' => $field])
    @endif

    @if($field['type'] === 'password')
        @include('form-manager-render::components.password',['field' => $field])
    @endif

    @if($field['type'] === 'textarea')
        @include('form-manager-render::components.textarea',['field' => $field])
    @endif

    @if($field['type'] === 'texteditor')
        @include('form-manager-render::components.texteditor',['field' => $field])
    @endif

    @if($field['type'] === 'multiline')
        @include('form-manager-render::components.multiline',['field' => $field])
    @endif

    @if($field['type'] === 'checkbox')
        @include('form-manager-render::components.checkbox',['field' => $field])
    @endif

    @if($field['type'] === 'file')
        @include('form-manager-render::components.file',['field' => $field])
    @endif
@endif