@extends('admin.main')
@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            	<div class="card-title ">
                <h4>
                  <span>{{{ $title }}}</span>
                </h4>
              </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                {!! $form !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection