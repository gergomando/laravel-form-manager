<form method="POST" action="{{{ $form['config']['url'] }}}">
    @csrf

    @if(isset($form['config']['method']) && $form['config']['method'] === 'PUT')
    @method('PUT')
    @endif

    @foreach($form['fields'] as $name => $field)
        @include('form-manager-render::field',['field' => $field])
    @endforeach

    <button class="btn btn-primary">
        @if(isset($form['config']['submit_caption']))
            {{{ $form['config']['submit_caption'] }}}
        @else
            Mentés
        @endif
    </button>
</form>
