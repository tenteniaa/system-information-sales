@extends('dashboard.sidebar')
@section('konten')

<div class="col-sm-12">
  <div class="d-flex align-items-center justify-content-between border-bottom">
    <h2><b>Edit Pelanggan</b></h2>
    <div class="btn-wrapper">
        <a class="btn btn-primary"><i class="fas fa-fw fa-id-card"></i></a>
    </div>
  </div>

  <!-- Konten -->
  <div class="content mt-4 mb-4">
      <div class="card col-md-7 mx-auto col-sm-12">
        <div class="card-body">
          <form action="{{ route('pelanggan.update', ['id' => $pelanggan->id]) }}" method="post">
            @csrf
            <label>Nama</label></br>
            <input type="text" name="nama" id="nama" value="{{$pelanggan->nama}}" class="form-control"></br>
            <label>No Telepon</label></br>
            <input type="text" name="telepon" id="telepon" value="{{$pelanggan->telepon}}" class="form-control"></br>
            <label>Alamat</label></br>
            <textarea name="alamat" id="alamat" class="form-control">{{$pelanggan->alamat}}</textarea></br>
            <div class="text-right">
              <a class="btn btn-secondary" href="{{ route('pelanggan.index') }}"> Cancel</a>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
  </div>
  <!-- End -->
  
</div>
 
@endsection