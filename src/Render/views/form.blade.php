@php
 $url = $form['config']['url'];
 $method = $form['config']['method'];
@endphp

<form method="POST" action="{{ $url }}" enctype="multipart/form-data">
    @csrf

    @if($method === 'PUT')
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
