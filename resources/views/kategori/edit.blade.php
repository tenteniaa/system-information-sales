@extends('dashboard.sidebar')
@section('konten')

<div class="col-sm-12">
  <div class="d-flex align-items-center justify-content-between border-bottom">
    <h2><b>Edit Kategori</b></h2>
    <div class="btn-wrapper">
        <a class="btn btn-primary"><i class="fas fa-fw fa-cube"></i></a>
    </div>
  </div>

  <!-- Konten -->
  <div class="content mt-4 mb-4">
      <div class="card col-md-7 mx-auto col-sm-12">
        <div class="card-body">
          <form action="{{ route('kategori.update', ['id' => $kategori->id]) }}" method="post">
            @csrf
            <label>Nama Kategori</label></br>
            <input type="text" name="nama_kategori" value="{{$kategori->nama_kategori}}" class="form-control"></br>
            <div class="text-right">
              <a class="btn btn-secondary" href="{{ route('kategori.index') }}"> Cancel</a>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
  </div>
  <!-- End -->
  
</div>
 
@endsection