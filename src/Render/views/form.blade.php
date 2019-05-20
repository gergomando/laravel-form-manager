@include('form-manager-render::components')

{{{ Form::open($form['config']) }}}

@foreach($form['fields'] as $name => $field)

    @include('form-manager-render::field',['field' => $field])

@endforeach

{{{ Form::button(isset($form['config']['submit_caption']) ? $form['config']['submit_caption'] : 'Mentés', ['type' => 'submit', 'class' => 'btn btn-primary']) }}}

{{{ Form::close() }}}