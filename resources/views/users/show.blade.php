@extends('dashboard.sidebar')
@section('konten')

<div class="col-sm-12">
  <div class="d-flex align-items-center justify-content-between border-bottom">
    <h2><b>Info User</b></h2>
    <div class="btn-wrapper">
        <a class="btn btn-primary"><i class="fas fa-fw fa-user"></i></a>
    </div>
  </div>

  <!-- Konten -->
  <div class="content mt-4 mb-4">
    <div class="card col-md-6 mx-auto col-sm-12">
      <div class="card-body">
          <p class="card-text">Name : {{ $user->name }}</p>
          <p class="card-text">Email : {{ $user->email }}</p>
          @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
                <p class="badge badge-success" style="font-size: 15px">{{ $user->$v }}</p>
            @endforeach
          @endif
          <a class="btn btn-primary mt-5" href="{{ route('users.index') }}"> Back</a>
      </div>
    </div>
  </div>
  <!-- End -->

</div>

@endsection