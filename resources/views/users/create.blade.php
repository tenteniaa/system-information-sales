@extends('dashboard.sidebar')
@section('konten')

<div class="col-sm-12">
  <div class="d-flex align-items-center justify-content-between border-bottom">
    <h2><b>Create New User</b></h2>
    <div class="btn-wrapper">
        <a class="btn btn-primary"><i class="fas fa-fw fa-user"></i></a>
    </div>
  </div>

  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
  @endif

  <!-- Konten -->
  <div class="content mt-4 mb-4">     
    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
    <label>Nama</label>
    {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) !!}
    <label class="mt-3">Email</label>
    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
    <label class="mt-3">Password</label>
    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
    <label class="mt-3">Confirm Password</label>
    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
    <label class="mt-3">Role : </label>
    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
    <div class="text-right mt-3">
      <a class="btn btn-secondary" href="{{ route('users.index') }}"> Cancel</a>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    {!! Form::close() !!}
  </div>
  <!-- End -->
</div>
 
@endsection