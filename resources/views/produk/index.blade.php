@extends('dashboard.sidebar')

@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="{{ route('produk.index') }}" role="tab" aria-controls="overview" aria-selected="true">List Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="{{ route('produk.create') }}" role="tab" aria-selected="false">Add Produk</a>
                            </li>
                        </ul>
                        <div>
                            <div class="btn-wrapper">
                                <a class="btn btn-primary"><i class="fas fa-fw fa-cubes"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="col-sm-12">
                            <br>
                            <h2><b class="row justify-content-center">Daftar Produk</b></h2>
                            </br>
                        </div>
                        <div class="card">
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form action="/produk">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Search" name="search" value="{{request('search')}}">
                                            <button class="btn btn-secondary" type="submit">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <div style="float: right">
                                    <a href="{{ route('exportproduk') }}" class="btn btn-success"><i class="fa fa-table"></i> Export</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>Merk</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Diskon</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($produk as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->id_produk }}</td>
                                                <td>{{ $item->nama_produk }}</td>
                                                <td>{{ $item->kategori->nama_kategori ?? 'lainnya'}}</td>
                                                <td>{{ $item->merk }}</td>
                                                <td>{{ $item->harga_beli }}</td>
                                                <td>{{ $item->harga_jual }}</td>
                                                <td>{{ $item->diskon }}</td>
                                                <td>{{ $item->stok }}</td>
                                                <td>
                                                    <a href="{{ url('/produk/' . $item->id) }}" title="Show"> <button class="btn btn-outline-warning btn-sm"><i aria-hidden="true"></i> Detail</button></a>
                                                    @can('produk-edit')
                                                    <a href="{{ url('/produk/' . $item->id . '/edit') }}" title="Edit"><button class="btn btn-outline-primary btn-sm"><i aria-hidden="true"></i> Edit</button></a>
                                                    @endcan
                                                    <form method="POST" action="{{ url('/produk' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        @can('produk-delete')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)"><i aria-hidden="true"></i> Delete</button>
                                                        @endcan
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $produk->links() }}
@endsection