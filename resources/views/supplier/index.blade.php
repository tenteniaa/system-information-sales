@extends('dashboard.sidebar')
@section('konten')           

<div class="col-sm-12">
    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
      <h2><b>Daftar Supplier</b></h2>
      <div class="btn-wrapper">
          <a class="btn btn-primary" style="pointer-events: none;"><i class="fas fa-fw fa-truck"></i></a>
      </div>
    </div>
        
    <!-- Content -->
    <div class="content mt-4 mb-4">
        <div class="card">
            <div class="card-body d-flex flex-sm-row flex-column">
                <form action="/supplier" class="col-md-6 col-sm-12">
                    <div class="input-group mb-3 mb-sm-0">
                        <input type="text" class="form-control" placeholder="Search" name="search" value="{{request('search')}}">
                        <button class="btn btn-dark" type="submit" ><i class="fas fa-search fa-sm"></i></button>
                    </div>
                </form>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="{{ route('supplier.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                    <a href="{{ route('supplier.export') }}" class="btn btn-primary"><i class="fa fa-table"></i> Export</a>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table no-wrap" id="dataTable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($supplier as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->telepon  }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <a href="{{route('supplier.show', $item->id_supplier)}}" title="show" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('supplier.edit', $item->id_supplier)}}" title="edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $item->id_supplier }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    {{ $supplier->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
@foreach ($supplier as $item)
<div class="modal fade" id="deleteModal-{{ $item->id_supplier }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">Yakin ingin menghapus data supplier <span style="font-weight: 700">{{ Str::limit($item->nama, 30) }}</span>?</div>
          <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
              <form action="{{ route('supplier.destroy', $item->id_supplier) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary border-0">Ya</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endforeach

@endsection