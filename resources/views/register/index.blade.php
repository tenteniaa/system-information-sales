@extends('layout')
@section('konten')
<div class="row justify-content-center">
    <div class="col-lg-5">
    <main class="form-registration">
        <h1 class="h3 mb-3 fw-normal text-center">Form Registrasi</h1>
  <form action="/register" method="post">
    @csrf
    <div class="form-floating">
      <input type="text" name="name" class="form-control rounded-top" id="name" placeholder="name" required>
      <label for="name">Nama</label>
    </div>
    <div class="form-floating">
      <input type="text" name="email" class="form-control" id="email" placeholder="name@example.com" required>
      <label for="email">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control rounded-bottom" id="password" placeholder="Password" required>
      <label for="password">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
  </form>
  <small class= "mt-3"><a href='/loginbuku'>Login</a></small>
</main>
    </div>
</div>

@endsection