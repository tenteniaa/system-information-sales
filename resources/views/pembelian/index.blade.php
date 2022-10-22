@extends('dashboard.sidebar')

@section('konten')
<div class="container">    
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="container-fluid">
                    <div class="col-sm-12">
                        <br>
                        <h2><b class="row justify-content-center">Daftar Transaksi Pembelian</b></h2>
                        </br>
                    </div>
                </div>
                <!-- Tabel CRUD -->
                <div class="card-body">
                    <section class="content">
                        <div class="container-fluid">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <section class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div style="float: right">
                                                <a href="{{ route('exportpembelian') }}" class="btn btn-success"><i class="fa fa-table"></i> Export</a>
                                            </div>
                                            <form action="/pembelian">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Search" name="search" value="{{request('search')}}">
                                                        <button class="btn btn-dark" type="submit" ><i class="fas fa-search fa-sm"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @endif
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>ID</th>
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
                                                        <td>{{ $item->id_pembelian }}</td>
                                                        <td>{{ $item->supplier->supplier_name ?? '-' }}</td>
                                                        <td>{{ $item->jumlah }}</td>
                                                        <td>{{ $item->bayar }}</td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>
                                                            <a href="{{ url('/pembelian/' . $item->id) }}" title="Show"> <button class="btn btn-outline-warning btn-sm"><i aria-hidden="true"></i> Detail</button></a>
                                                            <form method="POST" action="{{ url('/pembelian' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                @can('pembelian-delete')
                                                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)"><i aria-hidden="true"></i> Delete</button>
                                                                @endcan
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
{{ $pembelian->links() }}
@endsection