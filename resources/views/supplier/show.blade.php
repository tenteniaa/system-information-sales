@extends('dashboard.sidebar')
@section('konten')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <b class="card-header text-center">{{ __('Supplier') }}</b>
              
              <div class="card-body">
                  <h5 class="card-title">ID : {{ $supplier->supplier_id }}</h5>
                  <p class="card-text">Nama : {{ $supplier->supplier_name }}</p>
                  <p class="card-text">Alamat : {{ $supplier->supplier_address }}</p>
                  <p class="card-text">No Telepon : {{ $supplier->supplier_phone }}</p>
              </div>
              
          </div>
      </div>
  </div>
</div>

@endsection