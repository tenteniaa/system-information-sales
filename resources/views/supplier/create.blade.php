@extends('dashboard.sidebar')
@section('konten')

<div class="row">
      
  <div class="col-sm-12">
      <div class="home-tab">
        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="{{ route('supplier.index') }}" role="tab" aria-controls="overview" aria-selected="false">List Supplier</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active ps-0" id="profile-tab" data-bs-toggle="tab" href="{{ route('supplier.create') }}" role="tab" aria-selected="true">Add Supplier</a>
            </li>
          </ul>
          <div>
            <div class="btn-wrapper">
              <a class="btn btn-primary"><i class="fas fa-fw fa-user"></i></a>
            </div>
          </div>
        </div>

              <div class="container-fluid">
                  <div class="col-sm-12">
                      <br>
                      <h2><b class="row justify-content-center">Tambah Supplier</b></h2>
                      </br>
                  </div>
              </div>

              <!-- Konten -->
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-body">
<div class="card">

  <div class="box-header"class="row justify-content-center"
  <h3><b class="row justify-content-center"></b></h3>
  <div class="card-body">
      
      <form action="{{ url('/supplier') }}" method="post">
        {!! csrf_field() !!}
        <label>ID</label></br>
        <input type="text" name="supplier_id" id="supplier_id" class="form-control"></br>
        <label>Nama</label></br>
        <input type="text" name="supplier_name" id="supplier_name" class="form-control"></br>
        <label>Alamat</label></br>
        <input type="text" name="supplier_address" id="supplier_address" class="form-control"></br>
        <label>No Telepon</label></br>
        <input type="text" name="supplier_phone" id="supplier_phone" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop