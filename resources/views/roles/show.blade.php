@extends('dashboard.sidebar')
@section('konten')

<div class="col-sm-12">
  <div class="d-flex align-items-center justify-content-between border-bottom">
    <h2><b>Info Role</b></h2>
    <div class="btn-wrapper">
        <a class="btn btn-primary"><i class="fas fa-fw fa-users"></i></a>
    </div>
  </div>

  <!-- Konten -->
  <div class="content mt-4 mb-4">
    <div class="card col-md-6 mx-auto col-sm-12">
      <div class="card-body">
          <p class="card-text">Name : <b>{{ $role->name }}</b></p>
          <p class="card-text">Permission : </p>
          @if(!empty($rolePermissions))
            @foreach($rolePermissions as $v)
                <p class="badge badge-success" style="font-size: 15px">{{ $v->name }}</p>
            @endforeach
          @endif
      </div>
      <a class="btn btn-primary mt-3 mb-2" href="{{ route('roles.index') }}"> Back</a>
    </div>
  </div>
  <!-- End -->

</div>

@endsection