@extends('dashboard.sidebar')
@section('konten')           

<div class="col-sm-12">
    <div class="d-flex align-items-center justify-content-between border-bottom">
      <h2><b>Transaksi Pembelian</b></h2>
      <div class="btn-wrapper">
          <a class="btn btn-primary" style="pointer-events: none;"><i class="fas fa-fw fa-cart-plus"></i></a>
      </div>
    </div>
        
    <!-- Content -->
    <div class="content mt-4 mb-4">
        <div class="card">
            <div class="card-body d-flex flex-sm-row flex-column">
                <form action="/pembelian" class="col-md-6 col-sm-12">
                    <div class="input-group mb-3 mb-sm-0">
                        <input type="text" class="form-control" placeholder="Search" name="search" value="{{request('search')}}">
                        <button class="btn btn-dark" type="submit" ><i class="fas fa-search fa-sm"></i></button>
                    </div>
                </form>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="{{ route('pembelian.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                    <a href="{{ route('pembelian.export') }}" class="btn btn-primary"><i class="fa fa-table"></i> Export</a>
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
                                <th>Supplier</th>
                                <th>Total Item</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembelian as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->supplier->nama }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ $item->bayar }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{route('pembelian.show', $item->id_pembelian)}}" title="show" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $item->id_pembelian }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $pembelian->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
@foreach ($pembelian as $item)
<div class="modal fade" id="deleteModal-{{ $item->id_pembelian }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">Yakin ingin menghapus data pembelian?</div>
          <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
              <form action="{{ route('pembelian.destroy', $item->id_pembelian) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary border-0">Ya</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endforeach

@endsection