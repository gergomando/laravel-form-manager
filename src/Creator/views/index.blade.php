@extends('form-manager-creator.main')
@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            	<div class="card-title ">
                <h4>
                  <span>Formok</span>

                    <a href="/form-manager/forms/create" class="pull-right btn btn-sm btn-info">
                      új form
                    </a>
                </h4>
              </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>
                        Név
                    </th>
                    <th>
                        Slug
                    </th>
                    <th>

                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($items as $item)
                  <tr>
                    <td>
                      {{{ $item->name }}}
                    </td>
                    <td>
                      {{{ $item->slug }}}
                    </td>

                    <td>
                        <a class="btn btn-warning btn-sm" href="/form-manager/forms/{{{ $item->id }}}/edit" >
                          <i class='fa fa-pencil'></i>
                        </a>
                        <a class="btn btn-warning btn-sm" href="/form-manager/forms/{{{ $item->id }}}/attributes" >
                          <i class='fa fa-list'></i>
                        </a>

                        @if(empty($item->fields))
                        <form method="POST" action="/form-manager/forms/{{{ $item->id }}}" style="display:inline">
                            <input name="_method" type="hidden" value="DELETE">
                            @csrf
                            <button  class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>
                        </form>
                        @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection