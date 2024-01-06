@extends('dashboard.sidebar')
@section('konten')

<div class="col-sm-12">
  <div class="d-sm-flex align-items-center justify-content-between border-bottom">
    <h2><b>Edit Supplier</b></h2>
    <div class="btn-wrapper">
        <a class="btn btn-primary"><i class="fas fa-fw fa-truck"></i></a>
    </div>
  </div>

  <!-- Konten -->
  <div class="content mt-4 mb-4">
      <div class="card col-md-7 mx-auto col-sm-12">
        <div class="card-body">
          <form action="{{ route('supplier.update', ['id' => $supplier->id]) }}" method="post">
            @csrf
            <label>Nama</label></br>
            <input type="text" name="nama" id="nama" value="{{$supplier->nama}}" class="form-control"></br>
            <label>No Telepon</label></br>
            <input type="text" name="telepon" id="telepon" value="{{$supplier->telepon}}" class="form-control"></br>
            <label>Alamat</label></br>
            <textarea name="alamat" id="alamat" class="form-control">{{$supplier->alamat}}</textarea></br>
            <div class="text-right">
              <a class="btn btn-secondary" href="{{ route('supplier.index') }}"> Cancel</a>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
  </div>
  <!-- End -->
  
</div>
 
@endsection