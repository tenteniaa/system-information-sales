@extends('dashboard.sidebar')
@section('konten')

<div class="col-sm-12">
  <div class="d-flex align-items-center justify-content-between border-bottom">
    <h2><b>Info Pelanggan</b></h2>
    <div class="btn-wrapper">
        <a class="btn btn-primary"><i class="fas fa-fw fa-id-card"></i></a>
    </div>
  </div>

  <!-- Konten -->
  <div class="content mt-4 mb-4">
    <div class="card col-md-6 mx-auto col-sm-12">
      <div class="card-body">
          <p class="badge badge-success" style="font-size: 15px">{{ $pelanggan->nama }}</p>
          <p class="card-text">No Telepon : {{ $pelanggan->telepon }}</p>
          <p class="card-text">Alamat : {{ $pelanggan->alamat }}</p>
          <a class="btn btn-primary mt-5" href="{{ route('pelanggan.index') }}"> Back</a>
      </div>
    </div>
  </div>
  <!-- End -->

</div>

@endsection